@extends('layouts.master')

@section('judul', "{$title}")
<link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">

<style>
    .card:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }
</style>

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
                            <a href="{{ route('datajdih') }}" class="link-dark hover-bb-dark">JDIH</a>
                        </div>

                        <div class="fs-2 fw-500 pt-3 mb-xl-1">
                            {{ $title }}
                        </div>
                    </div>
                </div>


                <div id="konten" class="px-0 px-sm-4 px-md-1 w-100">
                    <div class="px-4 px-xl-5 pb-4 pt-3 pb-xl-4">
                        <div class="row">
                            @foreach ($datajdih as $item)
                                <div class="col-md-4 mt-sm-44">
                                    <a href="{{ route('perjdih', $item->slugjdih) }}" class="text-dark"
                                        title="Klik Untuk Melihat & Mendownload Dokumen..!!">
                                        <div class="card mb-4" style="background: #ffe4b3;">
                                            <div class="card-body">
                                                <strong>
                                                    {{ $item->juduljdih }}
                                                </strong>
                                                <p>{!! $item->deksripsijdih !!}</p>
                                                <p class="text-end small">
                                                    @if ($item->status == 'Berlaku')
                                                        <span class="badge badge-success bg-success">
                                                            <i class="fas fa-check-circle"></i>
                                                            Status: {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status == 'Mengubah')
                                                        <span class="badge badge-warning bg-primary">
                                                            <i class="fas fa-spinner"></i>
                                                            Status: {{ $item->status }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger bg-danger">
                                                            <i class="fas fa-clone"></i>
                                                            Status: {{ $item->status }}
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="card-footer d-flex justify-content-between small">
                                                <div class="small">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                </div>

                                                <p class="small">
                                                    <i class="fas fa-eye"></i>
                                                    @if ($item->dilihat == 0)
                                                        0 View
                                                    @else
                                                        {{ $item->dilihat }} lihat
                                                    @endif
                                                </p>

                                                <p class="small">
                                                    <i class="fas fa-download"></i>
                                                    @if ($item->didownload == 0)
                                                        0 Kali
                                                    @else
                                                        {{ $item->didownload }} Kali
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- konten end -->
            </div>
        </div>
    </main>
@endsection

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
