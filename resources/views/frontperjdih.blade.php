@extends('layouts.master')

@section('judul', "{$perjdih->juduljdih}")
<link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">

@section('content')
    <main id="detil_one" class="bg-F2F2F2">
        <div class="px-sm-3 px-md-4 px-lg-5 pb-4 pb-sm-5">
            <div class="wrapall">
                <!-- konten begin -->
                <div class="px-4 px-xl-5 pb-4 pt-3 pb-xl-4">
                    <div class="wrapall">
                        <div class="d-flex align-items-center p-sm-0 ">
                            <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                            <i class="fas fa-angle-right px-2 px-md-3"></i>
                            <a href="{{ route('datajdih') }}" class="link-dark hover-bb-dark">JDIH</a>
                            <i class="fas fa-angle-right px-2 px-md-3"></i>
                            <a href="{{ route('perjdih', $perjdih->slugjdih) }}" class="link-dark hover-bb-dark">
                                {{ $perjdih->juduljdih }}
                            </a>
                        </div>

                        <div class="fs-2 fw-500 pt-3 mb-xl-1">
                            {{ $perjdih->juduljdih }}
                            <br>
                            <div class="d-flex justify-content-between">
                                <span class="small fs-6">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($perjdih->created_at)->translatedFormat('l, d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="konten" class="px-0 px-sm-4 px-md-1 w-100">
                    <div class="px-4 px-xl-5 pb-xl-4">
                        <div class="row">
                            <iframe src="{{ asset('dokumen jdih/' . $perjdih->filejdih) }}" frameborder="0" width="500"
                                height="975">
                            </iframe>
                        </div>
                    </div>
                </div>
                <!-- konten end -->
            </div>
        </div>
    </main>
@endsection
