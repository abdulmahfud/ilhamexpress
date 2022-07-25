<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- dibawah untuk Id TGL dan nama -->
    <title>{{ $manifest->tgl_kirim }}-{{ $manifest->nama_driver }}</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{asset('assets2/vendor/fonts/circular-std/style.csss')}}" /> --}}
    <style media="screen">
        body {
            font-family: 'Circular Std Book';
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            color: #71748d;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            margin-bottom: 15px;
            font-family: 'Circular Std Medium';
        }

        /*
            These next two styles are apparently the modern way to clear a float. This allows the logo
            and the word "Invoice" to remain above the From and To sections. Inserting an empty div
            between them with clear:both also works but is bad style.
            Reference:
            http://stackoverflow.com/questions/490184/what-is-the-best-way-to-clear-the-css-style-float
        */
        header:before,
        header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .contents {
            background-color: #F2F2F8;
        }

        .invoiceNbr {
            font-size: 40px;
            margin-right: 30px;
            margin-top: 30px;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            margin: 20px;
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 15px;
        }

        .panel {
            padding: 7pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #e8e5e5;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #e8e5e5;
            color: #3d405c;
        }

        .items {
            clear: both;
            display: table;
            padding: 0px;
            width: 100%;
        }

        /* Factor out common styles for all of the "col-" classes.*/
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        /*for clarity name column styles by the percentage of width */
        .col-1-5 {
            width: 5%;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-20 {
            width: 20%;
        }

        .col-1-40 {
            width: 40%;
        }

        .col-1-50 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

        .float-right {
            float: right !important;
        }
        .float-left {
            float: left !important;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-dark {
            color: #3d405c;
        }

        .p-1 {
            padding: 2px;
            margin: 1px;
        }

        .px-5 {
            padding-left: 15px;
            padding-right: 15px;
        }

        .line-bottom {
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-bottom-color: #e8e5e5;
        }
    </style>

    <!-- These styles are exactly like the screen styles except they use points (pt) as units
        of measure instead of pixels (px) -->
    <style media="print">
        body {
            font-family: 'Circular Std Book';
            font-style: normal;
            font-weight: normal;
            font-size: 10pt;
            color: #71748d;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #3d405c;
            margin: 0pt 0pt 15pt 0pt;
            margin-bottom: 15pt;
            font-family: 'Circular Std Medium';
        }

        header:before,
        header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .contents {
            background-color: #F2F2F8;
        }

        .invoiceNbr {
            font-size: 30pt;
            margin-right: 30pt;
            margin-top: 30pt;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            margin: 20pt;
            min-width: 200pt;
        }

        .fromtocontent {
            margin: 1pt;
            margin-right: 1pt;
        }

        .panel {
            padding: 7pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #e8e5e5;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #e8e5e5;
            color: #3d405c;
        }

        .items {
            clear: both;
            display: table;
            border-collapse: collapse;
            padding: 0pt;
        }

        div[class^="col-"] {
            display: table-cell;
            padding: 7pt;
        }

        .col-1-5 {
            width: 5%;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-20 {
            width: 20%;
        }

        .col-1-40 {
            width: 40%;
        }

        .col-1-50 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

        .float-right {
            float: right !important;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-dark {
            color: #3d405c;
        }

        .p-1 {
            padding: 2pt;
            margin: 1pt;
        }

        .px-5 {
            padding-left: 15pt;
            padding-right: 15pt;
        }

        .line-bottom {
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #e8e5e5;
        }
        table{
            width: 100%;
        }
        td{
            text-align: left;
            padding-left: 10px;
        }
    </style>

    {{-- <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style> --}}

    {{-- style for dividing into two parts --}}
    <style>
        /* Split the screen in half */
        .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
        }

        /* Control the left side */
        .left {
        left: 0;
        background-color: #111;
        }

        /* Control the right side */
        .right {
        right: 0;
        background-color: red;
        }

        /* If you want the content centered horizontally and vertically */
        .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        }

        /* Style the image inside the centered container, if needed */
        .centered img {
        width: 150px;
        border-radius: 50%;
        }
    </style>

</head>

<body class="card">
    <div class="split left">
        <div class="centered">
            <header>
                <div class="logo">
                    <img src="{{ asset('assets/logo.png')}}" alt="generic business logo" height="auto" width="120" />
                </div>
                <div class="float-right">
        
                    <h3 class="p-1">No Manifest: {{ $manifest->nomor_manifest }}</h3>
                    <p class="p-1">Nama : {{ $manifest->nama_driver }} <p>
                        <p class="p-1">Tujuan : {{ $manifest->tujuan }} <p>
                </div>
            </header>
        
            <section class="card items">
        
                <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
                <div class="row fromto">
                    <div class="col-1-5 panel text-center text-dark line-top line-right line-left">
                        <span class="text-white">No</span>
                    </div>
                    <div class="col-1-5 panel text-center">
                        no resi
                    </div>
                    <div class="col-1-10 panel text-center">
                        nama_penerima
                    </div>
                    <div class="col-1-10 panel text-center">
                        alamat
                    </div>
                    <div class="col-1-10 panel text-center">
                        Berat(/kg)
                    </div>
                    <div class="col-1-10 panel text-center">
                         Biaya
                    </div>
                </div>
        
                <div class="row contents">
                    <div class="col-1-5 text-center line-top text-dark line-right line-left">
                        {{-- {{ $loop->iteration}} --}}
                     </div>
                    <div class="col-1-5 text-center">
                        {{ $cargo->nomor_resi}}
                    </div>
                    <div class="col-1-10 text-center">
                        {{ $cargo->nama_penerima }}
                    </div>
                    <div class="col-1-10 text-center">
                        {{ $cargo->alamat_penerima }}
        
                    </div>
                    <div class="col-1-10 text-center">
                        {{ $cargo->berat}}
                    </div>
                    <div class="col-1-10 text-center">
                        @currency($cargo->total_biaya)
                    </div>
                </div>
        
                <!-- FOOTER -->
                <div class="row">
                    <div class="col-1-5">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    <div class="col-1-10 text-right">
                        <b class="text-dark">Potongan :</b>
                    </div>
                    <div class="col-1-10 text-center">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1-5">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    <div class="col-1-10">
        
                    </div>
                    
                </div>
            </section>
            <div class="line-bottom ">
            </div>
            <h6><p>Ket: {{ $manifest->keterangan }}</p></h6>
            <div class="float-right">
        
                <div class="d-flex justify-content-end">
                    <!--begin::Section-->
                    <div class="mw-300px">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Code-->
                            <div class="card">
                                <div class="card-body">
                                    <p>Jombang, {{date('d-m-Y')}}</p>
                                    <h5 class="card-title">{{ env('app')}}</h5>
                                </div>
                                <div class="card-body">
                                    <h3><u>{{Auth::user()->name}}</u></h3>
                                    <h3>
                                        @forelse (Auth::user()->roles->take(1) as $role)
                                        {{$role->name}}
                                        @empty
                                        Not assigned
                                        @endforelse
                                    </h3>
                                </div>
                            </div>
                            <!--begin::Label-->
                            <div class="text-end fw-bolder fs-6 text-gray-800"></div><br>
                            <!--end::Label-->
                        </div>
                        <div class="text-end fw-bolder fs-12 text-gray-800"></div>
                        <!--end::Item-->
                    </div>
                    <!--end::Section-->
                </div>
            </div>
        </div>
      </div>
      
    <div class="split right">
        <div class="centered">
            <header>

                <div class="logo float-left">
                    <img src="{{ asset('assets/logo.png')}}" alt="generic business logo" height="auto" width="20" />
                </div>
                <div class="float-right">
        
                    <h1 class="p-1">ILHAM EXPRESS</h1>
                </div>
            </header>
        
            <section class="card items" style="width:400px">
                <table style="font-size: 16px;">
                    <tr style="border-top: 1px solid; border-left: 1px solid">
                        <td width="300" style="border-right: 1px solid; border-bottom: 1px solid;">
                           <b> Pengirim : {{$cargo->nama_perusahaan_pengirim}} </b><br>
                           {{$cargo->nama_pengirim}} <br>
                           {{$cargo->no_hp_pengirim}}
                        </td>
                        <td  width="100" style="border-right: 1px solid; border-bottom: 1px solid; text-align: center;">
                            <h1 style="font-size: xx-large"><b> TPE</b></h1>
                        </td>
                      
                    </tr>
                    <tr style="border-top: 1px solid; border-left: 1px solid">
                        <td width="300" style="">
                            <b> Penerima : {{$cargo->nama_perusahaan_penerima}} </b><br>
                            {{$cargo->nama_penerima}} <br>
                            {{$cargo->no_hp_penerima}}
                        </td>
                        <td  width="100" style="border-right: 1px solid; text-align: center;">
                            <p >{{$cargo->nomor_resi}}</p>
                        </td>
                      
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid; ">
                        <td colspan="2" width="300" style="border-right: 1px solid;">Alamat :{{$cargo->alamat_penerima}} ; {{$cargo->kodepos_penerima}}</td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid">
                        <td colspan="2" width="300" style="border-right: 1px solid;"></td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid">
                        <td colspan="2" width="300" style="border-right: 1px solid;">{{$cargo->kodepos_penerima}}</td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid">
                        <td colspan="2" width="300" style="border-right: 1px solid;">,</td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid">
                        <td colspan="2" width="300" style="border-right: 1px solid;">Indonesia</td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid; border-top: 1px solid">
                        <td colspan="2" width="300" style="border-right: 1px solid;">
                            <b>Description : {{$cargo->keterangan}} </b>
                        </td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid">
                        <td  width="300" style="">
                            {{$cargo->service}} <br><br>
                            <b>Quantity : {{$cargo->jumlah}} Pcs</b> <br>
                            <b>Weight : {{$cargo->berat}} KG</b> <br>
                            <b>Ongkir : @currency($cargo->total_biaya) </b> <br>
                            
                        </td>
                        <td  width="100" style=" text-align: center;">
                            {{-- <div id="qrcode"></div> --}}

                            <div class="mb-3">{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div>
                            {{-- <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div>
                            <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T') !!}</div>
                            <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'CODABAR') !!}</div>
                            <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'KIX') !!}</div>
                            <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'RMS4CC') !!}</div>
                            <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}</div>  --}}

                        </td>
                    </tr>
                    <tr style="border-left: 1px solid; border-right: 1px solid; border-top: 1px solid;">
                        <td width="270" style="border-right: 1px solid; border-bottom: 1px solid;">
                             390423438240924
                         </td>
                         <td  width="130" style="font-size:11px; border-right: 1px solid; border-bottom: 1px solid; text-align: center;">
                             <span>Print at {{date('d-m-Y H:i:s')}}</span><br>
                             <span>Receivers</span>
                             <br><br><br><br>
                             <p>(....................)</p>
                         </td>
                    </tr>
                </table>
                <br>
            </section>
           
        </div>
      </div>
     

</body>

</html>