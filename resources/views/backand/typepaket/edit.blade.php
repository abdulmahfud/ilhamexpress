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
                <small class="text-muted fs-7 fw-bold my-1 ms-1"> typepaket</small>
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
                             <a href="{{ route('typepaket.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                {!! Form::model($typepaket, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['typepaket.update', $typepaket->id]]) !!}
                    <input type="hidden" name="id_user" value="{{ $typepaket->id_user }}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>type paket:</strong>
                                {!! Form::text('paket_name', $typepaket->paket_name, array('placeholder' => 'paket name','class' => 'form-control')) !!}
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

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatable.js') }}"></script>
    <script>
      // $(document).ready(function() {
        $('#table_cargo').DataTable( {
                "scrollX": true
            });
      // });
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

   var dimensi_lebar;
  var dimensi_panjang;
   $('input[name=dimensi_tinggi]').change(function() { 
    dimensi_tinggi = this.value;
    dimensi_panjang = $('input[name=dimensi_panjang]').val();
    dimensi_lebar = $('input[name=dimensi_lebar]').val();
    console.log({dimensi_tinggi, dimensi_panjang, dimensi_lebar});
    
      var volume = dimensi_tinggi * dimensi_panjang* dimensi_lebar;
      $(".volume").text(volume);
   });

  $("#resi").val(new Date().getTime());

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