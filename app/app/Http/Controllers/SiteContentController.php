<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = SiteContent::all()->pluck('value', 'key');
        return response()->json($content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'key' => 'required|string|max:255',
            'value' => 'required|string',
            'type' => 'string|max:50',
            'group' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        $content = SiteContent::setValue(
            $request->key,
            $request->value,
            $request->type ?? 'text',
            $request->group,
            $request->description
        );
        
        return response()->json($content, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        // Allow fetching by key or ID
        if (is_numeric($key)) {
            $content = SiteContent::findOrFail($key);
        } else {
            $content = SiteContent::where('key', $key)->firstOrFail();
        }
        
        return response()->json($content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // Handle bulk update of content
        if ($request->has('contents') && is_array($request->contents)) {
            foreach ($request->contents as $key => $value) {
                if (is_string($value) && !empty(trim($value))) {
                    SiteContent::setValue($key, trim($value));
                }
            }
            return response()->json(['message' => 'Content updated successfully']);
        }
        
        // Handle single content update
        if ($id && $request->has('value')) {
            $content = SiteContent::findOrFail($id);
            $content->update(['value' => $request->value]);
            return response()->json($content);
        }
        
        return response()->json(['error' => 'Invalid request'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = SiteContent::findOrFail($id);
        $content->delete();
        return response()->json(['message' => 'Content deleted successfully']);
    }
}
