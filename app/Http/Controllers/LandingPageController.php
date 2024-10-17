<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diamond;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $diamonds = Diamond::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(9)->appends($request->all());
        return view('landing_page', compact('diamonds'));
        // return view('landing_page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
