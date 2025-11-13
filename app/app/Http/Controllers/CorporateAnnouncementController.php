<?php

namespace App\Http\Controllers;

use App\Models\CorporateAnnouncement;
use Illuminate\Http\Request;

class CorporateAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = CorporateAnnouncement::orderBy('published_date', 'desc')->get();
        return response()->json($announcements);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $announcement = CorporateAnnouncement::create($request->all());

        return response()->json($announcement, 201);
    }

    public function show($id)
    {
        $announcement = CorporateAnnouncement::findOrFail($id);
        return response()->json($announcement);
    }

    public function update(Request $request, $id)
    {
        $announcement = CorporateAnnouncement::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $announcement->update($request->all());

        return response()->json($announcement);
    }

    public function destroy($id)
    {
        $announcement = CorporateAnnouncement::findOrFail($id);
        $announcement->delete();
        return response()->json(['message' => 'Corporate announcement deleted successfully']);
    }
}
