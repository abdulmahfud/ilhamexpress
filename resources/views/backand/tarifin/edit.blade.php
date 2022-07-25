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
                <small class="text-muted fs-7 fw-bold my-1 ms-1"> tarifin</small>
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
                             <a href="{{ route('tarifin.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                {!! Form::model($tarifin, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['tarifin.update', $tarifin->id]]) !!}
                <div class="row">
                    <div class="form-group col-3">
                        <div class="form-group">
                            <strong>Origin:</strong>
                            <hr><br>
                            <select class="form-select origin_id" name="origin_id" aria-label="Default select example">
                                <option value="{{$tarifin->origin_id}}" selected>{{$tarifin->origin->nama_lokasi}}</option>
                                @foreach ($origin as $item)
                                <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-group">
                            <strong>Country:</strong>
                            <hr><br>
                            <select class="form-select origin_id" name="countries_id" aria-label="Default select example">
                                <option value="{{$tarifin->countries_id}}" selected>{{$tarifin->countries->country_name}}/{{$tarifin->countries->country_code}}</option>
                                @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->country_name}}/{{$item->country_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-group">
                            <strong>Courier:</strong>
                            <hr><br>
                            <select class="form-select origin_id" name="courires_id" aria-label="Default select example">
                                <option value="{{$tarifin->courires_id}}" selected>{{$tarifin->courires->courier_name}}</option>
                                @foreach ($courires as $item)
                                <option value="{{$item->id}}">{{$item->courier_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="form-group col-3">
                          <label for="tbxStart">Start (Kg)</label>
                          <input class="form-control" type="number" name="min" value="{{$tarifin->min}}">
                        </div>
                        <div class="form-group col-3">
                          <label for="tbxEnd">End (Kg)</label>
                          <input class="form-control" type="number" name="max" value="{{$tarifin->max}}">
                        </div>
                        <div class="form-group col-3">
                            <strong>cost:</strong>
                            <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="cost" value="{{$tarifin->cost}}"/>
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
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>

<script>
    $(document).ready(function(){
        //active select2
        $(".origin_id").select2({
            theme:'bootstrap5',width:'style',
        });
    });
</script>