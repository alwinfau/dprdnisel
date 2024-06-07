@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus">
        <div class="card-header">
            <h4>FORMULIR KUNJUNGAN</h4>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card acard mt-lg-12 border-t-4 brc-blue-tp3">
                    <div class="card-body pb-1">
                        <form action="{{ route('admin.simpankunjungan') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Nama Instansi/Perusahaan <span class="text-danger"> *)</span>
                                </label>
                                <input name="namainstansi" value="{{ old('namainstansi') }}" type="text"
                                    class="form-control" id="exampleInputEmail1"
                                    placeholder="Silahkan input nama instansi atau perusahaan">
                                @error('namainstansi')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

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
                                            <em class="text-danger text-80">{{ $message }}</em></p>
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
                                            <em class="text-danger text-80">{{ $message }}</em></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            Kategori Kunjungan <span class="text-danger">*)</span>
                                        </label>

                                        <select name="kategorikunjungan" id="form-field-chosen-1"
                                            data-placeholder="Pilih kategori kunjungan.."
                                            class="chosen-select form-control col-lg-12 col-md-6">
                                            <option value=""></option>
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
                                        <label for="">
                                            Kepada <span class="text-danger">*)</span>
                                        </label>

                                        <select name="kepada" id="form-field-chosen-1"
                                            data-placeholder="Pilih kerunjungan kepada siapa.."
                                            class="chosen-select form-control col-lg-12 col-md-6">
                                            <option value=""></option>
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


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            AKD <span class="text-danger">*)</span>
                                        </label>

                                        <select name="akd" id="form-field-chosen-1"
                                            data-placeholder="Silahkan Pilih Alat Kelengkapan Dewan.."
                                            class="chosen-select form-control col-lg-12 col-md-6">
                                            <option value=""></option>
                                            @forelse ($tampilakd as $item)
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
                                        <input name="jumlahrombongan" value="{{ old('jumlahrombongan') }}" type="number"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan inputkan jumlah rombongan yang akan berkunjung">
                                        @error('jumlahrombongan')
                                            <em class="text-danger text-80">{{ $message }}</em></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Tanggal Kedatangan <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="tanggalkunjungan" value="{{ old('tanggalkunjungan') }}"
                                            type="date" class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan pilih tanggal kunjungan">
                                        @error('tanggalkunjungan')
                                            <em class="text-danger text-80">{{ $message }}</em></p>
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
                                            <em class="text-danger text-80">{{ $message }}</em></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Deskripsi Kunjungan <span class="text-danger"> *)</span>
                                </label>
                                <div class="card bcard border-1 brc-dark-l1">
                                    <div class="card-body p-0">
                                        <textarea name="keterangankunjungan" id="summernote" name="editordata">
                                            {{ old('keterangankunjungan') }}
                                        </textarea>
                                    </div>
                                </div>
                                @error('keterangankunjungan')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="card-header mb-2">
                                    <strong>NARAHUBUNG</strong>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            Nama Lengkap <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="namanarahubung" value="{{ old('namanarahubung') }}"
                                            type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan inputkan nama lengkap narahubung ">
                                        @error('namanarahubung')
                                            <em class="text-danger text-80">{{ $message }}</em></p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="id-form-field-1" class="mb-0">
                                            No. Ponsel <span class="text-danger"> *)</span>
                                        </label>
                                        <input name="noponsel" value="{{ old('noponsel') }}" type="number"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Silahkan masukan no. ponsel /wa narahubung">
                                        @error('noponsel')
                                            <em class="text-danger text-80">{{ $message }}</em></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Lampiran Dokumen <span class="text-danger"> *)</span>
                                </label>

                                <input id="fileanggaran" type="file" name="dokumenkunjungan"
                                    value="{{ old('dokumenkunjungan') }}" class="form-control" accept=".pdf"
                                    multiple />
                                @error('dokumenkunjungan')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="col-md-12 text-nowrap">
                                    <a href="{{ route('admin.kunjungan') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Simpan Kunjungan
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
