<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * File extensions that may be uploaded. Uploads are served from the web root,
     * so executable/scriptable types (php, phtml, html, svg, ...) must never be added here.
     */
    private const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'gif', 'webp', 'ico',
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'csv', 'txt',
        'mp4', 'mp3', 'zip',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = File::query()->orderBy('created_at', 'desc');

        // Filter by file type if requested
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('file_type', $request->type);
        }

        // Filter by category if requested
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('original_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%");
            });
        }

        $files = $query->paginate(20);

        return response()->json($files);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 70MB max; extension and detected content type must both be in the allow-list
            'file' => 'required|file|max:71680|mimes:' . implode(',', self::ALLOWED_EXTENSIONS),
            'category' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
            'alt_text' => 'nullable|string|max:255'
        ]);

        $uploadedFile = $request->file('file');
        $originalName = $uploadedFile->getClientOriginalName();
        $mimeType = $uploadedFile->getMimeType();
        $fileSize = $uploadedFile->getSize();

        // Generate unique filename; never trust a client-supplied extension that isn't allow-listed
        $extension = strtolower($uploadedFile->getClientOriginalExtension());
        if (!in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            abort(422, 'File type not allowed.');
        }
        $filename = Str::uuid() . '.' . $extension;

        // Determine file type
        $fileType = $this->determineFileType($mimeType);

        // Determine upload directory based on file type
        if ($fileType === 'image') {
            $uploadsPath = base_path('../images');
            $relativePath = 'images/' . $filename;
        } else {
            $uploadsPath = base_path('../uploads');
            $relativePath = 'uploads/' . $filename;
        }

        // Check if directory exists and is writable
        if (!is_dir($uploadsPath)) {
            mkdir($uploadsPath, 0755, true);
        }

        if (!is_writable($uploadsPath)) {
            \Log::error('Upload directory is not writable: ' . $uploadsPath);
            abort(500, 'Upload failed.');
        }

        try {
            $uploadedFile->move($uploadsPath, $filename);
        } catch (\Exception $e) {
            \Log::error('Failed to move uploaded file: ' . $e->getMessage());
            abort(500, 'Upload failed.');
        }

        $filePath = $relativePath;
        // Use APP_URL from .env as base URL
        $fileUrl = config('app.url') . '/' . $relativePath;

        // Save to database
        $file = File::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'file_path' => $filePath,
            'file_url' => $fileUrl,
            'mime_type' => $mimeType,
            'file_type' => $fileType,
            'category' => $request->category,
            'file_size' => $fileSize,
            'description' => $request->description,
            'alt_text' => $request->alt_text
        ]);

        return response()->json($file, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::findOrFail($id);
        return response()->json($file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);

        $request->validate([
            'description' => 'nullable|string|max:500',
            'alt_text' => 'nullable|string|max:255'
        ]);

        $file->update([
            'description' => $request->description,
            'alt_text' => $request->alt_text
        ]);

        return response()->json($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);

        // Delete file from appropriate directory (images or uploads)
        $fullPath = realpath(base_path('../' . $file->file_path));
        $allowedDirs = [realpath(base_path('../images')), realpath(base_path('../uploads'))];
        if ($fullPath !== false && is_file($fullPath)
            && in_array(dirname($fullPath), $allowedDirs, true)) {
            unlink($fullPath);
        }

        // Delete from database
        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }

    /**
     * Determine file type based on MIME type
     */
    private function determineFileType($mimeType)
    {
        if (strpos($mimeType, 'image/') === 0) {
            return 'image';
        } elseif ($mimeType === 'application/pdf') {
            return 'pdf';
        } elseif (strpos($mimeType, 'video/') === 0) {
            return 'video';
        } elseif (strpos($mimeType, 'audio/') === 0) {
            return 'audio';
        } else {
            return 'document';
        }
    }
}
