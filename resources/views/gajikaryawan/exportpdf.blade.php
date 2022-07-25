<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Report Gaji Karyawan</title>
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
		<!--end::Fonts-->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="print-content-only header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Invoice 2 main-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-xl-row">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                <!--begin::Invoice 2 content-->
                                <div class="mt-n1">
                                    <!--begin::Top-->
                                    <div class="d-flex flex-stack pb-10">
                                        <a href="#">
                                            <img alt="Logo" src="{{ asset('assets/logo.jpg') }}" />  
                                        </a>
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                            <!--end::Col-->
                                            <div class="col-sm-6">
                                                <!--end::Label-->
                                        <div class="fw-bolder fs-3 text-gray-800 mb-8">Report Gaji Karyawan</div>
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Bulan</div>
                                                <!--end::Label-->
                                                <!--end::Col-->
                                                <div class="fw-bolder fs-6 text-gray-800">{{$month}}</div>
                                                <!--end::Col-->
                                            </div>
                                        <!--end::Logo-->
                                        <!--begin::Action-->
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Top-->
                                    <!--begin::Wrapper-->
                                    <div class="m-0">
                                        <!--begin::Label-->
                                        {{--  <div class="fw-bolder fs-3 text-gray-800 mb-8">Report Gaji Karyawan</div>  --}}
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row g-5 mb-11">
                                            <!--end::Col-->
                                            {{--  <div class="col-sm-6">
                                                <!--end::Label-->
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Bulan</div>
                                                <!--end::Label-->
                                                <!--end::Col-->
                                                <div class="fw-bolder fs-6 text-gray-800">{{$month}}</div>
                                                <!--end::Col-->
                                            </div>  --}}
                                            <!--end::Col-->
                                            <!--end::Col-->
                                            {{--  <div class="col-sm-6">
                                                <!--end::Label-->
                                                <div class="fw-bold fs-7 text-gray-600 mb-1">Tanggal Cetak</div>
                                                <!--end::Label-->
                                                <!--end::Info-->
                                                <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                    <span class="pe-2 text-success">{{now()}}</span>
                                                    <span class="fs-7 text-danger d-flex align-items-center">
                                                </div>
                                                <!--end::Info-->
                                            </div>  --}}
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Content-->
                                        <div class="flex-grow-1">
                                            <!--begin::Table-->
                                            <div class="table-responsive border-bottom mb-9">
                                                <table class="table mb-3 table-striped">
                                                    <thead>
                                                        <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                            <th class="min-w-17px fw-boldest text-dark pb-2">No</th>
                                                            <th class="min-w-110px fw-boldest text-dark pb-2">Nama Karyawan</th>
                                                            <th class="min-w-70px fw-boldest text-dark  pb-2">Tanggal Gajian</th>
                                                            <th class="min-w-80px fw-boldest text-dark  pb-2">Gaji Pokok</th>
                                                            <th class="min-w-100px fw-boldest text-dark  pb-2">Potongan</th>
                                                            <th class="min-w-100px fw-boldest text-dark  pb-2">Bonus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i =0 ;?>
                                                        @foreach ($gajikaryawan as $key => $gaji)
                                                        <tr class="fw-bolder text-gray-700 fs-5 ">
                                                            <td class="pt-2">{{ ++$i }}</td>
                                                            <td class="d-flex align-items-center pt-2">
                                                                {{ $gaji->nama_karyawan }}&nbsp;
                                                            </td>
                                                            <td class="pt-2">{{ $gaji->tgl_gaji }} </td>
                                                            <td class="pt-2 fw-boldest">{{ $gaji->gaji_pokok }} </td>
                                                            <td class="pt-2 ">{{ $gaji->potongan }} </td>
                                                            <td class="pt-2 text-dark fw-boldest">{{ $gaji->bonus }} </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                            <!--begin::Container-->
                                            <div class="d-flex justify-content-end mb-0">
                                                <!--begin::Section-->
                                                <div class="mw-300px">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Code-->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p>Jombang, {{date('d-m-Y')}}</p>
                                                                <h5 class="card-title">PT. SOLID BERSAMAJU BERKAH</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h3><u>{{Auth::user()->name}}</u></h3>
                                                                <h4>Manajemen Pemasaran</h4>
                                                            </div>
                                                        </div>
                                                        <!--begin::Label-->
                                                    </div>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Container-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Invoice 2 content-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Invoice 2 main-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
        <script>
            window.print();
        </script>
	</body>
	<!--end::Body-->
</html>
