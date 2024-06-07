@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div role="main" class="main-content">
        <div class="page-content container container-plus">
            <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
                <h1 class="page-title text-primary-d2 text-140">
                    Beranda
                    <small class="page-info text-dark-m3">
                        <i class="fa fa-angle-double-right text-80"></i>
                        <a href="{{ 'home' }}" class="text-decoration-none">Home</a>
                        <i class="fas fa-angle-right text-80"></i> {{ $title }}
                    </small>
                </h1>

                <div class="page-tools mt-3 mt-sm-0 mb-sm-n1">
                    <!-- dataTables search box will be inserted here dynamically -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <a href="{{ route('admin.addgaleri') }}"
                        class="btn float-left btn-h-light-primary px-4 btn-light-info btn-bold radius-1 d-inline-flex align-items-center pl-2px py-2px mb-1">
                        <span class="bgc-info-tp3 shadow-sm radius-2px h-4 px-25 pt-1 mr-25">
                            <i class="fas fa-plus-circle text-white-tp1 text-110 mt-3px"></i>
                        </span>
                        Buat Galeri
                    </a>

                    <a href="{{ route('admin.addstruktural') }}"
                        class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 py-2 text-90"
                        data-toggle="tooltip" data-placement="top" title="Refresh">
                        <i class="fa fa-undo text-110 w-2 h-2"></i>
                    </a>
                </div>
            </div>


            <div class="card bcard h-auto">
                <form autocomplete="off" class="border-t-3 brc-blue-m2">
                    <!-- Simple Sliding Tabs -->
                    <div class="card ccard">
                        <ul class="nav nav-tabs nav-tabs-simple nav-tabs-scroll border-b-1 brc-dark-l3 mx-0 mx-md-0 px-3 px-md-1 pt-2px"
                            role="tablist">
                            <li class="nav-item mr-1">
                                <a class="nav-link active p-3 bgc-h-primary-l4 radius-0" id="home16-tab-btn"
                                    data-toggle="tab" href="#home16" role="tab" aria-controls="home16"
                                    aria-selected="true">
                                    <i class="fas fa-images text-purple mr-3px"></i>
                                    <span class="d-active text-purple-d1">
                                        Galeri Foto
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item mr-1">
                                <a class="nav-link brc-purple-m1 d-style p-3 bgc-h-purple-l4 radius-0"
                                    id="profile16-tab-btn" data-toggle="tab" href="#profile16" role="tab"
                                    aria-controls="profile16" aria-selected="false">
                                    <i class="fas fa-video text-purple mr-3px"></i>

                                    <span class="d-n-active">
                                        Video On Demand
                                    </span>
                                    <span class="d-active text-purple-d1">
                                        Video On Demand
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item mr-1">
                                <a class="nav-link brc-purple-m1 d-style p-3 bgc-h-purple-l4 radius-0"
                                    id="profile17-tab-btn" data-toggle="tab" href="#profile17" role="tab"
                                    aria-controls="profile17" aria-selected="false">
                                    <i class="fas fa-signal text-purple mr-3px"></i>
                                    <span class="d-n-active">
                                        Live
                                    </span>
                                    <span class="d-active text-purple-d1">
                                        Live
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="card-body px-0 py-2">
                            <div class="tab-content tab-sliding border-0 px-0">
                                <div class="tab-pane show active text-95 px-25" id="home16" role="tabpanel"
                                    aria-labelledby="home16-tab-btn">
                                    <div class="row p-2 mt-0 pt-0">
                                        @forelse ($datafoto as $item)
                                            <div class="col-6 col-sm-4 col-md-4 text-center px-2">
                                                <div
                                                    class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-default-m3">
                                                    <img alt="Gallery Image 4"
                                                        src="{{ asset('foto galeri/' . $item->gambargaleri) }}"
                                                        class="w-100 img-fluid" data-size="800x1200" />

                                                    <div class="mt-hover position-tl w-100 bgc-black-tp4 p-25">
                                                        <div class="d-flex justify-content-center action-buttons text-110">

                                                            <a href="{{ route('admin.editgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip" title="Update Galeri">
                                                                <i class="fas fa-edit text-purple-m3"></i>
                                                            </a>

                                                            <a href="{{ route('admin.hapusgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip" title="Hapus Galeri">
                                                                <i class="fas fa-trash-alt text-danger-l2"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <a href="#"
                                                        class="mb-hover position-br p-2 bgc-success-tp4 m-1 radius-1 text-white text-600 no-underline">
                                                        <span class="align-middle">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <small>
                                                <div class="alert d-flex bgc-warning-l4 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                                    role="alert">
                                                    <div
                                                        class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px">
                                                    </div>
                                                    <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                                    <span class="align-self-center">
                                                        Geleri Foto Masih kosong..!!
                                                    </span>
                                                </div>
                                            </small>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="tab-pane text-95 px-25" id="profile16" role="tabpanel"
                                    aria-labelledby="profile16-tab-btn">
                                    <div class="row no-gutters">
                                        @forelse ($datavideo as $item)
                                            <div class="col-6 col-sm-4 col-md-4 text-center px-2">
                                                <div
                                                    class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-default-m3">
                                                    <iframe width="100%" height="190" src="{{ $item->link }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>

                                                    <div class="mt-hover position-tl w-100 bgc-black-tp4 p-25">
                                                        <div class="d-flex justify-content-center action-buttons text-110">

                                                            <a href="{{ route('admin.editgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip"
                                                                title="Update Video">
                                                                <i class="fas fa-edit text-purple-m3"></i>
                                                            </a>

                                                            <a href="{{ route('admin.hapusgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip" title="Hapus Video">
                                                                <i class="fas fa-trash-alt text-danger-l2"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <a href="#"
                                                        class="mb-hover position-br p-2 bgc-success-tp4 m-1 radius-1 text-white text-600 no-underline">
                                                        <span class="align-middle">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <small>
                                                <div class="alert d-flex bgc-warning-l4 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                                    role="alert">
                                                    <div
                                                        class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px">
                                                    </div>
                                                    <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                                    <span class="align-self-center">
                                                        Video On Demand Masih kosong..!!
                                                    </span>
                                                </div>
                                            </small>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="tab-pane text-95 px-25" id="profile17" role="tabpanel"
                                    aria-labelledby="profile17-tab-btn">
                                    <div class="row no-gutters">
                                        @forelse ($datalive as $item)
                                            <div class="col-6 col-sm-4 col-md-4 text-center px-2">
                                                <div
                                                    class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-default-m3">
                                                    <iframe width="100%" height="190" src="{{ $item->link }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>

                                                    <div class="mt-hover position-tl w-100 bgc-black-tp4 p-25">
                                                        <div class="d-flex justify-content-center action-buttons text-110">

                                                            <a href="{{ route('admin.editgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip"
                                                                title="Update Video">
                                                                <i class="fas fa-edit text-purple-m3"></i>
                                                            </a>

                                                            <a href="{{ route('admin.hapusgaleri', $item->id) }}"
                                                                class="mx-2" data-toggle="tooltip" title="Hapus Video">
                                                                <i class="fas fa-trash-alt text-danger-l2"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <a href="#"
                                                        class="mb-hover position-br p-2 bgc-success-tp4 m-1 radius-1 text-white text-600 no-underline">
                                                        <img alt="Admin" src="{{ Auth::user()->fotoprofil }}"
                                                            width="36"
                                                            class="align-middle radius-round border-2 brc-white-tp2 shadow-sm mr-1" />
                                                        <span class="align-middle">
                                                            {{ Auth::user()->name }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <small>
                                                <div class="alert d-flex bgc-warning-l4 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                                    role="alert">
                                                    <div
                                                        class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px">
                                                    </div>
                                                    <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                                    <span class="align-self-center">
                                                        Saat ini tidak ada Live Streaaming yang tersedia..!!
                                                    </span>
                                                </div>
                                            </small>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
