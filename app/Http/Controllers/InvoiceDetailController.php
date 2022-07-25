<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Invoice_detail;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:invoice-detail', ['only' => ['create','edit','update','destroy','index','store']]);
    //      $this->middleware('permission:invoice-detail-list|invoice-detail-create|invoice-detail-edit|invoice-detail-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:invoice-detail-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:invoice-detail-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:invoice-detail-delete', ['only' => ['destroy']]);
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
            $invdetail= Invoice_detail::create([
                 'invoices_id'  => $request->invoices_id,
                 'nama_barang'           => $request->nama_barang,
                 'deskripsi'       => $request->deskripsi,
                 'harga' => str_replace( array( '.'), '', $request->harga),
                 'qty' => $request->qty,
                 'sub_total' => str_replace( array( '.'), '', $request->harga)*$request->qty,
             
             ]);
 
             if ($invdetail->id) {
                 # code...
                 $total_bayar = Invoice_detail::where('invoices_id', $request->invoices_id)->sum('sub_total');
             }
             $invoice = Invoice::find($request->invoices_id);
             $invoice->total_bayar = $total_bayar;
             $invoice->save();
             return redirect()->route('invoice-detail.show',$invoice->id)
             ->with('success','invoice deleted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::all();
        $invoice= Invoice::with('client')->find($id);
        $invoicedetail = Invoice_detail::where('invoices_id', $id)->get();
        return view('backand.invoice.show',compact('client','invoicedetail','invoice'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $client = Client::all();
        // $invoice= Invoice::find($id);
        // $invoicedetail = Invoice_detail::where('invoices_id', $id)->get();
        // return view('backand.invoice.create',compact('client','invoicedetail','invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice_detail  $invoice_detail
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
     * @param  \App\Models\Invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoicedet= Invoice_detail::find($id);
        $invoice= Invoice::find($invoicedet->invoices_id);
        $invoice->total_bayar = $invoice->total_bayar - $invoicedet->sub_total;
        $invoice->save();
        if ($invoice) {
           $invoicedet->delete();
        }

        return redirect()->route('invoice-detail.show',$invoice->id)
                        ->with('success','invoice deleted successfully');
    }
}
