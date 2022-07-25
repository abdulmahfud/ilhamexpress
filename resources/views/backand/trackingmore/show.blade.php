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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">List
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">manifest</small>
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

          <!--begin::Card-->
          <div class="card">
            <div class="card-header border-0 pt-6">
              <!--begin::Card toolbar-->
              <div class="card-toolbar">
                  <!--begin::Toolbar-->
                  <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                       <a href="{{ route('manifest.index')}}" class="btn btn-primary">Kembali</a>
                  </div>
              </div>
              <!--end::Card toolbar-->
              

          </div>
            <div class="card-body">
              <table class="table-responsive">
                <thead>
                  <tr>
                    <th>nomor_manifest : </th>
                    <th>{{ $manifest->nomor_manifest}}</th>
                  </tr>
                  <tr>
                    <th>nama_driver</th>
                    <th>{{ $manifest->nama_driver}}</th>
                  </tr>
                  <tr>
                    <th>tgl_kirim</th>
                    <th>{{ $manifest->tgl_kirim}}</th>
                  </tr>
                  <tr>
                    <th>tujuan</th>
                    <th>{{ $manifest->tujuan}}</th>
                  </tr>
                  <tr>
                    <th>status</th>
                    <th>@if ( $manifest->status==1)
                      @else
                          proses
                      @endif</th>
                  </tr>
                </thead>
              </table>
          </div>
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
                      <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                          <!--begin::Add user-->
											<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Tambah Paket</a>

                      </div>
                  </div>
                  <!--end::Card toolbar-->
                  	<!--begin::Modal - New Target-->
								<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content rounded">
											<!--begin::Modal header-->
											<div class="modal-header pb-0 border-0 justify-content-end">
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
												<!--begin:Form-->
												<form class="form" action="{{ route('manifest-detail.store')}}" method="POST">
                          @csrf
													<!--begin::Heading-->
                          <input type="hidden" name="manifests_id" value="{{ $manifest->id}}">
													<div class="mb-13 text-center">
														<!--begin::Title-->
														<h1 class="mb-3">Pilih Paket</h1>
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row">
                            <select name="id_datapengiriman" data-control="select2"   data-placeholder="Pilih Resi..." class="form-select form-select-solid">
                              <option value="">Pilih Resi...</option>
                              @foreach ($datapaket as $item)
                              <option value="{{ $item->id}}"> {{ $item->nomor_resi}}</option>
                              @endforeach
                          </select>
                          </div>
													<div class="text-center">
													<!--end::Input group-->
                          <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Pilih</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                          </button>
                          </div>
												</form>
													<!--end::Input group-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - New Target-->

              </div>
              <!--end::Card header-->
              <!--begin::Card body-->
              <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" >
                  <!--begin::Table head-->
                  <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                      <th class="min-w-125px">No</th>
                      <th class="min-w-125px">nomor_resi</th>
                      <th class="min-w-125px">tglkirim</th>
                      <th class="min-w-125px">penerima</th>
                      <th class="min-w-125px">Berat</th>
                      <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="text-gray-600 fw-bold" id="myTable">
                    <!--begin::Table row-->
                    @foreach ($manifestdetail as $key => $manifest)

                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $manifest->datapengiriman->nomor_resi }}</td>
                        <td>{{ $manifest->datapengiriman->tgl_kirim }}</td>
                        <td>{{ $manifest->datapengiriman->nama_penerima }} <br> alamat:{{ $manifest->datapengiriman->alamat_penerima }}</td>
                        <td>{{ $manifest->datapengiriman->berat }} Kg</td>
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
                            {{-- @can('manifest-detail-create')
                            <div class="menu-item px-3">
                              <a href="{{ route('manifest-detail.show',$manifest->id) }}" class="menu-link px-3">Detail</a>
                            </div>
                            @endcan --}}
                            @can('manifest')
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('manifest-detail.delete',$manifest->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
                            
                            <!--end::Menu item-->
                            @endcan
  
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

@endsection

<script>
  $("#kt_datatable_example_5").DataTable({
    "language": {
     "lengthMenu": "Show _MENU_",
    },
    "dom":
     "<'row'" +
     "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
     "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
     ">" +
   
     "<'table-responsive'tr>" +
   
     "<'row'" +
     "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
     "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
     ">"
   });
</script>