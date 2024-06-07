<!DOCTYPE html>
<html itemscope itemtype="https://schema.org/website" lang="id">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="Robots" content="index,follow" />
    <title>@yield('judul', 'Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo_nias_selatan.png') }}" />
    <meta name="description"
        content="Situs web resmi Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan, menyajikan informasi seputar aktifitas Dewan, Profil, Fraksi Partai, Komisi, Badan DPRD." />
    <meta itemprop="name" content="Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan Republik Indonesia" />
    <meta itemprop="description"
        content="Situs web resmi Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan, menyajikan informasi seputar aktifitas Dewan, Profil, Fraksi Partai, Komisi, Badan DPRD." />
    <meta itemprop="image" content="{{ asset('img/kantordprd.JPG') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@dprdkabnisel" />
    <meta name="twitter:title" content="Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan Republik Indonesia" />
    <meta name="twitter:description"
        content="Situs web resmi Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan, menyajikan informasi seputar aktifitas Dewan, Profil, Fraksi Partai, Komisi, Badan DPRD." />
    <meta name="twitter:creator" content="@dprdkabnisel" />
    <meta name="twitter:image:src" content="{{ asset('img/kantordprd.JPG') }}" />
    <meta property="og:title"
        content="Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan Provinsi Sumatera Utara Indonesia " />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://dprd.niasselatankab.go.id/" />
    <meta property="og:image" content="{{ asset('img/kantordprd.JPG') }}" />
    <meta property="og:description"
        content="Situs web resmi Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan, menyajikan informasi seputar aktifitas Dewan, Profil, Fraksi Partai, Komisi, Badan DPRD." />
    <meta property="og:site_name" content="DPRD.niasselatankab.go.id" />
    <meta property="article:tag"
        content="dewan,perwakilan,rakyat,daerah,dprd,nias selatan,kabupaten nias selatan,legislasi,anggaran,representasi,nias,selatan" />
    <meta property="fb:admins" content="69554153200" />
    <meta name="og:locale" content="id_ID" />
    <meta property="fb:app_id" content="" />
    <meta name="twitter:image" content="{{ asset('img/kantordprd.JPG') }}" />
    <link rel="author" href="https://plus.google.com/" />
    <link rel="publisher" href="https://plus.google.com/" />
    <link rel="alternate" hreflang="x-default" href="https://dprd.niasselatankab.go.id/" />
    <meta name="keywords"
        content="dewan,perwakilan,rakyat,daerah,dprd,nias selatan,provinsi,kabupaten nias selatan,legislasi,anggaran,representasi,teluk dalam" />
    <meta name="news_keywords"
        content="dewan,perwakilan,rakyat,daerah,dprd,nias selatan,provinsi,kabupaten nias selatan,legislasi,anggaran,representasi,teluk dalam" />
    <meta name="geo.region" content="ID-JB" />
    <meta name="geo.placename" content="Kabupaten Nias Selatan" />
    <meta name="geo.position" content="-6.900602;107.616522" />
    <meta name="ICBM" content="-6.900602, 107.616522" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/halamandepan.css') }}">

    <Style>
        header {
            background: url('../img/bgheader2.png');
            background-repeat: no-repeat;
            width: 100%;
            height: auto;
        }
    </Style>
</head>

<body>
    <div class="top-border"></div>
    <header class="px-3 px-md-4 px-xl-5 shadow-lg">
        <div class="wrapall py-2 py-sm-3 py-lg-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="logo pe-3 pe-sm-4">
                    <a data-toggle="tooltip" data-placement="top" title="Beranda" href="{{ route('frontend') }}"
                        src="{{ asset('img/logo_nias_selatan.png') }}" alt="DPRD Kabupaten Nias Selatan">
                        <img src="{{ asset('img/logo_nias_selatan.png') }}" alt="" style="width: 90px;">
                    </a>
                </div>
                <div class="ps-3 ps-sm-4 border-start border-secondary">
                    <div class="fw-500 lh-sm">Dewan Perwakilan<br>Rakyat Daerah<br>Kabupaten Nias Selatan</div>
                </div>
            </div>
            <div class="d-none d-lg-block">
                <form action="{{ route('cari') }}" method="GET">
                    <div class="searchbox rounded d-inline-flex justify-content-between align-items-center p-1">
                        <input name="katacari" placeholder="Cari disini..." type="text" class="text rounded ps-1"
                            value="{{ old('katacari') }}">
                        <button type="submit" class="tombol" name="submitcari" value="CARI"></button>
                    </div>
                </form>
            </div>
            <div class="d-lg-none">
                <a class="bars rounded" data-bs-toggle="offcanvas" href="#nav-mobile" role="button"
                    aria-controls="nav-mobile"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </header>
    {{-- <div class="top-border"></div> --}}

    <nav id="nav" class="d-none d-lg-block sticky-top px-4 px-xl-5 py-2 py-xl-3 bg-white shadow-sm">
        <div class="wrapall">
            <ul>
                <li class="li1">
                    <a href="{{ route('frontend') }}">
                        Beranda
                    </a>
                </li>
                <li class="li1">
                    <a href="">
                        Profile
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>

                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('alldprd') }}">
                                Anggota DPRD
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('groupdapil') }}">
                                Daerah Pemilihan
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('sejarah-dprd') }}">
                                Sejarah DPRD
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('tugas-dprd') }}">
                                Kedudukan, Wewenang, Hak & Kewajiban
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        Berita
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>
                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('beritaumum') }}">
                                Berita Umum
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('beritasekretariat') }}">
                                Berita Sekretariat
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="{{ route('agendadprd') }}">
                        Agenda
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>

                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('agendadprd') }}">
                                DPRD
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('agendasekretariat') }}">
                                Sekretariat
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        AKD
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>

                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('pimpinandprd') }}">
                                Pimpinan DRPD
                            </a>
                        </li>
                        @foreach ($dataakd as $item)
                            <li class="li2">
                                <a href="{{ route('tampilakd', $item->slugakd) }}">
                                    {!! $item->akd !!}
                                </a>
                            </li>
                        @endforeach
                        <li class="li2">
                            <a href="{{ route('komisikomisi') }}">
                                Komisi Komisi
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        Fraksi
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>
                    <ul class="shadow">
                        @foreach ($datafraksi as $item)
                            <li class="li2">
                                <a href="{{ route('tampilakd', $item->slugfraksi) }}">
                                    {{ $item->fraksi }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        Sekretariat
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>

                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('tentang-setwan') }}">
                                Tentang Setwan
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('tugas-sekretariat') }}">
                                Tugas Pokok & Fungsi
                            </a>
                        </li>

                        {{-- <li class="li2">
                            <a href="{{ route('visimisisekretariat') }}">
                                Visi Misi
                            </a>
                        </li> --}}

                        <li class="li2">
                            <a href="{{ route('strukturorganisasi') }}">
                                Struktur Organisasi
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('pejabatstruktural') }}">
                                Pejabat Struktural
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        Informasi Publik
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'>
                        </i>
                    </a>

                    <ul class="shadow">
                        {{-- <li class="li2">
                            <a href="{{ route('transparansianggaran') }}">
                                Transparansi Anggaran
                            </a>
                        </li> --}}

                        <li class="li2">
                            <a href="{{ route('transparansikinerja') }}">
                                Transparansi Kinerja
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('pengumuman') }}">
                                Pengumuman
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('formkunjungan') }}">
                                Formulir Kunjungan
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        Publikasi
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>
                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('galerifoto') }}">
                                Foto Geleri
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('galerivideo') }}">
                                Video On Demand
                            </a>
                        </li>

                        <li class="li2">
                            <a href="{{ route('livestreaming') }}">
                                Live Streaming
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="">
                        JDIH
                        <i class='fas fa-angle-down small ms-2 fc-CD9354'></i>
                    </a>
                    <ul class="shadow">
                        <li class="li2">
                            <a href="{{ route('tatatertib') }}">
                                Peraturan DPRD
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('datajdih') }}">
                                Peraturan Daerah (PERDA)
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('keputusandprd') }}">
                                Keputusan DPRD
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="li1">
                    <a href="{{ route('frontppid') }}">
                        PPID
                    </a>
                </li>

                <li class="li1">
                    <a href="{{ route('frontfaq') }}">
                        FAQ
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main id="home" class="bg-F2F2F2 pb-3 pb-md-4 pb-xl-5">
        <div id="home">
            @yield('content')
        </div>
    </main>

    <div class="offcanvas offcanvas-start overflow-auto" tabindex="-1" id="nav-mobile"
        aria-labelledby="nav-mobileLabel">
        <div class="text-end pe-3"><button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Close"></button></div>

        <div class="text-center pb-3">
            <div class="d-inline-flex align-items-center">
                <div class="logo pe-3 pe-sm-4">
                    <a title="Kembali ke beranda" href="{{ route('frontend') }}" alt="DPRD Nias Selatan">
                        <img src="{{ asset('img/logo_nias_selatan.png') }}" alt="" style="width: 100px;">
                    </a>
                </div>
                <div class="ps-3 ps-sm-4 border-start border-secondary">
                    <div class="fw-500 lh-sm text-start">Dewan Perwakilan<br>Rakyat Daerah<br>Kabupaten Nias Selatan
                    </div>
                </div>
            </div>
        </div>

        <nav id="navm">
            <ul>
                <li class="li1 sub-menu"><a href="#" title="Profil DPRD Kabupaten Nias Selatan">Beranda<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        <li class="li2">
                            <a href="{{ route('sejarah-dprd') }}">Sejarah DPRD</a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('tugas-dprd') }}">
                                Kedudukan, Tugas Pokok, Hak & Kewajiban
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('pimpinandprd') }}">
                                Pimpinan DPRD
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('groupdapil') }}">
                                Profil Anggota DPRD
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#" title="Berita DPRD Kabupaten Nias Selatan">Berita<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        <li class="li2"><a href="{{ route('beritaumum') }}">Berita Umum</a></li>
                        <li class="li2"><a href="{{ route('beritasekretariat') }}">Berita
                                Sekretariat</a>
                        </li>
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#" title="Agenda DPRD Kabupaten Nias Selatan">Agenda<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        <li class="li2"><a href="{{ route('agendadprd') }}">Agenda DPRD</a></li>
                        <li class="li2"><a href="{{ route('agendasekretariat') }}">Agenda
                                Sekretariat</a>
                        </li>
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#"
                        title="Alat Kelengkapan Dewan DPRD Kabupaten Nias Selatan">AKD<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        @foreach ($dataakd as $item)
                            <li class="li2">
                                <a href="{{ route('tampilakd', $item->slugakd) }}">
                                    {!! $item->akd !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#" title="Fraksi-Fraksi DPRD Kabupaten Nias Selatan">Fraksi<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        @foreach ($datafraksi as $item)
                            <li class="li2">
                                <a href="{{ route('tampil_per_fraksi', $item->slugfraksi) }}">
                                    {{ $item->fraksi }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#"
                        title="Sekretariat DPRD Kabupaten Nias Selatan">Sekretariat<i
                            class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>

                        <li class="li2">
                            <a href="{{ route('tentang-setwan') }}">
                                Tentang Setwan
                            </a>
                        </li>
                        <li class="li2">
                            <a href="{{ route('tugas-sekretariat') }}">
                                Tugas Pokok & Fungsi
                            </a>
                        </li>
                        <li class="li2"><a href="{{ route('visimisisekretariat') }}">Visi Misi</a>
                        </li>
                        <li class="li2"><a href="{{ route('strukturorganisasi') }}">Struktur
                                Organisasi</a></li>
                        <li class="li2"><a href="{{ route('pejabatstruktural') }}">Pejabat
                                Struktural</a></li>
                    </ul>
                </li>
                <li class="li1 sub-menu">
                    <a href="#" title="Informasi Publik DPRD Kabupaten Nias Selatan">Informasi
                        Publik
                        <i class='fas fa-angle-down ms-2 fc-CD9354 right'></i>
                    </a>

                    <ul>
                        {{-- <li class="li2"><a href="{{ route('transparansianggaran') }}">Transparansi
                                Anggaran</a></li> --}}
                        <li class="li2"><a href="{{ route('transparansikinerja') }}">Transparansi
                                Kinerja</a></li>
                        <li class="li2"><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                        <li class="li2"><a href="{{ route('formkunjungan') }}">Formulir
                                Kunjungan</a></li>
                    </ul>
                </li>
                <li class="li1 sub-menu"><a href="#" title="Publikasi DPRD Kabupaten Nias Selatan">
                        Publikasi
                        <i class='fas fa-angle-down ms-2 fc-CD9354 right'></i></a>
                    <ul>
                        <li class="li2"><a href="{{ route('galerifoto') }}">Photo Gallery</a>
                        </li>
                        <li class="li2"><a href="{{ route('galerivideo') }}">Video On Demand</a>
                        </li>
                        <li class="li2"><a href="{{ route('livestreaming') }}">Live Streaming</a>
                        </li>
                    </ul>
                </li>
                <li class="li1 sub-menu">
                    <a href="{{ route('frontppid') }}" title="Pejabat Pengelola Informasi dan Dokumentasi">
                        PPID
                    </a>
                </li>

                <li class="li1">
                    <a href="{{ route('frontfaq') }}" title="Frequently Asked Questions">
                        FAQ
                    </a>
                </li>

                <li class="li1 sub-menu">
                    <a href="#" title="Publikasi DPRD Kabupaten Nias Selatan">
                        JDIH & Tata Tertib
                        <i class='fas fa-angle-down ms-2 fc-CD9354 right'></i>
                    </a>
                    <ul>
                        <li class="li2"><a href="{{ route('datajdih') }}">JDIH</a>
                        </li>
                        <li class="li2"><a href="{{ route('tatatertib') }}">Tata Tertib DPRD</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <form action="{{ route('cari') }}" method="GET">
            <div class="searchbox rounded d-inline-flex justify-content-between align-items-center p-1 mt-3 mx-5">
                <input name="katacari" value="{{ old('katacari') }}" type="text"
                    class="text rounded w-100 ps-1" />
                <button type="submit" class="tombol" name="submitcari" value="CARI"></button>
            </div>
        </form>
    </div>

    <!-- </div> -->
    <footer class="px-3 px-md-4 px-xl-5">
        <div id="footer"
            class="wrapall py-4 py-xl-5 d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center align-items-lg-end gap-4">
            <div class="d-flex align-items-center">
                <div class="logo pe-3 pe-sm-4 pe-md-5">
                    <a title="Kembali ke beranda" href="{{ route('frontend') }}">
                        <img src="{{ asset('img/logo_footer2.png') }}" alt="DPRD Kabupaten Nias Selatan"
                            style="width: 100px;">
                    </a>
                </div>
                <div class="ps-3 ps-sm-4 ps-md-5 lh-1 border-start border-secondary">
                    <div class="fs-5 lh-1 mb-2">Dikelola oleh:</div>
                    <div class="fw-500 fs-3 lh-1 mb-4">Sekretariat DPRD<br>Kabupaten Nias Selatan</div>
                    <div class="fw-300 fs-5 lh-sm">Jl. Saonigeho Km.3, No. 00, Teluk Dalam,<br />Nias Selatan,
                        Indonesia
                        202865
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 gap-md-3 medsos">
                <a class="d-inline-flex justify-content-center align-items-center"
                    title="Facebook DPRD Kabupaten Nias Selatan" href="#" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="d-inline-flex justify-content-center align-items-center"
                    title="Instagram DPRD Kabupaten Nias Selatan" href="#" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a class="d-inline-flex justify-content-center align-items-center"
                    title="Twitter DPRD Kabupaten Nias Selatan" href="#" target="_blank"><i
                        class="fab fa-twitter"></i></a>
                <a class="d-inline-flex justify-content-center align-items-center"
                    title="Youtube DPRD Kabupaten Nias Selatan" href="#" target="_blank"><i
                        class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <div id="credit" class="wrapall text-center text-lg-start py-3 border-top border-secondary"><span
                class="d-inline-block">Copyright &#169; 2022 <span class="d-inline-block"><span
                        class="d-inline-block">Dewan Perwakilan Rakyat Daerah</span> <span
                        class="d-inline-block">Kabupaten Nias Selatan</span></span><span
                    class="px-2 d-none d-md-inline fw-300">|</span><span class="d-inline-block">Hak Cipta Dilindungi
                    Undang-undang</span></div>
    </footer>
    <div class="top-border"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @yield('footerChart')


    <script>
        $('#nav li').hover(
            function() {
                $('ul', this).stop().slideDown(200);
            },
            function() {
                $('ul', this).stop().slideUp(200);
            }
        );
    </script>

    <script>
        $('.sub-menu ul').hide();
        $(".sub-menu a").click(function() {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
        });
    </script>

    <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">
        var _Hasync = _Hasync || [];
        _Hasync.push(['Histats.start', '1,4152402,4,0,0,0,00010000']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        (function() {
            var hs = document.createElement('script');
            hs.type = 'text/javascript';
            hs.async = true;
            hs.src = ('//s10.histats.com/js15_as.js');
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();
    </script>
    {{-- <noscript>
        <a href="/" target="_blank">
            <img src="//sstatic1.histats.com/0.gif?4152402&101"
                alt="free html hit counter" border="0">
                AYAM BAKAR
        </a>
    </noscript> --}}
    <!-- Histats.com  END  -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
