<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <base />

    <title>@yield('judul', '')</title>

    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/regular.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/brands.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/solid.min.css">

    {{-- Data Table --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css">
    {{-- End Data Table --}}

    {{-- Select 2 dan Chosens --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css">
    {{-- Select 2 dan Chosens --}}

    {{-- Toaster --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Toaster --}}

    {{-- Dropzone --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.css">
    {{-- Dropzone --}}

    {{-- Color Picker --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">
    {{-- Color Picker --}}

    {{-- Summernote --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
    {{-- Summernote --}}

    <!-- include fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;display=swap">

    <!-- ace.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/dist/css/ace.min.css') }}">

    {{-- Maps --}}
    @yield('maps')
    {{-- Maps --}}

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo_nias_selatan.png') }}" />
    <!-- "Dashboard" page styles, specific to this page for demo only -->
    <style>
        .piechart-legends ul {
            list-style: none;
            margin-left: 1.5rem;
            padding-left: 0;
        }

        .piechart-legends li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
        }

        .piechart-legends span {
            display: inline-block;
            vertical-align: middle;
            border-radius: 1rem;
            width: 0.5rem;
            height: 0.5rem;
            margin-right: 0.5rem;
        }

        .piechart-legends-info li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
        }


        .rtl .piechart-legends ul {
            list-style: none;
            margin-left: 0;
            margin-right: 1.5rem;
            padding-right: 0;
        }

        .rtl .piechart-legends span {
            margin-left: 0.5rem;
            margin-right: 0;
        }
    </style>

    <style>
        .message-user {
            width: 8rem;
            white-space: nowrap;
            overflow: hidden;
        }

        .message-time {
            width: 4.5rem;
        }



        .message-item {
            flex: 0 0 auto !important;
        }

        .message-item:hover {
            z-index: 1;
            box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: Roboto;
        }
    </style>
</head>

<body>
    <div class="body-container">
        {{-- @if (Auth::user()->email_verified_at != null) --}}
        {{-- @endif --}}
        <nav class="navbar navbar-expand-lg navbar-fixed navbar-blue">
            <div class="navbar-inner">
                @if (Auth::user()->is_admin == 1 ||
                    Auth::user()->is_admin == 2 ||
                    Auth::user()->is_admin == 3 ||
                    Auth::user()->is_admin == 4 ||
                    Auth::user()->is_admin == 5)
                    <div class="navbar-intro justify-content-xl-between">
                        <button type="button"
                            class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none"
                            data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar"
                            aria-expanded="false" aria-label="Toggle sidebar">
                            <span class="bars"></span>
                        </button><!-- mobile sidebar toggler button -->

                        <a class="navbar-brand text-white mx-auto" href="{{ route('admin.home') }}">
                            <span>DPRD</span>
                            <span>NISEL</span>
                        </a><!-- /.navbar-brand -->

                        <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar"
                            data-target="#sidebar" aria-controls="sidebar" aria-expanded="true"
                            aria-label="Toggle sidebar">
                            <span class="bars"></span>
                        </button><!-- sidebar toggler button -->

                    </div><!-- /.navbar-intro -->


                    <div class="navbar-content">
                        <button class="navbar-toggler py-2" type="button" data-toggle="collapse"
                            data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                            aria-label="Toggle navbar search">
                            <i class="fa fa-search text-white text-90 py-1"></i>
                        </button><!-- mobile #navbarSearch toggler -->

                        <div class="collapse navbar-collapse navbar-backdrop" id="navbarSearch">
                            <form class="d-flex align-items-center ml-lg-4 py-1" data-submit="dismiss">
                                <i class="fa fa-search text-white d-none d-lg-block pos-rel"></i>
                                <input type="text"
                                    class="navbar-input mx-3 flex-grow-1 mx-md-auto pr-1 pl-lg-4 ml-lg-n3 py-2 autofocus"
                                    placeholder="CARI..." aria-label="Search" />
                            </form>
                        </div>
                    </div><!-- .navbar-content -->
                @else
                    {{-- @if (Auth::user()->email_verified_at != null)
                        <a class="navbar-brand text-white pl-5" href="#">
                            <img src="{{ asset('assets/img/gif/pedulisehat.png') }}" alt="" width="250px">
                        </a>
                    @endif --}}
                @endforelse

                <!-- mobile #navbarMenu toggler button -->
                @if (Auth::user()->email_verified_at != null)
                    <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse"
                        data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                        aria-label="Toggle navbar menu">
                        <span class="pos-rel">
                            @if (Auth::user()->fotoprofil == '')
                                <img id="id-navbar-user-image" class="border-2 brc-white-tp1 radius-round"
                                    width="36" src="{{ Auth::user()->gravatar() }}" alt="user foto"
                                    style="width: 45px; height:45px; background-position: center center;">
                            @else
                                <img id="id-navbar-user-image" class="border-2 brc-white-tp1 radius-round"
                                    width="36" src="{{ asset('img/' . Auth::user()->fotoprofil) }}"
                                    alt="user foto"
                                    style="width: 45px; height:45px; background-position: center center;">
                            @endif
                            <span
                                class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
                        </span>
                @endif
                </button>


                @if (Auth::user()->email_verified_at != null)
                    <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                        <div class="navbar-nav">
                            <ul class="nav">
                                <li class="nav-item dropdown dropdown-mega">
                                    <a class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell text-110 icon-animated-bell mr-lg-2"></i>

                                        <span class="d-inline-block d-lg-none ml-2">Notifications</span>
                                        <!-- show only on mobile -->
                                        <span id="id-navbar-badge1"
                                            class="badge badge-sm bgc-warning-d2 text-white radius-round text-85 border-1 brc-white-tp5">
                                            {{ DB::table('formulir_kunjungans')->where('statuskunjungan', 'Pending')->count() }}
                                            {{-- @if (Auth::user()->is_admin == 1)
                                        @else
                                            {{ DB::table('obat_keluars')->where('statusobatkeluar', null)->where('iduserupt', Auth::user()->id)->limit(1)->count() }}
                                        @endif --}}
                                        </span>
                                        <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                        <div class="dropdown-caret brc-white"></div>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-sm dropdown-animated p-0 bgc-white brc-primary-m3 border-b-2 shadow">
                                        <ul class="nav nav-tabs nav-tabs-simple w-100 nav-justified dropdown-clickable border-b-1 brc-secondary-l2"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="d-style px-0 mx-0 py-3 nav-link active text-600 brc-blue-m1 text-dark-tp5 bgc-h-blue-l4"
                                                    data-toggle="tab" href="#navbar-notif-tab-1" role="tab">
                                                    <span class="d-active text-blue-d1 text-105">Pemberitahuan</span>
                                                    <span class="d-n-active">Pemberitahuan</span>
                                                </a>
                                            </li>

                                        </ul><!-- .nav-tabs -->


                                        <div class="tab-content tab-sliding p-0">
                                            <div class="tab-pane mh-none show active px-md-1 pt-1"
                                                id="navbar-notif-tab-1" role="tabpanel">

                                                <hr class="mt-1 mb-1px brc-secondary-l2" />

                                                <a href=""
                                                    class="mb-0 py-3 border-0 list-group-item text-blue text-uppercase text-center text-85 font-bolder">
                                                    Tampilkan Semua Pemberitahuan
                                                    <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                                </a>

                                            </div><!-- .tab-pane : notifications -->
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown order-first order-lg-last">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">

                                        @if (Auth::user()->fotoprofil == '')
                                            <img id="id-navbar-user-image"
                                                class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6"
                                                src="{{ Auth::user()->gravatar() }}" alt="user foto"
                                                style="width: 45px; height:45px; background-position: center center;">
                                        @else
                                            <img id="id-navbar-user-image"
                                                class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6"
                                                src="{{ asset('img/' . Auth::user()->fotoprofil) }}" alt="user foto"
                                                style="width: 45px; height:45px; background-position: center center;">
                                        @endif

                                        <span class="d-inline-block d-lg-none d-xl-inline-block">
                                            <span class="text-90" id="id-user-welcome">Halo,</span>
                                            <span class="nav-user-name">
                                                {{ Str::substr(Auth::user()->name, 0, 10) }} ...
                                            </span>
                                        </span>

                                        <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                        <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                        </span>

                                        <div
                                            class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
                                            <div class="d-none d-lg-block d-xl-none">
                                                <div class="dropdown-header">
                                                    Welcome, Jason
                                                </div>
                                                <div class="dropdown-divider"></div>
                                            </div>

                                            <div
                                                class="dropdown-clickable px-3 py-25 bgc-h-secondary-l3 border-b-1 brc-secondary-l2">
                                                <!-- online/offline toggle -->
                                                <div
                                                    class="d-flex justify-content-center align-items-center tex1t-600">
                                                    @if (Auth::user()->statuslogin == 'On')
                                                        <label for="id-user-online"
                                                            class="text-grey-d1 pt-2 px-2">offline</label>
                                                        <input type="checkbox"
                                                            class="ace-switch ace-switch-sm text-grey-l1 brc-green-d1"
                                                            id="id-user-online" checked>
                                                        <label for="id-user-online"
                                                            class="text-green-d1 text-600 pt-2 px-2">online</label>
                                                    @else
                                                        <label for="id-user-online"
                                                            class="text-grey-d1 pt-2 px-2">offline</label>
                                                        <input type="checkbox"
                                                            class="ace-switch ace-switch-sm text-grey-l1 brc-green-d1"
                                                            id="id-user-online">
                                                        <label for="id-user-online"
                                                            class="text-green-d1 text-600 pt-2 px-2">online</label>
                                                    @endif

                                                </div>
                                            </div>

                                            <a class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary"
                                                href="/editprofile/{{ Auth::user()->id }}">
                                                <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                                                Profile
                                            </a>

                                            {{-- <a class="dropdown-item btn btn-outline-grey bgc-h-success-l3 btn-h-light-success btn-a-light-success"
                                            href="#" data-toggle="modal" data-target="#id-ace-settings-modal">
                                            <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                                            Settings
                                        </a> --}}

                                            <div class="dropdown-divider brc-primary-l2"></div>

                                            <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                                                Keluar
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                </li>
                                <!-- /.nav-item:last -->

                            </ul><!-- /.navbar-nav menu -->
                        </div><!-- /.navbar-nav -->

                    </div>
                @endif
                <!-- /#navbarMenu -->
            </div>
            <!-- /.navbar-inner -->
        </nav>

        <div class="main-container bgc-white">
            @if (Auth::user()->is_admin == 1 ||
                Auth::user()->is_admin == 2 ||
                Auth::user()->is_admin == 3 ||
                Auth::user()->is_admin == 4 ||
                Auth::user()->is_admin == 5)
                <div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
                    <div class="sidebar-inner">
                        <div class="ace-scroll flex-grow-1" data-ace-scroll="{}">
                            <div class="sidebar-section my-2">
                                <!-- the shortcut buttons -->

                                <!-- the search box -->
                                <div class="sidebar-section-item">
                                    <i class="fadeinable fa fa-search text-info-m1 mr-n1"></i>
                                    <div class="fadeable d-inline-flex align-items-center ml-3 ml-lg-0">
                                        <i class="fa fa-search mr-n3 text-info-m1"></i>
                                        <input type="text" class="sidebar-search-input pl-4 pr-3 mr-n2"
                                            maxlength="60" placeholder="Cari disini..." aria-label="Search" />
                                        <a href="#"
                                            class="ml-n25 px-2 py-1 radius-round bgc-h-secondary-l2 mb-2px">
                                            <i class="fa fa-microphone px-3px text-dark-tp5"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav has-active-border active-on-right">
                                <li class="nav-item {{ Request::is('admin/home') ? 'active' : '' }}">
                                    @if (Auth::user()->is_admin == 1)
                                        <a href="{{ route('admin.home') }}" class="nav-link">
                                            <i class="nav-icon fa fa-home"></i>
                                            <span class="nav-text fadeable">
                                                <span>Beranda</span>
                                            </span>
                                        </a>
                                    @else
                                        <a href="{{ route('home') }}" class="nav-link">
                                            <i class="nav-icon fa fa-home"></i>
                                            <span class="nav-text fadeable">
                                                <span>Beranda</span>
                                            </span>
                                        </a>
                                    @endif
                                    <b class="sub-arrow"></b>
                                </li>

                                @if (Auth::user()->is_admin == 1)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-folder-open"></i>
                                            <span class="nav-text fadeable">
                                                <span>Profil</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftaranggotadewan') }}"
                                                        class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Anggota DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftardapil') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Daerah Pemilihan</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarsejarah') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Sejarah DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftartugaspokok') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Tupoksi DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                {{-- <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftardewan') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Pimpinan DPRD</span>
                                                        </span>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 4)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-newspaper"></i>
                                            <span class="nav-text fadeable">
                                                <span>Berita</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.berita') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Umum & Sekretariat</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif


                                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-list"></i>
                                            <span class="nav-text fadeable">
                                                <span>Agenda</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.agenda') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>DPRD & Sekretariat</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-chair"></i>
                                            <span class="nav-text fadeable">
                                                <span>AKD & Mitra Kerja</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarakd') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Alat Kelengkapan Dewan</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarmitrakerja') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Mitra Kerja</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-bezier-curve"></i>
                                            <span class="nav-text fadeable">
                                                <span>Fraksi</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarfraksi') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Fraksi</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-warehouse"></i>
                                            <span class="nav-text fadeable">
                                                <span>Sekretariat</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarsejarahsekretariat') }}"
                                                        class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Tentang Setwan</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.tampiltugaspokoksekretariat') }}"
                                                        class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Tugas Pokok & Fungsi</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.visimisi') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Visi Misi & Struktur</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarstruktural') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Pejabat Struktural</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>



                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-bullhorn"></i>
                                            <span class="nav-text fadeable">
                                                <span>Informasi Publik</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                {{-- <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.transparansianggaran') }}"
                                                        class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Transparansi Anggaran</span>
                                                        </span>
                                                    </a>
                                                </li> --}}
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.kinerja') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Transparansi Kinerja</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.pengumuman') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Pengumuman</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.kunjungan') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Daftar Kunjungan</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-images"></i>
                                            <span class="nav-text fadeable">
                                                <span>Publikasi</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftargaleri') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Galeri DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2 || Auth::user()->is_admin == 5)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-project-diagram"></i>
                                            <span class="nav-text fadeable">
                                                <span>PPID</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.ppid') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>PPID</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-journal-whills"></i>
                                            <span class="nav-text fadeable">
                                                <span>JDIH</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.tatatertib') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Peraturan DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.jdih') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Peraturan Daerah</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarkeputusan') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Keputusan DPRD</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif

                                @if (Auth::user()->is_admin == 1)
                                    <li
                                        class="nav-item {{ Request::is('upt') || Request::is('add') || Request::is('stokkosong') || Request::is('obat') || Request::is('kategoriobat') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-question-circle"></i>
                                            <span class="nav-text fadeable">
                                                <span>FAQ</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="{{ route('admin.daftarfaq') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Bantuan</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                {{-- <li
                                                    class="nav-item {{ Request::is('kategoriobat') ? 'active' : '' }}">
                                                    <a href="" target="_blank" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Manual Book</span>
                                                        </span>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif




                                @if (Auth::user()->is_admin == 1)
                                    <li class="nav-item-caption">
                                        <span class="fadeable pl-3"><i class="fas fa-users"></i> Manajemen User</span>
                                        <span class="fadeinable mt-n2 text-125">&hellip;</span>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                            <i class="nav-icon fas fa-users-cog"></i>
                                            <span class="nav-text fadeable">
                                                <span>Pengguna</span>
                                            </span>
                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                        </a>

                                        <div class="hideable submenu collapse">
                                            <ul class="submenu-inner">
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.daftaruser') }}" class="nav-link">
                                                        <span class="nav-text">
                                                            <span>Pengguna Aplikasi</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                @endif


                            </ul>
                        </div>
                        <!-- /.sidebar scroll -->


                        <div class="sidebar-section">
                            <div class="sidebar-section-item fadeable-bottom">
                                <div class="fadeinable">
                                    <!-- shows this when collapsed -->
                                    <div class="pos-rel">
                                        <img alt="user profile" src="{{ Auth::user()->gravatar() }}" width="42"
                                            class="px-1px radius-round mx-2 border-2 brc-default-m2" />
                                        <span
                                            class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
                                    </div>
                                </div>

                                <div class="fadeable hideable w-100 bg-transparent shadow-none border-0">
                                    <!-- shows this when full-width -->
                                    <div id="sidebar-footer-bg"
                                        class="d-flex align-items-center bgc-white shadow-sm mx-2 mt-2px py-2 radius-t-1 border-x-1 border-t-2 brc-primary-m3">
                                        <div class="d-flex mr-auto py-1">
                                            <div class="pos-rel">
                                                @if (Auth::user()->fotoprofil == '')
                                                    <img alt="user profile" src="{{ Auth::user()->gravatar() }}"
                                                        width="42"
                                                        class="px-1px radius-round mx-2 border-2 brc-default-m2"
                                                        style="width: 45px; height:45px; background-position: center center;">
                                                @else
                                                    <img alt="user profile"
                                                        src="{{ asset('img/' . Auth::user()->fotoprofil) }}"
                                                        width="42"
                                                        class="px-1px radius-round mx-2 border-2 brc-default-m2"
                                                        style="width: 45px; height:45px; background-position: center center;">
                                                @endif

                                                @if (Auth::user()->statuslogin == 'On')
                                                    <span
                                                        class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
                                                @else
                                                    <span
                                                        class="bgc-secondary radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
                                                @endif
                                            </div>

                                            <div>
                                                <span class="text-blue-d1 font-bolder">
                                                    {{ Str::substr(Auth::user()->name, 0, 10) }}
                                                    ...
                                                </span>
                                                <div class="text-80 text-grey">
                                                    @if (Auth::user()->is_admin == 1)
                                                        Superuser
                                                    @else
                                                        Admin
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if (Auth::user()->is_admin == 1)
                                            <a href="#"
                                                class="d-style btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-0 p-2 mr-2px ml-4"
                                                title="Settings" data-toggle="modal"
                                                data-target="#id-ace-settings-modal">
                                                <i class="fa fa-cog text-150 text-blue-d2 f-n-hover"></i>
                                            </a>
                                        @endif

                                        <a class="d-style btn btn-outline-orange btn-h-light-orange btn-a-light-orange border-0 p-2 mr-1"
                                            title="Logout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt text-150 text-orange-d2 f-n-hover"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

            <div role="main" class="main-content">

                @yield('content')

                @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                    <footer class="footer d-none d-sm-block">
                        <div class="footer-inner bgc-white-tp1">
                            <div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
                                <span class="text-grey">&copy; 2022 - </span>
                                <span class="text-primary-m1 font-bolder text-120">Dewan Perwakilan Rakyat Daerah
                                    Kabupaten Nias Selatan
                                </span>

                                <span class="mx-3 action-buttons text-end">
                                    <span class="badge badge-info badge-lg arrowed-in-right mb-1">
                                        Version
                                    </span>

                                    <span class="badge btn-pink badge-lg arrowed ml-n1 mb-1">
                                        1.1
                                    </span>
                                </span>
                            </div>
                        </div><!-- .footer-inner -->

                        <!-- `scroll to top` button inside footer (for example when in boxed layout) -->
                        <div class="footer-tools">
                            <a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
                                <i class="fa fa-angle-double-up mx-2px text-95"></i>
                            </a>
                        </div>
                    </footer>

                    <footer class="d-sm-none footer footer-sm footer-fixed">
                        <div class="footer-inner">
                            <div
                                class="btn-group d-flex h-100 mx-2 border-x-1 border-t-2 brc-primary-m3 bgc-white-tp1 radius-t-1 shadow">
                                <button
                                    class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0"
                                    data-toggle="modal" data-target="#id-ace-settings-modal">
                                    <i class="fas fa-sliders-h text-blue-m1 text-120"></i>
                                </button>

                                <button
                                    class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0">
                                    <i class="fa fa-plus-circle text-green-m1 text-120"></i>
                                </button>

                                <button
                                    class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0"
                                    data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch"
                                    aria-expanded="false" aria-label="Toggle navbar search">
                                    <i class="fa fa-search text-orange text-120"></i>
                                </button>

                                <button
                                    class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0 mr-0">
                                    <span class="pos-rel">
                                        <i class="fa fa-bell text-purple-m1 text-120"></i>
                                        <span class="badge badge-dot bgc-red position-tr mt-n1 mr-n2px"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </footer>
                @else
                @endforelse
            </div>


        </div>
    </div>

    <!-- include common vendor scripts used in demo pages -->
    <script src="{{ asset('backend/assets/cdn/jquery3.6.0/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/cdn/popper.js1.16.1/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/cdn/bootstrap4.6.0/dist/js/bootstrap.min.js') }}"></script>

    {{-- Data Table --}}
    <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-select@1.3.3/js/dataTables.select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons-bs4@1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@1.7.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js"></script>
    {{-- Data Table --}}

    {{-- Chosen --}}
    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    {{-- Chosen --}}

    {{-- Editor Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- Editor Summernote --}}

    {{-- Spinner --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-touchspin@4.3.0/dist/jquery.bootstrap-touchspin.min.js"></script>
    {{-- Spinner --}}

    {{-- color picker --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/js/bootstrap-colorpicker.min.js"></script>
    {{-- color picker --}}

    <script src="{{ asset('backend/assets/cdn/sortablejs1.13.0/Sortable.min.js') }}"></script>

    {{-- botboox --}}
    <script src="{{ asset('backend/assets/cdn/bootbox/bootbox.all.min.js') }}"></script>
    {{-- botboox --}}

    <!-- include ace.js -->
    <script src="{{ asset('backend/assets/dist/js/ace.min.js') }}"></script>




    @yield('footerChart')

    <script>
        // CHart dan Tooltip
        jQuery(function($) {
            // Tooltips
            $('#tooltip').tooltip()
            $('#tooltip-2')
                .tooltip({
                    template: '<div class="tooltip" role="tooltip"><div class="arrow brc-danger-d3"></div><div class="bgc-danger-d3 tooltip-inner text-110 text-600 p-2"></div></div>'
                })

            // Alert Hidden
            $(document).ready(function() {
                $(".alert").delay(5000).slideUp(300);
            });

            // select2
            $('.select2').select2({
                allowClear: true,
                dropdownParent: $('#select2-parent')
            })

            // Chosen
            $(".chosen-select").chosen({
                allow_single_deselect: true,
                dropdownParent: $('.chosen-select'),
            })

            $("#select2Input").select2({
                dropdownParent: "#modal-container"
            });

            // Spinner 2
            $("#id-spinner-2").TouchSpin({
                verticalbuttons: true,

                buttondown_class: 'btn btn-xs btn-info',
                buttonup_class: 'btn btn-xs btn-info',

                verticaldownclass: '',
                verticalupclass: '',

                verticaldown: '<i class="fa fa-angle-down"></i>',
                verticalup: '<i class="fa fa-angle-up"></i>',
            })

            $("#id-spinner-3").TouchSpin({
                verticalbuttons: true,

                buttondown_class: 'btn btn-xs btn-info',
                buttonup_class: 'btn btn-xs btn-info',

                verticaldownclass: '',
                verticalupclass: '',

                verticaldown: '<i class="fa fa-angle-down"></i>',
                verticalup: '<i class="fa fa-angle-up"></i>',
            })

            // show tooltips only when not touchscreen
            if (!('ontouchstart' in window)) $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            })


            // color picker
            try {
                $('#id-color-picker-1').colorpicker({
                        container: true,
                        extensions: [{
                            name: 'swatches',
                            options: {
                                colors: {
                                    'tetrad1': '#f00',
                                    'tetrad2': '#00f',
                                    'tetrad3': '#eee',
                                    'tetrad4': '#ddd'
                                },
                                namesAsValues: false
                            }
                        }]
                    })
                    .on('colorpickerChange', function(event) {
                        $('#id-color-picker-1-update').css('background-color', event.color.toString())
                    })
            } catch (err) {
                $('#id-color-picker-1').attr('placeholder', 'Plugin not loaded...')
            }

        })
        // CHart dan Tooltip

        // Update conversation's max-height according to available space
        var updateScrollAreaHeight = function() {
            var _scroller = document.querySelector('#conversations [class*="ace-scroll"]')
            _scroller.style.display = 'none'
            if (_scroller) _scroller.style.maxHeight = (Math.max(320, _scroller.parentNode.clientHeight)) + 'px'
            _scroller.style.display = ''
        }
        window.addEventListener('load', updateScrollAreaHeight)
        window.addEventListener('resize', updateScrollAreaHeight)
    </script>

    {{-- Data Datable --}}
    <script>
        jQuery(function($) {
            var tableId = '#datatable'

            var tableHead = document.querySelector('.sticky-nav')
            tableHead.addEventListener('sticky-change', function(e) {
                // when  thead becomes sticky, add is-stuck class to it (which adds a border-bottom to it)
                this.classList.toggle('is-stuck', e.detail.isSticky)
            })



            $.extend(true, $.fn.dataTable.defaults, {
                dom: "<'row'<'col-12 col-sm-6'l><'col-12 col-sm-6 text-right table-tools-col'f>>" +
                    "<'row'<'col-12'tr>>" +
                    "<'row'<'col-12 col-md-5'i><'col-12 col-md-7'p>>",
                renderer: 'bootstrap'
            })

            var $_table = $(tableId).DataTable({
                responsive: true,

                /** optional scrolling **/
                // scrollY: "300px",
                // scrollCollapse: true,

                colReorder: {
                    //disable column reordering for first and last columns
                    fixedColumnsLeft: 1,
                    fixedColumnsRight: 1
                },

                // sDom: 'BRfrtlip',

                classes: {
                    sLength: "dataTables_length text-left w-auto",
                },


                buttons: {
                    dom: {
                        button: {
                            className: 'btn' //remove the default 'btn-secondary'
                        },
                        container: {
                            className: 'dt-buttons btn-group bgc-white-tp2 text-right w-auto'
                        }
                    },

                    buttons: [{
                        "extend": "colvis",
                        "text": "<i class='far fa-eye text-125 text-dark-m2'></i> <span class='d-none'>Show/hide columns</span>",
                        "className": "btn-light-default btn-bgc-white btn-h-outline-primary btn-a-outline-primary",
                        columns: ':not(:first)'
                    }]
                },


                // first and last column are not sortable
                columnDefs: [{
                        orderable: false,
                        className: null,
                        targets: 0
                    },
                    {
                        orderable: false,
                        className: null,
                        targets: 1
                    },
                    {
                        orderable: false,
                        className: null,
                        targets: -1
                    },
                    {
                        responsivePriority: 1,
                        targets: 2
                    }
                ],


                // multiple row selection
                select: {
                    style: 'multis'
                },

                // no specific initial ordering
                order: [],

                language: {
                    search: '<i class="fas fa-search pos-abs mt-2 pt-3px ml-25 text-blue-m2"></i>',
                    searchPlaceholder: " Cari..."
                }
            })


            // specify position of table buttons
            $('.table-tools-col')
                .append($_table.buttons().container())
                // move searchbox into table header
                .find('.dataTables_filter').appendTo('.page-tools').find('input').addClass('pl-45 radius-round')
                .removeClass('form-control-sm')
                // and add a "+" button
                .end().append(

                )


            // helper methods to add/remove bgc-h-* class when selecting/deselecting rows
            var _highlightSelectedRow = function(row) {
                row.querySelector('input[type=checkbox]').checked = true
                row.classList.add('bgc-success-l3')
                row.classList.remove('bgc-h-default-l4')
            }
            var _unhighlightDeselectedRow = function(row) {
                row.querySelector('input[type=checkbox]').checked = false
                row.classList.remove('bgc-success-l3')
                row.classList.add('bgc-h-default-l4')
            }

            // listen to select/deselect event to highlight rows
            $_table
                .on('select', function(e, dt, type, index) {
                    if (type == 'row') {
                        var row = $_table.row(index).node()
                        _highlightSelectedRow(row)
                    }
                })
                .on('deselect', function(e, dt, type, index) {
                    if (type == 'row') {
                        var row = $_table.row(index).node()
                        _unhighlightDeselectedRow(row)
                    }
                })

            // when clicking the checkbox in table header, select/deselect all rows
            $(tableId)
                .on('click', 'th input[type=checkbox]', function() {
                    if (this.checked) {
                        $_table.rows().select().every(function() {
                            _highlightSelectedRow(this.node())
                        });
                    } else {
                        $_table.rows().deselect().every(function() {
                            _unhighlightDeselectedRow(this.node())
                        })
                    }
                })

            // don't select row if we click on the "show details" `plus` sign (td)
            $(tableId).on('click', 'td.dtr-control', function(e) {
                e.stopPropagation()
            })


            // add/remove bgc-h-* class to TH when soring columns
            var previousTh = null
            var toggleTH_highlight = function(th) {
                th.classList.toggle('bgc-yellow-l2')
                th.classList.toggle('bgc-h-yellow-l3')
                th.classList.toggle('text-blue-d2')
            }

            $(tableId)
                .on('click', 'th:not(.sorting_disabled)', function() {
                    if (previousTh != null) toggleTH_highlight(previousTh) // unhighlight previous TH
                    toggleTH_highlight(this)
                    previousTh = this
                })

            // don't select row when clicking on the edit icon
            $('a[data-action=edit').on('click', function(e) {
                e.preventDefault()
                e.stopPropagation() // don't select
            })

            $('a[data-action=hapus').on('click', function(e) {
                e.preventDefault()
                e.stopPropagation() // don't select
            })

            // add a dark border
            $('.dataTables_wrapper')
                .addClass('border-b-1 border-x-1 brc-default-l2')

                // highlight DataTable header
                // also already done in CSS, but you can use custom colors here
                .find('.row:first-of-type')
                .addClass('border-b-1 brc-default-l3 bgc-blue-l4')
                .next().addClass('mt-n1px') // move the next `.row` up by 1px to go below header's border

            // highlight DataTable footer
            $('.dataTables_wrapper')
                .find('.row:last-of-type')
                .addClass('border-t-1 brc-default-l3 mt-n1px bgc-default-l4')


            // if the table has scrollbars, add ace styling to it
            $('.dataTables_scrollBody').aceScroll({
                color: "grey"
            })


            //enable tooltips
            setTimeout(function() {
                $('.dt-buttons button')
                    .each(function() {
                        var div = $(this).find('span').first()
                        if (div.length == 1) $(this).tooltip({
                            container: 'body',
                            title: div.parent().text()
                        })
                        else $(this).tooltip({
                            container: 'body',
                            title: $(this).text()
                        })
                    })
                $('[data-rel=tooltip').tooltip({
                    container: 'body'
                })
            }, 0)

        })
    </script>
    {{-- Data Datable --}}

    {{-- Script Input File --}}
    <script>
        jQuery(function($) {
            // multiple with image preview
            $('#ace-file-input2').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })


            let fileInput = document.getElementById('ace-file-input2')
            fileInput.addEventListener('changed.ace.file', function(e) {
                // get dropped/selected files

                // console.log(e.$_selectedFiles.method)
                // console.log(e.$_selectedFiles.list)
            })

            $('#ace-file-input3').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input4').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input5').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input6').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input7').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input8').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input9').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })

            $('#ace-file-input10').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: '<small class="text-70">Cari gambar dan upload disini...</small>',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                //previewSize: 64,
                thumbnail: 'large',

                //allowExt: 'gif|jpg|jpeg|png|webp|svg',
                allowMime: 'image/png|image/jpeg',
                // allowMime: 'image/*',

                //maxSize: 100000,
            })


            fileInput.addEventListener('invalid.ace.file', function(e) {
                // console.log(e.$_fileErrors)
            })

            fileInput.addEventListener('preview_failed.ace.file', function(e) {
                // console.log(e.$_previewError)
                // if(e.$_previewError && e.$_previewError.code == 2) alert(e.$_previewError.filename + ' is not an image!')
            })

            fileInput.addEventListener('clear.ace.file', function(e) {
                // e.preventDefault()
            })
        })
    </script>
    {{-- Script Input File --}}

    {{-- Script Summernote --}}
    <script>
        jQuery(function($) {
            $.extend($.summernote.options.icons, {
                'align': 'fa fa-align',
                'alignCenter': 'fa fa-align-center',
                'alignJustify': 'fa fa-align-justify',
                'alignLeft': 'fa fa-align-left',
                'alignRight': 'fa fa-align-right',
                'indent': 'fa fa-indent',
                'outdent': 'fa fa-outdent',
                'arrowsAlt': 'fa fa-arrows-alt',
                'bold': 'fa fa-bold',
                'caret': 'fa fa-caret-down text-grey-m2 ml-1',
                'circle': 'fa fa-circle',
                'close': 'fa fa fa-close',
                'code': 'fa fa-code',
                'eraser': 'fa fa-eraser',
                'font': 'fa fa-font',
                'italic': 'fa fa-italic',
                'link': 'fa fa-link text-success-m1',
                'unlink': 'fas fa-unlink',
                'magic': 'fa fa-magic text-brown-m1',
                'menuCheck': 'fa fa-check',
                'minus': 'fa fa-minus',
                'orderedlist': 'fa fa-list-ol text-blue',
                'pencil': 'fa fa-pencil',
                'picture': 'far fa-image text-purple-d1',
                'question': 'fa fa-question',
                'redo': 'fa fa-repeat',
                'square': 'fa fa-square',
                'strikethrough': 'fa fa-strikethrough',
                'subscript': 'fa fa-subscript',
                'superscript': 'fa fa-superscript',
                'table': 'fa fa-table text-danger-m2',
                'textHeight': 'fa fa-text-height',
                'trash': 'fa fa-trash',
                'underline': 'fa fa-underline',
                'undo': 'fa fa-undo',
                'unorderedlist': 'fa fa-list-ul text-blue',
                'video': 'far fa-file-video text-pink-m1'
            })

            $('#summernote').summernote({
                height: 250,
                minHeight: 150,
                maxHeight: 400
            })
            $('#summernote2').summernote({
                height: 250,
                minHeight: 150,
                maxHeight: 400
            })
            $('#summernote3').summernote({
                height: 250,
                minHeight: 150,
                maxHeight: 400
            })
        })
    </script>
    {{-- Script Summernote --}}

    {{-- Toastr --}}
    <script>
        @if (Session::has('delete'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["error"]('{{ Session::get('delete') }}', 'Informasi !!')
        @endif

        @if (Session::has('save'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]('{{ Session::get('save') }}', 'Informasi !!')
        @endif

        @if (Session::has('update'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["info"]('{{ Session::get('update') }}', 'Informasi !!')
        @endif

        @if (Session::has('duplicate'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["info"]('{{ Session::get('duplicate') }}', 'Informasi !!')
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["warning"]('{{ Session::get('error') }}', 'Informasi !!')
        @endif
    </script>
    {{-- Toastr --}}

    {{-- Permintaan --}}
    <script>
        jQuery(function($) {
            // when clicking a message, hide message list and show message details
            $('.message-item')
                .on('click', function() {
                    $('#message-list').addClass('d-none')
                    $('#message-view').removeClass('d-none')
                })

            // the go back button (from message details to message list)
            $('#message-list-back-btn')
                .on('click', function() {
                    $('#message-list').removeClass('d-none')
                    $('#message-view').addClass('d-none')
                })

            // when clicking on checkbox, star, and action buttons, don't open message details
            $('.message-select-btn, .message-star-btn, .message-actions')
                .on('click', function(e) {
                    e.stopPropagation()
                })

            $('#message-editor').aceWysiwyg({
                toolbarPlacement: function(toolbarHtml) {
                    var toolbar = $(toolbarHtml).appendTo('#message-editor-toolbar')
                    toolbar.addClass('bgc-white border-none border-t-1 brc-secondary-l2 py-15')
                    return toolbar;
                },
                toolbarStyle: 2,
                toolbar: [
                    'font',
                    null,
                    'fontSize',
                    null,
                    'bold',
                    'italic',
                    null,
                    'insertunorderedlist',
                    'insertorderedlist',
                    null,
                    'createLink',
                    'unlink',
                    null,
                    'insertImage',
                    null,
                    'foreColor',
                    'backColor',
                    null,
                    'removeFormat',
                    'undo',
                    'redo',
                    null,
                    'viewSource'
                ],
            })

            $('#id-field0').aceFileInput({
                style: 'drop',
                droppable: true,

                container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

                placeholderClass: 'text-85 text-600 text-grey-l1 my-2 col-lg-2',
                placeholderText: 'Lampirkan surat permintaan obat <br> yang telah di tanda tangani oleh pimpinan upt',
                placeholderIcon: '<i class="fas fa-file-pdf fa-3x text-green-m3 my-2"></i>',

                thumbnail: 'large',

                allowExt: 'pdf'
            })


            // Simpale table
            $('#simple-table tbody tr')
                .on('click', function(e) {
                    var ret = false
                    try {
                        // return if clicked on a .btn or .dropdown
                        ret = e.target.classList.contains('btn') || e.target.parentNode.classList.contains(
                            'btn') || e.target.closest('.dropdown') != null
                    } catch (err) {}

                    if (ret) return

                    var inp = this.querySelector('input')
                    if (inp == null) return

                    if (e.target.tagName != "INPUT") {
                        inp.checked = !inp.checked
                    }
                    _highlight(this, inp.checked)
                })

            $('#simple-table thead input')
                .on('change', function() {
                    var checked = this.checked
                    $('#simple-table tbody input[type=checkbox]')
                        .each(function() {
                            this.checked = checked
                            var row = $(this).closest('tr').get(0)
                            _highlight(row, checked)
                        })
                })

            // responsive table using basic table plugin
            $('#responsive-table').basictable({
                breakpoint: 800
            })
        })
    </script>
    {{-- Permintaan --}}

    {{-- Add Permintaan --}}
    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('#dtBasicExample2').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });

        // Table Nota
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,

            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
        // Table Nota
    </script>
    {{-- Add Permintaan --}}

    {{-- Dropzone untuk Upload File --}}
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        jQuery(function($) {
            try {

                $('#dropzone').addClass('dropzone');
                var myDropzone = new Dropzone('#dropzone', {
                    previewTemplate: $('#preview-template').html(),
                    // autoProcessQueue: false,
                    addRemoveLinks: false,

                    thumbnailHeight: 120,
                    thumbnailWidth: 120,
                    maxFilesize: 0.5,
                    filesizeBase: 1000,

                    //addRemoveLinks : true,
                    //dictRemoveFile: 'Remove',


                    thumbnail: function(file, dataUrl) {
                        if (file.previewElement) {
                            $(file.previewElement).removeClass("dz-file-preview");
                            $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
                                var thumbnailElement = this;
                                thumbnailElement.alt = file.name;
                                thumbnailElement.src = dataUrl;
                            })

                            setTimeout(function() {
                                $(file.previewElement).addClass("dz-image-preview")
                            }, 1)
                        }
                    }
                }) // new Dropzone



                // simulating upload progress
                var minSteps = 6,
                    maxSteps = 60,
                    timeBetweenSteps = 100,
                    bytesPerStep = 100000;

                myDropzone.uploadFiles = function(files) {
                    var self = this;

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size /
                            bytesPerStep)));

                        for (var step = 0; step < totalSteps; step++) {
                            var duration = timeBetweenSteps * (step + 1);
                            setTimeout(function(file, totalSteps, step) {
                                return function() {
                                    file.upload = {
                                        progress: 100 * (step + 1) / totalSteps,
                                        total: file.size,
                                        bytesSent: (step + 1) * file.size / totalSteps
                                    };

                                    self.emit('uploadprogress', file, file.upload.progress, file
                                        .upload.bytesSent);
                                    if (file.upload.progress == 100) {
                                        file.status = Dropzone.SUCCESS;
                                        self.emit("success", file, 'success', null);
                                        self.emit("complete", file);
                                        self.processQueue();
                                    }
                                };
                            }(file, totalSteps, step), duration);
                        } // fpr step
                    } //for i

                } // myDropzone.uploadFiles

            } catch (err) {
                // console.log(err)
                // alert('Dropzone.js does not support older browsers!');
                $('#dropzone').addClass('p-0')
                    .find('.fallback').removeClass('d-none')
                    .end().find('.dz-default').addClass('d-none')
                    .end().find('input[type=file]').aceFileInput({
                        style: 'drop',
                        droppable: true,

                        container: 'border-0 py-3',

                        placeholderClass: 'text-125 text-600 text-grey-m3 my-2',
                        placeholderText: 'Drop images here or click to choose',
                        placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                        //previewSize: 64,
                        thumbnail: 'large'
                    })
            }

        })
    </script>
    {{-- Dropzone untuk Upload File --}}
</body>

</html>
