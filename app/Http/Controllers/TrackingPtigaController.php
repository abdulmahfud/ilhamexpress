<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackingPtiga;
use App\Models\Pengirimanptiga;

class TrackingPtigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = TrackingPtiga::with('pengirimanptiga')
        ->orderBy("no_resi")
        ->paginate(50);
        $pengirimanptiga = Pengirimanptiga::all();
        return view('backand.pengirimanraja.updateposisi',compact('records','pengirimanptiga'));
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
    public function getResi(Request $request)
    {
        $tags = PengirimanptigaController::where('nomor_resi','LIKE','%'.$term.'%')
        ->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackingPtigaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataPengiriman = Pengirimanptiga::where('nomor_resi', $request->nomor_resi)->first();
        $records= new TrackingPtiga;
        $records->pengirimanptigas_id = $dataPengiriman->id;
        $records->no_resi      =$request->nomor_resi;
        $records->keterangan      =$request->keterangan;
        $records->status_pengiriman = $request->status_pengiriman;
        $records->save();
    return redirect()->route('pengiriman-rajao-tracking.index')
    ->with('success','pengiriman-tracking successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackingPtiga  $trackingPtiga
     * @return \Illuminate\Http\Response
     */
    public function show(TrackingPtiga $trackingPtiga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackingPtiga  $trackingPtiga
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackingPtiga $trackingPtiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackingPtigaRequest  $request
     * @param  \App\Models\TrackingPtiga  $trackingPtiga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackingPtigaRequest $request, TrackingPtiga $trackingPtiga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackingPtiga  $trackingPtiga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $datas= TrackingPtiga::find($id);
        $datas->delete();
        return redirect()->route('pengiriman-rajao-tracking.index')
                        ->with('success','pengiriman-rajao-tracking deleted successfully');
    }
}
