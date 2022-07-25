<?php

namespace App\Http\Controllers;

 
use App\Models\Pengirimanptiga;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Origin;
use App\Models\Provinsi;
use Carbon\Carbon;

class PengirimanptigaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pengiriman-rajao-list|pengiriman-rajao-create|pengiriman-rajao-edit|pengiriman-rajao-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pengiriman-rajao-create', ['only' => ['create','store']]);
         $this->middleware('permission:pengiriman-rajao-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pengiriman-rajao-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengirim = Client::all();
        $origin = Origin::all();
        $provinces = Provinsi::pluck('name', 'province_id');

        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            // dd($start_date);
            $records = Pengirimanptiga::with('penerima','pengirim')->whereBetween('created_at',[$start_date,$end_date])->get();
            return view('backand.pengirimanraja.filter', compact('pengirim','origin','records','provinces'));

        } else {
            $records = Pengirimanptiga::with('penerima','pengirim')->latest()->paginate(100);
            return view('backand.pengirimanraja.index', compact('pengirim','origin','records','provinces'));
        }

    }
    public function filter()
    {
        //
        $pengirim = Client::all();
        $origin = Origin::all();
        $provinces = Provinsi::pluck('name', 'province_id');

        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            // dd($start_date);
            $records = Pengirimanptiga::with('penerima','pengirim')->whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $records = Pengirimanptiga::with('penerima','pengirim')->latest()->paginate(100);
        }
        return view('backand.pengirimanraja.filter', compact('pengirim','origin','records','provinces'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengirimanptigaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataPengiriman = Pengirimanptiga::where('nomor_resi', $request->resi)->first();
        if($dataPengiriman != null){
            return back()->with('error', 'data pengiriman dengan resi '. $request->resi.' already exists ');
        }else{
             $tarifs= str_replace( array( '.'), '', $request->cost);
            $total_biaya = $tarifs*$request->jumlah;
            Pengirimanptiga::create([
                'tgl_kirim'  => now()->toDateTimeString(),
                'origin_id'  => $request->origin_id,
                'pengirim_id'  => $request->pengirim_id,
                'penerima_id'  => $request->penerima_id,
                'nomor_resi'  => $request->resi,
                'panjang'  => $request->dimensi_panjang,
                'lebar'  => $request->dimensi_lebar,
                'tinggi'  => $request->dimensi_tinggi,
                'weight'  => $request->weight,
                'jumlah'  => $request->jumlah,
                'total_biaya'  => $total_biaya,
                'keterangan'  => $request->keterangan,
                'courier'  => $request->courier,
                'status'  => "CREATED",
            ]);
            return redirect()->route('pengiriman-rajao.index')
            ->with('success','pengiriman-rajao   successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengirimanptiga  $pengirimanptiga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo= Pengirimanptiga::find($id);
        return view('backand.pengirimanraja.print',compact('cargo'));
    }

    public function print ($id){
        $cargo= Pengirimanptiga::find($id);
        return view('backand.pengirimanraja.printpdf',compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengirimanptiga  $pengirimanptiga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinces = Provinsi::pluck('name', 'province_id');
        $origin = Origin::all();
        $data= Pengirimanptiga::with('penerima','pengirim','origin')->find($id);
        return view('backand.pengirimanraja.edit',compact('data','origin','provinces'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengirimanptigaRequest  $request
     * @param  \App\Models\Pengirimanptiga  $pengirimanptiga
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,  $id)
    {
        //
        $tarifs= str_replace( array( '.'), '', $request->cost);

        $total_biaya = $tarifs*$request->jumlah;
        $datapengiriman= Pengirimanptiga::find($id);
        $datapengiriman->origin_id = $request->origin_id;
        $datapengiriman->pengirim_id      =$request->pengirim_id;
        $datapengiriman->penerima_id      =$request->penerima_id;
        $datapengiriman->panjang      =$request->panjang;
        $datapengiriman->lebar      =$request->lebar;
        $datapengiriman->tinggi      =$request->tinggi;
        $datapengiriman->weight      =$request->weight;
        $datapengiriman->jumlah      =$request->jumlah;
        $datapengiriman->keterangan      =$request->keterangan;
        $datapengiriman->total_biaya      =$total_biaya;
        $datapengiriman->courier      =$request->courier;
        $datapengiriman->status      ='DATA DIUPDATE';
        $datapengiriman->save();
        return redirect()->route('pengiriman-rajao.index')
        ->with('success','pengiriman-rajao Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengirimanptiga  $pengirimanptiga
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $records = Pengirimanptiga::find($id);
        $records->delete();
        return redirect()->route('pengiriman-rajao.index')
        ->with('success','pengiriman-rajao delete successfully');
    }

    public function getClient(){
        $city = Client::pluck('nama', 'id');
        return response()->json($city);
    }
    public function getClientbyid($id){
        $city = Client::with('country')->where('id',$id)->get();
        foreach ($city as $key => $value) {
            # code...
            
            $data['nama'] = $value->nama;
            $data['no_hp'] = $value->no_hp;
            $data['email'] = $value->email;
            $data['kodepos'] = $value->kodepos;
            $data['alamat'] = $value->alamat;
            $data['negara'] = $value->country->country_name;
            $data['nama_kabupaten'] = $value->nama_kabupaten;
            $data['nama_provinsi'] = $value->nama_provinsi;

        }
        return response()->json($data);
    }
}
