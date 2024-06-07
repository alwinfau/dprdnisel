@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")
<link rel="stylesheet" href="{{ asset('assets/css/style_pimpinan.css') }}">

@section('content')
    <main id="profil" class="bg-F2F2F2">
        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white text-center">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover " alt="dprdkabnisel">
                <div class="lg-00-05 pb-5">
                    <div class="wrapall h-100 pb-sm-3 pb-md-4 pb-lg-5">
                        <div class="d-flex flex-column justify-content-end h-100 pb-sm-3">
                            <div class="mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                <div class="d-inline-block format-alis fs-875-respon">Profil DPRD</div>
                            </div>
                            <div class="h1-page fw-500 ts-25-000 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">Pimpinan
                                DPRD<br />Kabupaten Nias Selatan</div>
                            <div class="d-flex justify-content-center align-items-center mb-3 mb-sm-4 mb-xl-5">
                                <a href="{{ route('frontend') }}" class="link-light ts-25-000 hover-bb-light">Home</a>
                                <i class="fas fa-angle-right px-3"></i>
                                <a href="{{ route('pimpinandprd') }}"
                                    class="link-light ts-25-000 hover-bb-light">Pimpinan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div id="person_list" class="px-sm-3 px-md-4 px-lg-3 main_up">
            <div class="wrapall pb-5">

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 mb-4 mb-lg-5">
                    @foreach ($pimpinandprd as $item)
                        @if ($item->jabatan == 'Ketua DPRD')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                title="{{ $item->namadewan }} ({{ $item->jabatan }})">
                                <span class="d-block"><img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" /></span>
                                <span class="d-block fw-500 mb-2 teks">{{ $item->jabatan }}</span>
                                <span class="d-block fw-300 teks">{{ $item->namadewan }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 mb-4 mb-lg-5">
                    @foreach ($pimpinandprd as $item)
                        @if ($item->jabatan == 'Wakil Ketua DPRD')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                title="{{ $item->namadewan }} ({{ $item->jabatan }})">
                                <span class="d-block"><img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" /></span>
                                <span class="d-block fw-500 mb-2 teks">{{ $item->jabatan }}</span>
                                <span class="d-block fw-300 teks">{{ $item->namadewan }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection
