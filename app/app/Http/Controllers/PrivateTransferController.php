<?php

namespace App\Http\Controllers;

use App\Models\PrivateTransfer;
use Illuminate\Http\Request;

class PrivateTransferController extends Controller
{
    public function index()
    {
        $transfers = PrivateTransfer::orderBy('published_date', 'desc')->get();
        return response()->json($transfers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $transfer = PrivateTransfer::create($request->all());

        return response()->json($transfer, 201);
    }

    public function show($id)
    {
        $transfer = PrivateTransfer::findOrFail($id);
        return response()->json($transfer);
    }

    public function update(Request $request, $id)
    {
        $transfer = PrivateTransfer::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $transfer->update($request->all());

        return response()->json($transfer);
    }

    public function destroy($id)
    {
        $transfer = PrivateTransfer::findOrFail($id);
        $transfer->delete();
        return response()->json(['message' => 'Private transfer deleted successfully']);
    }
}
