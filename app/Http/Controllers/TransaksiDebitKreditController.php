<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_debit_kredit;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Carbon\Carbon;
use DB;

class TransaksiDebitKreditController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:debitkredit', ['only' => ['create','edit','update','destroy','index','store']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $sort = $request->get('sort');
        $order = array("oldest" => "ASC", "newest" => "DESC");

        $debitkredits = Transaksi_debit_kredit::orderBy('created_at', array_key_exists($sort,$order) ? $order[$sort] : $order['newest']);
        if(!empty($search)){
            $debitkredits = $debitkredits->where('keterangan', 'like', '%' . $search . '%');
        }

        // $debitkredits = $debitkredits->with('user')->with('jenis_akun')->get();
        $debitkredits = $debitkredits->with('user')->get();

        $countdebit = Transaksi_debit_kredit::where('jenis_saldo','debit')->sum('jumlah');
        $countkredit = Transaksi_debit_kredit::where('jenis_saldo','kredit')->sum('jumlah');

        return view('debitkredit.index',compact('debitkredits','countdebit','countkredit'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["users"] = User::all();
        return view('debitkredit.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'jenis_saldo' => 'required',
            'tgl_input' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        // validate jenis produk
        $user = User::find($request->user);
        if(!$user){
            return back()->with('error', 'user dengan id '. $request->user.' tidak ditemukan ');
        }
        $debitkredit = new Transaksi_debit_kredit;
        $debitkredit->id_user = $request->user;
        $debitkredit->jenis_saldo = $request->jenis_saldo;
        $debitkredit->tgl_input = $request->tgl_input;
        $debitkredit->jumlah = str_replace( array( '.'), '', $request->jumlah);
        $debitkredit->keterangan = $request->keterangan;
        $debitkredit->save();

        return redirect()->route('debitkredit.index')
            ->with('success', 'Debit Kredit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_debit_kredit  $transaksi_debit_kredit
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_debit_kredit $transaksi_debit_kredit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_debit_kredit  $transaksi_debit_kredit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["users"] = User::all();
        $data["debitkredit"] = Transaksi_debit_kredit::find($id);
        return view('debitkredit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_debit_kredit  $transaksi_debit_kredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user' => 'required',
            'jenis_saldo' => 'required',
            'tgl_input' => 'required',
            'keterangan' => 'required',
        ]);

        $input = $request->all();
        $debitkredit = Transaksi_debit_kredit::find($id);
        $input["id_user"] = $request->user;
        $input["jumlah"] = str_replace( array( '.'), '', $request->jumlah);
        $debitkredit->update($input);
        return redirect()->route('debitkredit.index')
        ->with('success','Debit Kredit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_debit_kredit  $transaksi_debit_kredit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $debitkredit = Transaksi_debit_kredit::find($id);
        $debitkredit->delete();
        return back()->with('success', 'Success Delete Debit Kredit:' . $debitkredit->keterangan);
    }
    
    public function reportpdfharian(Request $request){
        $now= Carbon::today();
        $debitkredit = Transaksi_debit_kredit::whereDate('tgl_input','>=',$now)->get();
        $total = Transaksi_debit_kredit::whereDate('tgl_input','>=',$now)->sum('jumlah');
        return view('debitkredit.exportpdf', [
            "debitkredit"=> $debitkredit,
            "total"=> $total,
            "month"=> $now, 
        ]);
    }
    public function reportpdfbulanan(Request $request){
        $debitkredit = DB::table('transaksi_debit_kredits');

        if($request->has('month')){
            $year = Carbon::createFromFormat('Y-m', $request->month)->year;
            $month = Carbon::createFromFormat('Y-m', $request->month)->month;
            $debitkredit = $debitkredit->whereYear('tgl_input', '=', $year)->whereMonth('tgl_input', '=', $month);
            $total = $debitkredit->whereYear('tgl_input', '=', $year)->whereMonth('tgl_input', '=', $month)->sum('jumlah');
        }

        $debitkredit = $debitkredit->select(DB::raw("*"))->get();
        return view('debitkredit.exportpdf', ["debitkredit"=> $debitkredit, "month"=> $month,   "total"=> $total]);
    }
}
