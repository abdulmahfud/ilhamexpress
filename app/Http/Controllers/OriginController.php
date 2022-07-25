<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Origin;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
class OriginController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:origin', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Origin::latest()->paginate(10);
        return view('backand.origin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backand.origin.create');

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
        $provinceP = Province::where('id', $request->nama_provinsi_pengirim)->first();
        $regencyP = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
        $districtP = District::where('id', $request->nama_kecamatan_pengirim)->first();
        $invdetail= Origin::create([
            'nama_lokasi'           => $request->nama_lokasi,
            'nama_kecamatan_pengirim'  => $districtP->name,
            'nama_kabupaten_pengirim'  => $regencyP->name,
            'nama_provinsi_pengirim'  => $provinceP->name,
        ]);
        return redirect()->route('origin.index')
        ->with('success','origin save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show(Origin $origin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $origin= Origin::find($id);
        return view('backand.origin.edit',compact('origin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $provinceP = Province::where('id', $request->nama_provinsi_pengirim)->first();
        $regencyP = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
        $districtP = District::where('id', $request->nama_kecamatan_pengirim)->first();

        $origin= Origin::find($id);
        $origin->nama_lokasi = $request->nama_lokasi;
        $origin->nama_kecamatan_pengirim  = $districtP->name;
        $origin->nama_kabupaten_pengirim  = $regencyP->name;
        $origin->nama_provinsi_pengirim = $provinceP->name;
        $origin->save();

        return redirect()->route('origin.index')
        ->with('success','origin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $origin= Origin::find($id);
        $origin->delete();
        return redirect()->route('origin.index')
                        ->with('success','origin deleted successfully');
    }
}
