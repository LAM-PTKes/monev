<div id="ModalCari" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Form Pencarian Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="{{ route('CariMonevDash') }}" id='FrmCari'>
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
                                <option value="3">Default</option>
                            </select>
                            <div id="error-cari"></div>
                        </div>
                    </div>

                    <div class="form-group row" id="bnt">
                        <label for="bulan_tahun" class="col-sm-4 control-label">Monev Bulan & Tahun</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control bln" placeholder="mm-yyyy" id="bulan_tahun"
                                    name='bulan_tahun'
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
                                <input type="text" class="form-control thndoank" placeholder="yyyy" id="tahun_doank"
                                    name='tahun_doank'
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
