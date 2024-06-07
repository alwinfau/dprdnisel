@extends('layouts.app')

@section('judul', 'Dashboard | Administrator')

@section('content')
    <div class="page-content container container-plus">
        <div class="alert alert-dismissible fade show  bgc-white text-dark-tp3 border-1 brc-secondary-l2 shadow-sm radius-0 py-3 align-items-start"
            role="alert">
            <div class="position-tl w-102 m-n1px border-t-4 brc-success"></div>

            <div class="row">
                <div class="col-md-1">
                    {{-- <div class="px-4 py-25 radius-1px mr-4 shadow-sm d-flex"> --}}
                    @if (Auth::user()->fotoprofil == '')
                        <img id="id-navbar-user-image"
                            class="d-none d-lg-inline-block radius-round rounded-circle border-2 brc-white-tp1 mr-2 w-6"
                            src="{{ Auth::user()->gravatar() }}" alt="user foto"
                            style="width: 80px; height:80px; background-position: center center;">
                    @else
                        <img id="id-navbar-user-image"
                            class="d-none d-lg-inline-block radius-round border-2 brc-danger-tp1 mr-2 w-6"
                            src="{{ asset('img/' . Auth::user()->fotoprofil) }}" alt="user foto"
                            style="width: 80px; height:80px; background-position: center center;">
                    @endif
                    {{-- </div> --}}
                </div>

                <div class="col-md-11">
                    <div class="text-dark-tp3">
                        <h3 class="text-blue-d1 text-130">Halo..! <b>{{ Auth::user()->name }}</b></h3>
                        Saat ini anda login sebagai
                        @if (Auth::user()->is_admin == 1)
                            <span class="badge badge-sm badge-danger arrowed-in arrowed-in-right">
                                Superuser
                            </span>
                        @else
                            <span class="badge badge-sm badge-warning arrowed arrowed-in-right">
                                Admin
                            </span>
                        @endif
                        <br>
                        <small>Silahkan gunakan akun anda dengan baik dan benar. setiap transaksi yang dilakukan akan
                            dicatat
                            historisnya.</small>
                    </div>
                </div>
            </div>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="page-header pb-2">
            <h1 class="page-title text-primary-d2 text-150">
                Beranda
                <small class="page-info text-secondary-d2 text-nowrap">
                    <i class="fa fa-angle-double-right text-80"></i>
                    <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                </small>
            </h1>

            <div class="page-tools d-inline-flex">
                @if (Auth::user()->is_admin == 1)
                    <a data-toggle="tooltip" data-placement="top" title="Refresh Halaman" href="{{ route('admin.home') }}"
                        type="button"
                        class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                        <i class="fa fa-undo text-110 w-2 h-2"></i>
                    </a>
                @else
                    <a data-toggle="tooltip" data-placement="top" title="Refresh Halaman" href="{{ route('home') }}"
                        type="button"
                        class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                        <i class="fa fa-undo text-110 w-2 h-2"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 px-0 mb-2 mb-md-0">
                <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                    <!-- the colored circles on bottom right -->
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l3 opacity-3"
                        style="width: 5.25rem; height: 5.25rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l2 opacity-5"
                        style="width: 4.75rem; height: 4.75rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l1 opacity-5"
                        style="width: 4.25rem; height: 4.25rem;"></div>


                    <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                        <div class="text-secondary-d4">
                            @if (Auth::user()->is_admin == 1)
                                <span class="text-200" data-toggle="tooltip" data-placement="top" title="Berita Umum">
                                    {{ DB::table('beritas')->where('kategoriberita', 'Berita Umum')->count() }}
                                </span>
                            @else
                                <span class="text-200" data-toggle="tooltip" data-placement="top"
                                    title="Berita Sekretariat">
                                    {{ DB::table('beritas')->where('kategoriberita', 'Berita Sekretariat')->count() }}
                                </span>
                            @endif

                            <span class="text-md text-danger-m1 align-text-bottom text-nowrap">
                                Berita Umum
                            </span>
                        </div>

                        <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                            <a href="" class="text-decoration-none">
                                <small>
                                    Berita Umum
                                    <i class="fas fa-newspaper"></i>
                                </small>
                            </a>
                        </div>
                    </div>

                    <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                        <i class="fas fa-newspaper text-purple opacity-1 fa-2x mr-25"></i>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 px-0 mb-2 mb-md-0">
                <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                    <!-- the colored circles on bottom right -->
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l3 opacity-3"
                        style="width: 5.25rem; height: 5.25rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l2 opacity-5"
                        style="width: 4.75rem; height: 4.75rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l1 opacity-5"
                        style="width: 4.25rem; height: 4.25rem;"></div>

                    <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                        <div class="text-secondary-d4">
                            @if (Auth::user()->is_admin == 1)
                                <span class="text-200 text-warning" data-toggle="tooltip" data-placement="top"
                                    title="Berita Sekretariat">
                                    {{ DB::table('beritas')->where('kategoriberita', 'Berita Sekretariat')->count() }}
                                </span>
                            @else
                                <span class="text-200 text-success p-0 m-0" data-toggle="tooltip" data-placement="top"
                                    title="Berita Sekretariat">
                                    {{ DB::table('beritas')->where('kategoriberita', 'Berita Sekretariat')->count() }}
                                </span>
                            @endif

                            <span class="text-md text-success-m1 align-text-bottom text-nowrap">
                                Berita Sekretariat
                            </span>
                        </div>

                        <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                            <a href="" class="text-decoration-none">
                                <small>Berita Sekretariat <i class="fas fa-eye"></i></small>
                            </a>
                        </div>
                    </div>

                    <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                        <i class="fas fa-newspaper text-orange opacity-1 fa-2x mr-25"></i>
                    </div>
                </div><!-- /.ccard -->
            </div>


            <div class="col-lg-3 px-0 mb-2 mb-md-0">
                <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                    <!-- the colored circles on bottom right -->
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l3 opacity-3"
                        style="width: 5.25rem; height: 5.25rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l2 opacity-5"
                        style="width: 4.75rem; height: 4.75rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l1 opacity-5"
                        style="width: 4.25rem; height: 4.25rem;"></div>


                    <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                        <div class="text-secondary-d4">
                            <span class="text-200">
                                {{ DB::table('anggota_dewans')->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')->select('akds.akd')->where('akd', 'Pimpinan DPRD')->count() }}
                            </span>
                            <span class="text-md text-danger-m1 align-text-bottom text-nowrap">
                                Pimpinan DPRD
                            </span>
                        </div>

                        <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                            <a href="" class="text-decoration-none">
                                <small>Pimpinan DRPD <i class="fas fa-eye"></i></small>
                            </a>
                        </div>
                    </div>

                    <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                        <i class="fas fa-users text-primary opacity-1 fa-2x mr-25"></i>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 px-0 mb-2 mb-md-0">
                <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                    <!-- the colored circles on bottom right -->
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l3 opacity-3"
                        style="width: 5.25rem; height: 5.25rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l2 opacity-5"
                        style="width: 4.75rem; height: 4.75rem;"></div>
                    <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l1 opacity-5"
                        style="width: 4.25rem; height: 4.25rem;"></div>


                    <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                        <div class="text-secondary-d4">
                            <span class="text-200">
                                {{ DB::table('anggota_dewans')->where('jabatan', 'Anggota')->count() }}
                            </span>
                            <span class="text-md text-success-m1 align-text-bottom text-nowrap">
                                Anggota DPRD
                            </span>
                        </div>

                        <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                            <a href="" class="text-decoration-none">
                                <small>Anggota DPRD <i class="fas fa-eye"></i></small>
                            </a>
                        </div>
                    </div>


                    <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                        <i class="fa fa-users text-success opacity-1 fa-2x mr-25"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0 mt-3">
                <div class="card border-0 h-100">
                    <div class="card-header border-0 bgc-transparent pl-1">
                        <h6 class="card-title mb-2 mb-md-0 text-120 text-grey-d3">
                            <i class="fas fa-chart-line text-primary-m2 mr-1 text-105"></i>
                            Grafik Pengunjung Website
                        </h6>
                    </div>

                    <div class="card-body p-0 ccard px-1 mx-n1 mx-md-0 h-100 d-flex align-items-center">
                        <div class="mx-n2 px-0 mx-md-0 my-2 w-100">
                            <div id="grafikpengunjung" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footerChart')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('grafikpengunjung', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pengunjung Website DPRD Kabupaten Nias Selatan'
            },
            xAxis: {
                categories: {!! json_encode($bulan) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pengunjung'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '' +
                    '<td style="padding:0"><b>{point.y} Kali dikunjungi</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Bulan',
                data: {!! json_encode($pengunjung) !!}
            }]
        });
    </script>
@endsection
