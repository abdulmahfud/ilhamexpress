<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientInternationalController extends Controller
{
    //
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
    public function create()
    {
        //

        return view('backand.client.create');
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
        $user = new User;
        $user->name = $request->nama;
        $user->password  = Hash::make($request->email);
        $user->email     = $request->email;
        $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
        $user->save();
        Client::create([
            'id_user'=> $user->id,
            'nama'=> $request->nama,
            'email'=> $request->email,
            'no_hp'=> $request->no_hp,
            'kodepos'=> $request->kodepos,
            'alamat'=> $request->alamat,
            'negara'=> $request->negara,
        ]);
        return redirect()->route('client.index')
                        ->with('success','client created successfully.');
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
        return view('backand.client.edit',compact('client'));
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

        if ($request->editdata==1) {
            # code...
            $user = User::find($request->id_user);
            $user->name = $request->name;
            $user->password  = Hash::make($request->email);
            $user->email     = $request->email;
            $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
            $user->save();
            $client->id_user =$user->id;
            $client->nama =$request->name;
            $client->email =$request->email;
            $client->no_hp =$request->no_hp;
            $client->nama_kecamatan  =$district->name;
            $client->nama_kabupaten  =$regency->name;
            $client->nama_provinsi  =$province->name;
            $client->nama_desa  =$village->name;
            $client->kodepos =$request->kodepos;
            $client->alamat =$request->alamat;
            $client->save();

        } else {
            # code...
            $user = User::find($request->id_user);
            $user->name = $request->name;
            $user->password  = Hash::make($request->email);
            $user->email     = $request->email;
            $user->save();
            $client = Client::find($id);
            $client->id_user =$user->id;
            $client->nama =$request->name;
            $client->email =$request->email;
            $client->no_hp =$request->no_hp;
            $client->nama_kecamatan  =$client->nama_kecamatan;
            $client->nama_kabupaten  =$client->nama_kabupaten;
            $client->nama_provinsi  =$client->nama_provinsi;
            $client->nama_desa  =$client->nama_desa;
            $client->kodepos =$request->kodepos;
            $client->alamat =$request->alamat;
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
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('client.index')
                        ->with('success','client deleted successfully');
    }
}
