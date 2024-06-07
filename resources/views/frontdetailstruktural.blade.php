@extends('layouts.master')

@section('judul', "{$detailpejabatstruktural->namalengkap}")
<link rel="stylesheet" href="{{ asset('assets/css/detaildewan.css') }}">

@section('content')
    <main id="detil_person" class="bg-F2F2F2 pb-3 pb-md-4 pb-xl-5">
        <!-- cover begin -->
        <div id="cover">
            <div class="ratio ratio-person text-white">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover " alt="dprdkabupatenniasselatan">
                <div class="lg-00-05">
                    <div class="wrapall h-100">
                        <div class="h-100">
                            <div
                                class="d-flex flex-column justify-content-center justify-content-lg-end align-items-center align-items-lg-start h-100 blok_nama ms-lg-4">
                                <div class="text-center text-lg-start mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                    <div class="d-inline-block format-alis fs-875-respon">
                                        {{ $detailpejabatstruktural->jabatanstruktural }}
                                    </div>
                                </div>
                                <div
                                    class="text-center text-lg-start h1-page fw-500 ts-25-000 mb-2 mb-sm-3 mb-lg-4 mb-xl-5 mx-3 mx-lg-0 me-lg-3">
                                    {{ $detailpejabatstruktural->namalengkap }} <br>
                                    (NIP: {{ $detailpejabatstruktural->nip }} )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div class="px-sm-3 px-md-4 px-lg-5 pb-4 pb-sm-5">
            <div class="wrapall">

                <div id="konten" class="px-0 px-sm-4 px-md-5">
                    <div class="px-xl-5">

                        <article class="pb-4 mb-4 pb-lg-5 mb-lg-5 bg-white radius-respon-detil shadow">
                            <div class="px-4 px-xl-5">

                                <!-- foto begin -->
                                <div
                                    class="blok_foto d-flex flex-column flex-lg-row align-items-center align-items-lg-end mb-3">
                                    <img class="foto-person text-secondary small"
                                        src="{{ asset('foto struktural/' . $detailpejabatstruktural->fotostruktural) }}"
                                        alt="{{ $detailpejabatstruktural->namalengkap }}" />
                                    <div class="flex-grow-1 px-4 pb-3 pb-lg-5">
                                        <script>
                                            $(document).ready(function() {
                                                var $temp = $("<input>");
                                                var $url = $(location).attr('href');
                                                $('#btn').click(function() {
                                                    $("#btn").append($temp);
                                                    $temp.val($url).select();
                                                    document.execCommand("copy");
                                                    $temp.remove();
                                                    $(".cetakurl").text("URL Berhasil di Copy!");
                                                });
                                            });
                                        </script>
                                        <div class="share-page mb-4 mb-lg-5">
                                            <div class="d-flex flex-column flex-sm-row align-items-start gap-2">
                                                <div class="me-4">
                                                    Bagikan sekarang:
                                                </div>

                                                <div class="d-flex gap-2 gap-md-3 medsos">
                                                    <a class="d-inline-flex justify-content-center align-items-center"
                                                        title="Share to whatsapp"
                                                        href="https://api.whatsapp.com/send?text={{ route('detailpejabatstruktural', $detailpejabatstruktural->slugstruktural) }}"
                                                        target="_blank">
                                                        <i class="fab fa-whatsapp"></i></a>
                                                    <a class="d-inline-flex justify-content-center align-items-center"
                                                        title="Share to facebook"
                                                        href="https://www.facebook.com/sharer.php?u={{ route('detailpejabatstruktural', $detailpejabatstruktural->slugstruktural) }}"
                                                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    <a class="d-inline-flex justify-content-center align-items-center"
                                                        title="Share to twitter"
                                                        href="https://twitter.com/share?url={{ route('detailpejabatstruktural', $detailpejabatstruktural->slugstruktural) }}"
                                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                                    <a id="btn" type="button"
                                                        class="d-inline-flex justify-content-center align-items-center"
                                                        title="Silahkan klik untuk mencopy url dan kemudian silahkan bagikan..!!">
                                                        <i class="fas fa-link"></i>
                                                    </a>
                                                    <p class="cetakurl"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top border-secondary w-100"></div>
                                    </div>
                                </div>
                                <!-- foto end -->

                                <!-- konten begin -->
                                <div class="row blok_konten">
                                    <div class="col col-12 col-md-6 mb-4">
                                        <div class="fw-500">Tempat & Tanggal Lahir</div>
                                        <div class="fw-300">{{ $detailpejabatstruktural->tempatlahir }}</div>
                                        <div class="fw-300">
                                            {{ \Carbon\Carbon::parse($detailpejabatstruktural->tanggallahir)->translatedFormat('l, d F Y') }}
                                        </div>
                                        <div class="mb-4"></div>
                                        <div class="fw-500">Alamat</div>
                                        <div class="fw-300">{{ $detailpejabatstruktural->alamat }}</div>
                                        <div class="mb-4"></div>

                                        <div class="fw-500">Jabatan</div>
                                        <div class="fw-300">{{ $detailpejabatstruktural->jabatanstruktural }}</div>
                                        <div class="mb-4"></div>

                                    </div>
                                    <div class="col col-12 col-md-6">

                                        <div class="fw-500">Pendidikan</div>
                                        <div class="fw-300">{{ $detailpejabatstruktural->pendidikan }}</div>
                                        <div class="mb-4"></div>

                                    </div>
                                </div>
                                <!-- konten end -->
                                <div class="text-center text-lg-start mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
                                    <div class="d-inline-block format-alis fs-875-respon">
                                        <a href="{{ route('pejabatstruktural') }}" class="text-white"
                                            data-toggle="tooltip" title="Klik untuk kembali">
                                            <i class="fas fa-arrow-circle-left h5"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
