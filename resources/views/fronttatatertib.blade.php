@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/ppidstyle.css') }}">

@section('content')
    <main id="ppid" class="bg-F2F2F2 px-3 px-md-4 px-xl-5 py-3 py-md-4">
        <div class="wrapall">
            <div class="d-flex align-items-center mb-2">
                <a href="{{ route('frontend') }}" class="link-dark hover-bb-dark">
                    Home
                </a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('tatatertib') }}" class="link-dark hover-bb-dark">
                    Peraturan DPRD
                </a>
            </div>

            <div class="fs-4 fw-500 mb-2">
                {{ $title }}
            </div>

            <div class="d-flex flex-column flex-md-row gap-3 lh-sm mb-5">
                <div class="biru radius-respon">
                    <div class="ps-3 pe-4 py-3 py-lg-4">
                        <ul class="ul2">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($tatatertib as $item)
                                <a href="{{ route('perperaturan', $item->slugkategori) }}">
                                    {{ $no++ }}. {{ $item->kategori }}
                                </a>
                            @endforeach
                        </ul>
                    </div>

                    <style>
                        #ppid .ul2 {
                            list-style: disc;
                            padding-left: 0px;
                            color: #fff;
                            background: #159;
                        }

                        #ppid .ul2 a {
                            border-bottom: solid 1px #16b;
                        }

                        #ppid .ul2 a:last-child {
                            border: 0;
                        }

                        #ppid .ul2 a {
                            display: block;
                            font-size: 93.8%;
                            line-height: 125%;
                            color: #fff;
                            text-align: left;
                            padding: 9px 5px 9px 8px;
                        }

                        #ppid .ul2 a:hover {
                            /*color: #000; text-decoration: underline;*/
                            background: #147;
                        }

                        #ppid .ul3 {
                            list-style: circle;
                            padding-left: 40px;
                            background: #147;
                            color: #fff;
                        }

                        #ppid .ul3>li {
                            margin-bottom: 10px;
                        }

                        #ppid .ul3>li>a {
                            display: block;
                            font-size: 87.5%;
                            line-height: 1.5em;
                            color: #fff;
                            text-align: left;
                        }

                        #ppid .ul3>li>a:hover {
                            /*color: #000;*/
                            text-decoration: underline;
                        }

                        @media (max-width: 800px) {
                            #ppid .ul2>li>a {
                                font-size: 87.5%;
                            }
                        }
                    </style>
                </div>

                <div class="flex-grow-1 putih bg-white shadow radius-respon">
                    <div class="px-3 px-lg-4 py-3 py-lg-4">
                        <table class="ppid w-100 mb-3 mb-lg-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="judul">Nama File Peraturan PPRD</th>
                                    <th class="text-center">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nomor = 1;
                                @endphp
                                @foreach ($semuatatatertib as $index => $item)
                                    <tr>
                                        <td>{{ $index + $semuatatatertib->firstItem() }}</td>
                                        <td class="judul">
                                            {{ $item->fileperaturan }}
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-md"
                                                href="{{ asset('peraturan dprd/' . $item->fileperaturan) }}" target="_blank"
                                                title="Lihat Dokumen">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- pagina begin -->
                        <div class="row align-items-center">
                            <div class="col col-2 col-sm-3 col-lg-4">
                                <hr />
                            </div>
                            <div class="col col-8 col-sm-6 col-lg-4">
                                <div class="index text-center d-flex justify-content-center">
                                    {{ $semuatatatertib->links() }}
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
