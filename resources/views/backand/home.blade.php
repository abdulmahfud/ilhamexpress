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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Home</small>
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
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-12">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                         				<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<div class="col-xl-6">
										<!--begin::Charts Widget 3-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bolder fs-3 mb-1">Transaksi Pengiriman</span>
													{{-- <span class="text-muted fw-bold fs-7">More than 1000 new records</span> --}}
												</h3>
												<!--begin::Toolbar-->
												<div class="card-toolbar" data-kt-buttons="true">
													{{-- <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a> --}}
													<a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>
													{{-- <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a> --}}
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Chart-->
												<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Charts Widget 3-->
									</div>
									<div class="col-xl-6">
										<!--begin::Charts Widget 4-->
                                        <div class="card card-xl-stretch mb-xl-8 pt-5">
                                            <!--begin::Row-->
                                            <div class="row g-0">
                                                <!--begin::Col-->
                                                <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                                    <h3>{{ $riwayatransaksiday }}</h3>
                                                    <a href="#" class="text-warning fw-bold fs-6">Total Resi Harian</a>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                                    <h3>{{ $riwayatransaksimonth}}</h3>
                                                    <a href="#" class="text-primary fw-bold fs-6">Total Resi Bulan ini : {{$daynow}}</a>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                                <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                                    <a href="#" class="text-danger fw-bold fs-6 mt-2">Pemasukkan </a>
                                                     <h3>Jumlah : @currency($countdebit)</h3>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col bg-light-success px-6 py-8 rounded-2 me-7">
                                                    <a href="#" class="text-success fw-bold fs-6 mt-2">Pengeluaran</a>
                                                 <h3>Jumlah :@currency($countkredit)</h3>

                                                </div>
                                                <!--end::Col-->
                                        </div>
										<!--end::Charts Widget 4-->
									</div>
								</div>
								<!--end::Row-->
								 
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
                <!--end::Col-->
            </div>
            <!--end::Row-->
           

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
<script>
    var initChartsWidget3 = function() {
        var element = document.getElementById("kt_charts_widget_3_chart");

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        var baseColor = KTUtil.getCssVariableValue('--bs-info');
        var lightColor = KTUtil.getCssVariableValue('--bs-light-info');

        var counttransaksi =  <?php echo json_encode($counttransaksi) ?>;
        var bulan =  <?php echo json_encode($bulans) ?>;

        if (!element) {
            return;
        }

        var options = {
            series: [{
                name: 'Jumlah Transaksi',
                data: counttransaksi
                
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                // categories: ['jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Okt','Nov','Des'],
                categories: bulan,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "=" + val + " buah"
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();   
    }
</script>

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        var xin_table = $('#table-gajikaryawan').DataTable({

        });
    </script>

@endsection