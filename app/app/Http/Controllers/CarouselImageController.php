<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use Illuminate\Http\Request;

class CarouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carouselImages = CarouselImage::ordered()->get();
        return response()->json($carouselImages);
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $carouselImage = CarouselImage::create($request->all());
        return response()->json($carouselImage, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carouselImage = CarouselImage::findOrFail($id);
        return response()->json($carouselImage);
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
    public function update(Request $request, $id)
    {
        $carouselImage = CarouselImage::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $carouselImage->update($request->all());
        return response()->json($carouselImage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carouselImage = CarouselImage::findOrFail($id);
        $carouselImage->delete();
        return response()->json(['message' => 'Carousel image deleted successfully']);
    }
}
