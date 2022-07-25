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
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Preview
              <!--begin::Separator-->
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
              <!--end::Separator-->
              <!--begin::Description-->
              <small class="text-muted fs-7 fw-bold my-1 ms-1">Data Pengiriman</small>
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

        <div class="container mt-5 mb-5">
            
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="receipt bg-white p-3 rounded"><img src="{{ asset('assets/logo.png')}}" width="120">
                        <hr>
                        <div class="d-flex flex-row justify-content-between align-items-center order-details">
                            <div><span class="d-block fs-12">Shipper : Tgl.kirim: {{$cargo->tgl_kirim}}</span>
                                <div class="border-dotted">
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"> {{ $cargo->pengirim->nama }}</li>
                                      <li class="list-group-item"> {{ $cargo->pengirim->no_hp }} </li>
                                      <li class="list-group-item"> {{ $cargo->pengirim->email }} </li>
                                    </ul>
                                </div>
                             </div>
                            <!-- <div><span class="d-block fs-12">Order number</span><span class="font-weight-bold">OD44434324</span></div> -->
                            <!-- <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div> -->
                            <div><span class="d-block fs-12">Service Pengiriman</span><span class="font-weight-bold text-success">{{$cargo->logistics_channel}}</span></div>
            </div>
                        <hr>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card">
                                    <div><span class="d-block fs-12">Penerima</span> 
                                        <div class="border-dotted">
                                            <ul class="list-group list-group-flush">
                                              <li class="list-group-item"> {{ $cargo->penerima->nama }}</li>
                                              <li class="list-group-item"> {{ $cargo->penerima->no_hp }}</li>
                                              <li class="list-group-item">{{$cargo->country->country_name}}/{{$cargo->country->country_code}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div><span class="d-block fs-12">Decripsion of Goods :</span> 
                                        <span class="font-awesome">{{$cargo->keterangan}}</span> <br>
                                        <span class="d-block">Weight : {{ $cargo->berat}}</span>
                        <span class="d-block">Heigth: {{ $cargo->panjang}}*{{ $cargo->lebar}}*{{ $cargo->tinggi}}= {{ $cargo->panjang*  $cargo->lebar* $cargo->tinggi}}</span>
                        <span class="d-block">Cost:  @currency($cargo->total_biaya)</span>
                                     </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div><span class="d-block fs-12">
                                        <div class="mb-3">{!! DNS2D::getBarcodeHTML($cargo->order_number, 'QRCODE') !!}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center footer">
                                        <span class="d-block">
                                           <div class="mb-10">{!! DNS1D::getBarcodeHTML($cargo->order_number, 'CODABAR') !!}</div>
                                           <div class="mb-10">{{ $cargo->order_number}}</div>
               
                                           <div class="d-flex flex-column justify-content-end align-items-end">
                                           <div class="text-center">
                                             <div class="card-body-align-center">
               
                                               <p class="card-text">Print {{date('d-m-Y')}}</p>
                                               <p class="card-text">Penerima</p>
                                               <br>
                                               <p class="card-text p-10">(....................)</p>
                                             </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-center">
          <div class="card-body">
            <a href="{{ route('pengiriman-trakingmore.index')}}" class="btn btn-primary">Kembali</a>
            <a href="{{ route('pengiriman-trakingmore.print',$cargo->id) }}" target="blank" class="btn btn-primary" type="button">Print</a>
        
          </div>
        </div>
            
      </div>
  </div>
</div>

@endsection
 