@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus mt-0 pt-0">
        <div class="page-header pb-2">
            <div class="row pl-3">
                <a href="{{ route('admin.daftaranggotadewan') }}" class="text-decoration-none" data-toggle="tooltip"
                    title="Kembali">
                    <i class="fas fa-arrow-circle-left pr-3"></i>
                </a>
                <strong> Detail Profil {{ $detaildprd->namadewan }}</strong>
            </div>


            <div class="page-tools d-inline-flex">
                <a data-toggle="tooltip" data-placement="top" title="Refresh"
                    href="{{ route('admin.editdewan', $detaildprd->id) }}" type="button"
                    class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                    <i class="fa fa-undo text-110 w-2 h-2"></i>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card acard mt-lg-12 border-t-4 brc-blue-tp3">


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('foto dewan/' . $detaildprd->fotodewan) }}" alt=""
                                    class="img-fluid d-flex mx-auto" width="200px">
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <strong>Nama Lengkap</strong> <br>
                                                {{ $detaildprd->namadewan }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Jabatan DPRD</strong>
                                                <br>{{ $detaildprd->jabatan }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Pendidikan</strong>
                                                <br>{{ $detaildprd->pendidikan }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Masa Periode</strong>
                                                <br>{{ $detaildprd->periode }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Tempat & Tgl Lahir</strong>
                                                <br>{{ $detaildprd->tmptlahir }},
                                                {{ \Carbon\Carbon::parse($detaildprd->tgllahir)->translatedFormat('l, d F Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <strong>Fraksi</strong> <br>
                                                {{ $detaildprd->fraksi }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Jabatan Fraksi</strong>
                                                <br>{{ $detaildprd->jabatandifraksi }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Daerah Pemilihan</strong>
                                                <br>{{ $detaildprd->dapil }}
                                                <br>({{ $detaildprd->kecamatan }})
                                            </li>
                                            <li class="list-group-item">
                                                <strong>AKD</strong>
                                                <br>{{ $detaildprd->akd }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
