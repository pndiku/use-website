<?php

namespace App\Http\Controllers;

use App\Models\MarketPerformance;
use Illuminate\Http\Request;

class MarketPerformanceController extends Controller
{
    public function index()
    {
        $reports = MarketPerformance::orderBy('published_date', 'desc')->get();
        return response()->json($reports);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $report = MarketPerformance::create($request->all());

        return response()->json($report, 201);
    }

    public function show($id)
    {
        $report = MarketPerformance::findOrFail($id);
        return response()->json($report);
    }

    public function update(Request $request, $id)
    {
        $report = MarketPerformance::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $report->update($request->all());

        return response()->json($report);
    }

    public function destroy($id)
    {
        $report = MarketPerformance::findOrFail($id);
        $report->delete();
        return response()->json(['message' => 'Market performance report deleted successfully']);
    }
}
