<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifptiga;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Origin;
use Steevenz\Rajaongkir;

class TarifptigaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tarif-rajao', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Tarifptiga::with('origin')->latest()->paginate(10);
        return view('backand.tarifptiga.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $origin = Origin::all();
        $provinces = Provinsi::pluck('name', 'province_id');
        return view('backand.tarifptiga.create',compact('provinces','origin'));
    }
    public function getCities($id)
    {
        $city = Kota::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    

    public function check_ongkir(Request $request)
    {


        // return response()->json($cost);
        $rajaongkir = new Rajaongkir('4e29beb973c2eb2a53f7f3635801fb79', Rajaongkir::ACCOUNT_PRO);
        // inisiasi dengan config array
        $config['api_key'] = '4e29beb973c2eb2a53f7f3635801fb79';
        $config['account_type'] = 'pro';
        $rajaongkir = new Rajaongkir($config);
        /*
        * --------------------------------------------------------------
        * Mendapatkan list seluruh propinsi
        * --------------------------------------------------------------
        */
        // $cost = $rajaongkir->getCost(['city' => 501], ['subdistrict' => 574], 1000, 'jne');
        // $cost = $rajaongkir->getCost(['city' => 501], ['subdistrict' => 574],
        //              [
        //                  'weight' => 1000,
        //                  'length' => 50,
        //                  'width'  => 50,
        //                  'height' => 50,
        //              ], 'jne');
        $cost = $rajaongkir->getCost(['city' => $request->city_origin], ['city' => $request->city_destination], $request->weight, $request->courier);
        return response()->json($cost);
        // var_dump($cost);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarifptigaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        //
        // 'origin_id', '','','','','cost'
        $ccity_origin = Kota::where('city_id', $request->city_origin)->first();
        $ccity_destination = Kota::where('city_id', $request->city_destination)->first();

        $tarifs= new Tarifptiga;
        $tarifs->origin_id = $request->origin_id ;
        $tarifs->city_origin      =$ccity_origin->name;
        $tarifs->city_destination      =$ccity_destination->name;
        $tarifs->courier      = $request->courier;
        $tarifs->weight = $request->weight;
        $tarifs->cost = str_replace( array( '.'), '', $request->cost);
        $tarifs->save();
        return redirect()->route('tarif-rajao.index')
        ->with('success','tarif-rajao updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarifptiga  $tarifptiga
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifptiga $tarifptiga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarifptiga  $tarifptiga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinces = Provinsi::pluck('name', 'province_id');
        $origin = Origin::all();
        $tarif= Tarifptiga::with('origin')->find($id);
        return view('backand.tarifptiga.edit',compact('provinces','tarif','origin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarifptigaRequest  $request
     * @param  \App\Models\Tarifptiga  $tarifptiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'city_origin'=>'required',
            'city_destination' => 'required',
            'courier' => 'required',
            
        ],[
            'city_origin.required' => 'city_origin is required',
            'city_destination.required' => 'city_destination is required',
            'courier' => ' courier is required',
           
        ]);
        $ccity_origin = Kota::where('city_id', $request->city_origin)->first();
        $ccity_destination = Kota::where('city_id', $request->city_destination)->first();

            $tarifs= Tarifptiga::find($id);
            $tarifs->origin_id = $request->origin_id ;
            $tarifs->city_origin      =$ccity_origin->name;
            $tarifs->city_destination      =$ccity_destination->name;
            $tarifs->courier      = $request->courier;
            $tarifs->weight = $request->weight;
            $tarifs->cost = str_replace( array( '.'), '', $request->cost);
            $tarifs->save();
            return redirect()->route('tarif-rajao.index')
            ->with('success','tarif-rajao updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarifptiga  $tarifptiga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tarif= Tarifptiga::find($id);
        $tarif->delete();
        return redirect()->route('tarif-rajao.index')
                        ->with('success','tarif deleted successfully');
    }
    
}
