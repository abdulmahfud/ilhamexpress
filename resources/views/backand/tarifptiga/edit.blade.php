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
                <small class="text-muted fs-7 fw-bold my-1 ms-1"> tarif</small>
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
                             <a href="{{ route('tarif.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
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
                     
                <div class="card-body py-5">
                {!! Form::model($tarif, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['tarif-rajao.update', $tarif->id]]) !!}
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3>ORIGIN</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label class="font-weight-bold">PROVINSI ASAL</label>
                                        <select class="form-select provinsi-asal" name="province_origin">
                                            <option value="0">-- pilih provinsi asal --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province  }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">KOTA / KABUPATEN ASAL</label>
                                        <select class="form-select kota-asal" name="city_origin">
                                            <option value="">-- pilih kota asal --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3>DESTINATION</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label class="font-weight-bold">PROVINSI TUJUAN</label>
                                        <select class="form-select provinsi-tujuan" name="province_destination">
                                            <option value="0">-- pilih provinsi tujuan --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province  }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>
                                        <select class="form-select kota-tujuan" name="city_destination">
                                            <option value="">-- pilih kota tujuan --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3>KURIR</h3>
                                    <hr>
                                    
                                    <div class="form-group">
                                        <label>KURIR</label>
                                        <select class="form-select kurir" name="courier">
                                            <option value="{{$tarif->courier}}" selected>{{$tarif->courier}}</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">BERAT (GRAM)</label>
                                        <input type="number" class="form-control" name="weight" id="weight" value="{{$tarif->weight}}">
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <ul class="list-group list-group-flush ongkir">
                                        <li class="list-group-item" id="ongkir">An item</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button class="btn btn-md btn-info" id="btn-check">CEK ONGKOS KIRIM</button>
                            </div>
                        </div>
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="editdata" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Edit Data
                                </label>
                            </div>
                            </div> --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>KOTA / KABUPATEN ASAL:</strong>
                                    <input type="text" class="form-control form-control-solid mb-2" value="{{$tarif->city_origin}}" readonly />
                                </div>
                            </div><div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>KOTA / KABUPATEN TUJUAN:</strong>
                                    <input type="text" class="form-control form-control-solid mb-2" value="{{$tarif->city_destination}}" readonly />
                                </div>
                            </div>
                        </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Origin Pos:</strong>
                                    <select class="form-select" name="origin_id" aria-label="Default select example">
                                        <option selected value="{{$tarif->origin->id}}">{{$tarif->origin->nama_lokasi}}</option>
                                        @foreach ($origin as $item)
                                        <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Up Biaya:</strong>
                                    <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="cost" value="{{$tarif->cost}}" />
                                </div>
                            </div>
                    <div class="d-flex justify-content-end pt-7">
                        <button type="submit" class="btn btn-sm fw-bolder btn-primary">Update</button>
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
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'bootstrap5',width:'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('#btn-check').click(function (e) {
            e.preventDefault();

            let token            = $("meta[name='csrf-token']").attr("content");
            let city_origin      = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier          = $('select[name=courier]').val();
            let weight           = $('#weight').val();
            if(isProcessing){
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: '/ongkir',
                data: {
                    _token:              token,
                    city_origin:         city_origin,
                    city_destination:    city_destination,
                    courier:             courier,
                    weight:              weight,
                },
                dataType: "json",
                type: "GET",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        console.log(response);
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response ['costs'], function (key, value) {
                            $('#ongkir').append('<li class="list-group-item">'+response.code.toUpperCase()+' : <strong>'+response.name+'layanan' +value.service[0]+'Rp.'+value.cost[0].value+'('+value.cost[0].etd+' hari)</strong>' )
                        });
                    }
                }
            });

        });

    });
</script>