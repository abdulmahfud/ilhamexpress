@extends('layouts.main_layout')
@section('content')

 
          


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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Debit/kredit
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Edit</small>
                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
  <!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6 mb-7">
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <a class="btn btn-primary" href="{{ route('debitkredit.index') }}"> Kembali</a>

                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                {!! Form::model($debitkredit, ['method' => 'PATCH', 'files'=> true ,'route' => ['debitkredit.update', $debitkredit->id]]) !!}
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                        <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">User</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Karyawan"></i>
                            </label>
                            <select class="form-select"  name="user"  id="user"data-control="select2" data-placeholder="Select an option" required>
                                <option selected>Pilih User</option>
                                @foreach($users as $v)
                                <option value="{{$v->id}}" <?php if ($v->id == $debitkredit->id_user) { echo "selected";} ?>>{{$v->name}} - {{ $v->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm- col-md-6 mb-2">
                        <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">Jenis Saldo</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Jenis saldo"></i>
                            </label>
                            <select class="form-select" name="jenis_saldo" id="jenis_saldo"data-control="select2" data-placeholder="Select an option" required>
                                <option selected>Pilih Jenis Saldo</option>
                                <option value="debit" {{ ($debitkredit->jenis_saldo == "debit") ? "selected":"" }}>Debit</option>
                                <option value="kredit" {{ ($debitkredit->jenis_saldo == "kredit") ? "selected":"" }}>Kredit</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                        <div class="form-group">
                            <strong>Tangal:</strong>
                            {!! Form::date('tgl_input', $debitkredit->tgl_input, array('placeholder' => 'Tgl input','class' => 'form-control form-control-solid')) !!}
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm- col-md-6 mb-2">
                        <div class="form-group">
                            <strong>Jumlah:</strong>
                            {!! Form::number('jumlah', $debitkredit->jumlah, array('placeholder' => 'jumlah','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm- col-md-6 mb-2">
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            {!! Form::text('keterangan', $debitkredit->keterangan, array('placeholder' => 'Keterangan','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pt-7">
                        <button type="submit" class="btn btn-sm fw-bolder btn-primary">Simpan</button>
                    </div> 
                </div>
                {!! Form::close() !!}

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
