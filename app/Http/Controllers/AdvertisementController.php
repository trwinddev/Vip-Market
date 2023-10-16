<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $featureImage = $request->file('feature_image')->store('public/category');
        $firstImage = $request->file('first_image')->store('public/category');
        $secondImage = $request->file('second_image')->store('public/category');
        $data['feature_image'] =  $featureImage;
        $data['first_image'] =  $firstImage;
        $data['second_image'] =  $secondImage;
        $data['slug'] =  Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;

        Advertisement::create($data);
        return redirect()->route('ads.index')->with('message', 'Your ad was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad =  Advertisement::find($id);

        return view('ads.edit', compact('ad'));
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
        $ad = Advertisement::find($id);
        $featureImage = $ad->feature_image;
        $firstImage = $ad->first_image;
        $secondImage = $ad->second_image;
        $data = $request->all();
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image')->store('public/category');
        }
        if ($request->hasFile('first_image')) {
            $firstImage = $request->file('first_image')->store('public/category');
        }
        if ($request->hasFile('second_image')) {
            $secondImage = $request->file('second_image')->store('public/category');
        }
        $data['feature_image'] = $featureImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;

        $ad->update($data);
        return redirect()->route('ads.index')->with('message', 'Your ad was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
