@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")

<style>
    /* Autoload */
    .wrapper>ul#results li {
        margin-bottom: 2px;
        background: #e2e2e2;
        padding: 20px;
        width: 97%;
        list-style: none;
    }

    .ajax-loading {
        text-align: center;
    }

    /* Autoload */

    .ts-25-000 {
        text-shadow: 0 0 25px black;
    }

    .breadcrumb .active {
        background: #E8BF70;
        border: 0px;
        color: white;
    }

    /* .breadcrumb .active.hover, */
    .breadcrumb .active:hover {
        background: #E8BF70;
        border: solid 1px #E8BF70;
        color: white;
        font-weight: 500;
    }

    .breadcrumb .kategori:hover {
        background: #E8BF70;
        border: solid 1px #E8BF70;
        color: white;
        font-weight: 500;
    }

    .format-alis-border {
        border: solid 2px white;
        padding: 5px 20px;
        border-radius: 20px;
        font-weight: 500;
        color: white;
    }

    @media (min-width: 768px) {

        /* md */
        .format-alis-border {
            padding: 7px 30px;
            border-radius: 30px;
        }
    }

    #list_teks .judul45a {
        font-size: 125%;
    }

    @media (min-width: 448px) {
        /* #list_teks .judul45a { font-size: 112.5%; } */
    }

    @media (min-width: 576px) {

        /* sm */
        #list_teks .judul45a {
            font-size: 140%;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .judul45a {
            font-size: 160%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #list_teks .judul45a {
            font-size: 180%;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #list_teks .judul45a {
            font-size: 200%;
        }
    }

    #list_teks .row4 .ratio {
        --bs-aspect-ratio: 100%;
    }

    @media (min-width: 448px) {}

    @media (min-width: 576px) {

        /* sm */
        #list_teks .row4 .ratio {
            --bs-aspect-ratio: 90%;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .row4 .ratio {
            --bs-aspect-ratio: 80%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #list_teks .row4 .ratio {
            --bs-aspect-ratio: 70%;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #list_teks #row4 .ratio {
            --bs-aspect-ratio: 60%;
        }
    }

    #list_teks .row4 .judul {
        font-size: 112.5%;
    }

    @media (min-width: 448px) {
        /* #list_teks .row4 .judul { font-size: 112.5%; } */
    }

    @media (min-width: 576px) {

        /* sm */
        #list_teks .row4 .judul {
            font-size: 125%;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .row4 .judul {
            font-size: 150%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #list_teks .row4 .judul {
            font-size: 175%;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #list_teks .row4 .judul {
            font-size: 200%;
        }
    }

    .pagina .index a {
        font-size: 125%;
        width: 35px;
        height: 35px;
        color: #313131;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .pagina div a:hover,
    .pagina div a.hover {
        background: #E8BF70;
        color: white;
    }

    .pagina hr {
        border: 1px solid #000;
    }

    @media (min-width: 576px) {

        /* sm */
        .pagina .index a {
            font-size: 137.5%;
            width: 45px;
            height: 45px;
        }
    }

    #list_teks .judul45a {
        font-size: 125%;
    }

    @media (min-width: 448px) {
        /* #list_teks .judul45a { font-size: 112.5%; } */
    }

    @media (min-width: 576px) {

        /* sm */
        #list_teks .judul45a {
            font-size: 140%;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .judul45a {
            font-size: 160%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #list_teks .judul45a {
            font-size: 180%;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #list_teks .judul45a {
            font-size: 200%;
        }
    }

    #list_teks .judul45 {
        font-size: 125%;
    }

    @media (min-width: 448px) {
        /* #list_teks .judul45 { font-size: 112.5%; } */
    }

    @media (min-width: 576px) {
        /* sm */
        /* #list_teks .judul45 { font-size: 125%; line-height: 1.25; } */
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .judul45 {
            font-size: 137.5%;
        }
    }

    @media (min-width: 992px) {
        /* lg */
        /* #list_teks .judul45 { font-size: 150%; } */
    }

    @media (min-width: 1200px) {
        /* xl */
        /* #list_teks .judul45 { font-size: 162.5%; } */
    }

    #list_teks .row4 .judul {
        font-size: 112.5%;
    }

    @media (min-width: 448px) {
        /* #list_teks .row4 .judul { font-size: 112.5%; } */
    }

    @media (min-width: 576px) {

        /* sm */
        #list_teks .row4 .judul {
            font-size: 125%;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #list_teks .row4 .judul {
            font-size: 150%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #list_teks .row4 .judul {
            font-size: 175%;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #list_teks .row4 .judul {
            font-size: 200%;
        }
    }

    #list_teks .haritanggal {
        font-size: 100%;
    }

    @media (min-width: 576px) {
        #list_teks .haritanggal {
            font-size: 106.25%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #list_teks .haritanggal {
            font-size: 112.5%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        #list_teks .haritanggal {
            font-size: 118.75%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        #list_teks .haritanggal {
            font-size: 125%;
        }
    }

    /* xl */

    #list_teks .haritanggal45 {
        font-size: 100%;
    }

    /* @media (min-width: 576px) { #list_teks .haritanggal45 { font-size: 93.75%; } } sm */
    @media (min-width: 768px) {
        #list_teks .haritanggal45 {
            font-size: 106.25%;
        }
    }

    /* md */
    /* @media (min-width: 992px) { #list_teks .haritanggal45 { font-size: 106.25%; } } lg */
    @media (min-width: 1200px) {
        #list_teks .haritanggal45 {
            font-size: 112.5%;
        }
    }

    /* xl */

    #list_teks .subjudul {
        font-size: 100%;
    }

    @media (min-width: 576px) {
        #list_teks .subjudul {
            font-size: 106.25%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #list_teks .subjudul {
            font-size: 112.5%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        #list_teks .subjudul {
            font-size: 118.75%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        #list_teks .subjudul {
            font-size: 125%;
        }
    }

    .of-cover {
        object-fit: cover
    }

    /* xl */
</style>


@section('content')
    <main id="list_teks" class="bg-F2F2F2">
        <!-- slide begin -->
        <div id="slide" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators mb-md-4 mb-xl-5">
                @foreach ($beritaumumslider as $item)
                    <button type="button" data-bs-target="#slide" data-bs-slide-to="{{ $item->id }}" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($beritaumumslider as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ route('detailberitaumum', $item->slug) }}" class="d-block ratio">
                            <img src="{{ asset('gambar berita/' . $item->gambarberita) }}" class="w-100 of-cover"
                                alt="foto">
                            <span class="d-block lg-00-05"></span>
                        </a>

                        <a href="{{ route('detailberitaumum', $item->slug) }}"
                            class="d-block carousel-caption link-light mb-md-4 mb-xl-5">
                            <span class="d-block mb-3 mb-md-4 mb-xl-5">
                                <span class="format-alis">
                                    {{ $item->kategoriberita }}
                                </span>
                            </span>
                            <span class="d-block mb-3 mb-md-4 mb-xl-5 h1-page fw-500 ts-25-000">
                                {{ $item->judulberita }}
                            </span>
                            <span class="d-block mb-3 mb-md-4 mb-xl-5 haritanggal ts-25-000">
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
        <!-- slide end -->

        {{-- Kolom 123 --}}
        <div class="px-3 px-md-4 px-xl-5 py-4 py-xl-5">
            <div class="wrapall">
                <!-- breadcrumb begin -->
                <div class="row mb-2 mb-xl-4">
                    <div class="col col-12 col-lg-8">
                        <div class="breadcrumb d-flex justify-content-center align-items-center gap-2 gap-md-3 gap-xl-4">
                            <a href="{{ route('beritaumum') }}" class="active">
                                Berita Umum
                            </a>
                            <a href="{{ route('beritasekretariat') }}" class="kategori">Berita Sekretariat</a>
                            <hr class="d-none d-lg-block flex-grow-1" />
                        </div>
                    </div>
                    <div class="col col-12 col-lg-4">
                        <span class="d-block fw-500 fs-4 pt-0 pt-lg-1 text-center text-lg-start">Berita Terkini</span>
                    </div>
                </div>

                <div class="row gy-3 gy-sm-4 gy-lg-0 mb-4 mb-sm-5">
                    <div class="col col-12 col-lg-8">
                        @foreach ($beritaumum->take(1) as $item)
                            <a href="{{ route('detailberitaumum', $item->slug) }}"
                                class="d-block ratio ratio-4x3 link-light lh-sm">
                                <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                    class="of-cover radius-respon shadow" alt="foto">
                                <span class="d-flex flex-column lg-00-05 radius-respon justify-content-between p-4 p-md-5">
                                    <span>
                                        <span class="format-alis-border bg-danger">
                                            {{ $item->kategoriberita }}
                                        </span>
                                    </span>
                                    <span>
                                        <span class="ts-25-000 judul45a fw-500 d-block mb-1 mb-sm-2 mb-md-3">
                                            {!! $item->judulberita !!}
                                        </span>
                                        <span class="d-block haritanggal fw-300">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                            |
                                            <i class="fas fa-clock"></i>
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                            {{-- |
                                            <i class="fas fa-eye"></i>
                                            @if ($item->dilihat == null)
                                                0 Views
                                            @elseif($item->dilihat == 1)
                                                {{ $item->dilihat }} View
                                            @else
                                                {{ $item->dilihat }} Views
                                            @endif
                                            |
                                            <i class="fas fa-share"></i>
                                            @if ($item->dilihat == null)
                                                0 dibagikan
                                            @else
                                                {{ $item->dibagikan }}
                                            @endif --}}
                                        </span>
                                    </span>
                                </span>
                            </a>
                        @endforeach
                    </div>

                    <div class="col col-12 col-lg-4">
                        <div class="row gy-3 gy-sm-0 gy-lg-4">
                            @foreach ($beritaumum->skip(1)->take(2) as $item)
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <a href="{{ route('detailberitaumum', $item->slug) }}"
                                        class="d-block ratio ratio-4x3 link-light lh-sm">
                                        <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                            class="pl-3 of-cover radius-respon shadow" alt="foto">
                                        <span class="d-flex flex-column lg-00-05 radius-respon justify-content-end p-4">
                                            <span class="ts-25-000 judul45 fw-500 d-block mb-1 mb-sm-2 mb-md-3">
                                                {!! $item->judulberita !!}
                                            </span>
                                            <span class="d-block haritanggal45 fw-300">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                |
                                                <i class="fas fa-clock"></i>
                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Kolom 123 --}}

        <!-- list row 4 begin -->
        <div class="wrapall">

            <div class="row4 row gy-3 gy-md-4 mb-4 mb-lg-5">
                @foreach ($paginateberitaumum as $item)
                    <div>
                        <a href="{{ route('detailberitaumum', $item->slug) }}" class="row link-dark lh-sm">
                            <span class="col col-5 col-sm-4 pe-1 pe-sm-2 pe-md-3 pe-lg-4 pe-xl-5">
                                <span class="d-block ratio">
                                    <img class="of-cover radius-respon shadow"
                                        src="{{ asset('gambar berita/' . $item->gambarberita) }}" alt="">
                                </span>
                            </span>
                            <span class="col col-7 col-sm-8">
                                <span class="d-block judul fw-500 mb-1 mb-sm-2 mb-md-3">
                                    {!! $item->judulberita !!}
                                </span>
                                <span class="d-block haritanggal fw-300 mb-1 mb-sm-2 mb-md-3">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                    |
                                    <i class="fas fa-clock"></i>
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                    {{-- |
                                    <i class="fas fa-eye"></i>
                                    @if ($item->dilihat == null)
                                        0 Views
                                    @elseif($item->dilihat == 1)
                                        {{ $item->dilihat }} View
                                    @else
                                        {{ $item->dilihat }} Views
                                    @endif
                                    |
                                    <i class="fas fa-share"></i>
                                    @if ($item->dibagikan == null)
                                        0 dibagikan
                                    @else
                                        {{ $item->dibagikan }}
                                    @endif --}}
                                </span>
                                <span class="d-none d-sm-block fw-300">
                                    {{ $item->deskripsisingkat }}...
                                </span>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- pagina begin -->
        {{-- <div class="pagina"> --}}
        <div class="row align-items-center">
            <div class="col col-2 col-sm-3 col-lg-4">
                <hr />
            </div>
            <div class="col col-8 col-sm-6 col-lg-4">
                <div class="index text-center d-flex justify-content-center">
                    {{ $paginateberitaumum->links() }}
                </div>
            </div>
            <div class="col col-2 col-sm-3 col-lg-4">
                <hr />
            </div>
        </div>
        {{-- </div> --}}
        <!-- pagina end -->
    </main>
@endsection
