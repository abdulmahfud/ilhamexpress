<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Manifest;
use App\Models\ManifestDetail;
use App\Models\DataPengirimanPaket;
use App\Models\Traking;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Models\Origin;
use App\Models\TarifKirim;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Hash;

class CargoController extends Controller
{

    
    public function filter()
    {
        $pengirim = Client::all();
        $origin = Origin::all();
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            // dd($start_date);
            $cargo = DataPengirimanPaket::with('penerima','pengirim')->whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $cargo = DataPengirimanPaket::with('penerima','pengirim')->latest()->get();
        }
        return view('backand.cargo.filter', compact('pengirim','origin','cargo'));
    }
    public function indexInputPengiriman()
    {
        $pengirim = Client::all();
        $origin = Origin::all();
        $cargo = DataPengirimanPaket::with('penerima','pengirim')->latest()->get();
        return view('backand.cargo.inputpengiriman', compact('pengirim','origin','cargo'));
    }

    public function indexUpdatePosisi()
    {
        $data['tracking'] = Traking::all();
        return view('backand.cargo.updateposisi',$data);

    }

    public function getResi(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = DataPengirimanPaket::where('nomor_resi','LIKE','%'.$term.'%')
        ->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->nomor_resi, 'text' => $tag->nomor_resi];
        }

        return \Response::json($formatted_tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {

        $dataPengiriman = DataPengirimanPaket::where('nomor_resi', $request->resi)->first();
        if($dataPengiriman != null){
            return back()->with('error', 'data pengiriman dengan resi '. $request->resi.' already exists ');
        }else{
            if ($request->datapengirimbaru==1) {
                $ceknama = Client::where('nama',$request->nama_pengirim)->first();
                if ($ceknama != null) {
                    # code...
                    return back()->with('error', 'data ini'. $request->nama_pengirim.'Sudah ada');
                } else {
                    # code...
                    $province = Province::where('id', $request->nama_provinsi_pengirim)->first();
                    $regency = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
                    $district = District::where('id', $request->nama_kecamatan_pengirim)->first();
                    $user = new User;
                    $user->name = $request->nama_pengirim;
                    $user->password  = Hash::make($request->email);
                    $user->email     = $request->email_pengirim;
                    $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
                    $user->save();
                    $pengirim= Client::create([
                        'id_user'=> $user->id,
                        'nama'=> $request->nama_pengirim,
                        'email'=> $request->email_pengirim,
                        'no_hp'=> $request->no_hp_pengirim,
                        'nama_kecamatan' => $district->name,
                        'nama_kabupaten' => $regency->name,
                        'nama_provinsi' => $province->name,
                        'nama_desa' => 0,
                        'nama_desa' => 0,
                        'kodepos'=> 0,
                        'alamat'=> $request->alamat_pengirim,
                    ]);
                   $pengirim_id= $pengirim->id;
                }
            } else {
               $pengirim_id= $request->pengirim_id;
            }
            if ($request->datapenerimabaru==1) {
                $ceknama = Client::where('nama',$request->nama_penerima)->first();
                if ($ceknama != null) {
                    # code...
                    return back()->with('error', 'data ini'. $request->nama_penerima.'Sudah ada');
                } else {
                $province = Province::where('id', $request->nama_provinsi_penerima)->first();
                $regency = Regency::where('id', $request->nama_kabupaten_penerima)->first();
                $district = District::where('id', $request->nama_kecamatan_penerima)->first();
                $village = Village::where('id', $request->nama_desa_penerima)->first();
                $user = new User;
                $user->name = $request->nama;
                $user->password  = Hash::make($request->email_penerima);
                $user->email     = $request->email_penerima;
                $user->avatar = 'https://cdn-icons-png.flaticon.com/512/560/560216.png';
                $user->save();
                $penerima = Client::create([
                    'id_user'=> $user->id,
                    'nama'=> $request->nama_penerima,
                    'email'=> $request->email_penerima,
                    'no_hp'=> $request->no_hp_penerima,
                    'nama_kecamatan' => $district->name,
                    'nama_kabupaten' => $regency->name,
                    'nama_provinsi' => $province->name,
                    'nama_desa' => $village->name,
                    'kodepos'=> $request->kodepos,
                    'alamat'=> $request->alamat_penerima,
                ]);
               $penerima_id= $penerima->id;
                }
            } else {
               $penerima_id= $request->penerima_id;
            }
            // $cektarif = TarifKirim::where('origin_id',$request->origin_id)
            // ->where('origin_id',$request->origin_id)
            // ->where('nama_kabupaten_penerima',$request->nama_kabupaten_penerima)
            // ->where('layanan',$request->layanan)
            // ->like('min_kg','=',$request->berat)
            // ->first();

            $cektarif = TarifKirim::query()
            ->where('nama_kabupaten_penerima',$request->nama_kabupaten_penerima)
            ->where('origin_id', 'LIKE', "%{$request->origin_id}%")
            ->where('layanan', 'LIKE', "%{$request->layanan}%")
            ->orWhere('min_kg', 'LIKE', "%{$request->berat}%")
            ->orWhere('max_kg', 'LIKE', "%{$request->berat}%")
            ->first();
            // dd($cektarif->tarif);

                $total_biaya = $cektarif->tarif*$request->jumlah;
            DataPengirimanPaket::create([
                'tgl_kirim'  => now()->toDateTimeString(),
                'origin_id'  => $request->origin_id,
                'pengirim_id'  => $pengirim_id,
                'penerima_id'  => $penerima_id,
                'nomor_resi'  => $request->resi,
                'panjang'  => $request->dimensi_panjang,
                'lebar'  => $request->dimensi_lebar,
                'tinggi'  => $request->dimensi_tinggi,
                'berat'  => $request->berat,
                'jumlah'  => $request->jumlah,
                'total_biaya'  => $total_biaya,
                'keterangan'  => $request->keterangan,
                'service'  => $request->service,
                'status'  => "CREATED",
            ]);
        }

        // $provinceR = Province::where('id', $request->nama_provinsi_penerima)->first();
        // $provinceP = Province::where('id', $request->nama_provinsi_pengirim)->first();
        // $regencyR = Regency::where('id', $request->nama_kabupaten_penerima)->first();
        // $regencyP = Regency::where('id', $request->nama_kabupaten_pengirim)->first();
        // $districtR = District::where('id', $request->nama_kecamatan_penerima)->first();
        // $districtP = District::where('id', $request->nama_kecamatan_pengirim)->first();
        // $villageR = Village::where('id', $request->nama_desa_penerima)->first();
        

        // //hitung biaya
        // $cektarif = TarifKirim::where('origin_id',$request->origin_id)
        // ->where('origin_id',$request->origin_id)
        // ->where('nama_kabupaten_penerima',$request->nama_kabupaten_penerima)
        // ->where('layanan',$request->layanan)
        // ->where('min_kg','>=',$request->berat)->first();
        // dd($cektarif);

        // // '', 'tujuan','layanan','min_kg','max_kg','tarif' 
        // DataPengirimanPaket::create([
        //     'tgl_kirim'  => now()->toDateTimeString(),
        //     'origin_id'  => $request->origin_id,
        //     'pengirim_id'  => $request->pengirim_id,
        //     'penerima_id'  => $request->penerima_id,
        //     'nomor_resi'  => $request->resi,
        //     'panjang'  => $request->dimensi_panjang,
        //     'lebar'  => $request->dimensi_lebar,
        //     'tinggi'  => $request->dimensi_tinggi,
        //     'berat'  => $request->berat,
        //     'jumlah'  => $request->jumlah,
        //     'total_biaya'  => $total_biaya,
        //     'keterangan'  => $request->keterangan,
        //     'service'  => $request->service,
        //     'status'  => "CREATED",
        // ]);
        return redirect()->route('cargo.inputpengiriman')
                        ->with('success','Data Pengiriman created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePosisi(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nomor_manifest'=>'required',
        //     'nama_driver' => 'required',
        //     'no_hp' => 'required',
        //     'tujuan' => 'required',
        //     'tgl_kirim' => 'required',
        // ],[
        //     'nomor_manifest.required' => 'nomor_manifest is required',
        //     'nama_driver.required' => 'nama_driver is required',
        //     'no_hp' => ' no_hp is required',
        //     'tujuan' => 'tujuan is required',
        //     'tgl_kirim' => ' tgl_kirim is required',
        // ]);

        // check resi to data pengiriman
        $dataPengiriman = DataPengirimanPaket::where('nomor_resi', $request->no_resi)->first();
        if($dataPengiriman == null){
            return back()->with('error', 'data pengiriman dengan resi '. $request->no_resi.' tidak ditemukan ');
        }
        
        $tracking = Traking::where('no_resi', $request->no_resi)->first();
        $dokumen = "wait";

        if($tracking == null){
            Traking::create([
                'id_datapengiriman'  => $dataPengiriman->id,
                'no_resi'  => $request->no_resi,
                'dokumen'  => $dokumen,
                'catatan'  => $request->catatan,
                'nama_penerima'  => $request->nama_penerima,
                'nohp_penerima'  => $request->nohp_penerima,
                'status'  => $request->status,
            ]);
        }else {
            $tracking->update([
                'id_datapengiriman' => $dataPengiriman->id,
                'no_resi' => $request->no_resi,
                'dokumen' => $dokumen,
                'catatan' => $request->catatan,
                'nama_penerima' => $request->nama_penerima,
                'nohp_penerima' => $request->nohp_penerima,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('cargo.updatePosisi')
                        ->with('success','Success Update Status Posisi.');
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
        // $client = Client::all();
        // $manifest= manifest::find($id);
        // $manifestdetail = ManifestDetail::where('manifests_id', $id)->get();
        // return view('backand.manifest.show',compact('client','manifestdetail','manifest'));
    }

    public function edit($id)
    {
        //
        $origin = Origin::all();
        $data= DataPengirimanPaket::find($id);
        return view('backand.cargo.edit',compact('data','origin'));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= DataPengirimanPaket::find($id);
        $data->delete();
        return redirect()->route('cargo.inputpengiriman')
                        ->with('success','Cargo Data deleted successfully');
    }

    public function preview ($id){
        $manifest= Manifest::find($id);
        $cargo= DataPengirimanPaket::find($id);
        // dd($cargo);
        $manifestdetail= ManifestDetail::with('datapengiriman')->where('manifests_id','=',$id)->get();
        return view('backand.cargo.print',compact('manifest','manifestdetail', 'cargo'));

    }
    public function print ($id){
        $manifest= Manifest::find($id);
        $cargo= DataPengirimanPaket::find($id);
        // dd($cargo);
        $manifestdetail= ManifestDetail::with('datapengiriman')->where('manifests_id','=',$id)->get();
        return view('backand.cargo.printpdf',compact('manifest','manifestdetail', 'cargo'));

    }
}
