@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/kunjungan.css') }}">

@section('content')
    <main id="person_list" class="bg-F2F2F2 p-3 p-md-4">
        <div class="wrapall">
            @if ($message = Session::get('save'))
                <div class="card-body p-0 m-0 mx-auto d-flex" style="width: 90%;">
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show col-12" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="card-body p-0 m-0 mx-auto d-flex">
                <img src="{{ asset('img/kunjungan.png') }}" alt="" class="mx-auto img-fluid shadow" width="90%">
            </div>

            <div class="bg-white shadow mx-auto p-3 img-fluid" style="width: 90%;">
                <form action="{{ route('kunjungan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="lembaga" class="col-sm-3 col-form-label">
                            Nama Instansi/Lembaga:
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namainstansi"
                                placeholder="Nama Lembaga, Instansi dan Lain Sebagainya...">
                            @error('namainstansi')
                                <p class="text-danger italic" style="font-size: 12px;">
                                    <em>{{ $message }}</em>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Kabupaten <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="kabupaten" value="{{ old('kabupaten') }}" type="text"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan isikan kabupaten">
                                        @error('kabupaten')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Provinsi <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="provinsi" value="{{ old('provinsi') }}" type="text"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan isikan provinsi">
                                        @error('provinsi')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            Kategori Kunjungan <span class="text-danger">*)</span>
                                        </label>

                                        <select name="kategorikunjungan" class="form-select"
                                            aria-label="Default select example">
                                            <option value="" disabled selected>Silahkan pilih kategori kunjungan...
                                            </option>
                                            <option value="Study Banding">Study Banding</option>
                                            <option value="Kunjungan Kerja">Kunjungan Kerja</option>
                                            <option value="Audiensi">Audiensi</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        </select>

                                        @error('kategorikunjungan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Kepada <span class="text-danger"> *)</span>
                                        </label>
                                        <select name="kepada" class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected>Silahkan Pilih...</option>
                                            <option value="Pimpinan DPRD">Pimpinan DPRD</option>
                                            <option value="Badan Musyawarah">Badan Musyawarah</option>
                                            <option value="Badan Anggaran">Badan Anggaran</option>
                                            <option value="Alat Kelangkapan Dewan">Alat Kelangkapan Dewan</option>
                                            <option value="Sekretariat DPRD">Sekretariat DPRD</option>
                                            <option value="-">-</option>
                                        </select>

                                        @error('kepada')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            Alat Kelengkapan Dewan <span class="text-danger">*)</span>
                                        </label>

                                        <select name="akd" class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected>Silahkan Pilih AKD...</option>
                                            @forelse ($dataakd as $item)
                                                <option value="{{ $item->akd }}">{{ $item->akd }}</option>
                                            @empty
                                                <option value=""></option>
                                                <option value="-" disabled hidden>Silahkan Input AKD Terlebih
                                                    Dahulu..!!</option>
                                            @endforelse
                                        </select>

                                        @error('akd')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Jumlah Rombongan <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="jumlahrombongan" value="{{ old('jumlahrombongan') }}"
                                            type="number" class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan input jumlah rombongan">
                                        @error('jumlahrombongan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            Tanggal Kedatangan <span class="text-danger">*)</span>
                                        </label>
                                        <input name="tanggalkunjungan" value="{{ old('tanggalkunjungan') }}"
                                            type="date" class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan pilih tanggal kunjungan">
                                        @error('tanggalkunjungan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Jam <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="jamkunjungan" value="{{ old('jamkunjungan') }}" type="time"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan inputkan jam kunjungan">
                                        @error('jamkunjungan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">
                                            Deskripsi Kunjungan <span class="text-danger">*)</span>
                                        </label>
                                        <div class="form-outline">
                                            <textarea name="keterangankunjungan" class="form-control" id="textAreaExample1" rows="10"> </textarea>
                                        </div>
                                        @error('keterangankunjungan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="card-header mb-3 shadow-sm">
                                <strong>
                                    <i class="fas fa-phone-volume"></i>
                                    NARAHUBUNG
                                </strong>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Nama Lengkap <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="namanarahubung" value="{{ old('namanarahubung') }}" type="text"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan isikan nama lengkap">
                                        @error('namanarahubung')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            No. Ponsel <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="noponsel" value="{{ old('noponsel') }}" type="number"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan isikan nomor ponsel anda (AKTIF)">
                                        @error('noponsel')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="card-header mb-3 shadow-sm">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Lampiran Kunjungan
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">
                                            Lampiran Kunjungan <span class="text-danger">*)</span>
                                        </label>
                                        <input id="fileanggaran" type="file" name="dokumenkunjungan"
                                            value="{{ old('dokumenkunjungan') }}" class="form-control" accept=".pdf"
                                            multiple />
                                        @error('dokumenkunjungan')
                                            <p class="text-danger italic" style="font-size: 12px;">
                                                <em>{{ $message }}</em>
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 mt-5">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-save"></i>
                                Kirim Permohonan Kunjungan
                            </button>
                            <button type="reset" class="btn btn-outline-dark">
                                <i class="fas fa-undo-alt"></i>
                                Batalkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body p-0 m-0 mx-auto d-flex">
                <img src="{{ asset('img/footerkunjungan.png') }}" alt="" class="mx-auto img-fluid shadow-lg"
                    width="90%">
            </div>
        </div>
    </main>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#success-alert").fadeTo(5000, 700).slideUp(700, function() {
            $("#success-alert").slideUp(700);
        });
    });
</script>
