@extends('layouts.master')

@section('judul', "{$pergalerivideo->judul}")
<link rel="stylesheet" href="{{ asset('assets/css/video.css') }}">

@section('content')
    <main id="detil_teks" class="bg-F2F2F2 px-sm-3 px-md-4 px-lg-5 pb-4 pb-sm-5">
        <div class="wrapall">
            <div class="d-flex align-items-center px-3 p-sm-0 py-3 py-sm-3 py-xl-4">
                <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('galerivideo') }}" class="link-dark hover-bb-dark">Video On Demand</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('pergalerivideo', $pergalerivideo->slugjudulgaleri) }}" class="link-dark hover-bb-dark">
                    {{ Str::substr($pergalerivideo->judul, 0, 150) }}...
                </a>
            </div>
            <div class="d-flex align-items-center px-3 p-sm-0 py-3 py-sm-3 py-xl-4">
                <div class="fs-2 fw-500 mb-xl-4 d-flex justify-content-center  mx-auto">
                    Video On Demand DPRD Kabupaten Nias Selatan
                </div>
            </div>
            <!-- konten begin -->
            <div id="konten" class="px-0 px-sm-4 px-md-5">
                <div class="px-lg-5">
                    <article
                        class="pb-4 mb-4 pb-lg-5 mb-lg-5 bg-white radius-respon-detil shadow px-1 px-sm-2 px-md-3 px-lg-4 px-xl-5">
                        <div class="px-3 px-sm-4 px-lg-5 pt-4">
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

                            <div class="share-page mb-3 mb-lg-3">
                                <div class="d-flex flex-column flex-sm-row align-items-start gap-2">
                                    <div class="me-4">
                                        Bagikan Sekarang
                                    </div>
                                    <div class="d-flex gap-2 gap-md-3 medsos">
                                        <a class="d-inline-flex justify-content-center align-items-center"
                                            title="Share to whatsapp"
                                            href="https://api.whatsapp.com/send?text={{ route('pergalerivideo', $pergalerivideo->slugjudulgaleri) }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a class="d-inline-flex justify-content-center align-items-center"
                                            title="Share to facebook"
                                            href="https://www.facebook.com/sharer.php?u={{ route('pergalerivideo', $pergalerivideo->slugjudulgaleri) }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="d-inline-flex justify-content-center align-items-center"
                                            title="Share to twitter"
                                            href="https://twitter.com/share?url={{ route('pergalerivideo', $pergalerivideo->slugjudulgaleri) }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a id="btn" type="button"
                                            class="d-inline-flex justify-content-center align-items-center"
                                            title="Copy URL video dan kemudian bagikan"><i class="fas fa-link"></i></a>
                                        <p class="cetakurl"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="ratio ratio-16x9 mb-4 radius-respon">
                                <iframe src="{!! $pergalerivideo->link !!}?autoplay=1&mute=1" allow="autoplay" frameborder="0"
                                    allowfullscreen class="radius-respon of-cover">
                                </iframe>
                            </div>

                            <span class=" d-block mb-1 mb-sm-2 mb-md-3 teks">
                                {{ $pergalerivideo->judul }}
                            </span>
                            <span class="d-block fw-300">
                                {{ \Carbon\Carbon::parse($pergalerivideo->created_at)->translatedFormat('l, d F Y') }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
