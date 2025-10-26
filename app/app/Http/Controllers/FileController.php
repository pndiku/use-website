<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
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
            'file' => 'required|file|max:10240', // 10MB max
            'description' => 'nullable|string|max:500',
            'alt_text' => 'nullable|string|max:255'
        ]);

        $uploadedFile = $request->file('file');
        $originalName = $uploadedFile->getClientOriginalName();
        $mimeType = $uploadedFile->getMimeType();
        $fileSize = $uploadedFile->getSize();

        // Generate unique filename
        $filename = Str::uuid() . '.' . $uploadedFile->getClientOriginalExtension();

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
            throw new \Exception('Upload directory is not writable: ' . $uploadsPath);
        }

        try {
            $uploadedFile->move($uploadsPath, $filename);
        } catch (\Exception $e) {
            throw new \Exception('Failed to move uploaded file: ' . $e->getMessage());
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
        $fullPath = base_path('../' . $file->file_path);
        if (file_exists($fullPath)) {
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
