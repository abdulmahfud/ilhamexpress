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
              <div class="card">
                <!--begin::Card body-->
                <div class="card-body" >
										<!--begin::Stepper-->
										<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
											<!--begin::Nav-->
                    <!--begin::Nav-->
                    <div class="stepper-nav mb-15">
                      <!--begin::Step 1-->
                      <div class="stepper-item current" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Data Pengirim</h3>
                      </div>
                      <!--end::Step 1-->
                      <!--begin::Step 2-->
                      <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Alamat Tujuan</h3>
                      </div>
                      <!--end::Step 2-->
                      <!--begin::Step 3-->
                      <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Paket Cargo</h3>
                      </div>
                      <!--end::Step 3-->
                      <!--begin::Step 4-->
                      <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Simpan Formulir</h3>
                      </div>
                      <!--end::Step 4-->
                      <!--begin::Step 5-->
                      <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Completed</h3>
                      </div>
                      <!--end::Step 5-->

                    </div>
                    <!--end::Nav-->
											<!--end::Nav-->
											<!--begin::Form-->
											<form class="mx-auto fs-6 gy-5 zero-padd-horizon" method="POST" action={{ route('datapengiriman.store')}} novalidate="novalidate" id="kt_create_account_form">
												<!--begin::Step 1-->
                        
												<div class="current" data-kt-stepper-element="content">
													<!--begin::Wrapper-->
													<div class="w-100">
                          <!--begin::Heading-->
                            <!--begin::Title-->
                            <div class="text-center">
                              <div class="pb-10 pb-lg-5">
                                <h2 class="active-title fw-bolder  ">Data Pengirim
                                  <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isikan Data Pengirim Anda"></i></h2>
                              </div>
                            </div>
                              <!--end::Title-->
                            <!--end::Heading-->
														<!--begin::Input group-->
														<div class="fv-row">
															<!--begin::Row-->
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Pos Pengirim Exspres:</strong>
                                    <select class="form-select" name="origin_id" aria-label="Default select example">
                                        <option selected>Chosse Origin</option>
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
                                        <option selected>Pilih Pengirim</option>
                                        @foreach ($pengirim as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                               <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="1"  name="datapengirimbaru" id="flexCheckDefault">
                                 <label class="form-check-label" for="flexCheckDefault">
                                   Data Pengirim Baru
                                 </label>
                               </div>
                            <div id="formpengirimbr">
                              <div class="row" >
                                <div class="col-4">
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Nama Pengirim <label class=" fs-6"></label></strong>
                                      {!! Form::text('nama_pengirim', old('nama_pengirim'), array('placeholder' => 'nama_pengirim','class' => 'form-control' )) !!}
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Email <label class=" fs-6"></label></strong>
                                      {!! Form::text('email_pengirim', old('email_pengirim'), array('placeholder' => 'email','class' => 'form-control')) !!}
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Telepon <label class=" fs-6"></label></strong>
                                      {!! Form::text('no_hp_pengirim', old('no_hp_pengirim'), array('placeholder' => 'telepon','class' => 'form-control')) !!}
                                    </div>
                                  </div>
                                </div>
                                <div class="col-8">
                                  <div class="row mb-3 pt-5 pb-5">
                                    <div class="form-group">
                                      <strong>Alamat Pengirim <label class=" fs-6"></label></strong>
                                      <textarea class="form-control form-control-solid" rows="3" name="alamat_pengirim" placeholder="Alamat Pengirim" style="height: 75px;"></textarea>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="">Provinsi</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi"></i>
                                        </label>
                                        <select class="my-select2 form-select province_pengirim" name="nama_provinsi_pengirim" id="provinsi_pengirim" data-placeholder="Select an option" >
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="">Kabupaten/Kota</span>
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
                                            <span class="">Kecamatan</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kecamatan"></i>
                                        </label>
                                        <select class="my-select2 districts_pengirim form-select" name="nama_kecamatan_pengirim" id="kecamatan_pengirim"data-control="select2" data-placeholder="Select an option" >
                                        </select>
                                      </div>
                                    </div>
                                    {{-- <div class="col-6">
                                      <div class="d-flex justify-content-center pt-7">
                                        <button type="button" class="btn btn-sm fw-bolder btn-primary">Load Data Pengirim</button>
                                      </div> 
                                    </div> --}}
                                  </div>
                                </div>
                              </div>
                            </div>
															<!--end::Row-->
														</div>
														<!--end::Input group-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Step 1-->
												<!--begin::Step 2-->
												<div data-kt-stepper-element="content">
													<!--begin::Wrapper-->
													<div class="w-100">
                            <!--begin::Heading-->
                            <div class="text-center">
                              <div class="pb-10 pb-lg-5">
                              <!--begin::Title-->
                                <h2 class="active-title fw-bolder  ">Alamat Tujuan
                                  <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isikan Data Pengirim Anda"></i></h2>
                                  {!! Form::token() !!} {{-- csrf protection --}}
                              </div>
                              <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                              <!--begin::Input group-->
                              <div class="fv-row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                      <strong>Penerima Sudah ada:</strong>
                                      <select class="form-select" name="penerima_id" aria-label="Default select example">
                                          <option selected>Pilih Penerima</option>
                                          @foreach ($pengirim as $item)
                                          <option value="{{$item->id}}">{{$item->nama}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                                 <div class="form-check">
                                   <input class="form-check-input" type="checkbox" value="1" name="datapenerimabaru" id="flexCheckDefault2">
                                   <label class="form-check-label" for="flexCheckDefault2">
                                     Data Penerima Baru
                                   </label>
                                 </div>
                                 <div id="datapenerimabaru">
                                <div class="row">
                                  <div class="col-4">
                                    <div class="row mb-3">
                                      <div class="form-group">
                                        <strong>Nama Penerima <label class="required fs-6"></label></strong>
                                        {!! Form::text('nama_penerima', old('nama_penerima'), array('placeholder' => 'nama_penerima','class' => 'form-control')) !!}
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="form-group">
                                        <strong>Email <label class="required fs-6"></label></strong>
                                        {!! Form::text('email_penerima', old('email_penerima'), array('placeholder' => 'email','class' => 'form-control')) !!}
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="form-group">
                                        <strong>Telepon <label class="required fs-6"></label></strong>
                                        <input type="number" value="+62" name="no_hp_penerima" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-8">
                                    <div class="row mb-3">
                                      <div class="form-group">
                                        <strong>Kode POS <label class="required fs-6"></label></strong>
                                        {!! Form::text('kodepos', old('kodepos'), array('placeholder' => 'kodepos','class' => 'form-control')) !!}
                                      </div>
                                    </div>
                                    <div class="row mb-3 pt-5 pb-5">
                                      <div class="form-group">
                                        <strong>Alamat Penerima <label class="required fs-6"></label></strong>
                                      <textarea class="form-control form-control-solid" rows="3" name="alamat_penerima" placeholder="Alamat penerima" style="height: 75px;"></textarea>
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label class="fs-6 fw-bold mb-2">
                                              <span class="required">Provinsi</span>
                                              <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi"></i>
                                          </label>
                                          <select class="my-select2 form-select province_penerima" name="nama_provinsi_penerima" id="provinsi_penerima" data-placeholder="Select an option" required>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label class="fs-6 fw-bold mb-2">
                                              <span class="required">Kabupaten/Kota</span>
                                              <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="kota"></i>
                                          </label>
                                          <select class="my-select2 cities_penerima form-select" name="nama_kabupaten_penerima" id="kota_penerima"data-control="select2" data-placeholder="Select an option" required>
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
                                          <select class="my-select2 districts_penerima form-select" name="nama_kecamatan_penerima" id="kecamatan_penerima"data-control="select2" data-placeholder="Select an option" required>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label class="fs-6 fw-bold mb-2">
                                              <span class="required">Desa</span>
                                              <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="desa"></i>
                                          </label>
                                          <select class="my-select2 vilages_penerima form-select" name="nama_desa_penerima" id="desa_penerima"data-control="select2" data-placeholder="Select an option" required>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    {{-- <div class="row mb-3">
                                      <div class="col-6">
                                        <div class="d-flex justify-content-center pt-7">
                                          <button type="submit" class="btn btn-sm fw-bolder btn-primary">Load Data Tujuan</button>
                                        </div> 
                                      </div>
                                      <div class="col-6">
    
                                      </div>
                                    </div> --}}
                                  </div>
                                </div>
                                 </div>

                              </div>
                              <!--end::Input group-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Step 2-->
												<!--begin::Step 3-->
												<div data-kt-stepper-element="content">
													<!--begin::Wrapper-->
													<div class="w-100">
                          <!--begin::Heading-->
                            <div class="pb-10 pb-lg-12">
                              <div class="text-center">
                                <div class="pb-10 pb-lg-5">
                                  <!--begin::Title-->
                                  <h2 class="active-title fw-bolder  ">Paket Cargo
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isikan Data Cargo Anda"></i></h2>
                                </div>
                              </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                              <div class="row">
                                <div class="col-4">
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Resi / No.STT <label class="required fs-6"></label></strong>
                                      {!! Form::text('resi', old('resi'), array('placeholder' => '{{$data->resi}}','class' => 'form-control', 'id' =>'resi')) !!}
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Dimensi <label class="required fs-6"></label></strong>
                                      <div class="row">
                                        <div class="col-4">
                                          {!! Form::number('dimensi_panjang', old('dimensi_panjang'), array('placeholder' => 'cm','class' => 'form-control')) !!} panjang
                                        </div>
                                        <div class="col-4">
                                          {!! Form::number('dimensi_lebar', old('dimensi_lebar'), array('placeholder' => 'cm','class' => 'form-control')) !!} lebar
                                        </div>
                                        <div class="col-4">
                                          {!! Form::number('dimensi_tinggi', old('dimensi_tinggi'), array('placeholder' => 'cm','class' => 'form-control')) !!} tinggi
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="form-group">
                                      <strong>Volume <label class="required fs-6"></label></strong>
                                      <h6 class="volume"> 0 cm</h6>
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
                                            <option selected>pilih layanan</option>
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
                                <div class="col-4">
                                  {{-- <div class="row mb-3 pt-5 pb-5">
                                    <div class="form-group">
                                      <label class="fs-6 fw-bold mb-2">
                                          <span class="required">Kategori Barang</span>
                                          <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi"></i>
                                      </label>
                                      <select class="my-select2 form-select kategori_barang" name="kategori_barang" id="kategori_barang" data-placeholder="Select an option" required>
                                          <option selected>Pilih Kategori Barang</option>
                                      </select>
                                    </div>
                                  </div> --}}
                               
                                  {{-- <div class="row mt-10">
                                    <strong>Total Biaya </strong><br>Rp.
                                    <label class="fs-1" id="totalBiaya"> 100000</label>
                                    <input type="hidden" id="total_biaya" name="total_biaya">
                                  </div> --}}
                                </div>
                                <div class="col-4">
                                  <div class="row mb-3 pt-5 pb-5">
                                    <div class="form-group">
                                      <strong>Keterangan Isi Paket </strong><br>
                                      <textarea class="form-control form-control-solid" rows="3" name="keterangan"  placeholder="Keterangan Isi Paket" style="height: 115px;" required>Kondisi Bagus</textarea>
                                    </div>
                                  </div>
                                 
                                  {{-- <div class="row mb-3">
                                    <div class="col-5">
                                      <div class="row">
                                        <span class="active-title">Service</span>
                                        <input type="radio" class="btn-check" name="service_type" value="international" id="international" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-2 m-2 d-flex align-items-center" for="international">
                                            International
                                        </label>
                                        <input type="radio" class="btn-check" name="service_type" value="corporate" id="national" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-2 m-2 d-flex align-items-center" for="national">
                                            National
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-5">
                                      <div class="row">
                                        <span class="active-title">Metode Pembayaran</span>
                                        <input type="radio" class="btn-check" name="metode_pembayaran" value="cash" id="cash" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-2 m-2 d-flex align-items-center" for="cash">
                                            Cash
                                        </label>
                                        <input type="radio" class="btn-check" name="metode_pembayaran" value="corporate" id="transfer" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-2 m-2 d-flex align-items-center" for="transfer">
                                            Transfer
                                        </label>
                                        <input type="radio" class="btn-check" name="metode_pembayaran" value="corporate" id="credit" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-2 m-2 d-flex align-items-center" for="credit">
                                            Credit
                                        </label>
                                      </div>
                                    </div>
                                  </div> --}}
                                </div>
                              </div>
                          </div>
                          <!--end::Input group-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Step 3-->
												<!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            {{-- <div class="text-center"> --}}
                              
                              <!--end::Title-->
                            {{-- </div> --}}
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="text-center">
  
                              <div class="row">
                                <h1 class="active-title fw-bolder  ">
                                  <i class="fas fa-check ms-2 fs-1"></i>
                                  Complete
                                </h1>
                              </div>
                              <div class="row">
                                <span>Klik simpan untuk menyelesaikan Formulir</span>
                              </div>
                              <div class="row">
                                <button type="submit" class="btn btn-primary align center">Simpan</button>
                                {{-- <div class="col-4">
                                  <button type="submit" class="btn btn-md btn-light-primary me-3">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1"></button>
                                </div> --}}
                                {{-- <div class="col-4">
                                  <a href="#" class="btn btn-md btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                    Cetak Resi
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                      <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.75 7.12504V1.58337H14.25V7.12504" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.75004 14.25H3.16671C2.74678 14.25 2.34405 14.0832 2.04712 13.7863C1.75019 13.4893 1.58337 13.0866 1.58337 12.6667V8.70833C1.58337 8.28841 1.75019 7.88568 2.04712 7.58875C2.34405 7.29182 2.74678 7.125 3.16671 7.125H15.8334C16.2533 7.125 16.656 7.29182 16.953 7.58875C17.2499 7.88568 17.4167 8.28841 17.4167 8.70833V12.6667C17.4167 13.0866 17.2499 13.4893 16.953 13.7863C16.656 14.0832 16.2533 14.25 15.8334 14.25H14.25" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.25 11.0834H4.75V17.4167H14.25V11.0834Z" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        
                                    </span>
                                    <!--end::Svg Icon-->
                                  </a>
                                </div>
                                <div class="col-4">
                                  <a href="#" class="btn btn-md btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                    Cetak Pajak
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                      <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.75 7.12504V1.58337H14.25V7.12504" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.75004 14.25H3.16671C2.74678 14.25 2.34405 14.0832 2.04712 13.7863C1.75019 13.4893 1.58337 13.0866 1.58337 12.6667V8.70833C1.58337 8.28841 1.75019 7.88568 2.04712 7.58875C2.34405 7.29182 2.74678 7.125 3.16671 7.125H15.8334C16.2533 7.125 16.656 7.29182 16.953 7.58875C17.2499 7.88568 17.4167 8.28841 17.4167 8.70833V12.6667C17.4167 13.0866 17.2499 13.4893 16.953 13.7863C16.656 14.0832 16.2533 14.25 15.8334 14.25H14.25" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.25 11.0834H4.75V17.4167H14.25V11.0834Z" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        
                                    </span>
                                    <!--end::Svg Icon-->
                                  </a>
                                </div> --}}
                              </div>
                            </div>
                              <!--end::Input group-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
												<!--end::Step 4-->
												<!--begin::Step 5-->
												<div data-kt-stepper-element="content">
													<!--begin::Wrapper-->
													<div class="w-100">
														<!--begin::Heading-->
														<div class="pb-8 pb-lg-10">
															<!--begin::Title-->
															<h2 class="fw-bolder text-dark">Your Are Done!</h2>
															<!--end::Title-->
															<!--begin::Notice-->
															{{-- <div class="text-muted fw-bold fs-6">If you need more info, please --}}
															{{-- <a href="../../demo1/dist/authentication/sign-in/basic.html" class="link-primary fw-bolder">Sign In</a>.</div> --}}
															<!--end::Notice-->
														</div>
														<!--end::Heading-->
														<!--begin::Body-->
														<div class="mb-0">
															<!--begin::Text-->
															{{-- <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great &amp; amazing audience.</div> --}}
															<!--end::Text-->
															<!--begin::Alert-->
															<!--begin::Notice-->
															<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
																<!--begin::Icon-->
																<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
																<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
																		<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<!--end::Icon-->
																<!--begin::Wrapper-->
																{{-- <div class="d-flex flex-stack flex-grow-1">
																	<!--begin::Content-->
																	<div class="fw-bold">
																		<h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
																		<div class="fs-6 text-gray-700">To start using great tools, please, please
																		<a href="#" class="fw-bolder">Create Team Platform</a></div>
																	</div>
																	<!--end::Content-->
																</div> --}}
																<!--end::Wrapper-->
															</div>
															<!--end::Notice-->
															<!--end::Alert-->
														</div>
														<!--end::Body-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Step 5-->
												<!--begin::Actions-->
												<div class="d-flex flex-stack pt-15">
													<!--begin::Wrapper-->
													<div class="mr-2">
														<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
																<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->Back</button>
													</div>
													<!--end::Wrapper-->
													<!--begin::Wrapper-->
													<div>
														{{-- <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
															<span class="indicator-label">Submit
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
															<span class="svg-icon svg-icon-3 ms-2 me-0">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																	<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon--></span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button> --}}
														<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-4 ms-1 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon--></button>
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Stepper-->
                </div>
                <!--end::Card body-->
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
                  <form action="{{ route('datapengiriman.filter')}}" method="get">
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
                        
                  
                    @forelse ($records as $key => $cargo)

                    <tr>
                        {{-- <td>{{ $loop->iteration}}</td> --}}
                        <td>{{ $cargo->nomor_resi }} <br>
                       {{ $cargo->nama_driver }}</td>
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
                              <a href="{{ route('datapengiriman.show',$cargo->id) }}" class="menu-link px-3">preview</a>
                            </div>
                            {{-- <div class="menu-item px-3">
                              <a href="{{ route('cargo.index',$cargo->id) }}" class="menu-link px-3">Edit</a>
                            </div> --}}
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('datapengiriman.edit',$cargo->id) }}" class="menu-link px-3"  >Edit</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('datapengiriman.delete',$cargo->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
                            <div class="menu-item px-3">
                              <a href="{{ route('datapengiriman.print',$cargo->id) }}" target="_blank" class="menu-link px-3" data-kt-users-table-filter="delete_row"  >Cetak</a>
                            </div>
                           
                            <!--end::Menu item-->
                          </div>
                          <!--end::Menu-->
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-info" role="alert">
                          <strong>Not Found</strong>
                        </div>
                    @endforelse

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
</div>

@endsection

@section('js')
<script>
  const box = document.getElementById('formpengirimbr');
  box.style.visibility = 'hidden';
const btn = document.getElementById('flexCheckDefault');
btn.addEventListener('click', function handleClick() {
  if (box.style.visibility === 'hidden') {
    box.style.visibility = 'visible';
    box.value = 1;
  } else {
    box.style.visibility = 'hidden';
  }
});

const box2 = document.getElementById('datapenerimabaru');
  box2.style.visibility = 'hidden';
const btn2 = document.getElementById('flexCheckDefault2');
btn2.addEventListener('click', function handleClick() {
  if (box2.style.visibility === 'hidden') {
    box2.style.visibility = 'visible';
    box2.value = 1;
  } else {
    box2.style.visibility = 'hidden';
  }
});

</script>

    <script src="{{ asset('assets/plugins/custom/datatables/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatable.js') }}"></script>
     
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
  var layanan;
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
   //hitung tarif
  $('input[name=berat]').change(function() { 
    berat = this.value;
    layanan = $('input[name=service]').val();
    jumlah = $('input[name=jumlah]').val();
    origin = $('input[name=origin_id]').val();
    
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