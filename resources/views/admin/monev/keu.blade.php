@extends('admin.layouts.app')
@section('title')
    Monev Keuangan
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dokumen</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Daftar Monev</a></li>
                                <li class="breadcrumb-item active">Monev Keuangan</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Monev Keuangan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <div class="form-group text-left mb-5">

                            <button class="btn btn-outline-info width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="top" title="Lihat" data-original-title="Tooltip on top" id='BtnFormat'>
                                <i class="fas fa-eye mr-1" style="color:black;"></i>
                                <span>Format Upload</span>
                            </button>

                            <button class="btn btn-outline-success width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="top" title="File Monev" data-original-title="Tooltip on top" id='BtnUpload'>
                                <i class="fas fa-file-upload mr-1" style="color:black;"></i>
                                <span>Upload</span>
                            </button>

                            <button class="btn btn-outline-danger width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="top" title="Tambah Data" data-original-title="Tooltip on top"
                                id='BtnAdd'>
                                <i class="fas fa-plus mr-1" style="color:black;"></i>
                                <span>Monev</span>
                            </button>

                            <button class="btn btn-outline-teal width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="top" title="File Monev" data-original-title="Tooltip on top" id='BtnExp'>
                                <i class="fas fa-file-download mr-1" style="color:black;"></i>
                                <span>Download</span>
                            </button>

                            <button class="btn btn-outline-dark width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="top" title="Cari Data" data-original-title="Tooltip on top" id='BtnCari'>
                                <i class="fas fa-search mr-1" style="color:black;"></i>
                                <span>Search</span>
                            </button>

                            @include('alerts.alerts')
                        </div>

                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Action</th>
                                    <th rowspan="2" style="min-width: 300px">Aspek/Kegiatan</th>
                                    <th rowspan="2" style="min-width: 300px">Indikator Kinerja/Sasaran Mutu</th>
                                    <th rowspan="2">Kategori (Utama/Tambahan)</th>
                                    <th rowspan="2">Satuan</th>
                                    <th rowspan="2" style="min-width: 300px">Bahan Analisis</th>
                                    <th rowspan="2" style="min-width: 300px">Metode Analisis</th>
                                    <th rowspan="2" style="min-width: 300px">Kriteria</th>
                                    <th colspan="4" class="text-center">Hasil Evaluasi</th>
                                    <th rowspan="2" style="min-width: 300px">Catatan & Rekomendasi</th>
                                    <th rowspan="2">Tahun</th>
                                    <th rowspan="2">Form</th>
                                    <th rowspan="2">PIC</th>
                                </tr>
                                <tr>
                                    <th>TW I</th>
                                    <th>TW II</th>
                                    <th>TW III</th>
                                    <th>TW IV</th>
                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($mnv as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('dMonevKeu', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning edit"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->unit_id }}~{{ $k->aspek }}~{{ $k->indikator }}~{{ $k->kategori }}~{{ $k->satuan }}~{{ $k->bahan }}~{{ $k->metode }}~{{ $k->kriteria }}~{{ $k->hasil_tw_I }}~{{ $k->hasil_tw_II }}~{{ $k->hasil_tw_III }}~{{ $k->hasil_tw_IV }}~{{ $k->januari }}~{{ $k->februari }}~{{ $k->maret }}~{{ $k->april }}~{{ $k->mei }}~{{ $k->juni }}~{{ $k->juli }}~{{ $k->agustus }}~{{ $k->september }}~{{ $k->oktober }}~{{ $k->november }}~{{ $k->desember }}~{{ $k->catatan }}~{{ $k->pic }}~{{ $k->form }}~{{ date('d-m-Y', strtotime($k->tahun)) }}">
                                                    <i class="fas fa-edit" style="color:black;"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger dlt"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-original-title="Tooltip on top">
                                                    <i class=" fas fa-trash-alt" style="color:black;"></i>
                                                </button>

                                            </form>
                                        </td>
                                        <td>{{ $k->aspek }}</td>
                                        <td>{{ $k->indikator }}</td>
                                        <td>{{ $k->kategori }}</td>
                                        <td>{{ $k->satuan }}</td>
                                        <td>{{ $k->bahan }}</td>
                                        <td>{{ $k->metode }}</td>
                                        <td>{{ $k->kriteria }}</td>
                                        <td align="center">
                                            @if (empty($k->hasil_tw_I) && empty($k->januari) && empty($k->februari) && empty($k->maret))
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Data tidak ditemukan" data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:black;"></i>
                                                </button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark tw"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat"
                                                    data-original-title="Tooltip on top" value='{{ $k->id }}~tw1'>
                                                    <i class="fas fa-eye" style="color:black;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if (empty($k->hasil_tw_II) && empty($k->april) && empty($k->mei) && empty($k->juni))
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Data tidak ditemukan" data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:black;"></i>
                                                </button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark tw"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat"
                                                    data-original-title="Tooltip on top" value='{{ $k->id }}~tw2'>
                                                    <i class="fas fa-eye" style="color:black;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if (empty($k->hasil_tw_III) && empty($k->juli) && empty($k->agustus) && empty($k->september))
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Data tidak ditemukan" data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:black;"></i>
                                                </button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark tw"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat"
                                                    data-original-title="Tooltip on top" value='{{ $k->id }}~tw3'>
                                                    <i class="fas fa-eye" style="color:black;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if (empty($k->hasil_tw_IV) && empty($k->oktober) && empty($k->november) && empty($k->desember))
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Data tidak ditemukan" data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:black;"></i>
                                                </button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark tw"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat"
                                                    data-original-title="Tooltip on top" value='{{ $k->id }}~tw4'>
                                                    <i class="fas fa-eye" style="color:black;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $k->catatan }}</td>
                                        <td>{{ str_replace($bulan, $ganti, date('F Y', strtotime($k->tahun))) }}</td>
                                        <td>{{ $k->form }}</td>
                                        <td>{{ $k->pic }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="header-title"><b>Monev Form 2</b></h4>
                        <br>
                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>File</th>
                                    <th>Bulan & Tahun</th>
                                    <th>Kategori Form</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($mnv1 as $k)
                                    <tr>
                                        <td>{{ $nos++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('hMonevKeu', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning editfile"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->kategori_form }}~{{ date('d-m-Y', strtotime($k->tahun)) }}">
                                                    <i class="fas fa-edit" style="color:black;"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger dlt"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-original-title="Tooltip on top">
                                                    <i class=" fas fa-trash-alt" style="color:black;"></i>
                                                </button>

                                            </form>
                                        </td>
                                        <td>
                                            @if (!empty($k->nama_file))
                                                <a href="{{ asset('storage/dockeuangan/' . $k->nama_file) }}">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-outline-dark"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat"
                                                        data-original-title="Tooltip on top">
                                                        <i class="fas fa-eye" style="color:black;"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark"
                                                    data-toggle="tooltip" data-placement="top" title="Tidak Ada File"
                                                    data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:red;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ str_replace($bulan, $ganti, date('F Y', strtotime($k->tahun))) }}</td>
                                        <td>{{ $k->kategori_form }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="header-title"><b>Monev Form 3</b></h4>
                        <br>
                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>File</th>
                                    <th>Bulan & </th>
                                    <th>Kategori Form</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($mnv2 as $k)
                                    <tr>
                                        <td>{{ $noss++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('hMonevKeu', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning editfile"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->kategori_form }}~{{ date('d-m-Y', strtotime($k->tahun)) }}">
                                                    <i class="fas fa-edit" style="color:black;"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger dlt"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-original-title="Tooltip on top">
                                                    <i class=" fas fa-trash-alt" style="color:black;"></i>
                                                </button>

                                            </form>
                                        </td>
                                        <td>
                                            @if (!empty($k->nama_file))
                                                <a href="{{ asset('storage/dockeuangan/' . $k->nama_file) }}">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-outline-dark"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat"
                                                        data-original-title="Tooltip on top">
                                                        <i class="fas fa-eye" style="color:black;"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-dark"
                                                    data-toggle="tooltip" data-placement="top" title="Tidak Ada File"
                                                    data-original-title="Tooltip on top">
                                                    <i class="fas fa-eye-slash" style="color:red;"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ str_replace($bulan, $ganti, date('F Y', strtotime($k->tahun))) }}</td>
                                        <td>{{ $k->kategori_form }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
    @include('admin.modal.keu')
@endsection
@include('admin.jsfile.datatable')
@include('admin.jsfile.monevkeu')
