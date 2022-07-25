<?php

namespace App\Http\Controllers;

use App\Models\TarifKirim;
use App\Models\Origin;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;


class TarifKirimController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:tarif-list|tarif-create|tarif-edit|tarif-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tarif', ['only' => ['create','edit','update','destroy','index','store']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $district = District::all();
        $data = TarifKirim::with('origin')->latest()->paginate(100);
        return view('backand.tarif.index',compact('data','district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $origin = Origin::all();
        return view('backand.tarif.create',compact('origin'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $provinceP = Province::where('id', $request->nama_provinsi_pengirim)->first();
            $regencyP = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
            $districtP = District::where('id', $request->nama_kecamatan_pengirim)->first();
            $tarifs= new TarifKirim;
            $tarifs->origin_id = $request->origin_id;
            $tarifs->tujuan           = 'kec.'.$districtP->name.'<br>kab.'.$regencyP->name.'<br> prov.'.$provinceP->name;
            $tarifs->nama_kabupaten_penerima      =$regencyP->name;
            $tarifs->nama_kecamatan_penerima      =$districtP->name;
            $tarifs->layanan      =$request->layanan;
            $tarifs->min_kg = $request->min_kg;
            $tarifs->max_kg = $request->max_kg;
            $tarifs->tarif = str_replace( array( '.'), '', $request->tarif);
            $tarifs->save();
        return redirect()->route('tarif.index')
        ->with('success','tarif updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarifKirim  $tarifKirim
     * @return \Illuminate\Http\Response
     */
    public function show(TarifKirim $tarifKirim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarifKirim  $tarifKirim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $origin = Origin::all();
        $tarif= TarifKirim::with('origin')->find($id);
        return view('backand.tarif.edit',compact('tarif','origin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarifKirim  $tarifKirim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        if ($request->edittujuan==1) {
            # code...
            $provinceP = Province::where('id', $request->nama_provinsi_pengirim)->first();
            $regencyP = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
            $districtP = District::where('id', $request->nama_kecamatan_pengirim)->first();
            $tarifs= TarifKirim::find($id);
            $tarifs->origin_id = $request->origin_id;
            $tarifs->tujuan           = 'kec.'.$districtP->name.'kab.'.$regencyP->name.'prov.'.$provinceP->name;
            $tarifs->nama_kabupaten_penerima      =$regencyP->name;
            $tarifs->nama_kecamatan_penerima      =$districtP->name;
            $tarifs->layanan      =$request->layanan;
            $tarifs->min_kg = $request->min_kg;
            $tarifs->max_kg = $request->max_kg;
            $tarifs->tarif = str_replace( array( '.'), '', $request->tarif);
            $tarifs->save();
        } else {
            # code...
            $tarifs= TarifKirim::find($id);
            $tarifs->min_kg = $request->min_kg;
            $tarifs->max_kg = $request->max_kg;
            $tarifs->layanan      =$request->layanan;
            $tarifs->tarif = str_replace( array( '.'), '', $request->tarif);
            $tarifs->origin_id = $request->origin_id;
            $tarifs->save();

        }
        
      

        return redirect()->route('tarif.index')
        ->with('success','tarif updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarifKirim  $tarifKirim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tarif= TarifKirim::find($id);
        $tarif->delete();
        return redirect()->route('tarif.index')
                        ->with('success','tarif deleted successfully');
    }

    public function asal(Request $request)
    {
        $data = TarifKirim::select("asal")
                ->where("asal","LIKE","%{$request->input('qasal')}%")
                ->get();
        return response()->json($data);
    }


    public function filterbykecamatan(Request $request){
        $district = District::all();
        $data = TarifKirim::with('origin')->where('nama_kecamatan_penerima',$request->nama_kecamatan_penerima)->orWhere('layanan',$request->layanan)->get();
        return view('backand.tarif.filter',compact('data','district'));
    }
}
