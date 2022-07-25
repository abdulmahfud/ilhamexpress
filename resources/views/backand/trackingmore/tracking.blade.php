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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">Tracking</small>
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
          <table id="myInput" class="table table-striped" style="width:100%">
            <!--begin::Table head-->
          <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="min-w-125px">tracking_number</th>
            <th class="min-w-125px">Courier</th>
            <th class="min-w-125px">delivery_status</th>
            <th class="min-w-125px">proses</th>
            </tr>
            <!--end::Table row-->
          </thead>
          <!--end::Table head-->
          <!--begin::Table body-->
          <tbody class="text-gray-600 fw-bold" id="myTable">
          <!--begin::Table row-->
          @if ($get_result_arr2['code']==200)
          @foreach ($get_result_arr2['data']  as $cargo)
          <tr>
            {{-- <td>{{ $loop->iteration}}</td> --}}
            <td>{{ $cargo['tracking_number'] }}</td>
            <td>{{ $cargo['courier_code'] }}</td>
            <td>{{ $cargo['delivery_status'] }}</td>
            <td>
                    @foreach ($cargo['origin_info']['trackinfo'] as $item )
                   <li>{{ $item['checkpoint_date'] }}<br>{{ $item['location'] }} </li>
                    @endforeach
              </td>
          </tr>
          @endforeach
          @else
              <tr>
                <td>
                  <div class="alert alert-info" role="alert">
                    {{$get_result_arr2['message']}}
                  </div>
                </td>
              </tr>
          @endif
          
  
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


