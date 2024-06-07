@extends('layouts.master')

@foreach ($tampil_per_fraksi as $item)
    @section('judul', "{$item->fraksi}")
@endforeach


<link rel="stylesheet" href="{{ asset('assets/css/stylehalaman.css') }}">

@section('content')


    <main id="fraksi" class="bg-F2F2F2">
        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white text-center">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover" alt="dprdkabupatenniasselatan" />
                <div class="lg-00-05 pb-5">
                    <div class="wrapall h-100 pb-sm-3 pb-md-4 pb-lg-5">
                        <div class="row h-100 p-3 p-sm-4 p-md-5 gx-3 gx-sm-4 gx-lg-5">
                            @foreach ($tampil_per_fraksi->take(1) as $item)
                                <div class="col col-6 my-auto">
                                    <div class="d-inline-block bg-white radius-respon float-end">
                                        <img class="p-2 p-lg-4 p-xl-5 small text-secondary img-fluid"
                                            src="{{ asset('logo fraksi/' . $item->logofraksi) }}"
                                            alt="{{ $item->fraksi }}" />
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <div class="d-flex flex-column justify-content-center align-items-start h-100 pb-sm-3">
                                        <div class="mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                            <div class="d-inline-block format-alis fs-875-respon">Fraksi</div>
                                        </div>
                                        <div class="text-start h1-page fw-500 ts-25-000 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                            {{ $item->fraksi }}
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('frontend') }}"
                                                class="link-light ts-25-000 hover-bb-light">Home</a>
                                            <i class="fas fa-angle-right px-3"></i>

                                            <a href="{{ route('tampil_per_fraksi', $item->slugfraksi) }}"
                                                class="link-light ts-25-000 hover-bb-light">Fraksi</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div id="person_list" class="px-sm-3 px-md-4 px-lg-3 main_up">
            <div class="wrapall pb-5">
                @foreach ($tampil_per_fraksi as $item)
                    @if ($item->jabatandifraksi == 'Ketua')
                        <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 mb-4 mb-lg-5">
                            <a class="d-inline-block link-dark text-center"
                                href="{ route('detaildewan', $item->slugnama) }}" ata-toggle="tooltip" data-placement="top"
                                title="{{ $item->namadewan }}">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandifraksi }}
                                </span>
                                <span class="d-block fw-300 teks">
                                    {{ $item->namadewan }}
                                </span>
                            </a>
                        </div>
                    @endif
                @endforeach

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 mb-4 mb-lg-5">
                    @foreach ($tampil_per_fraksi as $item)
                        @if ($item->jabatandifraksi == 'Wakil Ketua' ||
                            $item->jabatandifraksi == 'Bendahara' ||
                            $item->jabatandifraksi == 'Sekretaris')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namadewan }}">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandifraksi }}
                                </span>
                                <span class="d-block fw-300 teks">
                                    {{ $item->namadewan }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-center flex-wrap gap-3 gap-lg-4 mb-4 mb-lg-5">
                    @foreach ($tampil_per_fraksi as $item)
                        @if ($item->jabatandifraksi == 'Anggota')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detaildewan', $item->slugnama) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namadewan }}">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto dewan/' . $item->fotodewan) }}"
                                        alt="{{ $item->namadewan }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatandifraksi }}
                                </span>
                                <span class="d-block fw-300 teks">
                                    {{ $item->namadewan }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
