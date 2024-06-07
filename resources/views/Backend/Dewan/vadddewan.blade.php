@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus mt-0 pt-0">
        <div class="page-header pb-2">
            <h1 class="page-title text-primary-d2 text-150">
                Beranda
                <small class="page-info text-secondary-d2 text-nowrap">
                    <i class="fa fa-angle-double-right text-80"></i>
                    <a href="{{ 'home' }}" class="text-decoration-none">Home</a>
                    <i class="fas fa-angle-right text-80"></i> {{ $title }}
                </small>
            </h1>

            <div class="page-tools d-inline-flex">
                <a data-toggle="tooltip" data-placement="top" title="Refresh" href="{{ route('admin.adddewan') }}"
                    type="button"
                    class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                    <i class="fa fa-undo text-110 w-2 h-2"></i>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card acard mt-lg-12 border-t-4 brc-blue-tp3">
                    <div class="card-body pb-1">
                        <form action="{{ route('admin.simpandewan') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="id-form-field-1" class="mb-0">
                                        Nama Anggota Dewan <span class="text-danger"> *)</span>
                                    </label>
                                </div>

                                <div class="col-sm-10">
                                    <input name="namadewan" value="{{ old('namadewan') }}" type="text"
                                        class="form-control" id="exampleInputEmail1"
                                        placeholder="Nama Anggota Dewan (Nama Lengkap Berserta Gelar)">
                                    @error('namadewan')
                                        <em class="text-danger text-80">{{ $message }}</em></p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Jabatan <span class="text-danger">*)</span>
                                            </label>

                                            <select name="jabatan" id="form-field-chosen-1"
                                                data-placeholder="Pilih Jabatan.."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                <option value="Ketua DPRD">Ketua DPRD</option>
                                                <option value="Wakil Ketua DPRD">Wakil Ketua DPRD</option>
                                                <option value="Anggota">Anggota</option>
                                            </select>

                                            @error('jabatan')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Pendidikan <span class="text-danger">*)</span>
                                            </label>
                                            <input name="pendidikan"
                                                class="form-control btn-group-inside-spinner form-control-md" type="text"
                                                value="{{ old('pendidikan') }}"
                                                placeholder="(Misal : Sarjana, Magister, Doktor, Profesor, dll)">
                                            @error('pendidikan')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Periode <span class="text-danger">*)</span>
                                            </label>
                                            <select name="periode" id="form-field-chosen-1"
                                                data-placeholder="Pilih Periode Jabatan..."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                @php
                                                    $now = date('Y');
                                                    for ($i = 2000; $i < $now + 1; $i++) {
                                                        $tahun = $i + 5;
                                                        echo "<option value='$i - $tahun'>$i - $tahun </option>";
                                                    }
                                                @endphp

                                            </select>

                                            @error('periode')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Tempat Lahir<span class="text-danger"> *)</span>
                                            </label>
                                            <input name="tempatlahir"
                                                class="form-control btn-group-inside-spinner form-control-md" type="text"
                                                value="{{ old('tempatlahir') }}" placeholder="Tempat Lahir">
                                            @error('tempatlahir')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Tanggal Lahir<span class="text-danger"> *)</span>
                                            </label>
                                            <input name="tgllahir" type="date"
                                                class="form-control btn-group-inside-spinner form-control-md"
                                                value="{{ old('tgllahir') }}" placeholder="Tanggal Lahir">
                                            @error('tgllahir')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Fraksi <span class="text-danger">*)</span>
                                            </label>
                                            <select name="fraksi" id="form-field-chosen-1"
                                                data-placeholder="Pilih Fraksi..."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                @foreach ($datafraksi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->fraksi }}</option>
                                                @endforeach
                                                <option value="-">-</option>
                                            </select>

                                            @error('fraksi')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Jabatan di Fraksi<span class="text-danger"> *)</span>
                                            </label>
                                            <select name="jabatandifraksi" id="form-field-chosen-1"
                                                data-placeholder="Pilih Jabatan di Fraksi.."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                <option value="Ketua">Ketua</option>
                                                <option value="Wakil Ketua">Wakil Ketua</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Bendahara">Bendahara</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="-">-</option>
                                            </select>
                                            @error('jabatandifraksi')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Daerah Pemilihan <span class="text-danger">*)</span>
                                            </label>
                                            <select name="dapil" id="form-field-chosen-1"
                                                data-placeholder="Pilih Daerah Pemilihan..."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                @foreach ($datadapil as $item)
                                                    <option value="{{ $item->id }}">{{ $item->dapil }}</option>
                                                @endforeach
                                                <option value="-">-</option>
                                            </select>

                                            @error('dapil')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Alat Kelengkapan Dewan <span class="text-danger">*)</span>
                                            </label>
                                            <select name="akd" id="form-field-chosen-1"
                                                data-placeholder="Pilih Alat Kelengkapan Dewan..."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                @foreach ($dataakd as $item)
                                                    <option value="{{ $item->id }}">{{ $item->akd }}</option>
                                                @endforeach
                                                <option value="-">-</option>
                                            </select>

                                            @error('akd')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Jabatan di Alat Kelengkapan Dewan<span class="text-danger"> *)</span>
                                            </label>
                                            <select name="jabatandiakd" id="form-field-chosen-1"
                                                data-placeholder="Pilih Jabatan di Alat Kelengkapan Dewan.."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                <option value="Ketua">Ketua</option>
                                                <option value="Wakil Ketua">Wakil Ketua</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Bendahara">Bendahara</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Sekwan (Bukan Anggota)">Sekwan (Bukan Anggota)</option>
                                                <option value="-">-</option>
                                            </select>
                                            @error('jabatandiakd')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="id-form-field-1" class="mb-0">
                                        Foto Profil <span class="text-danger"> *)</span>
                                    </label>

                                </div>

                                <div class="col-sm-10">
                                    <input type="file" name="fotodewan" value="{{ old('logo') }}"
                                        class="ace-file-input" id="ace-file-input2" multiple />
                                    @error('fotodewan')
                                        <em class="text-danger text-80">{{ $message }}</em></p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="id-form-field-1" class="mb-0">
                                        Alamat <span class="text-danger"> *)</span>
                                    </label>
                                </div>

                                <div class="col-sm-10">
                                    <div class="card bcard border-1 brc-dark-l1">
                                        <div class="card-body p-0">
                                            <textarea name="alamat" id="summernote" name="editordata">
                                                {{ old('alamat') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    @error('alamat')
                                        <em class="text-danger text-80">{{ $message }}</em></p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="col-md-12 text-nowrap">
                                    <a href="{{ route('admin.daftaranggotadewan') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Simpan Data Pimpinan & Anggota
                                    </button>

                                    <button type="reset"
                                        class="btn btn-outline-light btn-h-light-orange btn-a-light-orange border-b-2 text-600 px-3 mb-1">
                                        <i class="fas fa-undo text-110 text-orange-d2 mr-1"></i>
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
