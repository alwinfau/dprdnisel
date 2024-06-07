@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div role="main" class="main-content">
        <div class="page-content container container-plus pt-1">
            <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
                <h1 class="page-title text-primary-d2 text-140">
                    <i class="fas fa-user-cog"></i> Daftar Pengguna Sistem
                </h1>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    {{-- <div class="col-md-6 p-0"> --}}
                    <a href="{{ route('admin.formadduser') }}"
                        class="btn text-80 float-left btn-h-light-danger px-4 btn-light-info radius-1 d-inline-flex align-items-center pl-2px py-2px mb-1 mr-2">
                        <span class="bgc-info-tp3 shadow-sm radius-2px h-4 px-25 pt-1 mr-25">
                            <i class="fas fa-plus-circle text-white-tp1 text-110 mt-3px"></i>
                        </span>
                        Tambahkan User
                    </a>
                </div>
            </div>

            <div class="card bcard h-auto ">
                <table id="dtBasicExample"
                    class="d-style w-100 table text-dark-m1 text-80 border-y-1 brc-black-tp11 collapsed dtr-table">
                    <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
                        <tr class="text-center">
                            <th class="border-0 bgc-white pl-3 pl-md-4 shadow-sm">
                                No
                            </th>
                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Profile
                            </th>
                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Nama User
                            </th>

                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Email User
                            </th>

                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Diinput Oleh
                            </th>

                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Tanggal
                            </th>

                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                Terakhir diUpdate
                            </th>
                            <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm col-md-2">
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="pos-rel">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($datauser as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="col-md-2 text-center">
                                    @if ($row->fotoprofil == '')
                                        <img class="px-1px radius-round mx-2 border-2 brc-default-m2"
                                            src="{{ Auth::user()->gravatar() }}" width="80px"
                                            style="width: 60px; height:60px; background-position: center center;">
                                    @else
                                        <img class="px-1px radius-round mx-2 border-2 brc-default-m2"
                                            src="{{ asset('img/' . $row->fotoprofil) }}" width="80px"
                                            style="width: 60px; height:60px; background-position: center center;">
                                    @endif

                                    @if ($row->statuslogin == 'On')
                                        <span class="badge m-0">
                                            <i class='fas fa-circle text-100 text-success'></i></span>
                                        <span class="text-70 text-center m-0">Sedang Online</span> <br>
                                        <span class="text-70 text-center m-0">
                                            Online
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->waktulogin)->diffForHumans() }}
                                        </span>
                                    @else
                                        <span class="text-70 text-center m-0">Sedang Ofline</span> <br>
                                        <span class="text-70 text-center m-0">
                                            Terakhir Online
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->diffForHumans() }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-green">
                                    {{ $row->name }}
                                    <p style="font-size: 12px;"><strong>Level:</strong>
                                        @if ($row->is_admin == 1)
                                            <span class="badge badge-danger">Superuser</span>
                                        @else
                                            <span class="badge badge-warning">Admin</span>
                                        @endif
                                    </p>
                                </td>
                                <td class="text-green text-justify" style="width: 10px;">
                                    <strong>Email:</strong> {{ $row->email }}
                                    <br>
                                    <strong>Password: </strong>
                                    <p class="text-wrap" style="width: 15rem;"> {{ $row->password }}</p>
                                </td>
                                <td class="text-green">{{ $row->user }}</td>

                                <td class="text-center col-md-3 text-green">
                                    {{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d M Y') }}
                                    Jam: {{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('H:s') }}
                                </td>

                                <td class="text-center col-md-3 text-green">
                                    {{ \Carbon\Carbon::parse($row->updated_at)->translatedFormat('l, d M Y') }}
                                    Jam: {{ \Carbon\Carbon::parse($row->updated_at)->translatedFormat('H:s') }}
                                </td>

                                <td class="text-center text-green col-md-2">
                                    <a href="/edituser/{{ $row->id }}" class="mr-2" data-toggle="tooltip"
                                        data-placement="top" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="/hapususer/{{ $row->id }}" class="mr-2" title="Hapus Data"
                                        data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alerr-warning">
                                <h6 class="text-danger"><i class="fas fa-exclamation-triangle"></i> Data User
                                    Masih Kosong...!!
                                </h6>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
