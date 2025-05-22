<?php

namespace App\Http\Controllers;

use App\Models\IsiMonev;
use App\Models\MonevKeuangan;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'https://appmonev.lamptkes.org/GetUser';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);
            foreach ($dt as $k) {
                // echo $k['name'] . '<br>';
                $cek = User::where('email', $k['email'])->get();
                if (count($cek) == 0) {

                    User::create([
                        'name'       => $k['name'],
                        'email'      => $k['email'],
                        'password'   => $k['password'],
                        'created_at' => $k['created_at'],
                        'updated_at' => $k['updated_at']

                    ]);
                    // echo $cek;
                } else {
                    continue;
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cek Database'
            ], 200);
            // return $dt;
        }


        curl_close($ch);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $url = 'https://appmonev.lamptkes.org/GetIsi';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);
            $unitNames = [
                'Unit Akreditasi',
                'Unit Sekretariat',
                'Unit IT',
                'Unit Kepegawaian',
                'Unit Sarana',
                'Unit SPMI',
                'Unit Keuangan',
                'Unit RnD',
                'Unit PPS'
            ];

            // $units = UnitKerja::whereIn('nama_unit', $unitNames)->pluck('id', 'nama_unit');
            $units = UnitKerja::whereIn('nama_unit', $unitNames)->get()->keyBy('nama_unit');
            // Cek apakah semua unit ditemukan
            if (count($units) < count($unitNames)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Unit Kerja tidak ditemukan'
                ], 404);
            }
            // Jika ingin mengakses ID berdasarkan nama unit:
            $unt  = $units['Unit Akreditasi']->id;
            $unt1 = $units['Unit Sekretariat']->id;
            $unt2 = $units['Unit IT']->id;
            $unt3 = $units['Unit Kepegawaian']->id;
            $unt4 = $units['Unit Sarana']->id;
            $unt5 = $units['Unit SPMI']->id;
            $unt6 = $units['Unit Keuangan']->id;
            $unt7 = $units['Unit RnD']->id;
            $unt8 = $units['Unit PPS']->id;
            // return $unt;
            // Mapping ID unit
            $unitMapping = [
                1 => $unt,
                2 => $unt1,
                3 => $unt2,
                4 => $unt3,
                5 => $unt4,
                6 => $unt5,
                7 => $unt6,
                8 => $unt7,
                9 => $unt8,

            ];

            foreach ($dt as $k) {
                // Lewati jika unit_id tidak dikenali
                if (!isset($unitMapping[$k['unit_id']])) {
                    continue;
                }

                $unitId         = $unitMapping[$k['unit_id']];
                $tahunFormatted = date('Y-m-d', strtotime($k['tahun']));

                // $cek = IsiMonev::where('unit_id', $unitId)
                //     ->where('aspek', $k['aspek'])
                //     ->where('indikator', $k['indikator'])
                //     ->where('satuan', $k['satuan'])
                //     ->where('bahan', $k['bahan'])
                //     ->where('metode', $k['metode'])
                //     ->where('kriteria', $k['kriteria'])
                //     ->where('form', $k['form'])
                //     ->whereDate('tahun', $tahunFormatted)
                //     ->first();

                // if (!$cek) {
                IsiMonev::create([
                    'unit_id'      => $unitId,
                    'aspek'        => $k['aspek'],
                    'indikator'    => $k['indikator'],
                    'satuan'       => $k['satuan'],
                    'bahan'        => $k['bahan'],
                    'metode'       => $k['metode'],
                    'kriteria'     => $k['kriteria'],
                    'hasil_tw_I'   => $k['hasil_tw_I'],
                    'hasil_tw_II'  => $k['hasil_tw_II'],
                    'hasil_tw_III' => $k['hasil_tw_III'],
                    'hasil_tw_IV'  => $k['hasil_tw_IV'],
                    'januari'      => $k['januari'],
                    'februari'     => $k['februari'],
                    'maret'        => $k['maret'],
                    'april'        => $k['april'],
                    'mei'          => $k['mei'],
                    'juni'         => $k['juni'],
                    'juli'         => $k['juli'],
                    'agustus'      => $k['agustus'],
                    'september'    => $k['september'],
                    'oktober'      => $k['oktober'],
                    'november'     => $k['november'],
                    'desember'     => $k['desember'],
                    'catatan'      => $k['catatan'],
                    'pic'          => $k['pic'],
                    'form'         => $k['form'],
                    'tahun'        => $tahunFormatted,
                    'created_at'   => $k['created_at'],
                    'updated_at'   => $k['updated_at']
                ]);
                // }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cek Database'
            ], 200);
        }

        curl_close($ch);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $url = 'https://appmonev.lamptkes.org/GetKeu';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);

            foreach ($dt as $k) {
                $cek = MonevKeuangan::where([
                    ['kategori_form', $k['kategori_form']],
                    ['nama_file', $k['nama_file']],
                ])
                    ->whereDate('tahun', date('Y-m-d', strtotime($k['monev_bulan'])))
                    ->first();

                if (!$cek) {
                    MonevKeuangan::create([
                        'kategori_form' => $k['kategori_form'],
                        'nama_file'     => $k['nama_file'],
                        'tahun'         => date('Y-m-d', strtotime($k['monev_bulan'])),
                        'created_at'    => $k['created_at'],
                        'updated_at'    => $k['updated_at']
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cek Database'
            ], 200);
            // return $dt;
        }

        curl_close($ch);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function GetUser()
    {
        $data = User::all();

        // return $data;
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function GetIsi()
    {
        $data = IsiMonev::all();

        // return $data;
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function GetKeu()
    {
        $data = MonevKeuangan::all();

        // return $data;
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
