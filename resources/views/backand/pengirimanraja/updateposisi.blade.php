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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tracking
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
          <div class="row mb-5">
            <div class="card p-10">
                <!--begin::Card title-->
                <div class="card-title">
                    <div class="">
                    <!--begin::Title-->
                      <h2 class="active-title fw-bolder  ">Update Posisi  
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isikan Data Pengirim Anda"></i></h2>
                      </div>
                      <!--end::Title-->
                    <!--end::Heading-->
                </div>
                <form  method="POST" action={{ route('pengiriman-rajao-tracking.store')}}>

                  <div class="card-body">
                    {!! Form::token() !!} {{-- csrf protection --}}
                    <div class="row">
                      <div class="col-4">
                        <div class="row mb-7">
                          <div class="form-group">
                            <select class="form-select" name="nomor_resi" aria-label="Default select example" required>
                              <option selected>Chosse resi</option>
                              @foreach ($pengirimanptiga as $item)
                              <option value="{{$item->nomor_resi}}">{{$item->nomor_resi}}</option>
                              @endforeach
                           </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group">
                            <strong>keterangan</strong><br>
                            <textarea class="form-control form-control-solid" rows="3" name="keterangan" placeholder="keterangan" style="height: 200px;" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="row ">
                          <strong>Status<label class="required fs-6"></label></strong>
                          <select class="form-select status bg-light-warning" name="status_pengiriman" id="status" data-placeholder="Select an option" required>
                            <option value="process" selected>Process</option>
                            <option value="on-delivery" >On Delivery</option>
                            <option value="delivered" >Delivered</option>
                            <option value="resend" >Resend</option>
                          </select></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="text-center">
                        <button type="submit" class="btn btn-md btn-primary me-3">Update</button>
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
                  
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Table-->
                  <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7">
                    <!--begin::Table head-->
                    <thead>
                      <!--begin::Table row-->
                      <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Resi</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">keterangan</th>
                        <th class="min-w-125px">Data Paket</th>
                        <th class="min-w-125px">Aksi</th>
                      </tr>
                      <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="myTable">
                      <!--begin::Table row-->
                      @foreach ($records as $key => $tracking)
                    <tr>
                        <td>{{ $tracking->no_resi }}</td>
                        <td>{{ $tracking->status_pengiriman }}</td>
                        <td>{{ $tracking->keterangan }}</td>
                        <td>
                            <div class="border-dotted">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"> {{ $tracking->pengirimanptiga->penerima->nama }}</li>
                                <li class="list-group-item"> {{ $tracking->pengirimanptiga->penerima->alamat }}</li>
                                <li class="list-group-item">Desa.{{$tracking->pengirimanptiga->penerima->nama_desa}}/kodepos:{{$tracking->pengirimanptiga->penerima->kodepos}}</li>
                                <li class="list-group-item"> Kec.{{$tracking->pengirimanptiga->penerima->nama_kecamatan}}</li>
                                <li class="list-group-item">Kab.{{$tracking->pengirimanptiga->penerima->nama_kabupaten}}</li>
                                <li class="list-group-item">Prov.{{$tracking->pengirimanptiga->penerima->nama_provinsi}}</li>
                                <li class="list-group-item">Keterangan.{{$tracking->pengirimanptiga->penerima->keterangan}}</li>
                              </ul>
                          </div>
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
                            {{-- @can('pengiriman-rajao-tracking') --}}
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('pengiriman-rajao-tracking.delete',$tracking->id) }}" class="menu-link px-3" data-kt-tarif-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
                            <!--end::Menu item-->
                            {{-- @endcan --}}
                          </div>
                          <!--end::Menu-->
                        </td>
                    </tr>
                    
                    @endforeach

                    <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                  </table>
                  {{-- <div class="d-flex">
                    {!! $records->links() !!}
                </div> --}}
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
<script src="{{ asset('assets-frontend/vendor/select2/js/select2.js')}}"></script>
<script>
  $(document).ready(function(){
      //active select2
      $(".form-select").select2({
          theme:'bootstrap5',width:'style',
      });
  });

  $('.collapse').collapse()
</script>