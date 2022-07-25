<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelolaApikeyRequest;
use App\Http\Requests\UpdateKelolaApikeyRequest;
use App\Models\KelolaApikey;

class KelolaApikeyController extends Controller
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
     * @param  \App\Http\Requests\StoreKelolaApikeyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelolaApikeyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelolaApikey  $kelolaApikey
     * @return \Illuminate\Http\Response
     */
    public function show(KelolaApikey $kelolaApikey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelolaApikey  $kelolaApikey
     * @return \Illuminate\Http\Response
     */
    public function edit(KelolaApikey $kelolaApikey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelolaApikeyRequest  $request
     * @param  \App\Models\KelolaApikey  $kelolaApikey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelolaApikeyRequest $request, KelolaApikey $kelolaApikey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelolaApikey  $kelolaApikey
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelolaApikey $kelolaApikey)
    {
        //
    }
}
