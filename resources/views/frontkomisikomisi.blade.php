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
                        <a href="{{ route('komisikomisi') }}" class="link-dark hover-bb-dark">{{ $title }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="person_list" class="px-sm-3 px-md-4 ">
            <div class="wrapall">
                <div id="akd" class="px-3 px-md-4 px-xl-5 text-center">
                    <div class="wrapall py-3 py-md-4">
                        <div class="fw-500 fs-2 mb-2 mb-md-3 mb-xl-4">
                            {{-- DAFTAR ANGOTA DPRD KABUPATEN NIAS SELATAN <br> --}}
                            {{ $title }}
                        </div>
                        <article class="bg-white p-4 shadow mx-auto" style="border-radius: 20px; width:100%;">
                            <div class="d-flex flex-wrap justify-content-center lh-sm gap-3">
                                @foreach ($tampikomisi as $item)
                                    <a href="{{ route('tampilakd', $item->slugakd) }}" class="">
                                        <img class="" src="{{ asset('icon akd/' . $item->iconakd) }}" alt=""
                                            class="shadow-lg">
                                        <span class="d-block teks text-wrap">
                                            {{ $item->akd }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </article>
                    </div>


                    <div class="flex-grow-1 putih bg-white radius-respon">
                        <div class="px-3 px-lg-4 py-3 py-lg-4">
                            <table class="ppid w-100 mb-3 mb-lg-4">
                                <tbody>
                                    @php
                                        $nomor = 1;
                                    @endphp
                                    @foreach ($tampilmitrakerja as $item)
                                        @if ($item->akd == 'Komisi 1')
                                            <thead class="text-center h5">
                                                <th colspan="4" class="p-3">
                                                    OPD MITRA KERJA {{ $item->akd }} DPRD Kabupaten Nias Selatan
                                                </th>
                                            </thead>
                                            <thead class="shadow-md" style="background: #f5e3bf; height:40px;">
                                                <th>No</th>
                                                <th>Logo OPD</th>
                                                <th class="judul">Organiasi Perangkat Daerah (OPD)</th>
                                                <th class="judul">Keterangan</th>
                                            </thead>

                                            <tr>
                                                <td>{{ $nomor++ }}</td>
                                                <td class="col-lg-1">
                                                    <img src="{{ asset('mitra kerja/' . $item->logoopd) }}" alt=""
                                                        style="width: 50px; height:50px;">
                                                </td>
                                                <td class="judul">
                                                    {{ $item->namaopd }}
                                                </td>
                                                <td class="judul">
                                                    -
                                                </td>
                                            </tr>
                                        @elseif($item->akd == 'Komisi 2')
                                            <tr class="text-center h5">
                                                <th colspan="4" class="p-3">
                                                    OPD MITRA KERJA {{ $item->akd }} DPRD Kabupaten Nias Selatan
                                                </th>
                                            </tr>
                                            <tr class="shadow-md" style="background: #f5e3bf; height:40px;">
                                                <th>No</th>
                                                <th>Logo OPD</th>
                                                <th class="judul">Organiasi Perangkat Daerah (OPD)</th>
                                                <th class="judul">Keterangan</th>
                                            </tr>

                                            <tr>
                                                <td>{{ $nomor++ }}</td>
                                                <td class="col-lg-1">
                                                    <img src="{{ asset('mitra kerja/' . $item->logoopd) }}" alt=""
                                                        style="width: 50px; height:50px;">
                                                </td>
                                                <td class="judul">
                                                    {{ $item->namaopd }}
                                                </td>
                                                <td class="judul">
                                                    -
                                                </td>
                                            </tr>
                                        @elseif($item->akd == 'Komisi 3')
                                            <tr class="text-center h5">
                                                <th colspan="4" class="p-3">
                                                    OPD MITRA KERJA {{ $item->akd }} DPRD Kabupaten Nias Selatan
                                                </th>
                                            </tr>
                                            <tr class="shadow-md" style="background: #f5e3bf; height:40px;">
                                                <th>No</th>
                                                <th>Logo OPD</th>
                                                <th class="judul">Organiasi Perangkat Daerah (OPD)</th>
                                                <th class="judul">Keterangan</th>
                                            </tr>

                                            <tr>
                                                <td>{{ $nomor++ }}</td>
                                                <td class="col-lg-1">
                                                    <img src="{{ asset('mitra kerja/' . $item->logoopd) }}" alt=""
                                                        style="width: 50px; height:50px;">
                                                </td>
                                                <td class="judul">
                                                    {{ $item->namaopd }}
                                                </td>
                                                <td class="judul">
                                                    -
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
