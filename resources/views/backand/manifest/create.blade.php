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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tambah
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Manifast</small>
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
                             <a href="{{ route('manifest.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                
                @if (count($errors) > 0)
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">...</span>
                    <!--end::Icon-->
                
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h4 class="mb-2 light">There were some problems with your input</h4>
                        <!--end::Title-->
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <!--end::Wrapper-->
                
                    <!--begin::Close-->
                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-2x svg-icon-light">...</span>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->
                @endif
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                 

                {!! Form::open(array('route' => 'manifest.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
                {{csrf_field()}}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nomor Manifest:</strong>
                            <input type="text" value="MFS-{{ $nomor_manifest}}" disabled></input>
                            <input type="text" name="nomor_manifest" value="{{ $nomor_manifest}}" hidden></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Tanggal kirim:</strong>
                        <input type="date" name="tgl_kirim" id="" class="form-control" placeholder="tgl_kirim" aria-describedby="helpId">
                      </div>
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Driver</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your payment statements may very based on selected country"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select name="nama_driver" data-control="select2"   data-placeholder="Pilih Pegawai..." class="form-select form-select-solid">
                            <option value="">Pilih Pegawai...</option>
                            @foreach ($user as $item)
                            <option value="{{ $item->name}}"> {{ $item->name}}</option>
                            @endforeach
                        </select>
                        <!--end::Select-->
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <strong>Tujuan:</strong>
                      <input type="text" name="tujuan" id="" class="form-control" placeholder="tujuan" aria-describedby="helpId">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No Hp(+62):</strong>
                            {!! Form::number('no_hp', null, array('placeholder' => '8232323Xxxx','class' => 'form-control')) !!}
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

