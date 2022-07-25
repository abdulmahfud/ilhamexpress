<?php

namespace App\Http\Controllers;

use App\Models\ManifestDetail;
use App\Models\Manifest;
use Illuminate\Http\Request;
use App\Models\DataPengirimanPaket;

class ManifestDetailController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if (ManifestDetail::where('id_datapengiriman', '=', $request->id_datapengiriman)
        ->where('manifests_id','=',$request->manifests_id)->count() > 0) {
            # code...
            return redirect()->route('manifest-detail.show',$request->manifests_id)
        ->with('success','RESI Sudah ditambahakan');
        } else {
            # code...
            $manifestdetail= ManifestDetail::create([
                'manifests_id'  => $request->manifests_id,
                'id_datapengiriman' => $request->id_datapengiriman,
                'status'       => 0
            ]);
            return redirect()->route('manifest-detail.show',$request->manifests_id)
            ->with('success','tambah manifest-detail successfully');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManifestDetail  $manifestDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datapaket = DataPengirimanPaket::all();
        $manifest= Manifest::find($id);
        $manifestdetail= ManifestDetail::with('datapengiriman')->where('manifests_id','=',$id)->get();
        // dd($manifestdetail);
        return view('backand.manifest.show',compact('manifestdetail','manifest','datapaket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManifestDetail  $manifestDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ManifestDetail $manifestDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManifestDetail  $manifestDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $potongan =str_replace( array( '.'), '', $request->potongan);
        $invoice= Invoice::with('client')->find($id);
        $total_bayar = $invoice->total_bayar -$potongan  ;
        $invoice->potongan =  str_replace( array( '.'), '', $request->potongan);
        $invoice->keterangan = $request->keterangan ?? '-';
        $invoice->total_bayar = $total_bayar;
        $invoice->save();
        return redirect()->route('invoice-detail.show',$invoice->id)
        ->with('success','invoice update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManifestDetail  $manifestDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $invoicedet= ManifestDetail::find($id);
        $invoicedet->delete();
        return redirect()->back()
        ->with('success','Hapus manifest-detail successfully');
    }
}
