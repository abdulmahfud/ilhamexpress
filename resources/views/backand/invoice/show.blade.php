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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tambah</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('home')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Invoice </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Buat Invoice</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Wrapper-->
                <!--end::Wrapper-->
                <!--begin::Button-->
                <a href="{{ route('invoice.index')}}" class="btn btn-sm btn-primary">Kembali</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-12">
                            <!--begin::Form-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Tgl: {{ $invoice->date}}</div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                        <span class="fs-2x fw-bolder text-gray-800">Invoice # {{ $invoice->id}}</span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice due date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Tgl Akhir: {{ $invoice->due_date}}</div>

                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-10"></div>
                                <!--end::Separator-->
                                <!--begin::Wrapper-->
                                <div class="mb-0">
                                    <!--begin::Row-->
                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Dari</label>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid" disabled value="{{Auth::user()->name}}" />
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <input type="text" class="form-control form-control-solid" disabled value="{{Auth::user()->email}}" />
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Kepada</label>
                                            <!--begin::Input group-->
                                            <div class="form-group">
                                                <select name="id_client" aria-label="Select a Timezone" disabled class="form-select form-select-solid">
                                                    <option value=""> {{ $invoice->client->nama}}  </option>
                                                </select>
                                            </div>
                                            </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Table wrapper-->
                                    <div class="d-flex align-items-center py-1">
                                        <!--begin::Wrapper-->
                                        <!--end::Wrapper-->
                                        <!--begin::Button-->
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key" class="btn btn-sm btn-primary">Tambah Item</a>
                                        <!--end::Button-->
                                    </div>

                                    <div class="table-responsive mb-10">
                                        <!--begin::Table-->
                                        <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                    <th class="min-w-300px w-475px">Item</th>
                                                    <th class="min-w-100px w-100px">QTY</th>
                                                    <th class="min-w-150px w-150px">Harga</th>
                                                    <th class="min-w-100px w-150px text-end">Total</th>
                                                    <th class="min-w-75px w-75px text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                            @forelse ($invoicedetail as $item)
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                    <td class="pe-7">
                                                        <input type="text" class="form-control form-control-solid" disabled  value="{{ $item->nama_barang}}" />
                                                        <input type="text" class="form-control form-control-solid"  disabled value="{{ $item->deskripsi}}" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <input class="form-control form-control-solid" type="number"  disabled value="{{ $item->qty}}"  />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-solid text-end"  disabled value="@currency($item->harga)" />
                                                    </td>
                                                    <td class="pt-8 text-end text-nowrap">
                                                    <span >@currency($item->sub_total)</span></td>
                                                    <td class="pt-5 text-end">
                                                        <a href="{{ route('invoice-detail.delete',$item->id)}}" class="btn btn-xs btn-outline-danger rounded mx-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <div class="alert alert-primary" role="alert">
                                                <strong>Belum ada Item</strong>
                                               </div>
                                              @endforelse
                                            </tbody>
                                            <!--end::Table body-->
                                            <!--begin::Table foot-->
                                            <tfoot>
                                                <tr class="align-top fw-bolder text-gray-700">
                                                    <th colspan="2" class="fs-4 ps-0">Total</th>
                                                    <th colspan="2" class="text-end fs-4 text-nowrap">
                                                    <span id="total">@currency($invoice->total_bayar)</span></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                    <!--begin::Modal - Create Api Key-->
								<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form action="{{ route('invoice-detail.store')}}" class="form" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <!--begin::Modal title-->
                                                    <h2>Tambah Item</h2>
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
                                                    <input type="hidden" name="invoices_id" value="{{ $invoice->id }}">
                                                    <div class="form-group">
                                                      <input type="text" class="form-control form-control-solid mb-2" name="nama_barang" placeholder="Nama Barang" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-solid mb-2" name="deskripsi" placeholder="Keterangan" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control form-control-solid mb-2" type="number" name="qty" placeholder="QTY" data-kt-element="Jumlah" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-solid mb-2" onkeyup="convertToRupiah(this)" name="harga" placeholder="harga" />
                                                    </div>
												</div>
												<!--end::Modal body-->
												<!--begin::Modal footer-->
												<div class="modal-footer flex-center">
													<button type="submit"class="btn btn-primary">
														<span class="indicator-label">Simpan</span>
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

                                    <!--end::Notes-->
                                </div>
                                <!--end::Wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-lg-auto min-w-lg-300px">
                    <!--begin::Card-->
                    <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <!--begin::Card body-->
                        <form action="{{ route('invoice-detail.update',$invoice->id )}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body p-10">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder fs-6 text-gray-700">Potongan</label>
                                    <!--end::Label-->
                                    <div class="mb-5">
                                        <input type="text" class="form-control form-control-solid"  value="{{ $invoice->potongan}}" name="potongan" onkeyup="convertToRupiah(this);"   />
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label fs-6 fw-bolder text-gray-700">keterangan</label>
                                        <textarea name="keterangan" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business"> {{ $invoice->keterangan}}</textarea>
                                    </div>

                                </div>
                                <div class="mb-0">
                                    <!--begin::Row-->

                                    <!--end::Row-->
                                    <button type="submit" href="#" class="btn btn-primary w-100">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black" />
                                            <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Simpan Invoice</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </form>

                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
