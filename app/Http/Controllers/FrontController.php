<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Galery;
use App\Models\TarifKirim;
use App\Models\Traking;
use App\Models\TrackingPtiga;
use Tracking\Api;

class FrontController extends Controller
{
    //

    public function beranda(){

        $galery = Galery::all();
        $user = User::count();
        return view('front.index',compact('galery','user') );
    }

    public function cari(Request $request)
    {
                if($request->ajax())
{
$output="";
$products=TarifKirim::where("asal","LIKE","%{$request->input('kotaasal')}%")->where("tujuan","LIKE","%{$request->input('kotatujuan')}%")
   ->get();
if($products)
{
    foreach ($products as $key => $product) {
            $output.='<tr>'.
            '<td>'.$product->id.'</td>'.
            '<td>'.$product->asal.'</td>'.
            '<td>'.$product->tujuan.'</td>'.
            '<td>'.$product->tarif.'</td>'.
            '</tr>';
                 
    }
return Response($output);
   }
}
}
    public function cekongkir(Request $request){
        $datas=TarifKirim::where("tujuan","LIKE","%{$request->input('kotaasal')}%")->where("nama_kecamatan_penerima","LIKE","%{$request->input('kotatujuan')}%")
        ->get();
        return view ('front.cekongkir', compact('datas'));
    }

    public function tracking(Request $request){
        if (Traking::where('no_resi', $request->no_resi)->count()>0) {
            $datas = Traking::where('no_resi', $request->no_resi)->get();
        } else  {
            $datas = TrackingPtiga::where('no_resi', $request->no_resi)->get();
        }
        // else{
            // $api = new Api('ey1h9t5e-jwh7-q911-ricx-rqfijos19z27');
            // $datas = ["tracking_number" => $request->no_resi];
            // $response = $api->get($datas);
            // $get_result_arr2 = json_decode($response, true);
            // $result = collect($get_result_arr2['data'])->where('tracking_number', $request->no_resi);
            // foreach ($get_result_arr2['data']   as $list) {
            //             $datas['no_resi'] = $list['tracking_number'];
            //             $datas['catatan'] = $list['courier_code'];
            //             $datas['status'] = $list['origin_info']['trackinfo'];
            // }
        // }
        return view ('front.tracking', compact('datas'));
    }
}