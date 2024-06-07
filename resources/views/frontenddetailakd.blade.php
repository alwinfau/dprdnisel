@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/stylehalaman.css') }}">

@section('content')
    <main id="profil" class="bg-F2F2F2">

        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white text-center">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover " alt="DPRD NIAS SELATAN">
                <div class="lg-00-05">
                    <div class="wrapall h-100 pb-3 pb-md-4 pb-xl-5">
                        <div class="d-flex flex-column justify-content-end h-100 pb-sm-3">
                            <div class="mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                <div class="d-inline-block format-alis fs-875-respon">AKD</div>
                            </div>
                            <div class="h1-page fw-500 ts-25-000 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                @foreach ($tampil_per_akd->take(1) as $item)
                                    {{ $item->akd }}
                                @endforeach
                                <br />
                                DPRD Kabupaten Nias Selatan
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3 mb-sm-4 mb-xl-5">
                                <a href="{{ route('frontend') }}" class="link-light ts-25-000 hover-bb-light">Home</a>
                                <i class="fas fa-angle-right px-3"></i>
                                <a href="{{ route('komisikomisi') }}" class="link-light ts-25-000 hover-bb-light">
                                    Alat Kelengkapan Dewan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div id="person_list" class="px-sm-3 px-md-4 px-lg-3 py-4 py-lg-5">
            <div class="wrapall">
                @foreach ($tampil_per_akd->take(1) as $item)
                    <div class="text-center px-3 mb-3 mb-md-4 mb-xl-5 ket">
                        {!! $item->keteranganakd !!}
                    </div>
                @endforeach

                @foreach ($tampil_per_akd as $item)
                    @if ($item->jabatandiakd == 'Ketua')
                        <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 py-3 py-md-4">
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namadewan }} &#13; ({{ $item->jabatandiakd }})">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}" alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandiakd }}
                                </span>
                                <span class="d-block fw-300 teks">{{ $item->namadewan }}</span>
                            </a> <br>
                        </div>
                    @endif
                @endforeach

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 py-3 py-md-4">
                    @foreach ($tampil_per_akd as $item)
                        @if ($item->jabatandiakd == 'Wakil Ketua')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namadewan }} &#13; ({{ $item->jabatandiakd }})">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandiakd }}
                                </span>
                                <span class="d-block fw-300 teks">{{ $item->namadewan }}</span>
                            </a><br>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 py-3 py-md-4">
                    @foreach ($tampil_per_akd as $item)
                        @if ($item->jabatandiakd == 'Anggota')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namadewan }} ({{ $item->jabatandiakd }})">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandiakd }}
                                </span>
                                <span class="d-block fw-300 teks">{{ $item->namadewan }}</span>
                            </a><br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
