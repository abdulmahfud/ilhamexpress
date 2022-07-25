<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Hash;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:client', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Client::latest()->paginate(10);
        return view('backand.client.index',compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();
        return view('backand.client.create',compact('countries'));
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

       

        if (Client::where('email', $request->email)->count() >0 ) {
            return redirect()->back()->with('success','Data Sudah ada');
        } else {
        $province = Province::where('id', $request->nama_provinsi)->first();
        $regency = Regency::where('id', $request->nama_kabupaten)->first();
        $district = District::where('id', $request->nama_kecamatan)->first();
        $village = Village::where('id', $request->nama_desa)->first();
        // $user = new User;
        // $user->name = $request->nama;
        // $user->password  = Hash::make($request->email);
        // $user->email     = $request->email;
        // $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
        // $user->save();
        Client::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'no_hp'=> $request->no_hp,
            'nama_kecamatan' => $district->name,
            'nama_kabupaten' => $regency->name,
            'nama_provinsi' => $province->name,
            'nama_desa' => $village->name,
            'kodepos'=> $request->kodepos,
            'alamat'=> $request->alamat,
            'countries_id'=> $request->countries_id,
        ]);
        return redirect()->route('client.index')
                        ->with('success','client created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client= Client::find($id);
        $countries = Country::all();

        return view('backand.client.edit',compact('client','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $province = Province::where('id', $request->nama_provinsi)->first();
        $regency = Regency::where('id', $request->nama_kabupaten)->first();
        $district = District::where('id', $request->nama_kecamatan)->first();
        $village = Village::where('id', $request->nama_desa)->first();

        $client->nama =$request->name;
        $client->email =$request->email;
        $client->no_hp =$request->no_hp;
        $client->alamat =$request->alamat;
        $client->kodepos =$request->kodepos;

        if ($request->editdata==1) {
            # code...
            // $user = User::find($request->id_user);
            // $user->name = $request->name;
            // $user->password  = Hash::make($request->email);
            // $user->email     = $request->email;
            // $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
            // $user->save();
            // $client->id_user =$user->id;
            $client->nama_kecamatan  =$district->name;
            $client->nama_kabupaten  =$regency->name;
            $client->nama_provinsi  =$province->name;
            $client->nama_desa  =$village->name;
            $client->countries_id =$request->countries_id;
            $client->save();

        } else {

            $client->save();

        }
        
        return redirect()->route('client.index')
                        ->with('success','client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client= Client::find($id);
        $client->delete();
        return redirect()->route('client.index')
                        ->with('success','client deleted successfully');
    }
}
