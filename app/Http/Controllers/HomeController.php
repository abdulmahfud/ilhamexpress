<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Transaksi_debit_kredit;
use App\Models\DataPengirimanPaket;
use App\Models\Pengirimanptiga;
use App\Models\PengirimanTrackingmore;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:home', ['only' => ['index','index2','index3']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $daynow = Carbon::now();
        $countdebit = Transaksi_debit_kredit::where('jenis_saldo','debit')->sum('jumlah');
        $countkredit = Transaksi_debit_kredit::where('jenis_saldo','kredit')->sum('jumlah');
        // $riwayatransaksiday = DataPengirimanPaket::all();
        // $riwayatransaksiday= DataPengirimanPaket::where('created_at','<=',$daynow)->count();
        $riwayatransaksiday = DataPengirimanPaket::whereDate('created_at', Carbon::today())->count();
        $riwayatransaksimonth= DataPengirimanPaket::orderBy('id')->count(DB::raw('MONTH(created_at)'));
        $counttransaksi = DataPengirimanPaket::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->pluck('count');
        $bulans = DataPengirimanPaket::select(\DB::raw("MONTHNAME(created_at) as bulan"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');
        
        return view('backand.home',compact('countdebit','countkredit','riwayatransaksiday','riwayatransaksimonth','daynow','counttransaksi','bulans'));
    }

    public function index2()
    {
        $daynow = Carbon::now();
        $countdebit = Transaksi_debit_kredit::where('jenis_saldo','debit')->sum('jumlah');
        $countkredit = Transaksi_debit_kredit::where('jenis_saldo','kredit')->sum('jumlah');
        // $riwayatransaksiday = DataPengirimanPaket::all();
        // $riwayatransaksiday= DataPengirimanPaket::where('created_at','<=',$daynow)->count();
        $riwayatransaksiday = Pengirimanptiga::whereDate('created_at', Carbon::today())->count();
        $riwayatransaksimonth= Pengirimanptiga::orderBy('id')->count(DB::raw('MONTH(created_at)'));
        $counttransaksi = Pengirimanptiga::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->pluck('count');
        $bulans = Pengirimanptiga::select(\DB::raw("MONTHNAME(created_at) as bulan"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');
        
        return view('backand.home',compact('countdebit','countkredit','riwayatransaksiday','riwayatransaksimonth','daynow','counttransaksi','bulans'));
    }

    public function index3()
    {
        $daynow = Carbon::now();
        $countdebit = Transaksi_debit_kredit::where('jenis_saldo','debit')->sum('jumlah');
        $countkredit = Transaksi_debit_kredit::where('jenis_saldo','kredit')->sum('jumlah');
        // $riwayatransaksiday = DataPengirimanPaket::all();
        // $riwayatransaksiday= DataPengirimanPaket::where('created_at','<=',$daynow)->count();
        $riwayatransaksiday = PengirimanTrackingmore::whereDate('created_at', Carbon::today())->count();
        $riwayatransaksimonth= PengirimanTrackingmore::orderBy('id')->count(DB::raw('MONTH(created_at)'));
        $counttransaksi = PengirimanTrackingmore::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->pluck('count');
        $bulans = PengirimanTrackingmore::select(\DB::raw("MONTHNAME(created_at) as bulan"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');
        
        return view('backand.home',compact('countdebit','countkredit','riwayatransaksiday','riwayatransaksimonth','daynow','counttransaksi','bulans'));
    }

}
