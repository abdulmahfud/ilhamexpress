<?php

namespace App\Http\Controllers;

 
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:country', ['only' => ['create','edit','update','destroy','index','store']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Country::latest()->paginate(10);
        return view('backand.country.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backand.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $invdetail= Country::create([
            'country_name'           => $request->country_name,
            'country_code'           => $request->country_code,
        ]);
        return redirect()->route('country.index')
        ->with('success','country save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $country= Country::find($id);
        return view('backand.country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $country= Country::find($id);
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();
        return redirect()->route('country.index')
        ->with('success','country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $country= Country::find($id);
        $country->delete();
        return redirect()->route('country.index')
                        ->with('success','country deleted successfully');
    }
}
