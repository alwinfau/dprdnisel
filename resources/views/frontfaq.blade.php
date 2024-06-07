@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">

@section('content')
    <main id="detil_one" class="bg-F2F2F2">
        <div class="px-sm-3 px-md-4 px-lg-5 pb-4 pb-sm-5">
            <div class="wrapall">
                <!-- konten begin -->
                <div class="px-4 px-xl-5 pb-4 pt-3 pb-xl-4">
                    <div class="wrapall">
                        <div class="d-flex align-items-center p-sm-0 ">
                            <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                            <i class="fas fa-angle-right px-2 px-md-3"></i>
                            <a href="{{ route('frontfaq') }}" class="link-dark hover-bb-dark">FAQ</a>
                        </div>

                        <div class="fs-2 fw-500 pt-3 mb-xl-4 d-flex justify-content-center">
                            {{ $title }}
                        </div>
                    </div>
                </div>


                <div id="konten" class="px-0 px-sm-4 px-md-5">
                    <div class="px-lg-5">
                        <article
                            class="pb-4 mb-4 pb-lg-5 mb-lg-5 bg-white radius-respon-detil shadow px-1 px-sm-2 px-md-3 px-lg-4 px-xl-5">
                            <div class="px-3 px-sm-4 px-lg-5">
                                <div class="accordion accordion-flush" id="faq">

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
                                            <div class="me-4 mt-2">
                                                Bagikan Sekarang:
                                            </div>
                                            <div class="d-flex gap-2 gap-md-3 medsos">
                                                <a class="d-inline-flex justify-content-center align-items-center"
                                                    title="Share to whatsapp"
                                                    href="https://api.whatsapp.com/send?text={{ route('frontfaq') }}"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                                <a class="d-inline-flex justify-content-center align-items-center"
                                                    title="Share to facebook"
                                                    href="https://www.facebook.com/sharer.php?u={{ route('frontfaq') }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a class="d-inline-flex justify-content-center align-items-center"
                                                    title="Share to twitter"
                                                    href="https://twitter.com/share?url={{ route('frontfaq') }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a id="btn" type="button"
                                                    class="d-inline-flex justify-content-center align-items-center"
                                                    title="Silahkan Copy URL dan kemudian bagikan">
                                                    <i class="fas fa-link"></i>
                                                </a>
                                                <p class="cetakurl"></p>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($faq as $index => $item)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading1">
                                                <button
                                                    class="accordion-button collapsed fs-5 fw-500 bg-white text-dark border-0"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse1{{ $item->id }}"
                                                    aria-expanded="false" aria-controls="flush-collapse1">
                                                    {{ $item->pertanyaan }}
                                                </button>
                                            </h2>
                                            <div id="flush-collapse1{{ $item->id }}"
                                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                aria-labelledby="flush-heading1" data-bs-parent="#faq">
                                                <div class="accordion-body fs-5 fw-300">
                                                    {!! $item->jawaban !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
