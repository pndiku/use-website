<?php

namespace App\Http\Controllers;

use App\Models\MarketRegulation;
use Illuminate\Http\Request;

class MarketRegulationController extends Controller
{
    public function index()
    {
        $regulations = MarketRegulation::orderBy('published_date', 'desc')->get();
        return response()->json($regulations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $regulation = MarketRegulation::create($request->all());

        return response()->json($regulation, 201);
    }

    public function show($id)
    {
        $regulation = MarketRegulation::findOrFail($id);
        return response()->json($regulation);
    }

    public function update(Request $request, $id)
    {
        $regulation = MarketRegulation::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $regulation->update($request->all());

        return response()->json($regulation);
    }

    public function destroy($id)
    {
        $regulation = MarketRegulation::findOrFail($id);
        $regulation->delete();
        return response()->json(['message' => 'Market regulation deleted successfully']);
    }
}
