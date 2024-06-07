@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
<style>
    /* Zoom-n-rotate Container */
    .img-hover-rotate img {
        transition: transform .5s ease-in-out;
    }

    /* The Transformation */
    .img-hover-rotate:hover img {
        transform: scale(1.1) rotate(25deg);
    }
</style>

@section('content')
    <main id="foto" class="bg-F2F2F2">

        <!-- cover begin -->
        {{-- <div id="cover"> --}}
        <div class="px-4 px-xl-5 pb-4 pt-3 pb-xl-5">
            <div class="wrapall">
                <div class="d-flex align-items-center p-sm-0 ">
                    <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('galerifoto') }}" class="link-dark hover-bb-dark">Publikasi</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('galerifoto') }}" class="link-dark hover-bb-dark">{{ $title }}</a>
                </div>

                <div class="fs-2 fw-500 mb-3 pb-3 pt-3 mb-xl-4 d-flex justify-content-center">
                    {{ $title }}
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- cover end -->

        <div class="px-4 px-xl-5 main_up pb-4 pb-xl-5">
            <div class="wrapall">
                <div class="row mb-3 mb-md-4">
                    @foreach ($galerifoto as $item)
                        <div class="col col-12 col-sm-6 col-lg-4 p-2 p-xl-3">
                            <a href="{{ route('pergalerifoto', $item->slugjudulgaleri) }}"
                                class="d-block ratio ratio-4x3 link-light lh-sm  img-hover-rotate">
                                <img src="{{ asset('foto galeri/' . $item->gambargaleri) }}"
                                    class="of-cover radius-respon shadow" alt="foto">
                                <span class="d-flex flex-column lg-00-05 radius-respon justify-content-end p-4">
                                    <span class="ts-25-000 fw-500 d-block mb-1 mb-sm-2 mb-md-3 teks">
                                        {{ Str::substr($item->judul, 0, 20) }} ...
                                    </span>
                                    <span class="d-block fw-300">
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- pagina begin -->
                <div class="pagina justify-content-center">
                    <div class="row align-items-center">
                        <div class="col col-2 col-sm-3 col-lg-4">
                            <hr />
                        </div>
                        <div class="col col-8 col-sm-6 col-lg-4 d-flex justify-content-center">
                            {{ $galerifoto->links() }}
                        </div>
                        <div class="col col-2 col-sm-3 col-lg-4">
                            <hr />
                        </div>
                    </div>
                    <!-- pagina end -->
                </div>
            </div>
        </div>
    </main>
@endsection
