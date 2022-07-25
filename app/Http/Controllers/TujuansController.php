<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTujuansRequest;
use App\Http\Requests\UpdateTujuansRequest;
use App\Models\Tujuans;

class TujuansController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTujuansRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTujuansRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tujuans  $tujuans
     * @return \Illuminate\Http\Response
     */
    public function show(Tujuans $tujuans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tujuans  $tujuans
     * @return \Illuminate\Http\Response
     */
    public function edit(Tujuans $tujuans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTujuansRequest  $request
     * @param  \App\Models\Tujuans  $tujuans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTujuansRequest $request, Tujuans $tujuans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tujuans  $tujuans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tujuans $tujuans)
    {
        //
    }
}
