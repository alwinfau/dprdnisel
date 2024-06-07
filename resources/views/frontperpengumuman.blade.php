@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")
<link rel="stylesheet" href="{{ asset('assets/css/transparansi_anggaran.css') }}">

@section('content')
    <main id="info_publik" class="bg-F2F2F2 px-3 px-md-4 px-xl-5 py-3 py-md-4">
        <div class="wrapall">

            <div class="d-flex align-items-center mb-2">
                <a href="{{ route('frontend') }}" class="link-dark hover-bb-dark">
                    Home
                </a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('transparansianggaran') }}" class="link-dark hover-bb-dark">
                    Informasi Publik
                </a>
            </div>

            <div class="fs-4 fw-500 mb-2">{{ $title }}</div>

            <div class="subrik d-flex flex-wrap gap-2 py-2 mb-3 mb-lg-4">
                @foreach ($grouppengumuman as $item)
                    <a href="{{ route('perpengumuman', $item->slugkategoripengumuman) }}">
                        {{ $item->kategoripengumuman }}
                    </a>
                @endforeach
            </div>

            <div class="bg-white shadow radius-respon w-100 py-3 py-lg-4">
                <ul class="px-4" style="list-style:none;">
                    @foreach ($perpengumuman as $item)
                        <li class="pb-2">
                            <i class="fas fa-check-circle text-E8BF70"></i>
                            <a class="hover-bb-dark link-dark text-decoration-none"
                                href="{{ asset('dokumen pengumuman/' . $item->lampiranpengumuman) }}" target="_blank">
                                {{ $item->judulpengumuman }}
                            </a>
                            <a href="{{ asset('dokumen pengumuman/' . $item->lampiranpengumuman) }}"
                                class="btn text-danger" title="Klik Untuk Preview" target="_blank">
                                <i class="fas fa-print"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection
