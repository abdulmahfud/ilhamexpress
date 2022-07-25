<?php

namespace App\Http\Controllers;

use App\Models\Typepaket;
use Illuminate\Http\Request;

class TypepaketController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:typepaket', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Typepaket::latest()->paginate(10);
        return view('backand.typepaket.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backand.typepaket.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $invdetail= Typepaket::create([
            'paket_name'           => $request->paket_name,
        ]);
        return redirect()->route('typepaket.index')
        ->with('success','Typepaket save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Typepaket  $typepaket
     * @return \Illuminate\Http\Response
     */
    public function show(Typepaket $typepaket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Typepaket  $typepaket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $typepaket= Typepaket::find($id);
        return view('backand.typepaket.edit',compact('typepaket'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypepaketRequest  $request
     * @param  \App\Models\Typepaket  $typepaket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $Typepaket= Typepaket::find($id);
        $Typepaket->paket_name = $request->paket_name;
        $Typepaket->save();

        return redirect()->route('typepaket.index')
        ->with('success','Typepaket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typepaket  $typepaket
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $Typepaket= Typepaket::find($id);
        $Typepaket->delete();
        return redirect()->route('typepaket.index')
                        ->with('success','Typepaket deleted successfully');
    }
}
