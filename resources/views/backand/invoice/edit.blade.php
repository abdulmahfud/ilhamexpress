@extends('layouts.main_layout')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit 
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1"> Client</small>
                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
           
        </div>
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                             <a href="{{ route('client.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                {!! Form::model($client, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['client.update', $client->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>nik:</strong>
                            {!! Form::number('nik', null, array('placeholder' => 'nik','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>nama_lengkap:</strong>
                            {!! Form::text('nama_lengkap', null, array('placeholder' => 'nama_lengkap','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>alamat:</strong>
                            <textarea class="form-control form-control-solid mb-8" rows="5" data-kt-element="input" name="alamat" placeholder="alamat"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>no_hp:</strong>
                            {!! Form::number('no_hp', null, array('placeholder' => 'no hp','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pt-7">
                        <button type="submit" class="btn btn-sm fw-bolder btn-primary">Simpan</button>
                    </div>   
                     
                </div>
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection