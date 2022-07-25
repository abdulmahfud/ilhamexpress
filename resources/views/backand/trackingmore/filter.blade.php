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
 
          <div class="row">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                  <!--begin::Card title-->
                  <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                      <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                      <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                          <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <input type="text" id="myInput" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                    </div>
                    <!--end::Search-->
                  </div>
                  <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        {{-- <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add user-->
                             <a href="{{ route('manifest.create')}}" class="btn btn-primary">Tambah manifest</a>
                        </div> --}}
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <form action="{{ route('cargo.filter')}}" method="get">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
                  <!--begin::Table-->
                  <table class="" id="table_cargo">
                    <!--begin::Table head-->
                    <thead>
                      <!--begin::Table row-->
                      <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Resi <br> Nama Kurir</th>
                        <th class="min-w-125px">Tanggal</th>
                        <th class="min-w-125px">Isi Barang</th>
                        <th class="min-w-125px">Penerima</th>
                        <th class="min-w-125px">Alamat</th>
                        <th class="text-end min-w-100px">Actions</th>
                      </tr>
                      <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="myTable">
                    <!--begin::Table row-->
                    @foreach ($records as $key => $cargo)

                    <tr>
                        {{-- <td>{{ $loop->iteration}}</td> --}}
                        <td>{{ $cargo->nomor_resi }} <br>
                       {{ $cargo->nama_driver }}</td>
                        <td>{{ $cargo->tgl_kirim }}</td>
                        <td>{{ $cargo->keterangan }}</td>
                        <td>{{ $cargo->penerima->nama }}</td>
                        <td>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"> {{ $cargo->penerima->alamat }}</li>
                            <li class="list-group-item">Desa.{{$cargo->penerima->nama_desa}}/kodepos:{{$cargo->penerima->kodepos}}</li>
                            <li class="list-group-item"> Kec.{{$cargo->penerima->nama_kecamatan}}</li>
                            <li class="list-group-item">Kab.{{$cargo->penerima->nama_kabupaten}}</li>
                            <li class="list-group-item">Prov.{{$cargo->penerima->nama_provinsi}}</li>
                          </ul>
                      </td>
                        <td class="text-end">
                          <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
                          <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                          <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                          </span>
                          <!--end::Svg Icon--></a>
                          <!--begin::Menu-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('cargo-detail.preview',$cargo->id) }}" class="menu-link px-3">preview</a>
                            </div>
                            {{-- <div class="menu-item px-3">
                              <a href="{{ route('cargo.index',$cargo->id) }}" class="menu-link px-3">Edit</a>
                            </div> --}}
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('cargo.edit',$cargo->id) }}" class="menu-link px-3"  >Edit</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('cargo.local.deleted',$cargo->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('cargo-detail.print',$cargo->id) }}" target="_blank" class="menu-link px-3" data-kt-users-table-filter="delete_row"  >Cetak</a>
                            </div>
                           
                            <!--end::Menu item-->
                          </div>
                          <!--end::Menu-->
                        </td>
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