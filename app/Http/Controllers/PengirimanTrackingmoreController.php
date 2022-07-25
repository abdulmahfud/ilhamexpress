<?php

namespace App\Http\Controllers;

 
use App\Models\PengirimanTrackingmore;
use App\Models\Client;
use App\Models\Origin;
use App\Models\TarifInternasional;
use App\Models\courier;
use App\Models\Country;
use App\Models\User;
use App\Models\Typepaket;
use Hash;

use Tracking\Api;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengirimanTrackingmoreController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pengiriman-trakingmore-list|pengiriman-trakingmore-create|pengiriman-trakingmore-edit|pengiriman-trakingmore-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pengiriman-trakingmore-create', ['only' => ['create','store']]);
         $this->middleware('permission:pengiriman-trakingmore-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pengiriman-trakingmore-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        // ey1h9t5e-jwh7-q911-ricx-rqfijos19z27   //
        $pengirim = Client::all();
        $origin = Origin::all();
        $countries = Country::all();
        $courires = courier::all();
        $typepaket = Typepaket::all();
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            // dd($start_date);
            $records = PengirimanTrackingmore::with('penerima','pengirim','country','courier','typepaket')->whereBetween('created_at',[$start_date,$end_date])->latest()->paginate(10);
        } else {
            $records = PengirimanTrackingmore::with('penerima','pengirim','country','courier','typepaket')->latest()->paginate(10);
        }
        return view('backand.trackingmore.index', compact('pengirim','origin','records','countries','courires','typepaket'));
    }

    public function filter()
    {
        // ey1h9t5e-jwh7-q911-ricx-rqfijos19z27   //
        $pengirim = Client::all();
        $origin = Origin::all();
        $countries = Country::all();
        $courires = courier::all();
        $typepaket = Typepaket::all();
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            // dd($start_date);
            $records = PengirimanTrackingmore::with('penerima','pengirim')->whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $records = PengirimanTrackingmore::with('penerima','pengirim')->latest()->get();
        }
        return view('backand.trackingmore.filter', compact('pengirim','origin','records','countries','courires','typepaket'));
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
     * @param  \App\Http\Requests\StorePengirimanTrackingmoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek idpengirim
            if ($request->pengirim_id==null) {
                if ($request->nama_pengirim) {
                    $ceknama = Client::where('nama',$request->nama_pengirim)->first();
                        if ($ceknama != null) {
                            # code...
                            return back()->with('error', 'data ini'. $request->nama_pengirim.'Sudah ada');
                        } else {
                            # code...
                            $user = new User;
                            $user->name = $request->nama_pengirim;
                            $user->password  = Hash::make($request->email_pengirim);
                            $user->email     = $request->email_pengirim;
                            $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
                            $user->save();
                            $pengirim= Client::create([
                                'id_user'=> $user->id,
                                'nama'=> $request->nama_pengirim,
                                'email'=> $request->email_pengirim,
                                'no_hp'=> $request->no_hp_pengirim,
                                'countries_id'  => 1,
                            ]);
                        $pengirim_id= $pengirim->id;
                        }
                    } else {
                        # code...
                       return back()->with('error', 'Silahkan data dicek Kembali 1');
                    }
            } else {
                $pengirim_id= $request->pengirim_id;
            }
            
         //cek penerimaid
            if ($request->penerima_id==null) {
                if ($request->nama_penerima) {
                    # code...
                    $ceknama2 = Client::where('nama',$request->nama_penerima)->first();
                        if ($ceknama2 != null) {
                            return back()->with('error', 'data ini'. $request->nama_penerima.'Sudah ada');
                        } else {
                      
                        $user = new User;
                        $user->name = $request->nama_penerima;
                        $user->password  = Hash::make($request->nama_penerima);
                        $user->email     = $request->email_penerima;
                        $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
                        $user->save();
                        $penerima = Client::create([
                            'id_user'=> $user->id,
                            'nama'=> $request->nama_penerima,
                            'email'=> $request->email_penerima,
                            'no_hp'=> $request->no_hp_penerima,
                            'kodepos'=> $request->kodepos_penerima,
                            'alamat'=> $request->alamat_penerima,
                            'countries_id'  => $request->countries_id,

                        ]);
                       $penerima_id= $penerima->id;
                        }
                } else {
                    return back()->with('error', 'Silahkan data dicek Kembali 2');
                }
                
                
            } else {
                # code...
                $penerima_id= $request->penerima_id;
            }

            if ($pengirim_id && $penerima_id == null) {

                # code...
             return back()->with('error', 'Silahkan data dicek Kembali ID pengirim dan penerima tidak ada');
            } else {
                # code...
                $getcountry = Client::find($penerima_id);
                $cektarif = TarifInternasional::query()
                    ->where('courires_id',$request->courires_id)
                    ->where('origin_id', 'LIKE', "%{$request->origin_id}%")
                    ->where('countries_id', 'LIKE', "%{$getcountry->countries_id}%")
                    ->orWhere('min', 'LIKE', "%{$request->berat}%")
                    ->orWhere('max', 'LIKE', "%{$request->berat}%")
                    ->first();
                    if ($cektarif==null) {
                        return redirect()->back()->with('error', 'Tarif tidak ada');
                    } else {
                        $getcodeCountry = Country::find($getcountry->countries_id);
                        $total_biaya = $cektarif->cost*$request->jumlah;
                        $lastInvoiceID =PengirimanTrackingmore::orderBy('id', 'desc')->pluck('id')->first();
                         $ndate = str_replace( array( '-'), '', Carbon::now()->toDateString());
                           $tracking_number = $ndate.''.($lastInvoiceID + 1) .$getcodeCountry->country_code;
                           $order_number = $ndate.''.($lastInvoiceID + 1);
                       $recordslocal= PengirimanTrackingmore::create([
                            'tgl_kirim'  => $request->txDate,
                            'origin_id'  => $request->origin_id,
                            'pengirim_id'  => $pengirim_id,
                            'penerima_id'  => $penerima_id,
                            'courires_id'  => $request->courires_id,
                            'countries_id'  => $getcountry->countries_id,
                            'typepaket_id'  => $request->typepaket_id,
                            'tracking_number'  => $tracking_number,
                            'order_number'  => $order_number,
                            'logistics_channel'  => $request->logistics_channel,
                            'keterangan'  => $request->keterangan,
                            'panjang'  => $request->dimensi_panjang,
                           'lebar'  => $request->dimensi_lebar,
                           'tinggi'  => $request->dimensi_tinggi,
                            'jumlah'  => $request->jumlah,
                            'berat'  => $request->berat,
                            'total_biaya'  => $total_biaya,
                            'status'  => 'CREATED',
                        ]);
                  
                       $getcountry = Client::find($penerima_id);
                        $getcourier = courier::find($request->courires_id);
                        if ($recordslocal) {
                           $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
                            $data = [
                                "tracking_number"=>$tracking_number,
                                "courier_code"=>$getcourier->courier_name,
                                "order_number"=>$order_number,
                               "destination_code"=> $getcodeCountry->country_code,
                               "logistics_channel"=> $request->logistics_channel,
                               "customer_name"=> $getcountry->nama,
                                "customer_email"=>$getcountry->email,
                                "customer_phone"=>"+1123456789",
                                "note"=>"check",
                                "title"=>"title",
                                "lang"=>"en"
                            ];
                           $response = $api->create($data);
                        //    dd($response);
                           if ($response) {
                               # code...
                               $status = json_decode($response);
                                $message = $status->message;
                               return redirect()->route('pengiriman-trakingmore.index')
                               ->with('success',$message);
                           } else {
                              return back()->with('error', 'Silahkan data dicek API galat');
                           }

                        } else {
                            # code...
                            return back()->with('error', 'Silahkan data dicek API galat');
                        }
                        
                    }
                }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengirimanTrackingmore  $pengirimanTrackingmore
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cargo= PengirimanTrackingmore::find($id);
        return view('backand.trackingmore.print',compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengirimanTrackingmore  $pengirimanTrackingmore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengirim = Client::all();
        $origin = Origin::all();
        $countries = Country::all();
        $courires = courier::all();
        $typepaket = Typepaket::all();
        $records= PengirimanTrackingmore::with('penerima','pengirim','origin')->find($id);
        return view('backand.trackingmore.edit', compact('pengirim','origin','records','countries','courires','typepaket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengirimanTrackingmoreRequest  $request
     * @param  \App\Models\PengirimanTrackingmore  $pengirimanTrackingmore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
            $pengirim_id = $request->pengirim_id;
            $penerima_id = $request->penerima_id;
            $getcountry = Client::find($penerima_id);
            $cektarif = TarifInternasional::query()
                ->where('courires_id',$getcountry->countries_id)
                ->where('origin_id', 'LIKE', "%{$request->origin_id}%")
                ->where('countries_id', 'LIKE', "%{$getcountry->countries_id}%")
                ->orWhere('min', '>=', "%{$request->berat}%")
                ->orWhere('max', '<=', "%{$request->berat}%")
                ->first();
                if ($cektarif==null) {
                    return redirect()->back()->with('error', 'Tarif tidak ada');
                } else {
                    $getcodeCountry = Country::find($getcountry->countries_id);
                    $total_biaya = $cektarif->cost*$request->jumlah;
                    $lastInvoiceID =PengirimanTrackingmore::orderBy('id', 'desc')->pluck('id')->first();
                     $ndate = str_replace( array( '-'), '', Carbon::now()->toDateString());
                       $tracking_number = $ndate.''.($lastInvoiceID + 1) .$getcodeCountry->country_code;
                       $order_number = $ndate.''.($lastInvoiceID + 1);
                       $recordslocal = PengirimanTrackingmore::find($id);
                       $recordslocal->tgl_kirim  = $request->txDate;
                       $recordslocal->origin_id  = $request->origin_id;
                       $recordslocal->pengirim_id  = $pengirim_id;
                       $recordslocal->penerima_id  = $penerima_id;
                       $recordslocal->courires_id  = $request->courires_id;
                       $recordslocal->countries_id  = $getcountry->countries_id;
                       $recordslocal->typepaket_id  = $request->typepaket_id;
                       $recordslocal->tracking_number  = $tracking_number;
                       $recordslocal->order_number  = $order_number;
                       $recordslocal->logistics_channel  = $request->logistics_channel;
                       $recordslocal->keterangan  = $request->keterangan;
                       $recordslocal->panjang  = $request->dimensi_panjang;
                      $recordslocal->lebar  = $request->dimensi_lebar;
                      $recordslocal->tinggi  = $request->dimensi_tinggi;
                       $recordslocal->jumlah  = $request->jumlah;
                       $recordslocal->berat  = $request->berat;
                       $recordslocal->total_biaya  = $total_biaya;
                       $recordslocal->status  = 'UPDATE';
                       $recordslocal->save() ;
              
                   $getcountry = Client::find($penerima_id);
                    $getcourier = courier::find($request->courires_id);
                    if ($recordslocal) {
                       $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
                        $data = [
                            "tracking_number"=>$tracking_number,
                            "courier_code"=>$getcourier->courier_name,
                            "order_number"=>$order_number,
                           "destination_code"=> $getcodeCountry->country_code,
                           "logistics_channel"=> $request->logistics_channel,
                           "customer_name"=> $getcountry->nama,
                            "customer_email"=>$getcountry->email,
                            "customer_phone"=>"+1123456789",
                            "note"=>"check",
                            "title"=>"title",
                            "lang"=>"en"
                        ];
                        $response = $api->modifyinfo($data);
                       if ($response) {
                           # code...
                           $status = json_decode($response);
                            $message = $status->message;
                           return redirect()->route('pengiriman-trakingmore.index')
                           ->with('success',$message);
                       } else {
                          return back()->with('error', 'Silahkan data dicek API galat');
                       }

                    } else {
                        # code...
                        return back()->with('error', 'Silahkan data dicek API galat');
                    }
                    
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengirimanTrackingmore  $pengirimanTrackingmore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $datas= PengirimanTrackingmore::find($id);
        // $datas->delete();

        $getcourier = courier::find($datas->courires_id);
        $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
        $data = [
            "tracking_number"=>$datas->tracking_number,
            "courier_code"=>$getcourier->courier_code,
        ];
        $response = $api->delete($data);
           $status = json_decode($response);
            if ($status->code==200) {
                      $datas->delete();
                         $message = $status->message;
            } else {
                # code...
                $message = $datas->tracking_number.''.$getcourier->courier_code;
            }
            return redirect()->route('pengiriman-trakingmore.index')
            ->with('success',$message);
    }

    public function print ($id){
        $cargo= PengirimanTrackingmore::find($id);
        return view('backand.trackingmore.printpdf',compact( 'cargo'));
    }

    public function tracking(){
        // $records = PengirimanTrackingmore::with('penerima','pengirim','country','courier','typepaket')->where('tracking_number',$request->tracking_number)->first();
        // $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
        $apikey = env('API_KEY_TRACINGMORE');
        $api = new Api($apikey);

        // $data = [
        //     "tracking_number"=>$request->tracking_number,
        //     "courier_code"=>$records->courier->courier_code,
        // ];
        $datas = ["tracking_number" => "202205091US"];
        $response = $api->get($datas);
        $get_result_arr2 = json_decode($response, true);
        // return $get_result_arr2;
        
        if ($get_result_arr2['code']==200) {
            $result = collect($get_result_arr2['data'])->where('tracking_number', '31539601295');
            foreach ($get_result_arr2['data']   as $list) {
                        $data['tracking_number'] = $list['tracking_number'];
                        $data['courier_code'] = $list['courier_code'];
                        $data['origin_info'] = $list['origin_info'];
                        $data['trackinfo'] = $list['origin_info']['trackinfo'];
                    
            }
        return view('backand.trackingmore.tracking', compact('get_result_arr2','data'));
        } else {
            // $get_result_arr2=0;
            $data=0;
                 return view('backand.trackingmore.tracking', compact('get_result_arr2','data'));
            // ->with('error',$get_result_arr2['code']);
        }
        
        
           
    }
}
