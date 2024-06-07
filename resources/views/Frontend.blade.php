@extends('layouts.master')

@yield('judul', '')

@section('content')
    <div>
        <div id="slide" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators pb-md-2 pb-lg-3 mb-md-5">
                @foreach ($semua_berita as $item)
                    <button type="button" data-bs-target="#slide" data-bs-slide-to="{{ $item->id }}" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($semua_berita as $index => $item)
                    <div class="carousel-item ratio {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('gambar berita/' . $item->gambarberita) }}" class="d-block w-100 of-cover"
                            alt="foto" />
                        <a class="d-flex flex-column lg-00-05 link-light justify-content-end align-items-center pb-5 px-4 px-lg-5 lh-sm"
                            href="{{ route('detailberitaumum', $item->slug) }}">
                            {{-- <span class="d-block mb-3 mb-md-4 mb-xl-5">
                                <span class="format-alis">
                                    {{ $item->kategoriberita }}
                                </span>
                            </span> --}}
                            <span class="d-block h1-res ts-25-000 text-center pb-2 pb-sm-3 pb-md-4">
                                {!! $item->judulberita !!}
                            </span>
                            <span class="haritanggal ts-25-000 pb-sm-2 pb-md-4 pb-lg-5 mb-2 mb-sm-3 mb-md-5">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#slide" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slide" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div id="berita_agenda" class="px-3 px-md-4 px-xl-5 mb-5">
        <div class="wrapall">
            <div class="d-flex flex-column flex-md-row gap-3 gap-md-4 gap-xl-5">
                <div id="berita" class="flex-lg-grow-1">
                    <!-- slide berita umum begin -->
                    <div id="carouselbumum" class="carousel slide mb-3 mb-lg-4" data-bs-ride="carousel">
                        <div class="carousel-indicators mb-0 mb-sm-3 mb-md-0 mb-lg-3">
                            @foreach ($tampil_slide_beritaumum as $item)
                                <button type="button" data-bs-target="#slide" data-bs-slide-to="{{ $item->id }}"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($tampil_slide_beritaumum as $index => $item)
                                <div class="carousel-item ratio {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                        class="of-cover radius-respon small text-secondary" alt="Berita Umum" /> <a
                                        class="lg-00-05 radius-respon text-center text-lg-start d-flex flex-column justify-content-between link-light lh-sm p-4 p-sm-5 p-md-4 p-lg-5 p-xl-5"
                                        href="{{ route('detailberitaumum', $item->slug) }}">
                                        <span><span class="alis">Berita Umum</span></span>
                                        <span>
                                            <span class="d-block judul fw-500 ts-25-000 mb-2 mb-xl-3">
                                                {!! $item->judulberita !!}
                                            </span>
                                            <span class="d-block haritanggal ts-25-000 mb-2">
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselbumum"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselbumum"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- slide berita umum end -->

                    <div
                        class="umum78 lh-sm d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-3 gap-lg-4 mb-3 mb-lg-4">
                        @foreach ($umum_berita->take(2) as $item)
                            <div class="ratio">
                                <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                    class="radius-respon of-cover" alt="DPRD Jabar" />
                                <a href="https://dprd.jabarprov.go.id/berita/nilai-kebangsaan-harus-disosialisasikan-pada-masyarakat-luas"
                                    class="lg-00-05 text-center text-lg-start d-flex flex-column justify-content-end p-4 p-sm-3 p-md-4 p-lg-3 p-xl-4 link-light radius-respon">
                                    <span class="d-block judul fw-500 ts-25-000 mb-2 mb-xl-3">Nilai Kebangsaan Harus
                                        Disosialisasikan Pada Masyarakat Luas</span>
                                    <span class="d-block ts-25-000">Rabu, 18 Mei 2022</span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- slide berita sekretariat begin -->
                    <div id="carouselbsekre" class="carousel slide mb-3 mb-lg-4" data-bs-ride="carousel">
                        <div class="carousel-indicators mb-0 mb-sm-3 mb-md-0 mb-lg-3">
                            @foreach ($berita_sekretariat_slide as $item)
                                <button type="button" data-bs-target="#carouselbsekre"
                                    data-bs-slide-to="{{ $item->id }}" class="active" aria-current="true"
                                    aria-label="Slide 1"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach ($berita_sekretariat_slide as $index => $item)
                                <div class="carousel-item ratio {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                        class="of-cover radius-respon small text-secondary" alt="DPRD Jabar" /> <a
                                        class="lg-00-05 radius-respon text-center text-lg-start d-flex flex-column justify-content-between link-light lh-sm p-4 p-sm-5 p-md-4 p-lg-5 p-xl-5"
                                        href="{{ route('detailberitasekretariat', $item->slug) }}">
                                        <span>
                                            <span class="alis">
                                                {{ $item->kategoriberita }}
                                            </span>
                                        </span>
                                        <span>
                                            <span class="d-block judul fw-500 ts-25-000 mb-2 mb-xl-4">
                                                {!! $item->judulberita !!}
                                            </span>
                                            <span class="d-block haritanggal ts-25-000 mb-2">
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselbsekre"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselbsekre"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- slide berita umum end -->
                </div>

                <div id="agenda" class="">
                    <div class="bg-white shadow radius-respon px-3 px-sm-4 px-md-3 px-xl-4 py-3">
                        <div class="fs-5 fw-500 fc-CD9354 text-center border-bottom-ccc py-2 mb-3">
                            <i class="fas fa-book"></i>
                            Agenda DPRD & Sekretariat
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">
                                    Agenda DPRD
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">Agenda
                                    Sekretariat
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            {{-- agenda dprd --}}
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                @forelse ($show_agenda_dprd as $item)
                                    <div class="d-flex gap-3 align-items-start agenda_list_item py-3 py-md-4">
                                        <div class="jam p-2 p-lg-3 rounded text-center">
                                            <div class="mt-1 jamangka text-white fw-500 fs-5">
                                                <i class="fas fa-clock"></i> <br>
                                                {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('H:i') }}
                                            </div>
                                        </div>

                                        <div class="ket">
                                            <div class="mb-3 fs-5">
                                                {!! $item->namaagenda !!}
                                            </div>
                                            <div class="mb-1 d-flex gap-2 align-items-center">
                                                <div class="icon-cal">
                                                    <i class="fas fa-calendar-alt text-E8BF70"></i>
                                                </div>
                                                <div class="tanggal text-E8BF70">
                                                    {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('l, d F Y') }}
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <div class="icon-spot">
                                                    <i class="fas fa-map-marked text-E8BF70"></i>
                                                </div>
                                                <div class="sepot text-E8BF70">
                                                    {{ $item->lokasi }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Agenda DPRD masoh kosong..!!
                                @endforelse
                            </div>

                            {{-- agenda Sekretariat --}}
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @forelse ($show_agenda_sekretariat as $item)
                                    <div class="d-flex gap-3 align-items-start agenda_list_item py-3 py-md-4">
                                        <div class="jam p-2 p-lg-3 rounded text-center">
                                            <div class="mt-1 jamangka text-white fw-500 fs-5">
                                                <i class="fas fa-clock"></i> <br>
                                                {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('H:i') }}
                                            </div>
                                        </div>

                                        <div class="ket">
                                            <div class="mb-3 fs-5">
                                                {!! $item->namaagenda !!}
                                            </div>
                                            <div class="mb-1 d-flex gap-2 align-items-center">
                                                <div class="icon-cal">
                                                    <i class="fas fa-calendar-alt text-E8BF70"></i>
                                                </div>
                                                <div class="tanggal text-E8BF70">
                                                    {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('l, d F Y') }}
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <div class="icon-spot">
                                                    <i class="fas fa-map-marked text-E8BF70"></i>
                                                </div>
                                                <div class="sepot text-E8BF70">
                                                    {{ $item->lokasi }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Agenda Sekretariat masoh kosong..!!
                                @endforelse
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="lingkar lingkar-sidang me-2"></div>
                                <div class="d-inline-block small">Masa Sidang</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="lingkar lingkar-reses me-2"></div>
                                <div class="d-inline-block small">Reses</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="lingkar lingkar-agenda me-2"></div>
                                <div class="d-inline-block small">Agenda</div>
                            </div>
                        </div>
                    </div>
                    <br>

                    {{-- Halaman Twitter DPRD --}}
                    <div id="agenda" class="">
                        <div class="bg-white shadow radius-respon px-3 px-sm-4 px-md-3 px-xl-4 py-3">
                            <div class="fs-5 fw-500 fc-CD9354 text-center border-bottom-ccc py-2 mb-3">
                                <i class="fab fa-twitter"></i>
                                Twitter DPRD Nias Selatan
                            </div>

                            <a class="twitter-timeline" data-height="500" data-dnt="true"
                                href="https://twitter.com/dprd_kabnisel?ref_src=twsrc%5Etfw">
                                Tweets &copy;dprd_kabnisel
                            </a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                    {{-- Halaman Twitter DPRD --}}


                    {{-- Halaman Twitter DPRD --}}
                    <div id="agenda" class="mt-4">
                        <div class="bg-white shadow radius-respon px-3 px-sm-4 px-md-3 px-xl-4 py-3">
                            <div class="fs-5 fw-500 fc-CD9354 text-center border-bottom-ccc py-2 mb-3">
                                <i class="fas fa-chart-line"></i>
                                Grafik Pengujung Website
                            </div>
                            <div id="grafikpengunjung" style="height: 185px;"></div>
                        </div>
                    </div>
                    {{-- Halaman Twitter DPRD --}}
                </div>
            </div>
        </div>
    </div>

    <div id="akd" class="px-3 px-md-4 px-xl-5 text-center">
        <div class="wrapall py-3 py-md-4">
            <div class="fw-500 fs-2 mb-2 mb-md-3 mb-xl-4">
                Alat Kelengkapan Dewan Kabupaten Nias Selatan
            </div>
            <div class="d-flex flex-wrap justify-content-center lh-sm gap-3">
                @foreach ($semuaakd as $item)
                    <a href="{{ route('tampilakd', $item->slugakd) }}" class="">
                        <img class="" src="{{ asset('icon akd/' . $item->iconakd) }}" alt="">
                        <span class="d-block teks text-wrap">
                            {!! $item->akd !!}
                        </span>
                    </a>
                @endforeach

                <a href="{{ route('komisikomisi') }}" class="">
                    <img class="" src="{{ asset('img/komisi.png') }}" alt="">
                    <span class="d-block teks text-wrap">
                        Komisi-Komisi
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div id="fraksi" class="px-3 px-md-4 px-xl-5">
        <div class="wrapall text-center">
            <div class="fw-500 fs-2 mb-2 mb-md-3 mb-xl-4">Fraksi-Fraksi</div>
            <div class="logo-party mb-4 mb-lg-5">
                <div class="d-flex flex-wrap gap-2 gap-md-3 justify-content-center">
                    @foreach ($datafraksi as $item)
                        <a title="{{ $item->fraksi }}" class="d-inline-block bg-white radius-respon"
                            href="{{ route('tampil_per_fraksi', $item->slugfraksi) }}">
                            <img class="p-2 p-lg-3" src="{{ asset('logo fraksi/' . $item->logofraksi) }}"
                                class="img-fluid" alt="{{ $item->fraksi }}">
                        </a>
                    @endforeach
                </div>
            </div>
            <hr />
        </div>
    </div>

    {{-- Galeri Video --}}
    <div id="video" class="px-3 px-md-4 px-xl-5">
        <div class="wrapall py-2 py-sm-3 py-md-4">
            <div class="fw-500 text-center fs-2 mb-2 mb-md-3 mb-xl-4">Video on Demand DPRD Kabupaten Nias Selatan</div>
            <div class="d-flex flex-column flex-lg-row gap-3 gap-md-4 gap-xl-5 lh-sm">
                <div class="video_kiri flex-lg-grow-1 bg-white radius-respon shadow">
                    @foreach ($galeri_video->take(1) as $item)
                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($galeri_video as $index => $item)
                                <div class="ratio ratio-16x9 tab-pane fade show {{ $index == 0 ? 'active' : '' }} "
                                    id="v-pills-home{{ $item->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <iframe src="{!! $item->link !!}" allow="accelerometer; autoplay;"
                                        frameborder="0" allowfullscreen class="radius-respon of-cover">
                                    </iframe>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <div class="video_kanan d-none d-md-flex flex-lg-column gap-sm-3 gap-xl-4">
                    <div class="d-flex text-white ratio radius-respon">
                        <div class="overflow-auto" style="height: 480px;">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($galeri_video as $index => $item)
                                    <a class="bg-dark nav-link {{ $index == 0 ? 'active' : '' }}" id="v-pills-home-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-home{{ $item->id }}"
                                        type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('foto galeri/' . $item->gambargaleri) }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <small class="ml-3 card-text">
                                                    {{ Str::substr($item->judul, 0, 60) }}...
                                                </small>

                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Galeri Video --}}



    {{-- galeri foto --}}
    <div id="photo" class="px-3 px-sm-4 px-lg-5">
        <div class="wrapall py-3 py-md-4">
            <div class="fw-500 text-center fs-2 mb-1 mb-sm-2 mb-md-3 mb-xl-4">
                Galeri Foto DPRD Kabupeten Nias Selatan
            </div>
            <div id="carouselphoto" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators pb-md-2 pb-lg-3">
                    @foreach ($galeri_foto as $item)
                        <button type="button" data-bs-target="#carouselphoto" data-bs-slide-to="{{ $item->id }}"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($galeri_foto as $index => $item)
                        <div class="carousel-item ratio {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('foto galeri/' . $item->gambargaleri) }}"
                                class="d-block w-100 of-cover radius-respon" alt="{{ $item->deskripsigaleri }}" />
                            <a class="d-flex flex-column lg-00-05 radius-respon link-light justify-content-end align-items-center pb-5 px-4 px-lg-5 lh-sm"
                                href="{{ route('pergalerifoto', $item->slugjudulgaleri) }}">
                                <span class="d-block h1-res ts-25-000 text-center pb-2 pb-sm-3 pb-md-4">
                                    {{ $item->deskripsigaleri }}
                                </span>
                                <span class="haritanggal ts-25-000 pb-sm-2 pb-md-4 pb-lg-5">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselphoto"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselphoto"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    {{-- galeri foto --}}
@endsection



{{-- Untuk Grafik Pengunjung --}}

@section('footerChart')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('grafikpengunjung', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
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
{{-- Untuk Grafik Pengunjung --}}
