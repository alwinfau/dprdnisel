@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div class="page-content container container-plus">
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
                <a data-toggle="tooltip" data-placement="top" title="Refresh Halaman" href="{{ route('admin.formadduser') }}"
                    type="button"
                    class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                    <i class="fa fa-undo text-110 w-2 h-2"></i>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card acard mt-lg-12 border-t-4 brc-blue-tp3">
                    <div class="card-header">
                        <h3 class="card-title text-125 text-primary-d2">
                            <i class="fas fa-user-plus text-dark-l3 mr-1"></i>
                            {{ $title }}
                        </h3>
                    </div>

                    <div class="card-body pb-1">
                        <form action="{{ route('admin.simpanuser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0">
                                    Nama User <span class="text-danger">*)</span>
                                </div>

                                <div class="col-sm-10 mb-0">
                                    <input name="namauser" value="{{ old('namauser') }}" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="Nama User">
                                    @error('namauser')
                                        <p class="text-danger italic" style="font-size: 12px;"><em>{{ $message }}</em></p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-2 col-form-label text-sm-left pr-0"> </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">
                                                Email User <span class="text-danger">*)</span>
                                            </label>
                                            <input class="form-control btn-group-inside-spinner form-control-md"
                                                type="email" value="{{ old('emailuser') }}" name="emailuser"
                                                placeholder="Email User">
                                            @error('emailuser')
                                                <p class="text-danger italic" style="font-size: 12px;">
                                                    <em>{{ $message }}</em>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Password<span class="text-danger"> *)</span></label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="checkbox" onclick="showPassword()">
                                                </div>
                                                <input name="passworduser" type="password" class="form-control"
                                                    id="passworduser" placeholder="Password User"
                                                    value="{{ old('passworduser') }}">
                                            </div>
                                            @error('passworduser')
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
                                        <div class="form-group col-md-12">
                                            <label for=""> Level User <span class="text-danger">*)</span></label>
                                            <select name="leveluser" id="form-field-chosen-1"
                                                data-placeholder="Pilih Level User..."
                                                class="chosen-select form-control col-lg-12 col-md-6">
                                                <option value=""></option>
                                                <option value="1">Superuser</option>
                                                <option value="2">Admin 1</option>
                                                <option value="3">Admin 2</option>
                                                <option value="4">Admin 3</option>
                                                <option value="5">CO Admin 1</option>
                                            </select>

                                            @error('leveluser')
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
                                    <input type="file" name="fotoprofil" value="{{ old('fotoprofil') }}"
                                        class="ace-file-input" id="ace-file-input2" multiple />
                                    @error('fotoprofil')
                                        <p class="text-danger italic" style="font-size: 12px;"><em>{{ $message }}</em>
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="offset-md-2 col-md-12 text-nowrap">
                                    <a href="{{ route('admin.daftaruser') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Simpan User
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
    function showPassword() {
        var x = document.getElementById("passworduser");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
