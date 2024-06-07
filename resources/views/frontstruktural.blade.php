@extends('layouts.master')

@section('judul', "{$title} Dewan Perwakilan Rakyat Daerah Kabupaten Nias Selatan")
<link rel="stylesheet" href="{{ asset('assets/css/struktural.css') }}">

@section('content')
    <main id="person_list" class="bg-F2F2F2 p-3 p-md-4">
        <div class="wrapall">
            <div class="align-items-center p-sm-0 ">
                <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('pejabatstruktural') }}" class="link-dark hover-bb-dark">Agenda</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('pejabatstruktural') }}" class="link-dark hover-bb-dark">{{ $title }}</a>
            </div>
            <div class="fs-2 fw-500 mb-3 mb-xl-4 mx-auto text-center m-3">{{ $title }}</div>

            <div class="bg-white shadow radius-respon w-100">
                @foreach ($pejabatstruktural as $item)
                    @if ($item->jabatanstruktural == 'Sekretaris DPRD')
                        <div class="d-flex justify-content-center flex-wrap gap-2 gap-sm-2 gap-md-2 gap-lg-3 py-3 py-md-4">
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detailpejabatstruktural', $item->slugstruktural) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namalengkap }} ({{ $item->jabatanstruktural }})">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto struktural/' . $item->fotostruktural) }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatanstruktural }}
                                </span>
                                <span class="d-block fw-300 teks">
                                    {{ $item->namalengkap }}
                                </span>
                            </a>
                        </div>
                    @endif
                @endforeach

                <div class="d-flex justify-content-center flex-wrap gap-2 gap-sm-2 gap-md-2 gap-lg-3 py-3 py-md-4">
                    @foreach ($pejabatstruktural as $item)
                        @if ($item->jabatanstruktural != 'Sekretaris DPRD')
                            <a class="d-inline-block link-dark text-center"
                                href="{{ route('detailpejabatstruktural', $item->slugstruktural) }}" data-toggle="tooltip"
                                data-placement="top" title="{{ $item->namalengkap }} ({{ $item->jabatanstruktural }})">
                                <span class="d-block">
                                    <img class="w-100 text-secondary small"
                                        src="{{ asset('foto struktural/' . $item->fotostruktural) }}" />
                                </span>
                                <span class="d-block fw-500 mb-2 teks">
                                    {{ $item->jabatanstruktural }}
                                </span>
                                <span class="d-block fw-300 teks">
                                    {{ $item->namalengkap }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
