<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Auth;
class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:invoice', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $current = Carbon::now();
        $data = Invoice::with('client')->latest()->paginate(10);
        $clients = Client::all();
        return view('backand.invoice.index',compact('data','current','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
          //
          $this->validate($request, [
            'id_user_admin'=>'required',
            'date' => 'required',
            'due_date' => 'required',
            'id_client' => 'required'
           
        ]);

        Invoice::create([
            'id_user_admin'  => $request->id_user_admin,
            'date'           => $request->date,
            'due_date'       => $request->due_date,
            'id_user' => $request->id_client,
            'potongan'       => '0',
            'total_bayar'    => '0',
            'keterangan'     => '0'
        ]);


        return redirect()->route('invoice.index')
                        ->with('success','invoice created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::all();
        $invoice= Invoice::find($id);
        $invoicedetail = Invoice_detail::where('invoices_id', $id)->get();
        return view('backand.invoice.show',compact('client','invoicedetail','invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $invoice= invoice::find($id);
        return view('backand.invoice.edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
            
        
    }

    public function print ($id){
        $invoice= Invoice::with('client')->find($id);
        $invoicedetail = Invoice_detail::where('invoices_id', $id)->get();
        return view('backand.invoice.print',compact('invoice','invoicedetail'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoice= Invoice::find($id);
        $invoice->delete();
        return redirect()->route('invoice.index')
                        ->with('success','invoice deleted successfully');
    }
}
