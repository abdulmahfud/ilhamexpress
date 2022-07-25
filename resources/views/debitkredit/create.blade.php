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

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
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
                            <a class="btn btn-primary" href="{{ route('debitkredit.index') }}"> Kembali</a>

                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    {!! Form::open(array('route' => 'debitkredit.store','method'=>'POST')) !!}
                    <input type="hidden" name="user" value="{{ Auth::user()->id}}">

                    <div class="row">
                        {{--  <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">User</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Karyawan"></i>
                                </label>
                                <select class="form-select"  name="user"  id="user"data-control="select2" data-placeholder="Select an option" required>
                                    <option selected>Pilih User</option>
                                    @foreach($users as $v)
                                    <option value="{{$v->id}}" {{ (old("user") == $v->id) ? "selected":"" }}>{{$v->name}} - {{ $v->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  --}}
                        
                        <div class="col-xs-6 col-sm- col-md-6 mb-2">
                            <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Jenis Saldo</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Jenis saldo"></i>
                                </label>
                                <select class="form-select" name="jenis_saldo" id="jenis_saldo"data-control="select2" data-placeholder="Select an option" required>
                                    <option selected>Pilih Jenis Saldo</option>
                                    <option value="debit" {{ (old("jenis_saldo") == "debit") ? "selected":"" }}>Debit</option>
                                    <option value="kredit" {{ (old("jenis_saldo") == "kredit") ? "selected":"" }}>Kredit</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Tangal:</strong>
                                {!! Form::date('tgl_input', null, array('placeholder' => 'Tgl input','class' => 'form-control form-control-solid')) !!}
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm- col-md-6 mb-2">
                            <div class="form-group">
                                <strong>jumlah:</strong>
                                {!! Form::number('jumlah', old('jumlah'), array('placeholder' => 'jumlah','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm- col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Keterangan:</strong>
                                {!! Form::text('keterangan', old('keterangan'), array('placeholder' => 'Keterangan','class' => 'form-control')) !!}
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
