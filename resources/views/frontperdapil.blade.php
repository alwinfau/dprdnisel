@extends('layouts.master')
@foreach ($perdapil->take(1) as $item)
    @section('judul', "{$item->dapil}")
@endforeach
<link rel="stylesheet" href="{{ asset('assets/css/style_anggota_dprd.css') }}">

@section('content')

    <main id="profil" class="bg-F2F2F2">

        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white text-center">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover " alt="dprdjabar">
                <div class="lg-00-05">
                    <div class="wrapall h-100 pb-sm-3 pb-md-4 pb-lg-5">
                        <div class="d-flex flex-column justify-content-end h-100 pb-sm-3">
                            <div class="mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                <div class="d-inline-block format-alis fs-875-respon">Profil Anggota DPRD</div>
                            </div>
                            <div class="h1-page fw-500 ts-25-000 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                DAFTAR ANGOTA DPRD KABUPATEN NIAS SELATAN <br>
                                Pemilihan Umum
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3 mb-sm-4 mb-xl-5">
                                <a href="route('frontend')" class="link-light ts-25-000 hover-bb-light">Home</a>
                                <i class="fas fa-angle-right px-3"></i>
                                @foreach ($perdapil->take(1) as $item)
                                    <a href="{{ route('groupdapil') }}" class="link-light ts-25-000 hover-bb-light">
                                        Daerah Pemilihan
                                    </a>
                                    <i class="fas fa-angle-right px-3"></i>
                                    <a href="{{ route('perdapil', $item->slugdapil) }}"
                                        class="link-light ts-25-000 hover-bb-light">{{ $item->dapil }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div id="person_list" class="px-sm-3 px-md-4 px-lg-3 py-4 py-lg-5">
            <div class="wrapall">
                @foreach ($perdapil->take(1) as $item)
                    <div class="text-center fw-500 fs-5">{{ $item->dapil }}</div>
                    <div class="text-center fs-5 m-2">{!! $item->kecamatan !!}</div>
                @endforeach

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 py-3 py-md-4">
                    @foreach ($perdapil as $item)
                        <a class="d-inline-block text-center link-dark" href="{{ route('detaildewan', $item->slugnama) }}">
                            <span class="d-block">
                                <img class="w-100 text-secondary small" src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                    alt="{{ $item->namadewan }}" /></span>
                            <span class="d-block fw-500 mb-2 teks">
                                {{ $item->namadewan }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
