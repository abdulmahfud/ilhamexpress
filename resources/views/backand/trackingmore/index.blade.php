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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
                {!! Form::open(array('route' => 'pengiriman-trakingmore.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}

								<div class="col-md-6">
									<div class="border rounded p-2 my-1">
										<h4>Info</h4>
										<div class="row">
											<div class="form-group  col-md-6">
												<label for="txDate">Date</label>
												<input type="date" name="txDate" class="form-control" required>
											</div>
											<div class="form-group col-md-6">
												<label for="logistics_channel">Tipe (Domestik/International)</label>
												<select name="logistics_channel" class="form-control origin_id">
													<option value="">- pilih Tipe -</option>
													<option value="domestik">Domestik</option>
													<option value="international">International</option>
												</select>
											</div>
                                            <div class="col-md-6 form-group">
												<label for="origin_id">Origin</label>
												<select name="origin_id" class="form-control origin_id" required="">
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
												<option value="">-- tekan tombol refresh-</option>
											</select>
											<button type="button" name="refpengiriman" class="btn btn-info">Refresh</button>
											<h6>Data Pengirim</h6>
											<div id="ketpengirim"></div>
										</div>
										 	<div id="pengirimbaru">
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
											 </div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="border p-2 rounded my-1">
										<h4>Penerima</h4>
										<div class="form-group">
											<strong>Penerima:</strong><br>
											<select class="form-select refpenerima" name="penerima_id" aria-label="Default select example" >
												<option value="">-- tekan tombol refresh-</option>
											</select>
											<button type="button" name="refpenerima" class="btn btn-info">Refresh</button>
											<h6>Data Penerima</h6>
											<div id="ketpenerima"></div>
										</div>
										<div id="penerimabaru">
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
										</div>
								   </div>
								</div>

								<div class="col-md-12">
									<div class="border p-2 rounded my-1">
										<h4>Detail Paket</h4>
										<div class="row">
											<div class="col-md-6 form-group">
												<label for="courires_id">Courier</label>
												<select name="courires_id" class="form-control origin_id" required="">
													<option selected>Chosse Courier</option>
													@foreach ($courires as $item)
													<option value="{{$item->id}}">{{$item->courier_name}}/{{$item->courier_code}}</option>
													@endforeach
												</select>
												{{-- <button type="button" id="getcourier" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Load</button> --}}
											</div>
											<div class="col-md-6 form-group">
												<label for="typepaket_id">Jenis Paket</label>
												<select name="typepaket_id" class="form-control origin_id" required="">
													<option value="">- Pilih Jenis Paket -</option>
														@foreach ($typepaket as $item)
																<option value="{{$item->id}}">{{$item->paket_name}}</option>
														@endforeach
														</select>
											</div>
											<div class="col-md-12 form-group">
												<label for="keterangan">Detail Isi</label>
												<input name="keterangan" class="form-control" required>
											</div>
											<div class="col-md-4 form-group">
												<label for="berat">Berat</label>
												<input name="berat" class="form-control" placeholder="Berat pembulatan" required>
											</div>
											<div class="col-md-4">
												<label for="jumlah">Pcs</label>
												<input name="jumlah" class="form-control" placeholder="Jumlah Paket / Koli" required>
											</div>
												<div class="row mb-3">
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
													  </div>
													</div>
												  </div>
										</div>
									</div>
								</div>
								<div class="col-md-12"> 
									<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Simpan</button>
								</div>
                {!! Form::close() !!}
            <br>
		 
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
			  <form action="{{ route('pengiriman-trakingmore.filter')}}" method="get">
				<div class="input-group mb-3">
					<input type="date" class="form-control" name="start_date">
					<input type="date" class="form-control" name="end_date">
					<button class="btn btn-primary" type="submit">Filter</button>
				</div>
			</form>
			  <!--begin::Table-->
				 
			  <table id="myInput" class="table table-striped" style="width:100%">
				<!--begin::Table head-->
				<thead>
				  <!--begin::Table row-->
				  <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
					<th class="min-w-125px">tracking_number</th>
					<th class="min-w-125px">Courier</th>
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
					<td>
						 {{ $cargo->tracking_number }}</td>
						<td>{{ $cargo->courier->courier_name }}/{{ $cargo->courier->courier_code }}</td>
					<td>{{ $cargo->tgl_kirim }}</td>
					<td>
						<li>{{ $cargo->panjang }}*{{ $cargo->lebar }}*{{ $cargo->tinggi }}</li>
						<li>{{ $cargo->berat }} kg</li>
						<li>{{ $cargo->jumlah }}</li>
						<li>{{ $cargo->typepaket->paket_name }}</li>
						<br>
						  <h6>Biaya: @currency($cargo->total_biaya)</h6>
					 </td>
					<td>
						<li>{{ $cargo->penerima->nama }}</li>
						<li>{{ $cargo->penerima->no_hp }}</li>
						</td>
					<td>
						  <ul class="list-group list-group-flush">
							<li class="list-group-item"> {{ $cargo->penerima->alamat }}</li>
							<li class="list-group-item">{{$cargo->country->country_name}}/{{$cargo->country->country_code}}</li>
						  </ul>
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
						  <a href="{{ route('pengiriman-trakingmore.show',$cargo->id) }}" class="menu-link px-3">preview</a>
						</div>
						{{-- <div class="menu-item px-3">
						  <a href="{{ route('cargo.index',$cargo->id) }}" class="menu-link px-3">Edit</a>
						</div> --}}
						<!--end::Menu item-->
						<!--begin::Menu item-->
						<div class="menu-item px-3">
						  <a href="{{ route('pengiriman-trakingmore.edit',$cargo->id) }}" class="menu-link px-3"  >Edit</a>
						</div>
						<div class="menu-item px-3">
						  <a href="{{ route('pengiriman-trakingmore.delete',$cargo->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
						</div>
						<div class="menu-item px-3">
						  <a href="{{ route('pengiriman-trakingmore.print',$cargo->id) }}" target="_blank" class="menu-link px-3" data-kt-users-table-filter="delete_row"  >Cetak</a>
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
			  <div class="d-flex">
				{!! $records->links() !!}
			</div>
			  <!--end::Table-->
			</div>
			<!--end::Card body-->
		</div>
		
	  </div>
      </div>
  </div>

@endsection
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
{{-- <script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script> --}}



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
	$('#myInput').DataTable( {
        "scrollX": true
    } );
} );
</script>
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

