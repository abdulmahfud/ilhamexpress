<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarifInternasional;
use App\Models\courier;
use App\Models\Origin;
use App\Models\Country;
 
use Illuminate\Support\Facades\Http;
use Tracking\Api;

class TarifInternasionalController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:tarifin', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TarifInternasional::with('origin','courires','countries')->latest()->paginate(10);
        return view('backand.tarifin.index',compact('data'));
    }

    /**'
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $origin = Origin::all();
        $countries = Country::all();
          $courires = courier::all();
        return view('backand.tarifin.create',compact('origin','courires','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarifInternasionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tarifs= new TarifInternasional;
        $tarifs->courires_id = $request->courires_id;
        $tarifs->origin_id      =$request->origin_id;
        $tarifs->countries_id      =$request->countries_id;
        $tarifs->min = $request->min;
        $tarifs->max = $request->max;
        $tarifs->cost = str_replace( array( '.'), '', $request->cost);
        $tarifs->save();
    return redirect()->route('tarifin.index')
    ->with('success','tarif updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarifInternasional  $tarifInternasional
     * @return \Illuminate\Http\Response
     */
    public function show(TarifInternasional $tarifInternasional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarifInternasional  $tarifInternasional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $origin = Origin::all();
        $countries = Country::all();
        $courires = courier::all();
        $tarifin= TarifInternasional::with('origin','courires','countries')->find($id);
        return view('backand.tarifin.edit',compact('tarifin','origin','courires','countries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarifInternasionalRequest  $request
     * @param  \App\Models\TarifInternasional  $tarifInternasional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $tarifs= TarifInternasional::find($id);
        $tarifs->courires_id = $request->courires_id;
        $tarifs->origin_id      =$request->origin_id;
        $tarifs->countries_id      =$request->countries_id;
        $tarifs->min = $request->min;
        $tarifs->max = $request->max;
        $tarifs->cost = str_replace( array( '.'), '', $request->cost);
        $tarifs->save();
            return redirect()->route('tarifin.index')
            ->with('success','tarif updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarifInternasional  $tarifInternasional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarif= TarifInternasional::find($id);
        $tarif->delete();
        return redirect()->route('tarifin.index')
                        ->with('success','tarif deleted successfully');
    }

    public function getCourier(){
            $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
            $response = $api->courier();
            $get_result_arr = json_decode($response, true);
            foreach ($get_result_arr['data'] as $list) {
                    courier::create([
                        'courier_name' => $list['courier_name'],
                        'courier_code' => $list['courier_code'],
                        'courier_type' => $list['courier_type'],
                        'country_code' => $list['country_code'],
              ]);
            }
        }  
}
