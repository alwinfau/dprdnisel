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
                <a data-toggle="tooltip" data-placement="top" title="Refresh"
                    href="{{ route('admin.edittransparansianggaran', $updatetransparansianggaran->id) }}" type="button"
                    class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                    <i class="fa fa-undo text-110 w-2 h-2"></i>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card acard mt-lg-12 border-t-4 brc-blue-tp3">
                    <div class="card-body pb-1">
                        <form action="{{ route('admin.rubahtransparansianggaran', $updatetransparansianggaran->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Judul Dokumen<span class="text-danger"> *)</span>
                                </label>
                                <input name="juduldokumen" value="{{ $updatetransparansianggaran->judulanggaran }}"
                                    type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Silahkan isikan nama atau judul dokument">
                                @error('juduldokumen')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Kategori Dokumen<span class="text-danger"> *)</span>
                                </label>
                                <input name="kategoridokumen" value="{{ $updatetransparansianggaran->kategorianggaran }}"
                                    type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Silahkan isikan kategori dokument ">
                                @error('kategoridokumen')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id-form-field-1" class="mb-0">
                                    Upload Dokumen Anggaran <span class="text-danger"> *)</span>
                                </label>

                                <input id="fileanggaran" type="file" name="filetransparansianggaran"
                                    value="{{ old('filetransparansianggaran') }}" class="form-control" accept=".pdf"
                                    multiple />
                                @error('filetransparansianggaran')
                                    <em class="text-danger text-80">{{ $message }}</em></p>
                                @enderror

                                <div class="card-body p-0 shadow">
                                    <iframe
                                        src="{{ asset('dokumen anggaran/' . $updatetransparansianggaran->dokumenanggaran) }}"
                                        frameborder="0" class="mt-2" width="100%" height="600px"></iframe>
                                </div>
                            </div>


                            <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                                <div class="col-md-12 text-nowrap">
                                    <a href="{{ route('admin.transparansianggaran') }}"
                                        class="btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-b-2 px-4 mb-1">
                                        <i class="fas fa-arrow-left text-110 text-primary-m1 mr-1"></i>
                                        Kembali
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-secondary btn-h-outline-red btn-a-outline-red border-b-2 px-4 mb-1">
                                        <i class="fas fa-save text-110 text-danger-m1 mr-1"></i>
                                        Update Transparansi Anggaran
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
