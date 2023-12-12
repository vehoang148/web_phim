<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Country::all();
        return view('admin.country.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->slug = $data['slug'];
        $country->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        $list = Country::all();
        return view('admin.country.edit',compact('list','country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->slug = $data['slug'];
        $country->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        return redirect()->back();
    }
}