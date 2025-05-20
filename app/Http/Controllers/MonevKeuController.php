<?php

namespace App\Http\Controllers;

use App\Models\IsiMonev;
use App\Models\UnitKerja;
use App\Exports\MonevExport;
use App\Imports\MonevImport;
use Illuminate\Http\Request;
use App\Models\MonevKeuangan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class MonevKeuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no   = 1;
        $nos  = 1;
        $noss = 1;
        $unit = UnitKerja::whereLike('nama_unit', '%Unit Keuangan%', caseSensitive: false)->get();

        if (count($unit) > 0) {
            $mnv   = IsiMonev::whereIn('unit_id', collect($unit)->pluck('id'))->whereYear('tahun', date('Y'))->latest()->get();
            $mnv1  = MonevKeuangan::where('kategori_form', 'Form 2')->whereYear('tahun', date('Y'))->latest()->get();
            $mnv2  = MonevKeuangan::where('kategori_form', 'Form 3')->whereYear('tahun', date('Y'))->latest()->get();

            $bulan = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];
            $ganti      = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];
            return view('admin.monev.keu', compact('no', 'nos', 'noss', 'unit', 'mnv', 'bulan', 'ganti', 'mnv1', 'mnv2'));
        } else {
            return back()->witherror('Data Unit tidak ditemukan');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $asup = IsiMonev::create([
            'unit_id'      => request('unt'),
            'aspek'        => request('aspek'),
            'indikator'    => request('indikator'),
            'kategori'     => request('kategori'),
            'satuan'       => request('satuan'),
            'bahan'        => request('bahan'),
            'metode'       => request('metode'),
            'kriteria'     => request('kriteria'),
            'hasil_tw_I'   => request('hasil_tw_I'),
            'hasil_tw_II'  => request('hasil_tw_II'),
            'hasil_tw_III' => request('hasil_tw_III'),
            'hasil_tw_IV'  => request('hasil_tw_IV'),
            'januari'      => request('januari'),
            'februari'     => request('februari'),
            'maret'        => request('maret'),
            'april'        => request('april'),
            'mei'          => request('mei'),
            'juni'         => request('juni'),
            'juli'         => request('juli'),
            'agustus'      => request('agustus'),
            'september'    => request('september'),
            'oktober'      => request('oktober'),
            'november'     => request('november'),
            'desember'     => request('desember'),
            'catatan'      => request('catatan'),
            'pic'          => request('pic'),
            'form'         => request('frm'),
            'tahun'        => date('Y-m-d', strtotime(request('thn')))
        ]);

        return back()->withsuccess('data berhasil di simpan');
        // return request('aspek');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form  = request('form');
        $tahun = date('Y-m-d', strtotime(request('tahun')));
        $staf  = request('unit_id');
        $ext   = request('file')->extension();

        if ($form == '1') {

            if ($ext == 'xls' || $ext == 'xlsx') {
                $import = Excel::import(new MonevImport($staf, $tahun, $form), request()->file('file'));

                return back()->withsuccess('Import excel berhasil silahkan cek tabel');
            } else {
                return back()->witherror('File Extension bukan .xls atau .xlsx');
            }
        } else {

            $file = request('file');

            // Generate a custom filename
            $filename = 'monev-keuangan-' . date('m-Y') . '-' . time() . '.' . $file->getClientOriginalExtension();

            // Define the folder path within the 'public' disk
            $folder = 'dockeuangan';

            // Ensure the folder exists
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            // Store the file in the specified folder
            Storage::disk('public')->putFileAs($folder, $file, $filename);
            $asup = MonevKeuangan::create([
                'kategori_form' => request('form'),
                'tahun'         => date('Y-m-d', strtotime(request('tahun'))),
                'nama_file'     => $filename
            ]);


            return back()->withsuccess('Berhasil simpan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function HasilEvaluasi()
    {

        $x   = explode('~', strval($_GET['q']));
        $mnv = IsiMonev::where('id', $x[0])->first();
        if ($x[1] == 'tw1') {

            echo        '<table class="table table-bordered m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Januari</th>
                            <th>Februari</th>
                            <th>Maret</th>
                            <th>Hasil Evaluasi TW I</th>
                        </tr>
                    </thead>
                    <tbody>';
            echo            '<tr>';
            echo                    '<td align="justify" width="100px">' . $mnv->januari . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->februari . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->maret . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->hasil_tw_I . '</td>';
            echo            '</tr>';

            echo        '</tbody></table>';
        } elseif ($x[1] == 'tw2') {

            echo        '<table class="table table-bordered m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Juni</th>
                            <th>Hasil Evaluasi TW II</th>
                        </tr>
                    </thead>
                    <tbody>';
            echo            '<tr>';
            echo                    '<td align="justify" width="100px">' . $mnv->april . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->mei . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->juni . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->hasil_tw_II . '</td>';
            echo            '</tr>';

            echo        '</tbody></table>';
            echo '<br> Note : <br>';
            echo '<i><b>Presentase Triwulan II adalah akumulasi dari Triwulan I dan II</b></i>';
        } elseif ($x[1] == 'tw3') {

            echo        '<table class="table table-bordered m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Juli</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Hasil Evaluasi TW III</th>
                        </tr>
                    </thead>
                    <tbody>';
            echo            '<tr>';
            echo                    '<td align="justify" width="100px">' . $mnv->juli . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->agustus . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->september . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->hasil_tw_III . '</td>';
            echo            '</tr>';

            echo        '</tbody></table>';
            echo '<br> Note : <br>';
            echo '<i><b>Presentase Triwulan III adalah akumulasi dari Triwulan I, II dan III</b></i>';
        } else {

            echo        '<table class="table table-bordered m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Oktober</th>
                            <th>November</th>
                            <th>Desember</th>
                            <th>Hasil Evaluasi TW IV</th>
                        </tr>
                    </thead>
                    <tbody>';
            echo            '<tr>';
            echo                    '<td align="justify" width="100px">' . $mnv->oktober . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->november . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->desember . '</td>';
            echo                    '<td align="justify" width="100px">' . $mnv->hasil_tw_IV . '</td>';
            echo            '</tr>';

            echo        '</tbody></table>';
            echo '<br> Note : <br>';
            echo '<i><b>Presentase Triwulan IV adalah akumulasi dari Triwulan I, II III dan IV</b></i>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $ck = IsiMonev::where('id', request('id'))->get();

        if (count($ck) > 0) {
            $ck->first()->update([

                'unit_id'      => request('eunt'),
                'aspek'        => request('easpek'),
                'indikator'    => request('eindikator'),
                'kategori'     => request('ekategori'),
                'satuan'       => request('esatuan'),
                'bahan'        => request('ebahan'),
                'metode'       => request('emetode'),
                'kriteria'     => request('ekriteria'),
                'hasil_tw_I'   => request('ehasil_tw_I'),
                'hasil_tw_II'  => request('ehasil_tw_II'),
                'hasil_tw_III' => request('ehasil_tw_III'),
                'hasil_tw_IV'  => request('ehasil_tw_IV'),
                'januari'      => request('ejanuari'),
                'februari'     => request('efebruari'),
                'maret'        => request('emaret'),
                'april'        => request('eapril'),
                'mei'          => request('emei'),
                'juni'         => request('ejuni'),
                'juli'         => request('ejuli'),
                'agustus'      => request('eagustus'),
                'september'    => request('eseptember'),
                'oktober'      => request('eoktober'),
                'november'     => request('enovember'),
                'desember'     => request('edesember'),
                'catatan'      => request('ecatatan'),
                'pic'          => request('epic'),
                'form'         => request('efrm'),
                'tahun'        => date('Y-m-d', strtotime(request('ethn')))
            ]);

            return back()->withsuccess('Berhasil Update Data');
        } else {
            return back()->witherror("Gagal Update, Data tidak ditemukan");
        }

        // return $ck;
    }

    /**
     * Update the specified resource in storage.
     */
    public function export(Request $request)
    {
        $staf  = UnitKerja::where('id', request('unit_id_exp'))->first()->nama_unit;
        $tahun = date('Y-m-d', strtotime(request('tahun_exp')));
        $form  = request('form_exp');
        $user  = request('unit_id_exp');
        $cek   = IsiMonev::where([['unit_id', $user], ['form', $form]])->whereLike('tahun', '%' . date('Y-m', strtotime($tahun)) . '%')->get();

        if (count($cek) > 0) {
            return  Excel::download(new MonevExport($staf, $tahun, $form, $user), 'Monev' . '-' . $staf . '-' . time() . '.xlsx');
        } else {
            return back()->witherror("Data tidak ditemukan");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cari(Request $request)
    {

        $no   = 1;
        $unit = UnitKerja::whereLike('nama_unit', '%Unit Keuangan%', caseSensitive: false)->get();
        if (request('cari') == '1') {
            $thn  = Carbon::parse(request('bulan_tahun'))->format('Y-m');
            $mnv  = IsiMonev::whereIn('unit_id', collect($unit)->pluck('id'))->whereLike('tahun', '%' . $thn . '%')->latest()->get();
            $mnv1 = MonevKeuangan::where('kategori_form', 'Form 2')->whereLike('tahun', '%' . $thn . '%')->latest()->get();
            $mnv2 = MonevKeuangan::where('kategori_form', 'Form 3')->whereLike('tahun', '%' . $thn . '%')->latest()->get();
        } else {
            $mnv = IsiMonev::whereIn('unit_id', collect($unit)->pluck('id'))
                ->whereYear('tahun', request('tahun_doank'))
                ->latest()
                ->get();
            $mnv1 = MonevKeuangan::where('kategori_form', 'Form 2')->whereYear('tahun', request('tahun_doank'))->latest()->get();
            $mnv2 = MonevKeuangan::where('kategori_form', 'Form 3')->whereYear('tahun', request('tahun_doank'))->latest()->get();
        }

        $bulan      = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $ganti      = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        if (count($mnv) > 0) {

            return view('admin.monev.keu', compact('no', 'unit', 'mnv', 'bulan', 'ganti', 'mnv1', 'mnv2'));
        } else {
            return back()->witherror("Data yang Anda cari tidak ditemukan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsiMonev $id)
    {
        $fd = IsiMonev::where('id', $id->id)->get();
        if (count($fd) > 0) {
            $id->delete();
            return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
        } else {
            return back()->witherror("hapus Data Gagal, Data tidak ditemukan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function simpan(Request $request)
    {
        $mnv = MonevKeuangan::where('id', request('id_keu'))->get();
        if (count($mnv) > 0) {

            if (!empty(request('file_keu'))) {

                $file         = request('file_keu');
                $filename     = 'monev-keuangan-' . date('m-Y') . '-' . time() . '.' . $file->getClientOriginalExtension();
                $folder       = 'dockeuangan/';
                $originalFile = public_path('storage/dockeuangan/' . $mnv->first()->nama_file);

                if (File::exists($originalFile)) {
                    File::delete($originalFile);
                }

                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                Storage::disk('public')->putFileAs($folder, $file, $filename);
                $mnv->first()->update([
                    'kategori_form' => request('form_keu'),
                    'tahun'         => date('Y-m-d', strtotime(request('tahun_keu'))),
                    'nama_file'     => $filename
                ]);

                return back()->withsuccess('Update Data Berhasil');
            } else {

                $mnv->first()->update([
                    'kategori_form' => request('form_keu'),
                    'tahun'         => date('Y-m-d', strtotime(request('tahun_keu')))
                ]);

                return back()->withsuccess('Update Data Berhasil');
            }
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(MonevKeuangan $id)
    {
        $fd = MonevKeuangan::where('id', $id->id)->get();

        if (count($fd) > 0) {
            $arr = ['.jpeg', '.jpg', '.png', '.pdf', '.zip', '.rar', '.docx', '.doc', '.xls', '.xlsx', '.ppt', '.pptx'];
            $originalFile = public_path('storage/dockeuangan/' . $id->nama_file);

            // Hapus file utama
            if (File::exists($originalFile)) {
                File::delete($originalFile);
            }

            // Hapus kemungkinan file cadangan (-old) untuk semua tipe
            $filenameNoExt = pathinfo($id->nama_file, PATHINFO_FILENAME); // tanpa ekstensi

            foreach ($arr as $ext) {
                $oldFile = public_path('storage/dockeuangan/' . $filenameNoExt . '-old' . $ext);
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $id->delete();
            return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
        } else {
            return back()->witherror("hapus Data Gagal, Data tidak ditemukan");
        }
    }
}
