<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- dibawah untuk Id TGL dan nama -->
    <title>{{ $manifest->tgl_kirim }}-{{ $manifest->nama_driver }}</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets2/vendor/fonts/circular-std/style.css')}}" />
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
    </style>

</head>

<body class="card">
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

        @foreach ($manifestdetail as $record)
        <div class="row contents">
            <div class="col-1-5 text-center line-top text-dark line-right line-left">
                {{ $loop->iteration}}
             </div>
            <div class="col-1-5 text-center">
                {{ $record->datapengiriman->nomor_resi}}
            </div>
            <div class="col-1-10 text-center">
                {{ $record->datapengiriman->nama_penerima }}
            </div>
            <div class="col-1-10 text-center">
                {{ $record->datapengiriman->alamat_penerima }}

            </div>
            <div class="col-1-10 text-center">
                {{ $record->datapengiriman->berat}}
            </div>
            <div class="col-1-10 text-center">
                @currency($record->total_biaya)
            </div>
        </div>
        @endforeach

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
   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>

</body>

</html>