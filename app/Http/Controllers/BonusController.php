<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\User;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:bonus-list|bonus-create|bonus-edit|bonus-delete', ['only' => ['index','show']]);
         $this->middleware('permission:bonus-create', ['only' => ['create','store']]);
         $this->middleware('permission:bonus-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:bonus-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Bonus::with('user')->latest()->paginate(10);
        $users = User::all();
        return view('backand.bonus.index',compact('data','users'));
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
        //
        request()->validate([
            'tgl' => 'required',
            'id_karyawan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        Bonus::create([
            'id_karyawan'  => $request->id_karyawan,
            'tgl'           => $request->tgl,
            'jumlah'       => str_replace( array( '.'), '', $request->jumlah),
            'keterangan'     =>  $request->keterangan
        ]);
        return redirect()->route('bonus.index')
                        ->with('success','bonus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bonus $bonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'tgl' => 'required',
            'id_karyawan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        $bonus = Bonus::find($id);
        $bonus->id_karyawan  = $request->id_karyawan;
        $bonus->tgl           = $request->tgl;
        $bonus->jumlah       = str_replace( array( '.'), '', $request->jumlah);
        $bonus->keterangan     =  $request->keterangan;
        $bonus->save();
        return redirect()->route('bonus.index')
        ->with('success','bonus update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Bonus::destroy($id);
        return redirect()->route('bonus.index')
                        ->with('success','bonus deleted successfully');
    }
}
