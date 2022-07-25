<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">	
	<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

<style>
    body {
    background-color: #eee
}

.fs-12 {
    font-size: 12px
}

.fs-15 {
    font-size: 15px
}
a
.name {
    margin-bottom: -2px
}

.product-details {
    margin-top: 13px
}
</style>
</head>
<body>
  <div class="container mt-5 mb-5">
            
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="receipt bg-white p-3 rounded"><img src="{{ asset('assets/logo.png')}}" width="120">
                <hr>
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                    <div><span class="d-block fs-12">Shipper : Tgl.kirim: {{$cargo->tgl_kirim}}</span>
                        <div class="border-dotted">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"> {{ $cargo->pengirim->nama }}- {{ $cargo->pengirim->no_hp }}</li>
                              <li class="list-group-item">Alamat {{ $cargo->pengirim->alamat }}</li>
                              <li class="list-group-item">Desa.{{$cargo->pengirim->nama_desa}}/kodepos:{{$cargo->pengirim->kodepos}}</li>
                              <li class="list-group-item"> Kec.{{$cargo->pengirim->nama_kecamatan}}</li>
                              <li class="list-group-item">Kab.{{$cargo->pengirim->nama_kabupaten}}</li>
                              <li class="list-group-item">Prov.{{$cargo->pengirim->nama_provinsi}}</li>
                            </ul>
                        </div>
                     </div>
                    <!-- <div><span class="d-block fs-12">Order number</span><span class="font-weight-bold">OD44434324</span></div> -->
                    <!-- <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div> -->
                    <div><span class="d-block fs-12">Service Pengiriman</span><span class="font-weight-bold text-success">{{$cargo->service}}</span></div>
    </div>
                <hr>

                <div class="row row-cols-1 row-cols-md-2 g-4">
                  <div class="col">
                    <div class="card">
                      <div><span class="d-block fs-12">Penerima</span> 
                        <div class="border-dotted">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"> {{ $cargo->penerima->nama }}- {{ $cargo->penerima->no_hp }}</li>
                              <li class="list-group-item">Alamat {{ $cargo->penerima->alamat }}</li>
                              <li class="list-group-item">Desa.{{$cargo->penerima->nama_desa}}/kodepos:{{$cargo->penerima->kodepos}}</li>
                              <li class="list-group-item"> Desa.{{$cargo->penerima->nama_desa}}/{{$cargo->penerima->kodepos}}</li>
                              <li class="list-group-item"> Kec.{{$cargo->penerima->nama_kecamatan}}</li>
                              <li class="list-group-item">Kab.{{$cargo->penerima->nama_kabupaten}}</li>
                              <li class="list-group-item">Prov.{{$cargo->penerima->nama_provinsi}}</li>
                            </ul>
                        </div>
                        <hr>
                     <span class="d-block">Weight : {{ $cargo->berat}}</span>
                     <span class="d-block">Heigth: {{ $cargo->panjang}}*{{ $cargo->lebar}}*{{ $cargo->tinggi}}= {{ $cargo->panjang*  $cargo->lebar* $cargo->tinggi}}</span>
                     <span class="d-block">Biaya delivery:  @currency($cargo->total_biaya)</span>
                     <span class="d-block fs-12">Decripsion of Goods :</span> 
                      <span class="font-awesome">{{$cargo->keterangan}}</span> <br>
                     </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="d-flex justify-content-between align-items-center footer">
                        <span class="d-block">
                           <div class="mb-3"> {!! DNS2D::getBarcodeHTML($cargo->nomor_resi, 'QRCODE') !!}</div>
                           <div class="mb-10">{!! DNS1D::getBarcodeHTML($cargo->nomor_resi, 'CODABAR') !!}</div>
                           <div class="mb-10">{{ $cargo->nomor_resi}}</div>
                   </div>
                    </div>
                  </div>
                  <div class="d-flex flex-column justify-content-end align-items-end">
                    <div class="text-center">
                      <div class="card-body-align-center">

                        <p class="card-text">Print {{date('d-m-Y')}}</p>
                        <p class="card-text">Penerima</p>
                        <br>
                        <p class="card-text p-10">(.......................................)</p>
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    window.print();
    window.onafterprint = window.close;	
  </script>
</html>