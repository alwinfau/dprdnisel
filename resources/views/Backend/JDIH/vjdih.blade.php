@extends('layouts.app')

@section('judul', "Administrator | {$title}")

@section('content')
    <div role="main" class="main-content">
        <div class="page-content container container-plus">
            <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
                <h1 class="page-title text-primary-d2 text-140">
                    Beranda
                    <small class="page-info text-dark-m3">
                        <i class="fa fa-angle-double-right text-80"></i>
                        <a href="{{ 'home' }}" class="text-decoration-none">Home</a>
                        <i class="fas fa-angle-right text-80"></i> {{ $title }}
                    </small>
                </h1>

                <div class="page-tools mt-3 mt-sm-0 mb-sm-n1">
                    <!-- dataTables search box will be inserted here dynamically -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <a href="{{ route('admin.addjdih') }}"
                        class="btn float-left btn-h-light-primary px-4 btn-light-info btn-bold radius-1 d-inline-flex align-items-center pl-2px py-2px mb-1">
                        <span class="bgc-info-tp3 shadow-sm radius-2px h-4 px-25 pt-1 mr-25">
                            <i class="fas fa-plus-circle text-white-tp1 text-110 mt-3px"></i>
                        </span>
                        Posting Peraturan Daerah
                    </a>

                    <a href="{{ route('admin.jdih') }}"
                        class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 py-2 text-90"
                        data-toggle="tooltip" data-placement="top" title="Refresh">
                        <i class="fa fa-undo text-110 w-2 h-2"></i>
                    </a>
                </div>
            </div>

            <div class="card bcard h-auto">
                <form autocomplete="off" class="border-t-3 brc-blue-m2">
                    <table id="dtBasicExample"
                        class="d-style w-100 table text-dark-m1 text-80 border-y-1 brc-black-tp11 collapsed dtr-table">
                        <thead class="sticky-nav text-secondary-m1 text-gray">
                            <tr>
                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm text-center">
                                    No.
                                </th>

                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                    Judul JDIH
                                </th>

                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                    Status
                                </th>

                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                    Dilihat
                                </th>

                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                    Didownload
                                </th>

                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                                    Tanggal Posting
                                </th>

                                <th class="border-0 bgc-white shadow-sm w-2 text-center">
                                    <i class="fas fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="pos-rel">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($dataperda as $row)
                                <tr class="d-style bgc-h-default-l4">
                                    <td class="text-center col-md-1">
                                        {{ $no++ }}
                                    </td>

                                    <td class="text-grey">
                                        {{ $row->juduljdih }}
                                    </td>

                                    <td class="text-grey">
                                        {{ $row->status }}
                                    </td>

                                    <td class="text-grey">
                                        @if ($row->dilihat == null)
                                            0 Kali
                                        @else
                                            {{ $row->dilihat }} Kali
                                        @endif
                                    </td>

                                    <td class="text-grey">
                                        @if ($row->didownload == null)
                                            0 Kali
                                        @else
                                            {{ $row->didownload }} Kali
                                        @endif
                                    </td>

                                    <td class="text-grey col-md-2">
                                        {{ $row->name }}
                                        ({{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y') }})
                                    </td>

                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm radius-1">
                                            <span class="d-none d-lg-inline">
                                                <a data-toggle="tooltip" data-placement="top" title="Download"
                                                    href="{{ route('admin.downloadjdih', $row->id) }}"
                                                    class="btn btn-sm btn-outline-light btn-h-light-orange btn-a-light-orange border-b-2 text-600 px-3 mb-1">
                                                    <i class="fas fa-download text-110 text-orange-d2 mr-1"></i>
                                                    <span class="ml-1 d-md-none">Edit</span>
                                                </a>
                                            </span>

                                            <span class="d-none d-lg-inline">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit"
                                                    href="{{ route('admin.editjdih', $row->id) }}"
                                                    class="btn btn-sm btn-outline-light btn-h-light-orange btn-a-light-orange border-b-2 text-600 px-3 mb-1">
                                                    <i class="fas fa-edit text-110 text-orange-d2 mr-1"></i>
                                                    <span class="ml-1 d-md-none">Edit</span>
                                                </a>
                                            </span>

                                            <span class="d-none d-lg-inline">
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus"
                                                    href="{{ route('admin.hapusjdih', $row->id) }}"
                                                    class="btn btn-sm btn-outline-light btn-h-light-orange btn-a-light-orange border-b-2 text-600 px-3 mb-1">
                                                    <i class="fas fa-trash-alt text-110 text-orange-d2 mr-1"></i>
                                                    <span class="ml-1 d-md-none">Hapus</span>
                                                </a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <small>
                                    <div class="alert d-flex bgc-warning-l4 mt-1 text-dark-tp3 radius-0 text-120 brc-warning-l2"
                                        role="alert">
                                        <div class="position-tl h-102 ml-n1px border-l-4 brc-warning-tp2 m-n1px"></div>

                                        <i class="fas fa-exclamation-circle mr-3 fa-2x text-orange-d1"></i>
                                        <span class="align-self-center">
                                            {{ $title }} Masih Kosong.
                                        </span>
                                    </div>
                                </small>
                            @endforelse
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
