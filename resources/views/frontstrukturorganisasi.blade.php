@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")
<link rel="stylesheet" href="{{ asset('assets/css/style_sejarah.css') }}">

@section('content')
    <main id="detil_one" class="bg-F2F2F2 pb-3 pb-md-4 pb-xl-5">

        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white">
                <img src="{{ asset('img/kantordprd.JPG') }}" class="of-cover " alt="dprdjabar">
                <div class="lg-00-05 px-md-5">
                    <div class="wrapall h-100">
                        <div class="pb-sm-3 pb-md-4 pb-lg-5 h-100 px-4 px-sm-5">
                            <div class="pb-5 d-flex flex-column justify-content-end h-100 p-lg-5">
                                <div class="px-lg-5">
                                    <div class="mb-2 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
                                        <div class="d-inline-block format-alis fs-875-respon">Sekretariat</div>
                                    </div>
                                    <div class="h1-page fw-500 ts-25-000 mb-2 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
                                        {{ $title }}
                                    </div>

                                    <div class="d-flex align-items-center mb-xl-5">
                                        <a href="{{ route('frontend') }}"
                                            class="link-light ts-25-000 hover-bb-light">Home</a>
                                        <i class="fas fa-angle-right px-3"></i>
                                        <a href="{{ route('strukturorganisasi') }}"
                                            class="link-light ts-25-000 hover-bb-light">
                                            Struktur Organisi
                                        </a>
                                    </div>
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
                <!-- konten begin -->
                <div id="konten" class="px-0 px-sm-4 px-md-5">
                    <div class="px-lg-5">

                        <article
                            class="pb-4 mb-4 pb-lg-5 mb-lg-5 bg-white radius-respon-detil shadow px-1 px-sm-2 px-md-3 px-lg-4 px-xl-5">
                            <div class="px-3 px-sm-4 px-lg-5">
                                <div class="love-button">
                                    <img src="{{ asset('img/love-button.png') }}" alt="">
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var $temp = $("<input>");
                                        var $url = $(location).attr('href');
                                        $('#btn').click(function() {
                                            $("#btn").append($temp);
                                            $temp.val($url).select();
                                            document.execCommand("copy");
                                            $temp.remove();
                                            $(".cetakurl").text("URL copied!");
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
                                                href="https://api.whatsapp.com/send?text={{ route('strukturorganisasi') }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i></a>
                                            <a class="d-inline-flex justify-content-center align-items-center"
                                                title="Share to facebook"
                                                href="https://www.facebook.com/sharer.php?u={{ route('strukturorganisasi') }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a class="d-inline-flex justify-content-center align-items-center"
                                                title="Share to twitter"
                                                href="https://twitter.com/share?url={{ route('strukturorganisasi') }}"
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

                                <div class="border-top border-secondary w-75 mb-2"></div>

                                <div class="konten">
                                    @forelse ($strukturorganisasi as $item)
                                        <img alt="" src="{{ asset('struktur organisasi/' . $item->struktur) }}"
                                            style="height:653px; width:920px" />
                                    @empty
                                        <div class="alert alert-warning alert-dismissible">
                                            <h6>
                                                <i class="fas fa-exclamation-triangle"></i> Data Sejarah Dewan Perwakilan
                                                Rakyat Daerah masih kosong..!!
                                            </h6>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- konten end -->

            </div>
        </div>
    </main>
@endsection
