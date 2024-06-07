@extends('layouts.master')

@section('judul', 'Hasil Pencarian')
<link rel="stylesheet" href="{{ asset('assets/css/ppidstyle.css') }}">

@section('content')
    <main id="ppid" class="bg-F2F2F2 px-3 px-md-4 px-xl-5 py-3 py-md-4">
        <div class="wrapall">
            <div class="d-flex align-items-center mb-2">
                <a href="{{ route('frontend') }}" class="link-dark hover-bb-dark">
                    Home
                </a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('frontend') }}" class="link-dark hover-bb-dark">
                    Pencarian
                </a>
            </div>

            <div class="fs-4 fw-500 mb-2">
                Hasil Pencarian
            </div>

            <div class="d-flex flex-column flex-md-row gap-3 lh-sm mb-5">


                <div class="flex-grow-1 putih bg-white shadow radius-respon">
                    <div class="px-3 px-lg-4 py-3 py-lg-4">
                        @foreach ($berita as $item)
                            <ul class="px-4">
                                <li class="px-1 px-md-2 text-E8BF70 pb-3">
                                    <a class="d-inline-block link-dark pb-2 hover-bb-dark align-top lh-sm"
                                        href="{{ route('detailberitaumum', $item->slug) }}" title="Klik untuk selengkapnya">
                                        <span class="d-block fc-CD9354">
                                            Berita
                                        </span>
                                        <span class="d-block fs-5">
                                            {!! $item->deskripsisingkat !!}
                                        </span>
                                        <span class="d-block text-secondary">
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        @endforeach


                        <!-- pagina begin -->
                        <div class="row align-items-center">
                            <div class="col col-2 col-sm-3 col-lg-4">
                                <hr />
                            </div>
                            <div class="col col-8 col-sm-6 col-lg-4">
                                <div class="index text-center d-flex justify-content-center">
                                    {{ $berita->links() }}
                                </div>
                            </div>
                            <div class="col col-2 col-sm-3 col-lg-4">
                                <hr />
                            </div>
                        </div>
                        <!-- pagina begin -->
                    </div>
                </div>
            </div>
    </main>
@endsection
