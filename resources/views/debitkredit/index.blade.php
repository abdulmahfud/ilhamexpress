@extends('layouts.main_layout')
@section('css')
    <link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Debit Kredit
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">List</small>
                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card bg-info">
                <div class="card-body">
                    <label class="badge badge-success">Debit</label>
                     <h3 class="col-3 text-light">Jumlah : @currency($countdebit)</h3>
                    <label class="badge badge-danger">Kredit</label>
                    <h3 class="col-3 text-light">Jumlah :@currency($countkredit)</h3>
                </div>
                <div class="card-body">
                <h1 class="col-3 text-light">Sisa Saldo :@currency($countdebit-$countkredit)</h1>
                </div>
            </div>
                
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" id="myInput" class="form-control form-control-solid w-250px ps-15" placeholder="Search debitkredit" name="search"/>
                        </div>
                        <!--end::Search-->
                    </div>
                   
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex">
                            <form method="GET" target="_blank" action="{{ route('debitkredit-bulanan.reportpdf') }}" >
                                {{-- {!! Form::open(array('route' => 'gajikaryawan.reportpdf','method'=>'GET')) !!} --}}
                                    <div class="row">
                                        <div class="d-flex justify-content-end">
                                            <div class="form-group">
                                                <strong>Bulan:</strong>
                                                {!! Form::month('month', null, array('placeholder' => 'Bulan','class' => 'form-control form-control-solid','required' => '')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Report Bulanan</button>
                                    {{-- {!! Form::close() !!} --}}
                                </form>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add user-->
                             <a href="{{ route('debitkredit-harian.reportpdf')}}" target="_blank" class="btn btn-info">Report Harian</a>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add user-->
                             <a href="{{ route('debitkredit.create')}}" class="btn btn-primary">Buat Debit Kredit</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-debitkredit">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">ID</th>
                                <th class="min-w-125px">Tanggal</th>
                                <th class="min-w-125px">Nama User</th>
                                <th class="min-w-125px">Keterangan</th>
                                <th class="min-w-125px">Jenis Transaksi</th>
                                <th class="min-w-125px">jumlah</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold" id="myTable">
                            <!--begin::Table row-->
                            @foreach ($debitkredits as $key => $debitkredit)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $debitkredit->tgl_input }} </td>
                                <td>{{ $debitkredit->user->name }}</td>
                                <td>{{ $debitkredit->keterangan }} </td>
                                <td> 
                                    @if ($debitkredit->jenis_saldo=='debit')
                                        <label class="badge badge-success">Debit</label>
                                        @else
                                        <label class="badge badge-danger">Kredit</label>
                                    @endif
                                </td>
                                <td>{{ $debitkredit->jumlah }} </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        @can('debitkredit')
                                        <div class="menu-item px-3">
                                            <a href="{{ route('debitkredit.edit',$debitkredit->id) }}" class="menu-link px-3">Edit</a>
                                        </div>
                                        @endcan
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            @can('debitkredit')
                                            <a href="{{ route('debitkredit.delete',$debitkredit->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                                            @endcan
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection


@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        var xin_table = $('#table-debitkredit').DataTable();
    </script>

@endsection
