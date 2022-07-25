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
                         <a href="{{ route('pengiriman-rajao.index')}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-5">
            {!! Form::model($data, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['pengiriman-rajao.update', $data->id]]) !!}
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Origin Pos:</strong><br>
                      <select class="form-select origin_id" name="origin_id" aria-label="Default select example">
                        <option value="{{$data->origin_id}}" selected>{{$data->origin->nama_lokasi}}</option>
                          @foreach ($origin as $item)
                          <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Pengirim:</strong><br>
                      <select class="form-select refpengiriman" name="pengirim_id" aria-label="Default select example" required>
                        <option value="{{$data->pengirim_id}}" selected>{{$data->pengirim->nama}}</option>
                      </select>
                      <a href="{{ route('client.edit',$data->pengirim_id) }}" target="_blank" class="btn btn-primary">Edit Pengirim</a>
                      <button type="button" name="refpengiriman" class="btn btn-info">Refresh</button>
  
                      <h6>Data Pengirim</h6>
                      <div id="ketpengirim">
                        <li>{{$data->pengirim->nama}}</li>
                        <li>{{$data->pengirim->nama_provinsi}}</li>
                        <li>{{$data->pengirim->nama_kabupaten}}</li>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Penerima:</strong><br>
                      <select class="form-select refpengiriman" name="penerima_id" aria-label="Default select example" required>
                        <option value="{{$data->penerima_id}}" selected>{{$data->penerima->nama}}</option>
                      </select>
                      <a href="{{ route('client.edit',$data->penerima_id) }}" target="_blank" class="btn btn-primary">Edit Penerima</a>
                      <button type="button" name="refpenerima" class="btn btn-info">Refresh</button>
  
                      <h6>Data Penerima</h6>
                      <div id="ketpenerima">
                        <li>{{$data->pengirim->nama}}</li>
                        <li>{{$data->pengirim->nama_provinsi}}</li>
                        <li>{{$data->pengirim->nama_kabupaten}}</li>
                      </div>
                  </div>
              </div>
             
            <div class="row">
                <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Resi / No.STT <label class="required fs-6"></label> {{$data->nomor_resi}}</strong>
                        </div>
                        <div class="form-group">
                            <strong>Dimensi <label class="required fs-6"></label></strong>
                            <div class="row">
                              <div class="col-3">
                                {!! Form::number('panjang', $data->panjang, array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                              </div>
                              <div class="col-3">
                                {!! Form::number('lebar', $data->lebar, array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                              </div>
                              <div class="col-3">
                                {!! Form::number('tinggi', $data->tinggi, array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                              </div>
                              <div class="col-3">
                                {!! Form::number('jumlah',$data->jumlah, array('placeholder' => 'qty','class' => 'form-control')) !!} jumlah
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <strong>KURIR</strong>
                                <select class="form-select kurir" name="courier" required>
                                    <option value="{{$data->courier}}" selected>{{$data->courier}} </option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>
                          <div class="form-group">
                            <label class="font-weight-bold">BERAT (GRAM)</label>
                            <input type="number" class="form-control" name="weight" id="weight" value="{{$data->weight}}" required>
                        </div>
                        <div class="form-group">
                            <strong>Keterangan Isi Paket </strong><br>
                            <textarea class="form-control form-control-solid" rows="3" name="keterangan" style="height: 115px;" required>{{$data->keterangan}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <strong>Biaya per gr: lama </strong>
                                <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="cost" placeholder="tarif"  required/>
                            </div>
                            <div class="py-3">
                            <button class="btn btn-md btn-primary" type="submit">update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
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
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
        //active select2
        $(".origin_id ,.refpengiriman , .provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'bootstrap5',width:'style',
        });
        //ajak pengirim
        $('button[name="refpengiriman"]').on('click', function () {
                jQuery.ajax({
                    url: '/getpengirim',
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('#ketpengirim').empty();
                        $('select[name="pengirim_id"]').empty();
                        $('select[name="pengirim_id"]').append('<option value="">-- pilih Pengirim --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="pengirim_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
        });
        $('select[name="pengirim_id"]').on('change', function () {
            let pengirim_id = $(this).val();
            if (pengirim_id) {
                jQuery.ajax({
                    url: '/getpengirim/'+pengirim_id,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                         $('#ketpengirim').empty();
                             console.log(response.nama_kabupaten);
                            $('#ketpengirim').append(
                                '<li>nama:'+response.nama+'</li>'
                                +'<li>Provinsi :'+response.nama_provinsi+'</li>'
                                +'<li>Kabupaten :'+response.nama_kabupaten+'</li>'
                                
                                    );
                    },
                });
            } else {
                $('select[name="ketpengirim"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        $("#resi").val(new Date().getTime());

        //end pengirim
        //ajak penerima
        $('button[name="refpenerima"]').on('click', function () {
                        jQuery.ajax({
                            url: '/getpengirim',
                            type: "GET",
                            dataType: "json",
                            success: function (response) {
                                $('#ketpenerima').empty();
                                $('select[name="penerima_id"]').empty();
                                $('select[name="penerima_id"]').append('<option value="">-- pilih Penerima --</option>');
                                $.each(response, function (key, value) {
                                    $('select[name="penerima_id"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                });
                $('select[name="penerima_id"]').on('change', function () {
                    let pengirim_id = $(this).val();
                    if (pengirim_id) {
                        jQuery.ajax({
                            url: '/getpengirim/'+pengirim_id,
                            type: "GET",
                            dataType: "json",
                            success: function (response) {
                                    console.log(response.nama_kabupaten);
                                    $('#ketpenerima').append(
                                        '<li>nama:'+response.nama+'</li>'
                                        +'<li>Provinsi :'+response.nama_provinsi+'</li>'
                                        +'<li>Kabupaten :'+response.nama_kabupaten+'</li>'
                                        
                                            );
                            },
                        });
                    } else {
                        $('select[name="ketpenerima"]').append('<option value="">-- pilih kota asal --</option>');
                    }
                });
                //end penerima
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
                            $('#ongkir').append('<li class="list-group-item">'+response.code.toUpperCase()+' : <strong>'+response.name+'<br>layanan:' +value.service[0]+'<br> Rp.'+value.cost[0].value+'</strong>')
                        });
                        
                    }
                }
            });

        });

    });
</script>
 