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
        transform: scale(0.6) rotate(45deg);
    }
</style>

@section('content')
    <main id="foto" class="bg-F2F2F2">

        <!-- cover begin -->
        {{-- <div id="cover"> --}}
        <div class="px-4  pt-3 ">
            <div class="wrapall">
                <div class="d-flex align-items-center p-sm-0 ">
                    <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('livestreaming') }}" class="link-dark hover-bb-dark">Publikasi</a>
                    <i class="fas fa-angle-right px-2 px-md-3"></i>
                    <a href="{{ route('livestreaming') }}" class="link-dark hover-bb-dark">{{ $title }}</a>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- cover end -->

        <div class="p-3 p-md-4 p-xl-5">
            <div class="wrapall">
                @foreach ($galerilive->take(1) as $item)
                    <div class="h1-page text-center fw-500 mb-4">
                        {{ $item->judul }}
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                    </div>
                    <div class="ratio ratio-16x9 mb-4 radius-respon">
                        <iframe width="855" height="481" src="{!! $item->link !!}?autoplay=1&mute=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
