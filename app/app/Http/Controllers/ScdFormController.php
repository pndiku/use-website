<?php

namespace App\Http\Controllers;

use App\Models\ScdForm;
use Illuminate\Http\Request;

class ScdFormController extends Controller
{
    public function index()
    {
        $forms = ScdForm::orderBy('published_date', 'desc')->get();
        return response()->json($forms);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $form = ScdForm::create($request->all());

        return response()->json($form, 201);
    }

    public function show($id)
    {
        $form = ScdForm::findOrFail($id);
        return response()->json($form);
    }

    public function update(Request $request, $id)
    {
        $form = ScdForm::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file_url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
            'published_date' => 'nullable|date'
        ]);

        $form->update($request->all());

        return response()->json($form);
    }

    public function destroy($id)
    {
        $form = ScdForm::findOrFail($id);
        $form->delete();
        return response()->json(['message' => 'SCD form deleted successfully']);
    }
}
