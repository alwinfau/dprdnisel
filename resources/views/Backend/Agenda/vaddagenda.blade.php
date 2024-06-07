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
                <a data-toggle="tooltip" data-placement="top" title="Refresh" href="{{ route('admin.addberita') }}"
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
                        <form action="{{ route('admin.simpanagenda') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Tanggal Agenda <span class="text-danger">*)</span>
                                </label>
                                <input name="tglagenda" type="datetime-local"
                                    class="form-control btn-group-inside-spinner form-control-md"
                                    value="{{ old('tglagenda') }}" placeholder="Tanggal Agenda">
                                @error('tglagenda')
                                    <p class="text-danger italic" style="font-size: 12px;">
                                        <em>{{ $message }}</em>
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Nama Agenda <span class="text-danger">*)</span>
                                </label>
                                <div class="card bcard border-1 brc-dark-l1">
                                    <div class="card-body p-0 col-ld-12">
                                        <textarea name="namaagenda" id="summernote" name="editordata">
                                        {{ old('namaagenda') }}
                                    </textarea>
                                    </div>
                                </div>
                                @error('namaagenda')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Deskripsi Agenda <span class="text-danger">*)</span>
                                </label>
                                <div class="card bcard border-1 brc-dark-l1">
                                    <div class="card-body p-0 col-ld-12">
                                        <textarea name="deskripsiagenda" id="summernote2" name="editordata">
                                        {{ old('deskripsiagenda') }}
                                    </textarea>
                                    </div>
                                </div>
                                @error('deskripsiagenda')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Lokasi atau Tempat <span class="text-danger">*)</span>
                                </label>
                                <input name="lokasi" type="text"
                                    class="form-control btn-group-inside-spinner form-control-md"
                                    value="{{ old('lokasi') }}" placeholder="Lokasi Pelaksanan Agenda">
                                @error('lokasi')
                                    <p class="text-danger italic" style="font-size: 12px;">
                                        <em>{{ $message }}</em>
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Kategori Agenda <span class="text-danger">*)</span>
                                </label>

                                <select name="kategoriagenda" id="form-field-chosen-1"
                                    data-placeholder="Kategori Kategori Agenda.."
                                    class="chosen-select form-control col-lg-12 col-md-6">
                                    <option value=""></option>
                                    <option value="Agenda DPRD">Agenda DPRD</option>
                                    <option value="Agenda Sekretariat">Agenda Sekretariat</option>
                                </select>

                                @error('kategoriagenda')
                                    <p class="text-danger italic" style="font-size: 12px;">
                                        <em>{{ $message }}</em>
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="col-md-12 text-nowrap">
                                    <a href="{{ route('admin.agenda') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Simpan Agenda
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
