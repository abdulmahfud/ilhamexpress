<?php

namespace App\Http\Controllers;

use App\Models\Gajikaryawan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bonus;
use PDF;
use Carbon\Carbon;
use DB;
class GajikaryawanController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:gajikaryawan', ['only' => ['create','edit','update','destroy','index','store','index','show','cetakpdf', 'reportpdf']]);

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

        $gajikaryawan = Gajikaryawan::orderBy('created_at', array_key_exists($sort,$order) ? $order[$sort] : $order['newest'])
                    ->where('deleted_at',null);
        if(!empty($search)){
            $gajikaryawan = $gajikaryawan->where('nama_karyawan', 'like', '%' . $search . '%');
        }

        $gajikaryawan = $gajikaryawan->with('user')->get();

        return view('gajikaryawan.index',compact('gajikaryawan'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $users = User::all();
   
        return view('gajikaryawan.create', compact('users'));
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
            'tgl_gaji' => 'required',
            'user' => 'required',
            'gaji_pokok' => 'required',
            // 'potongan' => 'required',
        ],[
            'tgl_gaji.required' => 'tgl_gaji is required',
            'gaji_pokok.required' => 'gaji_pokok is required',
            'potongan' => ' potongan is required'
        ]); 
        // validate jenis produk
        $user = User::find($request->user);
        if(!$user){
            return back()->with('error', 'user dengan id '. $request->user.' tidak ditemukan ');
        }

        if($request->potongan > $request->gaji_pokok){

            return back()->with('error', 'Potongan tidak boleh lebih besar dari gaji Pokok ');
        }


        $gajikaryawan = new Gajikaryawan;
        $gajikaryawan->tgl_gaji = $request->tgl_gaji;
        $gajikaryawan->nama_karyawan = $user->name;
        $gajikaryawan->id_user = $request->user;
        $gajikaryawan->gaji_pokok = str_replace( array( '.'), '',$request->gaji_pokok);
        $now = Carbon::now();
        $year = Carbon::createFromFormat('Y', $now->year)->year;
        $month = Carbon::createFromFormat('m', $now->month)->month;
        $cbonusmount = Bonus::whereYear('tgl', '=', $year)->whereMonth('tgl', '=', $month)->sum('jumlah');
        // dd($cbonusmount);
        $gajikaryawan->bonus = 0;
        $gajikaryawan->potongan = 0;
        $gajikaryawan->total_gaji = str_replace( array( '.'), '',$request->gaji_pokok);
        $gajikaryawan->save();
        return redirect()->route('gajikaryawan.index')
            ->with('success', 'GajiKaryawan created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gajikaryawan  $gajikaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Gajikaryawan $gajikaryawan)
    {
        $gajikaryawan = Gajikaryawan::find($id);
        return view('gajikaryawan.show',compact('gajikaryawan'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk_properti  $produk_properti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["gajikaryawan"] = Gajikaryawan::find($id);
        $data["users"] = User::all();
        return view('gajikaryawan.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gajikaryawan  $gajikaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'tgl_gaji' => 'required',
            'gaji_pokok' => 'required',
            'potongan' => 'required',
        ],[
            'tgl_gaji.required' => 'tgl_gaji is required',
            'gaji_pokok.required' => 'gaji_pokok is required',
            'potongan' => ' potongan is required'
        ]); 

        $input = $request->all();
        $now = Carbon::now();
        $year = Carbon::createFromFormat('Y', $now->year)->year;
        $month = Carbon::createFromFormat('m', $now->month)->month;
        $cbonusmount = Bonus::whereYear('tgl', '=', $year)->whereMonth('tgl', '=', $month)->sum('jumlah');
        // dd($cbonusmount);
        $gaji_pokok= str_replace( array( '.'), '',$request->gaji_pokok);
        $input["total_gaji"] = $gaji_pokok + $cbonusmount - $request->potongan;
        $input["bonus"] = $gaji_pokok + $cbonusmount - $request->potongan;
        $gajikaryawan = Gajikaryawan::find($id);
        $gajikaryawan->update($input);

        return redirect()->route('gajikaryawan.index')
                        ->with('success','Gaji Karyawan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gajikaryawan  $gajikaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gajikaryawan = Gajikaryawan::find($id);
        $gajikaryawan->deleted_at = now();
        $gajikaryawan->update();
        return back()->with('success', 'Success Delete Gaji Karyawan.');
    }

    public function cetakpdf(){
        $user = User::all();
        $current = Carbon::now();
        return view('gajikaryawan.cetakpdf', ['users'=> $user]);
    }

    public function reportpdf(Request $request){
        $gajikaryawan = DB::table('gajikaryawans')->where('deleted_at',null);

        if($request->has('month')){
            $year = Carbon::createFromFormat('Y-m', $request->month)->year;
            $month = Carbon::createFromFormat('Y-m', $request->month)->month;
            $gajikaryawan = $gajikaryawan->whereYear('tgl_gaji', '=', $year)->whereMonth('tgl_gaji', '=', $month);
        }
        if($request->has('user')){
            $gajikaryawan = $gajikaryawan->where('id_user', $request->user);
        }
        $gajikaryawan = $gajikaryawan->select(DB::raw("*"))->get();
        return view('gajikaryawan.exportpdf', ["gajikaryawan"=> $gajikaryawan, "month"=> $month,]);
    }
}
