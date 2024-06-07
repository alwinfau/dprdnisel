@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus">
        <form action="{{ route('admin.rubahkunjungan', $updatekunjungan->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card-header justify-content-between">
                <h4 class="mb-0">
                    <a href="{{ route('admin.kunjungan') }}" data-toggle="tooltip" title="Kembali"
                        class="text-decoration-none text-danger">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </a>
                    DETAIL KUNJUNGAN
                </h4>

                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-check-circle"></i>
                    Konfirmasi
                </button>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <div class="border-t-4 brc-blue-tp3">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-body p-0 shadow">
                        <iframe src="{{ asset('dokumen kunjungan/' . $updatekunjungan->dokumenkunjungan) }}"
                            frameborder="0" class="mt-2" width="100%" height="400px"></iframe>
                    </div>
                </div>

                <div class="col-md-6">
                    <table class="table table-stripped table-hover">
                        <tbody class="m-0">
                            <tr>
                                <td>Nama Instansi</td>
                                <td class="">:</td>
                                <td>{{ $updatekunjungan->instansi }}</td>
                            </tr>
                            <tr>
                                <td>Nama Kabupaten/Prov.</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->kabupaten }}/{{ $updatekunjungan->provinsi }}</td>
                            </tr>
                            <tr>
                                <td>Kategori Kunjungan</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->kategorikunjungan }}</td>
                            </tr>
                            <tr>
                                <td>Kepada</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->kepada }}</td>
                            </tr>
                            <tr>
                                <td>AKD</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->akd }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Rombongan</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->jumlahrombongan }} Orang</td>
                            </tr>
                            <tr>
                                <td>Hari/Tanggal Kunjungan</td>
                                <td>:</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($updatekunjungan->tglkedatangan)->translatedFormat('l, d F Y') }},
                                    {{ \Carbon\Carbon::parse($updatekunjungan->jam)->translatedFormat('H:i') }} wib
                                </td>
                            </tr>
                            <tr>
                                <td>Narahubung</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->koordinator }}</td>
                            </tr>
                            <tr>
                                <td>No. Ponsel</td>
                                <td>:</td>
                                <td>{{ $updatekunjungan->noponsel }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
