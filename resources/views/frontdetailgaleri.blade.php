@extends('layouts.master')

@section('judul', "{$pergalerifoto->judul}")
<link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">

@section('content')
    <main id="foto" class="bg-F2F2F2">
        <div class="px-4 px-xl-5 pb-4 pt-3 pb-xl-5">
            <div class="wrapall">
                <div class="d-flex align-items-center p-sm-0 ">
                    <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('galerifoto') }}" class="link-dark hover-bb-dark">Photo Gallery</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}" class="link-dark hover-bb-dark">
                        {{ Str::substr($pergalerifoto->judul, 0, 150) }}...
                    </a>
                </div>

                <div class="fs-2 fw-500 mb-3 pb-3 pt-3 mb-xl-4 d-flex justify-content-center">
                    Photo Gallery DPRD Kabupaten Nias Selatan
                </div>
            </div>
        </div>
        {{-- </div> --}}

        <div class="px-4 px-xl-5 main_up pb-4 pb-xl-5">
            <div class="wrapall">
                <div class="row mb-3 mb-md-4">
                    <div class="col col-12 col-sm-6 col-lg-12 p-2 p-xl-3">
                        <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}"
                            class="d-block ratio ratio-4x3 link-light lh-sm">
                            <img src="{{ asset('foto galeri/' . $pergalerifoto->gambargaleri) }}"
                                class="of-cover radius-respon shadow w-100" alt="foto">
                            <span class="d-flex flex-column lg-00-05 radius-respon justify-content-end p-4">
                                <span class="ts-25-000 fw-500 d-block mb-1 mb-sm-2 mb-md-3 teks">
                                    {{ $pergalerifoto->judul }}
                                </span>
                                <span class="d-block fw-300">
                                    {{ \Carbon\Carbon::parse($pergalerifoto->created_at)->translatedFormat('l, d F Y') }}
                                </span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="row mb-3 mb-md-4">
                    <div class="col col-12 col-sm-6 col-lg-3 p-2 p-xl-3">
                        <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}"
                            class="d-block ratio ratio-4x3 link-light lh-sm">
                            <img src="{{ asset('foto galeri/' . $pergalerifoto->gambar1) }}"
                                class="of-cover radius-respon shadow w-100" alt="foto">
                        </a>
                    </div>
                    <div class="col col-12 col-sm-6 col-lg-3 p-2 p-xl-3">
                        <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}"
                            class="d-block ratio ratio-4x3 link-light lh-sm">
                            <img src="{{ asset('foto galeri/' . $pergalerifoto->gambar2) }}"
                                class="of-cover radius-respon shadow w-100" alt="foto">
                        </a>
                    </div>
                    <div class="col col-12 col-sm-6 col-lg-3 p-2 p-xl-3">
                        <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}"
                            class="d-block ratio ratio-4x3 link-light lh-sm">
                            <img src="{{ asset('foto galeri/' . $pergalerifoto->gambar3) }}"
                                class="of-cover radius-respon shadow w-100" alt="foto">
                        </a>
                    </div>
                    <div class="col col-12 col-sm-6 col-lg-3 p-2 p-xl-3">
                        <a href="{{ route('pergalerifoto', $pergalerifoto->slugjudulgaleri) }}"
                            class="d-block ratio ratio-4x3 link-light lh-sm">
                            <img src="{{ asset('foto galeri/' . $pergalerifoto->gambar4) }}"
                                class="of-cover radius-respon shadow w-100" alt="foto">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
