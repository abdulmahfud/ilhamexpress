@extends('layouts.main_layout')
<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Toolbar-->
  <div class="toolbar" id="kt_toolbar">
      <!--begin::Container-->
      <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
          <!--begin::Page title-->
          <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
              <!--begin::Title-->
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">tarif </small>
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
                  {!! Form::open(array('route' => 'tarif.filterbykecamatan','method'=>'POST','enctype'=>"multipart/form-data")) !!}
                  @csrf
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" class="form-control form-control-solid w-250px ps-14" id="myInput" placeholder="Search tarif" />
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <select class="my-select2 form-select" name="nama_kecamatan_penerima" data-control="select2" data-placeholder="Filter Kecamatan">
                          @foreach ($district as $item)
                          <option value="{{$item->name}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <select class="my-select2 form-select" name="layanan" data-control="select2" aria-label="Default select example">
                            <option selected>Filter layanan</option>
                            <option value="darat">darat</option>
                            <option value="laut">laut</option>
                            <option value="udara">udara</option>
                        </select>
                    </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <button type="submit" class="btn btn-info">Filter</button>
                      </div>
                    </div>
                  </div>
                  {!! Form::close() !!}
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
                    <input type="text" class="form-control form-control-solid w-250px ps-14" id="myInput" placeholder="Search tarif" />
                  </div> --}}
 <!--end::Search-->
                </div>
                <!--begin::Card title-->
                  <!--begin::Card toolbar-->
                  <div class="card-toolbar">
                      <!--begin::Toolbar-->
                      <div class="d-flex justify-content-end" data-kt-tarif-table-toolbar="base">
                          <!--begin::Add tarif-->
                          <a href="{{ route('tarif.create')}}" class="btn btn-primary">Tambah tarif</a>
                      </div>
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
                      <th class="min-w-125px">No</th>
                      <th class="min-w-125px">asal</th>
                      <th class="min-w-125px">tujuan</th>
                      <th class="min-w-125px">layanan</th>
                      <th class="min-w-125px">min-max</th>
                      <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="text-gray-600 fw-bold" id="myTable">
                    <!--begin::Table row-->
                    @foreach ($data as $key => $tarif)
                    <tr>
                       <td>{{ $loop->iteration}}</td>
                       <td>{{ $tarif->origin->nama_lokasi}} </td>
                       <td>{!!$tarif->tujuan!!} </td>
                       <td>{{ $tarif->layanan}} </td>
                       <td> @currency($tarif->tarif)<br>{{ $tarif->min_kg}}kg-{{ $tarif->max_kg}}Kg  </td>
                      <!--begin::tarif=-->
                      <!--begin::Action=-->
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
                          @can('tarif')
                          <div class="menu-item px-3">
                            <a href="{{ route('tarif.edit',$tarif->id) }}" class="menu-link px-3">Edit</a>
                          </div>
                          @endcan
                          @can('tarif')
                          <!--end::Menu item-->
                          <!--begin::Menu item-->
                          <div class="menu-item px-3">
                            <a href="{{ route('tarif.delete',$tarif->id) }}" class="menu-link px-3" data-kt-tarif-table-filter="delete_row" id="delete-confirm">Delete</a>
                          </div>
                          <!--end::Menu item-->
                          @endcan

                        </div>
                        <!--end::Menu-->
                      </td>
                      <!--end::Action=-->
                    </tr>
                    @endforeach

                    <!--end::Table row-->
                  </tbody>
                  <!--end::Table body-->
                </table>
                <div class="d-flex">
                  {!! $data->links() !!}
              </div>
                <!--end::Table-->
              </div>
               
              <!--end::Card body-->
          </div>
      </div>
  </div>
</div>

@endsection