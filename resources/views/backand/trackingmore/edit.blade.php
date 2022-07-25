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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">Trackingmore</small>
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
                         <a href="{{ route('pengiriman-trakingmore.index')}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-5">
            {!! Form::model($records, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['pengiriman-trakingmore.update', $records->id]]) !!}
            <div class="col-md-6">
                <div class="border rounded p-2 my-1">
                    <h4>Info</h4>
                    <div class="row">
                        <div class="form-group  col-md-6">
                            <label for="txDate">Date</label>
                            <input type="date" name="txDate" class="form-control" value="{{$records->tgl_kirim}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="logistics_channel">Tipe (Domestik/International)</label>
                            <select name="logistics_channel" class="form-control origin_id">
                                <option value="{{$records->logistics_channel}}" selected>{{$records->logistics_channel}}</option>
                                <option value="">- pilih Tipe -</option>
                                <option value="domestik">Domestik</option>
                                <option value="international">International</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="origin_id">Origin</label>
                            <select name="origin_id" class="form-control origin_id" required="">
                                <option value="{{$records->origin_id}}" selected>{{$records->origin->nama_lokasi}}</option>
                                <option value="">- pilih origin/kota asal -</option>
                                @foreach ($origin as $item)
                                <option value="{{$item->id}}">{{$item->nama_lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="border p-2 rounded my-2">
                    <div class="form-group">
                        <strong>Pengirim:</strong><br>
                        <select class="form-select refpengiriman" name="pengirim_id" aria-label="Default select example" >
                            <option value="{{$records->pengirim->id}}" selected>{{$records->pengirim->nama}}</option>

                            <option value="">-- tekan tombol refresh-</option>
                        </select>
                        <button type="button" name="refpengiriman" class="btn btn-info">Refresh</button>
                        {{-- <h6>Data Pengirim</h6> --}}
                        <div id="ketpengirim"></div>
                    </div>
                         {{-- <div id="pengirimbaru">
                            <div class="form-group mt-2">
                                <label for="nama_pengirim">Nama</label>
                                <input name="nama_pengirim" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label for="email_pengirim">Email</label>
                                <input name="email_pengirim" class="form-control" type="email" >
                            </div>
                            <div class="form-group">
                                <label for="no_hp_pengirim">Telepon</label>
                                <input name="no_hp_pengirim" class="form-control" >
                            </div>
                         </div> --}}
                </div>

            </div>
            <div class="col-md-6">
                <div class="border p-2 rounded my-1">
                    <div class="form-group">
                        <strong>Penerima:</strong><br>
                        <select class="form-select refpenerima" name="penerima_id" aria-label="Default select example" >
                            <option value="{{$records->penerima->id}}" selected>{{$records->penerima->nama}}</option>
                            <option value="">-- tekan tombol refresh-</option>
                        </select>
                        <button type="button" name="refpenerima" class="btn btn-info">Refresh</button>
                        {{-- <h6>Data Penerima</h6> --}}
                        <div id="ketpenerima"></div>
                    </div>
                {{-- <div id="penerimabaru">
                    <div class="form-group mt-2">
                        <label for="nama_penerima">Nama</label>
                        <input name="nama_penerima" class="form-control"   >
                    </div>
                    <div class="form-group">
                        <label for="email_penerima">Email</label>
                        <input name="email_penerima" class="form-control" type="email" >
                    </div>
                    <div class="form-group">
                        <label for="no_hp_penerima">Telepon</label>
                        <input name="no_hp_penerima" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat_penerima" class="form-control"></textarea>
                    </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="kodepos">Kode Pos</label>
                                <input name="kodepos_penerima" class="form-control" maxlength="6">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="countries_id">Negara</label>
                                <select name="countries_id" class="form-control origin_id">
                                    <option value="">- pilih negara -</option>
                                    @foreach ($countries as $item)
                                    <option value="{{$item->id}}">{{$item->country_name}}/{{$item->country_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div> --}}
               </div>
            </div>

            <div class="col-md-12">
                <div class="border p-2 rounded my-1">
                    <h4>Detail Paket</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="courires_id">Courier</label>
                            <select name="courires_id" class="form-control origin_id" required="">
                                <option value="{{$records->courires_id}}" selected>{{$records->courier->courier_name}}</option>
                                @foreach ($courires as $item)
                                <option value="{{$item->id}}">{{$item->courier_name}}/{{$item->courier_code}}</option>
                                @endforeach
                            </select>
                            {{-- <button type="button" id="getcourier" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Load</button> --}}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="typepaket_id">Jenis Paket</label>
                            <select name="typepaket_id" class="form-control origin_id" required="">
                                <option value="{{$records->typepaket_id}}" selected>{{$records->typepaket->paket_name}}</option>
                                <option value="">- Pilih Jenis Paket -</option>
                                    @foreach ($typepaket as $item)
                                            <option value="{{$item->id}}">{{$item->paket_name}}</option>
                                    @endforeach
                                    </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="keterangan">Detail Isi</label>
                            <input name="keterangan" class="form-control" value="{{$records->keterangan}}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="berat">Berat</label>
                            <input name="berat" class="form-control" value="{{$records->berat}}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="jumlah">Pcs</label>
                            <input name="jumlah" class="form-control" value="{{$records->jumlah}}" required>
                        </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                  <strong>Dimensi <label class="required fs-6"></label></strong>
                                  <div class="row">
                                    <div class="col-3">
                                      {!! Form::number('dimensi_panjang', $records->panjang, array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                                    </div>
                                    <div class="col-3">
                                      {!! Form::number('dimensi_lebar', $records->lebar, array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                                    </div>
                                    <div class="col-3">
                                      {!! Form::number('dimensi_tinggi', $records->tinggi, array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                                    </div>
                                  </div>
                                </div>
                              </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12"> 
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Update</button>
            </div>
{!! Form::close() !!}
            </div>
        </div>
      </div>
  </div>


<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        //active select2
        $(".origin_id, .refpenerima,.refpengiriman").select2({
            theme:'bootstrap5',width:'170px',
        });
		$('button[name="refpenerima"]').on('click', function () {
                        jQuery.ajax({
                            url: '/getpengirim',
                            type: "GET",
                            dataType: "json",
                            success: function (response) {
                                $('#ketpenerima').empty();
                                $('select[name="penerima_id"]').empty();
								$("#penerimabaru :input").prop('readonly', false);
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
                                    console.log(response.negara);
									$("#penerimabaru :input").prop('readonly', true);
                                    $('#ketpenerima').append(
                                        '<li>nama:'+response.nama+'</li>'
                                        +'<li>no_hp :'+response.no_hp+'</li>'
                                        +'<li>email :'+response.email+'</li>'
                                        +'<li>alamat :'+response.alamat+'</li>'
                                        +'<li>kode_pos :'+response.kodepos+'</li>'
                                        +'<li>negara :'+response.negara+'</li>'
                                            );
                            },
                        });
                    } else {
                        $('select[name="ketpenerima"]').append('<option value="">-- pilih kota asal --</option>');
                    }
                });
                //end penerima

				 //ajak pengirim
				 $('button[name="refpengiriman"]').on('click', function () {
                jQuery.ajax({
                    url: '/getpengirim',
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('#ketpengirim').empty();
						$("#pengirimbaru :input").prop('readonly', false);
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
						 $("#pengirimbaru :input").prop('readonly', true);
                             console.log(response.nama_kabupaten);
                            $('#ketpengirim').append(
                                '<li>nama:'+response.nama+'</li>'
                                +'<li>no_hp :'+response.no_hp+'</li>'
                                +'<li>email :'+response.email+'</li>'
                                
                                    );
                    },
                });
            } else {
                $('select[name="ketpengirim"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        //end pengirim
		 
    });
</script>
 @endsection