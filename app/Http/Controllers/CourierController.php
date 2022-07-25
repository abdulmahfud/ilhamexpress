<?php

namespace App\Http\Controllers;

use App\Models\courier;
use Illuminate\Http\Request;
use Tracking\Api;
class CourierController extends Controller
{ 
    function __construct()
    {
        //  $this->middleware('permission:tarif-list|tarif-create|tarif-edit|tarif-delete', ['only' => ['index','show']]);
         $this->middleware('permission:courier', ['only' => ['create','edit','update','destroy','index','store']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // courier::truncate();
        // $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
        // $response = $api->courier();
        // $get_result_arr = json_decode($response, true);
        // foreach ($get_result_arr['data'] as $list) {
        //         courier::create([
        //             'courier_name' => $list['courier_name'],
        //             'courier_code' => $list['courier_code'],
        //             'courier_type' => $list['courier_type'],
        //             'country_code' => $list['country_code'],
        //         ]);
        // }
        // $data = courier::latest()->limit(100);
        // return view('backand.courier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backand.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecourierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $invdetail= courier::create([
            'name'           => $request->name,
            'code'           => $request->code,
            'country'           => $request->country,
        ]);
        return redirect()->route('courier.index')
        ->with('success','courier save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courier= courier::find($id);
        return view('backand.courier.edit',compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecourierRequest  $request
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $courier = courier::find($id);
        $courier->name = $request->name;
        $courier->code = $request->code;
        $courier->country = $request->country;
        $courier->save();
        return redirect()->route('courier.index')
        ->with('success','courier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $courier= courier::find($id);
        $courier->delete();
        return redirect()->route('courier.index')
                        ->with('success','courier deleted successfully');
    }
}
