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
                <small class="text-muted fs-7 fw-bold my-1 ms-1"> Client</small>
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
                             <a href="{{ route('client.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                {!! Form::model($client, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['client.update', $client->id]]) !!}
                    <input type="hidden" name="id_user" value="{{ $client->id_user }}">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>nama_lengkap:</strong>
                            {!! Form::text('name', $client->nama, array('placeholder' => 'nama_lengkap','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', $client->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                       
                        <div class="form-group">
                            <strong>alamat:</strong>
                            <textarea class="form-control form-control-solid mb-8" rows="5" data-kt-element="input" name="alamat"  > {{ $client->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>kodepos:</strong>
                            {!! Form::number('kodepos', null, array('placeholder' => 'xxxxx','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No Hp(+62):</strong>
                            {!! Form::number('no_hp', null, array('placeholder' => '8232323Xxxx','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h6>Data Sebelumnya:</h6>
                        <td>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Desa.{{$client->nama_desa}}/kodepos:{{$client->kodepos}}</li>
                              <li class="list-group-item"> Kec.{{$client->nama_kecamatan}}</li>
                              <li class="list-group-item">Kab.{{$client->nama_kabupaten}}</li>
                              <li class="list-group-item">Prov.{{$client->nama_provinsi}}</li>
                            </ul>
                        </td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="editdata">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ubah Data dibawah ini
                            </label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="negara">Negara</label>
                            <select name="countries_id" class="form-control">
                              <option value="">- pilih negara -</option>
                              @foreach ($countries as $item)
                              <option value="{{$item->id}}">{{$item->country_name}}/{{$item->country_code}}</option>
                              @endforeach
                            </select>
                            </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="">Provinsi</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi"></i>
                            </label>
                            <select class="my-select2 form-select province_penerima" name="nama_provinsi" id="provinsi_penerima" data-placeholder="Select an option"  >
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="">Kabupaten/Kota</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kota"></i>
                            </label>
                            <select class="my-select2 cities_penerima form-select" name="nama_kabupaten" id="kota_penerima"data-control="select2" data-placeholder="Select an option"  >
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-6">
                          <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="">Kecamatan</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kecamatan"></i>
                            </label>
                            <select class="my-select2 districts_penerima form-select" name="nama_kecamatan" id="kecamatan_penerima"data-control="select2" data-placeholder="Select an option"  >
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="">Desa</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="desa"></i>
                            </label>
                            <select class="my-select2 vilages_penerima form-select" name="nama_desa" id="desa_penerima"data-control="select2" data-placeholder="Select an option"  >
                            </select>
                          </div>
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