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
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

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
          <div class="row mb-5">
            <div class="card p-10">
                <!--begin::Card title-->
                <div class="card-title">
                    <div class="">
                    <!--begin::Title-->
                      <h2 class="active-title fw-bolder  ">Update Posisi Cargo
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isikan Data Pengirim Anda"></i></h2>
                      </div>
                      <!--end::Title-->
                    <!--end::Heading-->
                </div>
                <form  method="POST" action={{ route('cargo.saveUpdatePosisi')}}>

                  <div class="card-body">
                    {!! Form::token() !!} {{-- csrf protection --}}
                    <div class="row">
                      <div class="col-4">
                        <div class="row mb-7">
                          <div class="form-group">
                            <strong>Nomor Resi<label class="required fs-6 mb-4"></label></strong> 
                            <select class="form-select status bg-light-warning" name="no_resi" id="no_resi"></select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group">
                            <strong>Catatan</strong><br>
                            <textarea class="form-control form-control-solid" rows="3" name="catatan" placeholder="Catatan" style="height: 200px;" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="row ">
                          <strong>Status<label class="required fs-6"></label></strong>
                          <select class="form-select status bg-light-warning" name="status" id="status" data-placeholder="Select an option" required>
                            <option value="process" selected>Process</option>
                            <option value="on-delivery" >On Delivery</option>
                            <option value="delivered" >Delivered</option>
                            <option value="resend" >Resend</option>
                          </select></div>
                      </div>
                      <div class="col-4">
                        <div class="row mb-3">
                          <div class="form-group">
                            <strong>Diterima oleh<label class="required fs-6"></label></strong>
                            {!! Form::text('nama_penerima', old('nama_penerima'), array('placeholder' => '', 'required' =>'required', 'class' => 'form-control', 'id' =>'nama_penerima')) !!}
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group">
                            <strong>No. Hp penerima<label class="required fs-6"></label></strong>
                            {!! Form::text('nohp_penerima', old('nohp_penerima'), array('placeholder' => '','class' => 'form-control', 'id' =>'nohp_penerima')) !!}
                          </div>
                        </div>
                        {{-- <div class="row mb-3">
                          <div class="form-group">
                            <strong>Dokumen<label class="required fs-6"></label></strong>
                            {!! Form::file('dokumen', old('dokumen'), array('placeholder' => '','class' => 'form-control', 'id' =>'dokumen')) !!}
                          </div>
                        </div> --}}
                      </div>
                      <div class="col-2">
                        <div class="row mb-3">

                        </div>
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="text-center">
                        <button type="submit" class="btn btn-md btn-primary me-3">Submit</button>

    
                      </div>

                    </div>
                  </div>
                </form>
            </div>
          </div>

          <div class="row">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                  <!--begin::Card title-->
                  <div class="card-title">
                    <!--begin::Search-->
                    {{-- <div class="d-flex align-items-center position-relative my-1">
                      <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                      <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                          <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <input type="text" id="myInput" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                    </div> --}}
                    <!--end::Search-->
                  </div>
                  <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                  
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Table-->
                  <table class="" id="table_cargo">
                    <!--begin::Table head-->
                    <thead>
                      <!--begin::Table row-->
                      <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Resi</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Diterima</th>
                        <th class="min-w-125px">Catatan</th>
                      </tr>
                      <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="myTable">
                      <!--begin::Table row-->
                      @foreach ($tracking as $key => $tracking)
                    <tr>
                      <td>{{ $tracking->no_resi }}</td>
                      <td>  <label class="badge badge-success">{{ $tracking->status }}</label>
                       </td>
                      <td>{{ $tracking->nama_penerima }}<br>{{ $tracking->nohp_penerima }}</td>
                      <td>{{ $tracking->catatan }} </td>
                      </tr>
                    @endforeach

                    <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                  </table>
                  
                  <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            
          </div>
      </div>
  </div>
</div>

@endsection
@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatable.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-pengiriman.js')}}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    {{-- <script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script> --}}
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('#table_cargo').DataTable( {
                "scrollX": true,
            });
      });
    </script>
    <script>
        $('#no_resi').select2({
            placeholder: "Search Resi",
            minimumInputLength: 2,
            ajax: {
                url: '/cargo/resi',
                dataType: 'json',
                data: function (params) {
                  return {
                    q: $.trim(params.term)
                  };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
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