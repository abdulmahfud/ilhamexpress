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
              <small class="text-muted fs-7 fw-bold my-1 ms-1">bonus</small>
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
                    <input type="text" class="form-control form-control-solid w-250px ps-14" id="myInput" placeholder="Search user" />
                  </div>
                  <!--end::Search-->
                </div>
                <!--begin::Card title-->
                  <!--begin::Card toolbar-->
                  <div class="card-toolbar">
                      <!--begin::Toolbar-->
                      <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key" class="btn btn-sm btn-primary">Tambah bonus</a>
                        <!--end::Button-->
                    </div>
                  </div>
                  <!--end::Card toolbar-->
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
                      <th >No</th>
                      <th class="min-w-125px">Karyawan</th>
                      <th class="min-w-125px">Tgl</th>
                      <th class="min-w-125px">Jumlah</th>
                      <th class="min-w-125px">Status</th>
                      <th class="min-w-125px">keterangan</th>
                      <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="text-gray-600 fw-bold" id="myTable">
                    <!--begin::Table row-->
                    @foreach ($data as $bonus)

                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="d-flex align-items-center">
                          <!--begin:: Avatar -->
                          <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a target="_blank" href="{{ asset('assets')}}/{{ $bonus->user->avatar}}">
                              <div class="symbol-label">
                                <img src="{{ asset($bonus->user->avatar)}}" alt="{{$bonus->user->name}}" class="w-100" />
                              </div>
                            </a>
                          </div>
                          <!--end::Avatar-->
                          <!--begin::User details-->
                          <div class="d-flex flex-column">
                            <h6 class="text-gray-800 text-hover-primary mb-1">{{ $bonus->user->name}} </h6>
                            <span>{{ $bonus->user->email}}</span>
                          </div>
                          <!--begin::User details-->
                        </td>
                        <td>{{ $bonus->tgl }}</td>
                        <td>@currency($bonus->jumlah)</td>
                        <td>@if ( $bonus->status==1)
                            Diterima
                        @else
                            Belum Diterima
                        @endif</td>
                        <td>{{ $bonus->keterangan }}</td>
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
                            @can('bonus-edit')
                            <div class="menu-item px-3">
                              <a href="#"  data-bs-toggle="modal" data-bs-target="#modal_edit{{$bonus->id}}"  class="menu-link px-3">Edit</a>
                            </div>
                            @endcan
                            @can('bonus-delete')
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="{{ route('bonus.delete',$bonus->id) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row" id="delete-confirm">Delete</a>
                            </div>
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
                <div class="d-flex">
                  {!! $data->links() !!}
              </div>                <!--end::Table-->
              </div>
              <!--end::Card body-->

              <!--begin::Modal - Create Api Key-->
              <div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                  <!--begin::Modal content-->
                  <div class="modal-content">
                    <!--begin::Form-->
                    <form action="{{ route('bonus.store')}}" class="form" method="POST" >
                          @csrf
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Tambah Bonus</h2>
                        <!--end::Modal title-->
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
                      <!--begin::Modal body-->
                      <div class="modal-body py-10 px-lg-17">
                        <div class="form-group">
                          <strong>Date</strong>
                          <input type="date" class="form-control form-control-solid mb-2" name="tgl"/>
                        </div>
                        <div class="form-group">
                          <strong for="my-select">Pelanggan</strong>
                          <select name="id_karyawan" aria-label="Select id_karyawan" data-control="select2" data-placeholder="Pilih Pelanggan" class="form-select form-select-solid">
                            <option value="">Pilih </option>
                          @foreach ($users as $item)
                            <option value="{{ $item->id}}"> {{ $item->name}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <strong>Jumlah</strong>
                          <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="jumlah" placeholder="jumlah" />
                      </div>
                      <div class="form-group">
                        <label for="bonus">Status</label>
                        <select class="form-select form-select-solid" data-control="select2" name="status" id="bonus">
                          <option value="1">Diterima</option>
                          <option value="2">Belum DIterima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <strong>Keterangan</strong>
                        <input type="text" class="form-control form-control-solid mb-2" name="keterangan"/>
                      </div>
                      </div>
                      <!--end::Modal body-->
                      <!--begin::Modal footer-->
                      <div class="modal-footer flex-center">
                        <button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                          <span class="indicator-label">Simpan</span>
                          <span class="indicator-progress">Please wait...
                          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                      </div>
                      <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                  </div>
                  <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
              </div>
              <!--end::Modal - Create Api Key-->
              @foreach ($data as $item)
              <!--begin::Modal - edit Api Key-->
              <div class="modal fade" id="modal_edit{{$item->id}}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                  <!--begin::Modal content-->
                  <div class="modal-content">
                    <!--begin::Form-->
                    <form action="{{ route('bonus.update',$item->id )}}" class="form" method="POST" >
                      {{csrf_field()}} 
                      @method('PUT')
                      <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Tambah Bonus</h2>
                        <!--end::Modal title-->
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
                      <!--begin::Modal body-->
                      <div class="modal-body py-10 px-lg-17">
                        <div class="form-group">
                          <strong>Date</strong>
                          <input type="date" class="form-control form-control-solid mb-2" name="tgl" value="{{ $item->tgl}}"/>
                        </div>
                        <div class="form-group">
                          <strong for="my-select">Pelanggan</strong>
                          <select name="id_karyawan" aria-label="Select id_karyawan" data-control="select2" data-placeholder="Pilih Pelanggan" class="form-select form-select-solid">
                            <option value="">Pilih </option>
                                @foreach ($users as $items)
                                <option value="{{$items->id}}" {{ $items->id == $item->id_karyawan ? 'selected' : '' }}>{{$items->name}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <strong>Jumlah</strong>
                          <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="jumlah" value="{{ $item->jumlah}}" />
                      </div>
                      <div class="form-group">
                        <label for="bonus">Status</label>
                        <select class="form-select form-select-solid" data-control="select2" name="status" id="bonus">
                          <option value="{{$items->status}}"selected>@if ($items->status==1)
                            Diterima
                          @else
                              Belum Diterima
                          @endif</option>
                          <option value="1">Diterima</option>
                          <option value="2">Belum DIterima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <strong>Keterangan</strong>
                        <input type="text" class="form-control form-control-solid mb-2" name="keterangan" value="{{ $item->keterangan}}"/>
                      </div>
                      </div>
                      <!--end::Modal body-->
                      <!--begin::Modal footer-->
                      <div class="modal-footer flex-center">
                        <button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                          <span class="indicator-label">Simpan</span>
                          <span class="indicator-progress">Please wait...
                          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                      </div>
                      <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                  </div>
                  <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
              </div>
              <!--end::Modal - Create Api Key-->
              @endforeach
            
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