@extends('layouts.master')

@section('judul', "{$title}")

@section('content')
    <main id="agenda" class="bg-F2F2F2 p-3">
        <div class="wrapall">
            <div class="d-flex align-items-center p-sm-0 ">
                <a href="{{ route('frontend') }}" class="link-secondary hover-bb-dark">Home</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('agendadprd') }}" class="link-dark hover-bb-dark">Agenda</a>
                <i class="fas fa-angle-right px-2 px-md-3"></i>
                <a href="{{ route('agendadprd') }}" class="link-dark hover-bb-dark">{{ $title }}</a>
            </div>

            <div class="fs-2 fw-500 mb-3 mb-xl-4">Agenda</div>

            <div class="breadcrumb d-flex gap-2 gap-md-3 gap-xl-4 mb-4">
                <a href="{{ route('agendadprd') }}" class="border-0 text-white" style="background: #E8BF70;">
                    Agenda DPRD
                </a>
                <a href="{{ route('agendasekretariat') }}">
                    Agenda Sekretariat
                </a>
            </div>

            <div class="d-flex flex-column flex-md-row gap-4 lh-sm">
                <div class="agenda_list flex-grow-1">
                    <div class="bg-white shadow radius-respon p-3 p-md-4 p-xl-5">
                        @forelse ($agenda_drpd_all as $item)
                            <a href="" class="bg-agenda text-dark shadow">
                                <div class="fs-4 fw-500">
                                    {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('l, d F Y') }}
                                </div>
                                <div class="d-flex gap-3 align-items-start agenda_list_item py-3">
                                    <div class="jam p-2 p-lg-3 rounded text-center">
                                        <i class="fas fa-clock text-white"></i> <br>
                                        <div class="mt-1 jamangka text-white fw-500 fs-5">
                                            {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('H:i') }}
                                        </div>
                                    </div>
                                    <div class="ket">
                                        <div class="mb-3 fs-5">
                                            {!! $item->namaagenda !!}
                                        </div>
                                        <div class="mb-1 d-flex gap-2 align-items-center">
                                            <div class="icon-cal text-E8BF70">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="tanggal text-E8BF70">
                                                {{ \Carbon\Carbon::parse($item->tglagenda)->translatedFormat('l, d F Y') }}
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="icon-spot text-E8BF70">
                                                <i class="fas fa-map-marked"></i>
                                            </div>
                                            <div class="sepot text-E8BF70">DPRD Provinsi Jawa Barat</div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </a>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
