@extends('layouts.app')

@section('judul', 'Verifikasi Email')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="{{ route('frontend') }}" class="text-decoration-none">
                        <i class="fas fa-arrow-circle-left"></i>
                        Verifikasi Email
                    </a>
                </div>

                <div class="card-body text-center">
                    <div class="col-lg-12">
                        <img src="{{ asset('assets/img/gif/email_verifikasi.gif') }}" alt="" width="150px"
                            class="mb-0">
                    </div>
                    <small>
                        <p class="font-bold mb-3">Silahkan verifikasi alamat email anda..!!</p>
                        <p class="mb-0">alamat email ({{ Auth::user()->email }}) ini adalah alamat email yang telah kamu
                            daftarkan </p>
                        <p>Silahkan lakukan verifikasi ulang email anda apabila anda tidak menerima link untuk verfikasi.
                            silahkan Klik tombol dibawah ini.</p>
                    </small>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Silahkan cek dan refresh email anda. link verifikasi sudah kami kirimkan kembali') }}
                        </div>
                    @endif

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-xs shadow-lg">
                            Kirim ulang link verifikasi
                            <i class="fas fa-paper-plane"></i>
                        </button>.
                    </form>
                </div>

                <div class="card-footer text-right">
                    <a class="dropdown-footer text-decoration-none" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </div>
            </div>
        </div>
    </div>
@endsection
