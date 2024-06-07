@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")
<link rel="stylesheet" href="{{ asset('assets/css/style_anggota_dprd.css') }}">

@section('content')
    <main id="profil" class="bg-F2F2F2">
        <div class="wrapall">
            <!-- konten begin -->
            <div class="px-4 px-xl-5 pt-3 pb-xl-4">
                <div class="wrapall">
                    <div class="d-flex align-items-center p-sm-0 ">
                        <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                        <i class="fas fa-angle-right px-2 px-md-3"></i>
                        <a href="{{ route('groupdapil') }}" class="link-dark hover-bb-dark">Daerah Pemilihan</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="person_list" class="px-sm-3 px-md-4 ">
            <div class="wrapall">
                <div id="akd" class="px-3 px-md-4 px-xl-5 text-center">
                    <div class="wrapall py-3 py-md-4">
                        <div class="fw-500 fs-2 mb-2 mb-md-3 mb-xl-4">
                            DAFTAR ANGOTA DPRD KABUPATEN NIAS SELATAN <br>
                            Pemilihan Umum
                        </div>
                        <article class="bg-white p-4 shadow mx-auto" style="border-radius: 20px; width:100%;">
                            <div class="d-flex flex-wrap justify-content-center lh-sm gap-3">
                                @foreach ($groupdapil as $item)
                                    <a href="{{ route('perdapil', $item->slugdapil) }}" class="">
                                        <img class="" src="{{ asset('img/icondapil1.png') }}" alt=""
                                            class="shadow-lg">
                                        <span class="d-block teks text-wrap">
                                            {{ $item->dapil }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
