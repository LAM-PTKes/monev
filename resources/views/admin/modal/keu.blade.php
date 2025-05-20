<div id="ModalFormat" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Format Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <p class="ml-3">
                        Petunjuk Cara Upload File Excel :<br>
                        1. Semua CELL Wajib type Text <br>
                        2. Tanpa Judul Pada Baris <br>
                        3. Tanpa Merger Cell <br>
                        4. Semua Format Excel Harus Mengikuti Contoh Excel di bawah ini
                        <i class="fas fa-hand-point-down"></i>
                        <br>
                        <br>
                        <a href="{{ asset('web/Tutorial_Upload.xlsx') }}" title="">
                            <button type="button" class="btn btn-outline-danger form-control ">
                                <i class="fa fa-download"></i>
                                Download
                            </button>
                        </a>
                    </p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                    data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    <span>Close</span>
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="ModalUpload" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Form Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('sMonevKeu') }}" enctype="multipart/form-data"
                id='FrmUpload'>
                @csrf

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="unit_id" class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 w-100" id="unit_id" name="unit_id" required
                                data-parsley-errors-container="#error-unit_id">
                                <option value="">Select</option>
                                @foreach ($unit as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_unit }}</option>
                                @endforeach
                            </select>
                            <div id="error-unit_id"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form" class="col-sm-3 control-label">Form Monev</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 w-100" id="form" name="form" required
                                data-parsley-errors-container="#error-form">
                                <option value="">Select</option>
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                            </select>
                            <div id="error-form"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun" class="col-sm-3 control-label">Monev Tahun</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control tahun" placeholder="mm/dd/yyyy" id="tahun"
                                    name='tahun' autocomplete='off'data-parsley-errors-container="#error-tahun"
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="error-tahun"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-3 control-label">Upload file</label>
                        <div class="col-sm-9">
                            <input type="file" name='file' id='file' class="dropify" data-max-file-size="5M"
                                required data-parsley-errors-container="#error-file" />
                            <div id="error-file"></div>
                        </div>
                    </div>


                    <!-- end col -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                        data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                        <i class="fas fa-file-excel mr-1"></i>
                        <span>Update</span>
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="ModalFile" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Form Edit Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('gMonevKeu') }}"
                enctype="multipart/form-data" id='FrmUpload'>
                @csrf

                <div class="modal-body">

                    <div class="form-group row" id="diveditfile">
                        <label class="col-lg-4 control-label" for="id_keu">ID</label>
                        <div class="col-lg-8">
                            <input id="id_keu" name="id_keu" type="text" class="required form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form_keu" class="col-sm-3 control-label">Form Monev</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 w-100" id="form_keu" name="form_keu" required
                                data-parsley-errors-container="#error-form_keu">
                                <option value="">Select</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                            </select>
                            <div id="error-form_keu"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun_keu" class="col-sm-3 control-label">Monev Tahun</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control tahun" placeholder="mm/dd/yyyy"
                                    id="tahun_keu" name='tahun_keu'
                                    autocomplete='off'data-parsley-errors-container="#error-tahun_keu" required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="error-tahun_keu"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file_keu" class="col-sm-3 control-label">Upload file</label>
                        <div class="col-sm-9">
                            <input type="file" name='file_keu' id='file_keu' class="dropify"
                                data-max-file-size="5M" data-parsley-errors-container="#error-file_keu" />
                            <div id="error-file_keu"></div>
                        </div>
                    </div>


                    <!-- end col -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                        data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                        <i class="fas fa-file-excel mr-1"></i>
                        <span>Upload</span>
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="ModalAdd" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <form id="WZDD" method="POST" action="{{ route('cMonevKeu') }}">
                                @csrf

                                <div id="wizardSteps">
                                    <h3>Step 1</h3>
                                    <section>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label " for="frm">Monev Form
                                            </label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2 w-100" id="frm"
                                                    name="frm" required
                                                    data-parsley-errors-container="#error-frm">
                                                    <option value="">Select</option>
                                                    <option value="Form 1">Form 1</option>
                                                </select>
                                                <div id="error-frm"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="thn" class="col-lg-3 control-label">Monev Tahun</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control tahun"
                                                        placeholder="mm/dd/yyyy" id="thn" name='thn'
                                                        autocomplete='off'data-parsley-errors-container="#error-thn"
                                                        required>
                                                    <div id="error-thn"></div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-primary text-white b-0">
                                                            <i class="mdi mdi-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="unt" class="col-lg-3 control-label">Unit</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2 w-100" id="unt"
                                                    name="unt" required
                                                    data-parsley-errors-container="#error-unt">
                                                    <option value="">Select</option>
                                                    @foreach ($unit as $k)
                                                        <option value="{{ $k->id }}">{{ $k->nama_unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div id="error-unt"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label"
                                                for="aspek">Aspek/Kegiatan</label>
                                            <div class="col-lg-9">
                                                <input id="aspek" name="aspek" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="indikator">Indikator
                                                Kinerja/Sasaran Mutu</label>
                                            <div class="col-lg-9">
                                                <input id="indikator" name="indikator" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="kategori">Kategori
                                                (Utama/Tambahan)</label>
                                            <div class="col-lg-9">
                                                <input id="kategori" name="kategori" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                    </section>

                                    <h3>Step 2</h3>
                                    <section>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="satuan">Satuan</label>
                                            <div class="col-lg-9">
                                                <input id="satuan" name="satuan" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="bahan">Bahan
                                                Analisis</label>
                                            <div class="col-lg-9">
                                                <input id="bahan" name="bahan" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="metode">Metode
                                                Analisis</label>
                                            <div class="col-lg-9">
                                                <input id="metode" name="metode" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="kriteria">Kriteria</label>
                                            <div class="col-lg-9">
                                                <input id="kriteria" name="kriteria" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="catatan">Catatan &
                                                Rekomendasi</label>
                                            <div class="col-lg-9">
                                                <input id="catatan" name="catatan" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="pic">PIC</label>
                                            <div class="col-lg-9">
                                                <input id="pic" name="pic" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>

                                    </section>

                                    <h3>Step 3</h3>
                                    <section>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="hasil_tw_I">Hasil Evaluasi TW
                                                I</label>
                                            <div class="col-lg-9">
                                                <input id="hasil_tw_I" name="hasil_tw_I" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="januari">Januari</label>
                                            <div class="col-lg-9">
                                                <input id="januari" name="januari" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="februari">Februari</label>
                                            <div class="col-lg-9">
                                                <input id="februari" name="februari" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="maret">Maret</label>
                                            <div class="col-lg-9">
                                                <input id="maret" name="maret" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="hasil_tw_II">Hasil Evaluasi TW
                                                II</label>
                                            <div class="col-lg-9">
                                                <input id="hasil_tw_II" name="hasil_tw_II" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="april">April</label>
                                            <div class="col-lg-9">
                                                <input id="april" name="april" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="mei">Mei</label>
                                            <div class="col-lg-9">
                                                <input id="mei" name="mei" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="juni">Juni</label>
                                            <div class="col-lg-9">
                                                <input id="juni" name="juni" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </section>

                                    <h3>Step Final</h3>
                                    <section>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="hasil_tw_III">Hasil Evaluasi TW
                                                III</label>
                                            <div class="col-lg-9">
                                                <input id="hasil_tw_III" name="hasil_tw_III" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="juli">Juli</label>
                                            <div class="col-lg-9">
                                                <input id="juli" name="juli" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="agustus">Agustus</label>
                                            <div class="col-lg-9">
                                                <input id="agustus" name="agustus" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="september">September</label>
                                            <div class="col-lg-9">
                                                <input id="september" name="september" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="hasil_tw_IV">Hasil Evaluasi TW
                                                IV</label>
                                            <div class="col-lg-9">
                                                <input id="hasil_tw_IV" name="hasil_tw_IV" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="oktober">Oktober</label>
                                            <div class="col-lg-9">
                                                <input id="oktober" name="oktober" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="november">November</label>
                                            <div class="col-lg-9">
                                                <input id="november" name="november" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label" for="desember">Desember</label>
                                            <div class="col-lg-9">
                                                <input id="desember" name="desember" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div id="ModalEdit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <form id="WZVT" method="GET" action="{{ route('eMonevKeu') }}">
                                @csrf

                                <h3>Step 1</h3>
                                <section>
                                    <div class="form-group row" id="divedit">
                                        <label class="col-lg-4 control-label" for="id">ID</label>
                                        <div class="col-lg-8">
                                            <input id="id" name="id" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label " for="efrm">Monev Form
                                        </label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2 w-100" id="efrm" name="efrm"
                                                required data-parsley-errors-container="#error-efrm">
                                                <option value="">Select</option>
                                                <option value="Form 1">Form 1</option>
                                            </select>
                                        </div>
                                        <div id="error-efrm"></div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ethn" class="col-lg-4 control-label">Monev Tahun</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control tahun"
                                                    placeholder="mm/dd/yyyy" id="ethn" name="ethn"
                                                    autocomplete='off'data-parsley-errors-container="#error-ethn"
                                                    required>
                                                <div id="error-ethn"></div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-primary text-white b-0">
                                                        <i class="mdi mdi-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="eunt" class="col-lg-4 control-label">Unit</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2 w-100" id="eunt" name="eunt"
                                                required data-parsley-errors-container="#error-eunt">
                                                <option value="">Select</option>
                                                @foreach ($unit as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div id="error-eunt"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="easpek">Aspek/Kegiatan</label>
                                        <div class="col-lg-8">
                                            <input id="easpek" name="easpek" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="eindikator">Indikator
                                            Kinerja/Sasaran Mutu</label>
                                        <div class="col-lg-8">
                                            <input id="eindikator" name="eindikator" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ekategori">Kategori
                                            (Utama/Tambahan)</label>
                                        <div class="col-lg-8">
                                            <input id="ekategori" name="ekategori" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                </section>

                                <h3>Step 2</h3>
                                <section>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="esatuan">Satuan</label>
                                        <div class="col-lg-8">
                                            <input id="esatuan" name="esatuan" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ebahan">Bahan
                                            Analisis</label>
                                        <div class="col-lg-8">
                                            <input id="ebahan" name="ebahan" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="emetode">Metode
                                            Analisis</label>
                                        <div class="col-lg-8">
                                            <input id="emetode" name="emetode" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ekriteria">Kriteria</label>
                                        <div class="col-lg-8">
                                            <input id="ekriteria" name="ekriteria" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ecatatan">Catatan &
                                            Rekomendasi</label>
                                        <div class="col-lg-8">
                                            <input id="ecatatan" name="ecatatan" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="epic">PIC</label>
                                        <div class="col-lg-8">
                                            <input id="epic" name="epic" type="text"
                                                class="required form-control">
                                        </div>
                                    </div>

                                </section>

                                <h3>Step 3</h3>
                                <section>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ehasil_tw_I">Hasil Evaluasi TW
                                            I</label>
                                        <div class="col-lg-8">
                                            <input id="ehasil_tw_I" name="ehasil_tw_I" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ejanuari">Januari</label>
                                        <div class="col-lg-8">
                                            <input id="ejanuari" name="ejanuari" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="efebruari">Februari</label>
                                        <div class="col-lg-8">
                                            <input id="efebruari" name="efebruari" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="emaret">Maret</label>
                                        <div class="col-lg-8">
                                            <input id="emaret" name="emaret" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ehasil_tw_II">Hasil Evaluasi TW
                                            II</label>
                                        <div class="col-lg-8">
                                            <input id="ehasil_tw_II" name="ehasil_tw_II" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="eapril">April</label>
                                        <div class="col-lg-8">
                                            <input id="eapril" name="eapril" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="emei">Mei</label>
                                        <div class="col-lg-8">
                                            <input id="emei" name="emei" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ejuni">Juni</label>
                                        <div class="col-lg-8">
                                            <input id="ejuni" name="ejuni" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                </section>

                                <h3>Step Final</h3>
                                <section>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ehasil_tw_III">Hasil Evaluasi TW
                                            III</label>
                                        <div class="col-lg-8">
                                            <input id="ehasil_tw_III" name="ehasil_tw_III" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ejuli">Juli</label>
                                        <div class="col-lg-8">
                                            <input id="ejuli" name="ejuli" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="eagustus">Agustus</label>
                                        <div class="col-lg-8">
                                            <input id="eagustus" name="eagustus" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="eseptember">September</label>
                                        <div class="col-lg-8">
                                            <input id="eseptember" name="eseptember" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="ehasil_tw_IV">Hasil Evaluasi TW
                                            IV</label>
                                        <div class="col-lg-8">
                                            <input id="ehasil_tw_IV" name="ehasil_tw_IV" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="eoktober">Oktober</label>
                                        <div class="col-lg-8">
                                            <input id="eoktober" name="eoktober" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="enovember">November</label>
                                        <div class="col-lg-8">
                                            <input id="enovember" name="enovember" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 control-label" for="edesember">Desember</label>
                                        <div class="col-lg-8">
                                            <input id="edesember" name="edesember" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                </section>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div id="ModalEva" class="modal fade bs-example-modal-lg" tabindex="-1" Role User="dialog" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Hasil Evaluasi Per Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div id="tbldetail" class="table-responsive"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                    data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    <span>Close</span>
                </button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div id="ModalExp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Form Export Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('ExMonevKeu') }}"
                enctype="multipart/form-data" id='FrmExp'>
                @csrf

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="unit_id_exp" class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 w-100" id="unit_id_exp" name="unit_id_exp" required
                                data-parsley-errors-container="#error-unit_id_exp">
                                <option value="">Select</option>
                                @foreach ($unit as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_unit }}</option>
                                @endforeach
                            </select>
                            <div id="error-unit_id_exp"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form_exp" class="col-sm-3 control-label">Form Monev</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 w-100" id="form_exp" name="form_exp" required
                                data-parsley-errors-container="#error-form_exp">
                                <option value="">Select</option>
                                <option value="Form 1">Form 1</option>
                            </select>
                            <div id="error-form_exp"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun_exp" class="col-sm-3 control-label">Monev Tahun</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control tahun" placeholder="mm/dd/yyyy"
                                    id="tahun_exp" name='tahun_exp'
                                    autocomplete='off'data-parsley-errors-container="#error-tahun_exp" required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="error-tahun_exp"></div>
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                        data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                        <i class="fas fa-file-download mr-1"></i>
                        <span>Export Excel</span>
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="ModalCari" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Form Pencarian Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="{{ route('CariMonevKeu') }}" id='FrmCari'>
                @csrf

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="cari" class="col-sm-4 control-label">Cari Berdasarkan</label>
                        <div class="col-sm-8">
                            <select class="form-control select2 w-100" id="cari" name="cari" required
                                data-parsley-errors-container="#error-cari">
                                <option value="">Select</option>
                                <option value="1">Bulan & Tahun</option>
                                <option value="2">Tahun</option>
                            </select>
                            <div id="error-cari"></div>
                        </div>
                    </div>

                    <div class="form-group row" id="bnt">
                        <label for="bulan_tahun" class="col-sm-4 control-label">Monev Bulan & Tahun</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control bln" placeholder="mm-yyyy"
                                    id="bulan_tahun" name='bulan_tahun'
                                    autocomplete='off'data-parsley-errors-container="#error-bulan_tahun" required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="error-bulan_tahun"></div>
                        </div>
                    </div>

                    <div class="form-group row" id="thn_doank">
                        <label for="tahun_doank" class="col-sm-4 control-label">Monev Tahun</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control thndoank" placeholder="yyyy"
                                    id="tahun_doank" name='tahun_doank'
                                    autocomplete='off'data-parsley-errors-container="#error-tahun_doank" required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white b-0">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="error-tahun_doank"></div>
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                        data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                        <i class="fas fa-search-plus mr-1"></i>
                        <span>Search</span>
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
