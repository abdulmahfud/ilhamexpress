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
                {!! Form::model($tarif, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['tarif.update', $tarif->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>asal:</strong>
                            <select class="form-select" name="origin_id" aria-label="Default select example">
                                <option value="{{$tarif->id}}" selected>{{$tarif->origin->nama_lokasi}}</option>
                                @foreach ($origin as $item)
                                <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong for="">Tujuan </strong>
                      <h6>{!!$tarif->tujuan!!} </h6> 
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="1" name="edittujuan" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                                 Edit tujuan
                             </label>
                         </div>
                        <div class="row mb-3">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Provinsi</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi"></i>
                                </label>
                                <select class="my-select2 form-select province_pengirim" name="nama_provinsi_pengirim" id="provinsi_pengirim" data-placeholder="Select an option">
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Kabupaten/Kota</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kota"></i>
                                </label>
                                <select class="my-select2 cities_pengirim form-select" name="nama_kabupaten_pengirim" id="kota_pengirim"data-control="select2" data-placeholder="Select an option" >
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Kecamatan</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kecamatan"></i>
                                </label>
                                <select class="my-select2 districts_pengirim form-select" name="nama_kecamatan_pengirim" id="kecamatan_pengirim"data-control="select2" data-placeholder="Select an option" >
                                </select>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>layanan:</strong>
                            <select class="form-select" name="layanan" aria-label="Default select example">
                                <option value="{{ $tarif->layanan }}" selected>{{ $tarif->layanan }}</option>
                                <option value="darat">darat</option>
                                <option value="laut">laut</option>
                                <option value="udara">udara</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                          <label for="tbxStart">Start (kg)</label>
                          <input class="form-control" type="number" value="{{ $tarif->min_kg }}" name="min_kg">
                        </div>
                        <div class="form-group col-6">
                          <label for="tbxEnd">End (kg)</label>
                          <input class="form-control" type="number" value="{{ $tarif->max_kg }}" name="max_kg">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>tarif:</strong>
                            <input type="text" class="form-control form-control-solid mb-2" value="{{ $tarif->tarif }}" onkeyup="convertToRupiah(this)" name="tarif" placeholder="tarif" />
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


@section('js')
<script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/create-pengiriman.js')}}"></script>
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
  getDataProvince(".province_pengirim");
  
  $(".province_pengirim").on("change", function() {
    var prov_id = this.value;
    getCity(prov_id, ".cities_pengirim")
  });
  // total biaya changes
  var jumlah;
  var hargaBarang;
  $('input[name=harga_barang]').change(function() { 
    hargaBarang = this.value;
    jumlah = $('input[name=jumlah]').val();
    console.log({hargaBarang, jumlah, pro: "harga"});
    if(!hargaBarang || hargaBarang==0){
      
    }else{
      var totalBiaya = jumlah * hargaBarang;
      $("#totalBiaya").text(totalBiaya);
      $('input[name=total_biaya]').val(totalBiaya);
    }
   });
  $('input[name=jumlah]').change(function() { 
    jumlah = this.value;
    hargaBarang = $('input[name=harga_barang]').val();
    console.log({hargaBarang, jumlah, pro: "jumlah"});
    if(!hargaBarang || hargaBarang==0){

    }else{
      var totalBiaya = jumlah * hargaBarang;
      $("#totalBiaya").text(totalBiaya);
      $('input[name=total_biaya]').val(totalBiaya);
    }
   });

  $("#resi").val(new Date().getTime());

  $(".cities_pengirim").on("change", function() {
    var city_id = this.value;
    getDistrict(city_id, ".districts_pengirim")
  });
  $(".province_pengirim").on("change", function() {
    var prov_id = this.value;
    getCity(prov_id, ".cities_pengirim")
  });
  $(".cities_pengirim").on("change", function() {
    var city_id = this.value;
    getDistrict(city_id, ".districts_pengirim")
  });
  $(".districts_pengirim").on("change", function() {
    var district_id = this.value;
    getVillage(district_id, ".vilages_pengirim")
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