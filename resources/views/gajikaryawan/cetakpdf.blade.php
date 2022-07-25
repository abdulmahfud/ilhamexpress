@extends('layouts.main_layout')
@section('content')

<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Gaji Karyawan
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <small class="text-muted fs-7 fw-bold my-1 ms-1">Report </small>
            <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid mt-10" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add user-->
                            <a class="btn btn-danger" href="{{ route('gajikaryawan.index') }}"> Kembali</a>

                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-15">
                    <!--begin::Table-->
                <form method="GET" target="_blank" action="{{ route('gajikaryawan.reportpdf') }}">
                {{-- {!! Form::open(array('route' => 'gajikaryawan.reportpdf','method'=>'GET')) !!} --}}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Bulan Gajian:</strong>
                                {!! Form::month('month', null, array('placeholder' => 'Tgl Gajian','class' => 'form-control form-control-solid')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Karyawan</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Karyawan"></i>
                                </label>
                                <select class="form-select" name="user" id="user"data-control="select2" data-placeholder="Select an option">
                                    <option selected value="">Pilih Karyawan</option>
                                    @foreach($users as $v)
                                    <option value="{{$v->id}}">{{$v->name}} - {{ $v->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 "> &nbsp;&nbsp;
                            <button type="submit" class="btn btn-info">Cetak Report Gaji Karyawan</button>
                        </div>
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </form>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->




@endsection
