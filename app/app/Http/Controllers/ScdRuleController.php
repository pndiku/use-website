<?php

namespace App\Http\Controllers;

use App\Models\ScdRule;
use Illuminate\Http\Request;

class ScdRuleController extends Controller
{
    public function index()
    {
        $rules = ScdRule::orderBy('published_date', 'desc')->get();
        return response()->json($rules);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $rule = ScdRule::create($request->all());

        return response()->json($rule, 201);
    }

    public function show($id)
    {
        $rule = ScdRule::findOrFail($id);
        return response()->json($rule);
    }

    public function update(Request $request, $id)
    {
        $rule = ScdRule::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $rule->update($request->all());

        return response()->json($rule);
    }

    public function destroy($id)
    {
        $rule = ScdRule::findOrFail($id);
        $rule->delete();
        return response()->json(['message' => 'SCD rule deleted successfully']);
    }
}
