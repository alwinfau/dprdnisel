@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div role="main" class="main-content">
        <div class="page-content container container-plus">
            <div class="small mb-1 pb-1 align-items-sm-center">
                <h1 class="text-primary-d2 text-140">
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
                    <a href="{{ route('admin.addberita') }}"
                        class="btn float-left btn-h-light-primary px-4 btn-light-info btn-bold radius-1 d-inline-flex align-items-center pl-2px py-2px mb-1">
                        <span class="bgc-info-tp3 shadow-sm radius-2px h-4 px-25 pt-1 mr-25">
                            <i class="fas fa-plus-circle text-white-tp1 text-110 mt-3px"></i>
                        </span>
                        Posting Berita
                    </a>

                    <a href="{{ route('admin.daftardewan') }}"
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
                                    <i class="fas fa-newspaper text-success mr-3px"></i>
                                    Berita Umum
                                </a>
                            </li>

                            <li class="nav-item mr-1">
                                <a class="nav-link brc-purple-m1 d-style p-3 bgc-h-purple-l4 radius-0"
                                    id="profile16-tab-btn" data-toggle="tab" href="#profile16" role="tab"
                                    aria-controls="profile16" aria-selected="false">
                                    <i class="fas fa-newspaper text-purple mr-3px"></i>

                                    <span class="d-n-active">
                                        Berita Sekretariat
                                    </span>
                                    <span class="d-active text-purple-d1">
                                        Berita Sekretariat
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="card-body px-0 py-2">
                            <div class="tab-content tab-sliding border-0 px-0">
                                <div class="tab-pane show active text-95 px-25" id="home16" role="tabpanel"
                                    aria-labelledby="home16-tab-btn">
                                    @forelse ($beritaumum as $item)
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-2">
                                                    <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                                        alt="..." class="img-fluid p-1">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {!! $item->judulberita !!}
                                                        </h5>
                                                        <p class="card-text text-80">
                                                            {!! $item->deskripsisingkat !!}
                                                        </p>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user-circle"></i> diposting Oleh:
                                                                {{ $item->name }} |
                                                                <i class="fas fa-calendar-alt"></i> tanggal posting:
                                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                                {{-- |
                                                                <i class="fas fa-eye"></i>
                                                                @if ($item->dilihat == null)
                                                                    0 View
                                                                @else
                                                                    {{ $item->dilihat }}
                                                                @endif
                                                                |
                                                                <i class="fas fa-share"></i>
                                                                @if ($item->dibagikan == null)
                                                                    0 dibagikan
                                                                @else
                                                                    {{ $item->dibagikan }}
                                                                @endif
                                                                | --}}
                                                                <a href="{{ route('admin.editberita', $item->id) }}"
                                                                    class="text-decoration-none" data-toggle="tooltip"
                                                                    title="Edit Postingan">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>

                                                                @if (Auth::user()->is_admin == 1)
                                                                    <a href="{{ route('admin.hapusberita', $item->id) }}"
                                                                        class="text-decoration-none" data-toggle="tooltip"
                                                                        title="Hapus Postingan">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                @endif
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <small>
                                            <div class="alert d-flex bgc-warning-l4 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                                role="alert">
                                                <div class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px">
                                                </div>
                                                <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                                <span class="align-self-center">
                                                    Berita Umum Masih kosong..!!
                                                </span>
                                            </div>
                                        </small>
                                    @endforelse
                                </div>

                                <div class="tab-pane text-95 px-25" id="profile16" role="tabpanel"
                                    aria-labelledby="profile16-tab-btn">
                                    @forelse ($beritasekretariat as $item)
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-2">
                                                    <img src="{{ asset('gambar berita/' . $item->gambarberita) }}"
                                                        alt="..." class="img-fluid p-1">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $item->judulberita }}
                                                        </h5>
                                                        <p class="card-text">
                                                            {{ $item->deskripsisingkat }}
                                                        </p>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user-circle"></i> diposting Oleh:
                                                                {{ $item->name }} |
                                                                <i class="fas fa-calendar-alt"></i> tanggal posting:
                                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                                |
                                                                <a href="{{ route('admin.editberita', $item->id) }}"
                                                                    class="text-decoration-none" data-toggle="tooltip"
                                                                    title="Edit Postingan">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>

                                                                @if (Auth::user()->is_admin == 1)
                                                                    <a href="{{ route('admin.hapusberita', $item->id) }}"
                                                                        class="text-decoration-none" data-toggle="tooltip"
                                                                        title="Hapus Postingan">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                @endif
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <small>
                                            <div class="alert d-flex bgc-warning-l4 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                                role="alert">
                                                <div class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px">
                                                </div>
                                                <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                                <span class="align-self-center">
                                                    Berita Sekretariat Masih kosong..!!
                                                </span>
                                            </div>
                                        </small>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
