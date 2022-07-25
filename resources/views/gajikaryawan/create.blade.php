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

@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
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
                            <a class="btn btn-primary" href="{{ route('gajikaryawan.index') }}"> Kembali</a>

                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-15">
                    <!--begin::Table-->
                    {!! Form::open(array('route' => 'gajikaryawan.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Tgl Gajian:</strong>
                                {!! Form::date('tgl_gaji', null, array('placeholder' => 'Tgl Gajian','class' => 'form-control form-control-solid')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Karyawan</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Karyawan"></i>
                                </label>
                                <select class="form-select" name="user" id="user"data-control="select2" data-placeholder="Select an option" required>
                                    <option selected>Pilih Karyawan</option>
                                    @foreach($users as $v)
                                    <option value="{{$v->id}}">{{$v->name}} - {{ $v->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Gaji Pokok:</strong>
                                <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="gaji_pokok" placeholder="gaji_pokok" />
                                
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
