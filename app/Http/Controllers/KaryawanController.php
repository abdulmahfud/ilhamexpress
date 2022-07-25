<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:karyawan-list|karyawan-create|karyawan-edit|karyawan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:karyawan-create', ['only' => ['create','store']]);
         $this->middleware('permission:karyawan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:karyawan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyawans = Karyawan::latest()->paginate(5);
        return view('backand.karyawan.index',compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        return view('backand.karyawan.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Karyawan::create($request->all());
        return redirect()->route('karyawan.index')
                        ->with('success','karyawan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
        $users= User::all();
        return view('backand.karyawan.edit',compact('karyawan','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
        $karyawan->update($request->all());
        return redirect()->route('karyawan.index')
                        ->with('success','karyawan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
        $karyawan->delete();
    
        return redirect()->route('karyawan.index')
                        ->with('success','karyawan deleted successfully');
    }
}
