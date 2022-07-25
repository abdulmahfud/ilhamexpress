<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Manifest;
use App\Models\ManifestDetail;
use Illuminate\Http\Request;
use Validator;
class ManifestController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:manifest', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Manifest::latest()->paginate(100);
        return view('backand.manifest.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $manifest = new Manifest();
        $lastmanifestID = $manifest->orderBy('id', 'DESC')->pluck('id')->first();
        $nomor_manifest = $lastmanifestID + 1;
        $user = Karyawan::all();
        return view('backand.manifest.create',compact('nomor_manifest','user'));
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
        $request->validate([
            'nomor_manifest'=>'required',
            'nama_driver' => 'required',
            'no_hp' => 'required',
            'tujuan' => 'required',
            'tgl_kirim' => 'required',
        ],[
            'nomor_manifest.required' => 'nomor_manifest is required',
            'nama_driver.required' => 'nama_driver is required',
            'no_hp' => ' no_hp is required',
            'tujuan' => 'tujuan is required',
            'tgl_kirim' => ' tgl_kirim is required',
        ]);

       
        

        Manifest::create([
            'nomor_manifest'  => $request->nomor_manifest,
            'nama_driver'           => $request->nama_driver,
            'no_hp'       => $request->no_hp,
            'tujuan' => $request->tujuan,
            'tgl_kirim'       => $request->tgl_kirim,
            'status'    => 0,
        ]);
        return redirect()->route('manifest.index')
                        ->with('success','manifest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::all();
        $manifest= manifest::find($id);
        $manifestdetail = ManifestDetail::where('manifests_id', $id)->get();
        return view('backand.manifest.show',compact('client','manifestdetail','manifest'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $manifest= manifest::find($id);
        return view('backand.manifest.edit',compact('manifest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manifest $manifest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $manifest= Manifest::find($id);
        $manifest->delete();
        return redirect()->route('manifest.index')
                        ->with('success','manifest deleted successfully');
    }

    public function print ($id){
        $manifest= Manifest::find($id);
        $manifestdetail= ManifestDetail::with('datapengiriman')->where('manifests_id','=',$id)->get();
        return view('backand.manifest.print',compact('manifest','manifestdetail'));

    }
}
