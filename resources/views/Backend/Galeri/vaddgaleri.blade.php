@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus">
        <div class="page-header pb-2">
            <h1 class="text-primary-d2 text-100">
                Beranda
                <small class="page-info text-secondary-d2 text-nowrap">
                    <i class="fa fa-angle-double-right text-80"></i>
                    <a href="{{ 'home' }}" class="text-decoration-none">Home</a>
                    <i class="fas fa-angle-right text-80"></i> {{ $title }}
                </small>
            </h1>

            <div class="page-tools d-inline-flex">
                <a data-toggle="tooltip" data-placement="top" title="Refresh" href="{{ route('admin.addgaleri') }}"
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
                        <form action="{{ route('admin.simpangaleri') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">
                                    Kategori Galeri <span class="text-danger">*)</span>
                                </label>

                                <select name="kategorigaleri" id="select" data-placeholder="Kategori Kategori Galeri.."
                                    class="chosen-select form-control col-lg-12 col-md-6"
                                    onchange="kategorifunction('multifoto', this)">
                                    <option value=""></option>
                                    <option value="Foto">Foto</option>
                                    <option value="Video On Demand">Video On Demand</option>
                                    <option value="Live">Live</option>
                                </select>

                                @error('kategorigaleri')
                                    <p class="text-danger italic" style="font-size: 12px;">
                                        <em>{{ $message }}</em>
                                    </p>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Judul Galeri <span class="text-danger"> *)</span>
                                </label>
                                <input name="judul" value="{{ old('judul') }}" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="Judul Galeri (Maks. 150 Karakter)">
                                @error('judul')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Cover Depan <span class="text-danger"> *)</span>
                                </label>
                                <input type="file" name="fotogaleri" value="{{ old('fotogaleri') }}"
                                    class="ace-file-input" id="ace-file-input2">

                                @error('fotogaleri')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="container p-0 m-0" id="multifoto" style="display: none">
                                <div class="alert-warning p-2">
                                    <small>
                                        <i class="fas fa-info-circle"></i>
                                        Pastikan ukuran gambar yang diupload berukuran 1500x200 piksel
                                    </small>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="file" name="foto1" value="{{ old('foto1') }}"
                                            class="ace-file-input" id="ace-file-input3">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="file" name="foto2" value="{{ old('foto2') }}"
                                            class="ace-file-input" id="ace-file-input4">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="file" name="foto3" value="{{ old('foto3') }}"
                                            class="ace-file-input" id="ace-file-input5">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="file" name="foto4" value="{{ old('foto4') }}"
                                            class="ace-file-input" id="ace-file-input6">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">
                                    Deskripsi Galeri <span class="text-danger">*)</span>
                                </label>
                                <div class="card bcard border-1 brc-dark-l1">
                                    <div class="card-body p-0 col-ld-12">
                                        <textarea name="deskripsigaleri" id="summernote" name="editordata">
                                        {{ old('deskripsigaleri') }}
                                    </textarea>
                                    </div>
                                </div>
                                @error('deskripsigaleri')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">
                                    URL Video <span class="text-danger">*)</span>
                                </label>
                                <div class="card bcard border-1 brc-dark-l1">
                                    <div class="card-body p-0 col-ld-12">
                                        <input type="text" name="urlvideo" class="form-control"
                                            value="{{ old('urlvideo') }}" placeholder="Silahkan masukan Url Video">
                                    </div>
                                </div>
                                @error('urlvideo')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="col-md-12 text-nowrap">
                                    <a href="{{ route('admin.daftargaleri') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Upoad Galeri
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

<script>
    function kategorifunction(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 'Foto' ? 'block' : 'none';
    }
</script>
