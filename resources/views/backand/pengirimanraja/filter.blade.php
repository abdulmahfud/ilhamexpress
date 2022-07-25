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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Kelola
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">Pengiriman</small>
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
            <div class="card-body py-5">
                {!! Form::open(array('route' => 'pengiriman-rajao.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Origin Pos:</strong><br>
                    <select class="form-select origin_id" name="origin_id" aria-label="Default select example">
                        <option selected>Chosse Origin</option>
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
                        <option value="">-- tekan tombol refresh-</option>
                    </select>
                    <a href="{{route('client.create')}}" target="_blank" class="btn btn-primary">Tambah Pengirim baru</a>
                    <button type="button" name="refpengiriman" class="btn btn-info">Refresh</button>

                    <h6>Data Pengirim</h6>
                    <div id="ketpengirim"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerima:</strong><br>
                    <select class="form-select refpengiriman" name="penerima_id" aria-label="Default select example" required>
                        <option value="">-- tekan tombol refresh-</option>
                    </select>
                    <a href="{{route('client.create')}}" target="_blank" class="btn btn-primary">Tambah Penerima baru</a>
                    <button type="button" name="refpenerima" class="btn btn-info">Refresh</button>

                    <h6>Data Penerima</h6>
                    <div id="ketpenerima"></div>
                </div>
            </div>
           
        </div>
            </div>
        <div class="row">
              <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>ORIGIN</h3>
                        <hr>
                        <div class="form-group">
                            <label class="font-weight-bold">PROVINSI ASAL</label><br>
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
                            <select class="form-select provinsi-tujuan" name="province_destination" required>
                                <option value="0">-- pilih provinsi tujuan --</option>
                                @foreach ($provinces as $province => $value)
                                    <option value="{{ $province  }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>
                            <select class="form-select kota-tujuan" name="city_destination" required>
                                <option value="">-- pilih kota tujuan --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="form-group">
                      <h3>KURIR</h3>
                      <hr>
                          <select class="form-select kurir" name="courier" required>
                              <option value="0">-- pilih kurir --</option>
                              <option value="jne">JNE</option>
                              <option value="pos">POS</option>
                              <option value="tiki">TIKI</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="font-weight-bold">BERAT (GRAM)</label>
                          <input type="number" class="form-control" name="weight" id="weight" placeholder="Masukkan Berat (GRAM)" required>
                      </div>
                  </div>
                  <div class="card" style="width: 20rem;">
                      <ul class="list-group list-group-flush ongkir">
                          <li class="list-group-item" id="ongkir"></li>
                      </ul>
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
                            <strong>Resi / No.STT <label class="required fs-6"></label></strong>
                            {!! Form::text('resi', old('resi'), array('placeholder' => '{{$data->resi}}','class' => 'form-control', 'id' =>'resi' )) !!}
                        </div>
                        <div class="form-group">
                            <strong>Dimensi <label class="required fs-6"></label></strong>
                            <div class="row">
                              <div class="col-3">
                                {!! Form::number('dimensi_panjang', old('dimensi_panjang'), array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                              </div>
                              <div class="col-3">
                                {!! Form::number('dimensi_lebar', old('dimensi_lebar'), array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                              </div>
                              <div class="col-3">
                                {!! Form::number('dimensi_tinggi', old('dimensi_tinggi'), array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                              </div>
                              <div class="col-3">
                                {!! Form::number('jumlah', old('jumlah'), array('placeholder' => 'qty','class' => 'form-control')) !!} jumlah
                              </div>
                            </div>
                          </div>
                        <div class="form-group">
                            <strong>Keterangan Isi Paket </strong><br>
                            <textarea class="form-control form-control-solid" rows="3" name="keterangan" placeholder="Keterangan Isi Paket" style="height: 115px;" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="py-3">
                            <button class="btn btn-md btn-info" id="btn-check">CEK Ongkir</button>
                            </div>
                            <div class="form-group">
                                <strong>Up Biaya:</strong>
                                <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="cost" placeholder="tarif" />
                            </div>
                            <div class="py-3">
                            <button class="btn btn-md btn-primary" type="submit">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <strong>Resi / No.STT <label class="required fs-6"></label></strong>
                            {!! Form::text('resi', old('resi'), array('placeholder' => '{{$data->resi}}','class' => 'form-control', 'id' =>'resi')) !!}
                        </div>
                        <div class="form-group">
                            <strong>Dimensi <label class="required fs-6"></label></strong>
                            <div class="row">
                              <div class="col-3">
                                {!! Form::number('dimensi_panjang', old('dimensi_panjang'), array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                              </div>
                              <div class="col-3">
                                {!! Form::number('dimensi_lebar', old('dimensi_lebar'), array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                              </div>
                              <div class="col-3">
                                {!! Form::number('dimensi_tinggi', old('dimensi_tinggi'), array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                              </div>
                              <div class="col-3">
                                {!! Form::number('jumlah', old('jumlah'), array('placeholder' => '1','class' => 'form-control')) !!} jumlah
                              </div>
                            </div>
                          </div> --}}
                    </div>
                </div>
            </div>
        </div>
            </div>
          </div>
    
    {!! Form::close() !!}
</div>
</div>
            <br>
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
                  <form action="{{ route('pengiriman-rajao.filter')}}" method="get">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
                  <!--begin::Table-->
                  <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7">
                    <!--begin::Table head-->
                    <thead>
                      <!--begin::Table row-->
                      <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Resi <br> Kurir</th>
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
                       {{ $cargo->courier }}</td>
                        <td>{{ $cargo->tgl_kirim }}</td>
                        <td>{{ $cargo->keterangan }}<br>
                              <h6>Biaya: @currency($cargo->total_biaya)</h6>
                         </td>
                        <td>{{ $cargo->penerima->nama }}</td>
                        <td>
                          <div class="border-dotted">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"> {{ $cargo->penerima->alamat }}</li>
                                <li class="list-group-item">Desa.{{$cargo->penerima->nama_desa}}/kodepos:{{$cargo->penerima->kodepos}}</li>
                                <li class="list-group-item"> Kec.{{$cargo->penerima->nama_kecamatan}}</li>
                                <li class="list-group-item">Kab.{{$cargo->penerima->nama_kabupaten}}</li>
                                <li class="list-group-item">Prov.{{$cargo->penerima->nama_provinsi}}</li>
                              </ul>
                          </div>
                          <br>
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
                              <a href="{{ route('pengiriman-rajao.show',$cargo->id) }}" class="menu-link px-3">preview</a>
                            </div>
                            {{-- <div class="menu-item px-3">
                              <a href="{{ route('cargo.index',$cargo->id) }}" class="menu-link px-3">Edit</a>
                            </div> --}}
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('pengiriman-rajao.edit',$cargo->id) }}" class="menu-link px-3"  >Edit</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('pengiriman-rajao.delete',$cargo->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('pengiriman-rajao.print',$cargo->id) }}" target="_blank" class="menu-link px-3" data-kt-users-table-filter="delete_row"  >Cetak</a>
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
<script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatable.js') }}"></script>
<script>
  // $(document).ready(function() {
    $('#table_cargo').DataTable( {
            "scrollX": true
        });
  // });
</script>
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
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
                            if (value.cost[0].value==0) {
                            $('#ongkir').append('Tidak Ada')
                             }
                        });
                        
                    }
                }
            });

        });

    });
</script>