@extends('layouts.main_layout')
@section('css')
<style>
  .zero-padd-horizon {
    padding-left: -500;
    padding-right: -500;
    margin-left: -500;
    margin-right: -500;
  }

  .active-title {
   color:  #009EF7
  }
</style>
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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Cargo
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">Cargo</small>
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
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                         <a href="{{ url('datapengiriman')}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-5">
            {!! Form::model($data, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['datapengiriman.update', $data->id]]) !!}
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pos Pengirim Exspres:</strong>
                    <select class="form-select" name="origin_id" aria-label="Default select example">
                      <option value="{{$data->origin_id}}" selected>{{$data->origin->nama_lokasi}}</option>
                        @foreach ($origin as $item)
                        <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengirim sudah ada:</strong>
                    <select class="form-select" name="pengirim_id" aria-label="Default select example">
                      <option value="{{$data->pengirim_id}}" selected>{{$data->pengirim->nama}}</option>
                        @foreach ($pengirim as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Penerima Sudah ada:</strong>
                  <select class="form-select" name="penerima_id" aria-label="Default select example">
                    <option value="{{$data->penerima_id}}" selected>{{$data->penerima->nama}}</option>
                      @foreach ($pengirim as $item)
                      <option>Pilih Pengirim</option>
                      <option value="{{$item->id}}">{{$item->nama}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="row mb-3">
                <div class="form-group">
                  <strong>Resi / No.STT <label class="required fs-6"></label></strong>
                  <h6 class="card bg-light">{{$data->nomor_resi}}</h6>
                </div>
              </div>
              <div class="row mb-3">
                <div class="form-group">
                  <strong>Dimensi <label class="required fs-6"></label></strong>
                  <div class="row">
                    <div class="col-4">
                      {!! Form::number('panjang', old('panjang'), array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                    </div>
                    <div class="col-4">
                      {!! Form::number('lebar', old('lebar'), array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                    </div>
                    <div class="col-4">
                      {!! Form::number('tinggi', old('tinggi'), array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                    </div>

                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="form-group">
                  <strong>Volume <label class="required fs-6"></label>{{ $data->panjang*  $data->lebar* $data->tinggi}}</strong>
                </div>
              </div>
              <div class="row mb-3">
                <div class="form-group">
                  <strong>Jumlah <label class="required fs-6"></label></strong>
                  {!! Form::number('jumlah', old('jumlah'), array('placeholder' => 'jumlah','class' => 'form-control', 'id' =>'jumlah')) !!}
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="form-group">
                    <strong>layanan:</strong>
                    <select class="form-select" name="service" aria-label="Default select example">
                      <option value="{{$data->service}}" selected>{{$data->service}}</option>
                        <option value="darat">darat</option>
                        <option value="laut">laut</option>
                        <option value="udara">udara</option>
                    </select>
                </div>
            </div>
              <div class="row mb-3">
                <div class="form-group">
                  <strong>Berat <label class="required fs-6"></label></strong>
                  {!! Form::number('berat', old('berat'), array('placeholder' => 'berat','class' => 'form-control')) !!}
                </div>
              </div>
            </div>
          
            <div class="mb-3 pt-5 pb-5">
              <div class="form-group">
                <strong>Total Biaya </strong>
                <h5>@currency($data->total_biaya)</h5>
              </div>
            </div>

            <div class="row mb-3 pt-5 pb-5">
              <div class="form-group">
                <strong>Keterangan Isi Paket </strong><br>
                <textarea class="form-control form-control-solid" rows="3" name="keterangan"  style="height: 115px;" required> {{ $data->keterangan}}</textarea>
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
</div>

@endsection

@section('js')

<script>
  $("#kt_datatable_example_5").DataTable({
    "language": {
      "lengthMenu": "Show _MENU_",
    },
    "dom":
    "<'row'" +
    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
     ">" +
     
     "<'table-responsive'tr>" +
     
     "<'row'" +
     "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
     "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
     ">"
    });
  </script>
		<script src="{{ asset('assets/js/custom/modals/create-pengiriman.js')}}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		{{-- <script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script> --}}
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
<script>
  // get data province
  function getDataProvince(className) {
    $.ajax({
          type: 'GET',
          url: '/address/provinces',
          dataType: 'json',
          success: function(data) {
              console.log(data)
              $(className).empty();
              $(".cities").empty().append("<option value=''>Select City</option>");
              $(className).append("<option value=''>Select Provinsi</option>");
              for (let i = 0; i < data.length; i++) {
                  $(className).append("<option value=" + data[i].id + ">" + data[i].name + "</option>");
              }
              $('.my-select2').select2();
          },
          error: function(data) {
              console.log(data);
          }
      });

  }
  getDataProvince(".province_pengirim");
  getDataProvince(".province_penerima");
  
  $(".province_pengirim").on("change", function() {
    var prov_id = this.value;
    getCity(prov_id, ".cities_pengirim")
  });
  $(".cities_pengirim").on("change", function() {
    var city_id = this.value;
    getDistrict(city_id, ".districts_pengirim")
  });
  $(".province_penerima").on("change", function() {
    var prov_id = this.value;
    getCity(prov_id, ".cities_penerima")
  });
  $(".cities_penerima").on("change", function() {
    var city_id = this.value;
    getDistrict(city_id, ".districts_penerima")
  });
  $(".districts_penerima").on("change", function() {
    var district_id = this.value;
    getVillage(district_id, ".vilages_penerima")
  });
  function getCity(prov_id, className) {
    // alert(country_id)
      $.ajax({
          type: 'GET',
          url: '/address/cities/' + prov_id,
          dataType: 'json',
          success: function(data) {
              $(className).empty();
              $(className).append("<option value=''>Select Kota/Kabupaten</option>");
              for (let i = 0; i < data.length; i++) {
                  $(className).append("<option value=" + data[i].id + ">" + data[i].name + "</option>");
              }
              $('.my-select2').select2();
          },
          error: function(data) {
              console.log(data);
          }
      });
  }
  function getDistrict(city_id, className) {
      $.ajax({
          type: 'GET',
          url: '/address/districts/' + city_id,
          dataType: 'json',
          success: function(data) {
              $(className).empty();
              $(className).append("<option value=''>Select Kecamatan</option>");
              for (let i = 0; i < data.length; i++) {
                  $(className).append("<option value=" + data[i].id + ">" + data[i].name + "</option>");
              }
              $('.my-select2').select2();
          },
          error: function(data) {
              console.log(data);
          }
      });
  }
  function getVillage(district_id, className) {
      $.ajax({
          type: 'GET',
          url: '/address/villages/' + district_id,
          dataType: 'json',
          success: function(data) {
              $(className).empty();
              $(className).append("<option value=''>Select Desa</option>");
              for (let i = 0; i < data.length; i++) {
                  $(className).append("<option value=" + data[i].id + ">" + data[i].name + "</option>");
              }
              $('.my-select2').select2();
          },
          error: function(data) {
              console.log(data);
          }
      });
  }
</script>
@endsection