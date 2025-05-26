<?php

namespace App\Http\Controllers;

use App\Models\IsiMonev;
use App\Models\Role;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $unt  = UnitKerja::whereLike('nama_unit', '%Unit Akreditasi%', caseSensitive: false)->get();
        $unt1 = UnitKerja::whereLike('nama_unit', '%Unit IT%', caseSensitive: false)->get();
        $unt2 = UnitKerja::whereLike('nama_unit', '%Unit Kepegawaian%', caseSensitive: false)->get();
        $unt3 = UnitKerja::whereLike('nama_unit', '%Unit Keuangan%', caseSensitive: false)->get();
        $unt4 = UnitKerja::whereLike('nama_unit', '%Unit PPS%', caseSensitive: false)->get();
        $unt5 = UnitKerja::whereLike('nama_unit', '%Unit RnD%', caseSensitive: false)->get();
        $unt6 = UnitKerja::whereLike('nama_unit', '%Unit Sarana%', caseSensitive: false)->get();
        $unt7 = UnitKerja::whereLike('nama_unit', '%Unit Sekretariat%', caseSensitive: false)->get();
        $unt8 = UnitKerja::whereLike('nama_unit', '%Unit SPMI%', caseSensitive: false)->get();

        if (count($unt) > 0 && count($unt1) > 0 && count($unt2) > 0 && count($unt3) > 0 && count($unt4) > 0 && count($unt5) > 0 && count($unt6) > 0 && count($unt7) > 0 && count($unt8) > 0) {
            $jml  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', date('Y'))->count();
            $jml8 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', date('Y'))->count();

            $ttl  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->count();
            $ttl1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->count();
            $ttl2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->count();
            $ttl3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->count();
            $ttl4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->count();
            $ttl5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->count();
            $ttl6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->count();
            $ttl7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->count();
            $ttl8 = IsiMonev::whereIn('unit_id', collect($unt8)->pluck('id'))->count();
            // return $jml;
            return view('admin.beranda.dashboard', compact('jml', 'jml1', 'jml2', 'jml3', 'jml4', 'jml5', 'jml6', 'jml7', 'jml8', 'ttl', 'ttl1', 'ttl2', 'ttl3', 'ttl4', 'ttl5', 'ttl6', 'ttl7', 'ttl8'));
        } else {
            return redirect()->route('unitkerja')->witherror('Data Unit Kerja masih kosong... input terlebih dahulu');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cari(Request $request)
    {
        $cr   = request('cari');
        $bln  = request('bulan_tahun');
        $thn  = request('tahun_doank');
        $unt  = UnitKerja::whereLike('nama_unit', '%Unit Akreditasi%', caseSensitive: false)->get();
        $unt1 = UnitKerja::whereLike('nama_unit', '%Unit IT%', caseSensitive: false)->get();
        $unt2 = UnitKerja::whereLike('nama_unit', '%Unit Kepegawaian%', caseSensitive: false)->get();
        $unt3 = UnitKerja::whereLike('nama_unit', '%Unit Keuangan%', caseSensitive: false)->get();
        $unt4 = UnitKerja::whereLike('nama_unit', '%Unit PPS%', caseSensitive: false)->get();
        $unt5 = UnitKerja::whereLike('nama_unit', '%Unit RnD%', caseSensitive: false)->get();
        $unt6 = UnitKerja::whereLike('nama_unit', '%Unit Sarana%', caseSensitive: false)->get();
        $unt7 = UnitKerja::whereLike('nama_unit', '%Unit Sekretariat%', caseSensitive: false)->get();
        $unt8 = UnitKerja::whereLike('nama_unit', '%Unit SPMI%', caseSensitive: false)->get();

        if (count($unt) > 0 && count($unt1) > 0 && count($unt2) > 0 && count($unt3) > 0 && count($unt4) > 0 && count($unt5) > 0 && count($unt6) > 0 && count($unt7) > 0 && count($unt8) > 0) {

            if ($cr == '1') {
                $xx   = explode('-', $bln);
                $jml  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();
                $jml8 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereLike('tahun', '%' . $bln . '%')->count();

                $ttl  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', $xx[0])->count();
                $ttl8 = IsiMonev::whereIn('unit_id', collect($unt8)->pluck('id'))->whereYear('tahun', $xx[0])->count();
            } elseif ($cr == '2') {

                $jml  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', $thn)->count();
                $jml8 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', $thn)->count();

                $ttl  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', $thn)->count();
                $ttl8 = IsiMonev::whereIn('unit_id', collect($unt8)->pluck('id'))->whereYear('tahun', $thn)->count();
            } elseif ($cr == '3') {


                $jml  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->count();
                $jml1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->count();
                $jml2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->count();
                $jml3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->count();
                $jml4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->count();
                $jml5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->count();
                $jml6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->count();
                $jml7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->count();
                $jml8 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->count();


                $ttl  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->count();
                $ttl1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->count();
                $ttl2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->count();
                $ttl3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->count();
                $ttl4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->count();
                $ttl5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->count();
                $ttl6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->count();
                $ttl7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->count();
                $ttl8 = IsiMonev::whereIn('unit_id', collect($unt8)->pluck('id'))->count();
            } else {

                $jml  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', date('Y'))->count();
                $jml8 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->whereYear('tahun', date('Y'))->count();

                $ttl  = IsiMonev::whereIn('unit_id', collect($unt)->pluck('id'))->count();
                $ttl1 = IsiMonev::whereIn('unit_id', collect($unt1)->pluck('id'))->count();
                $ttl2 = IsiMonev::whereIn('unit_id', collect($unt2)->pluck('id'))->count();
                $ttl3 = IsiMonev::whereIn('unit_id', collect($unt3)->pluck('id'))->count();
                $ttl4 = IsiMonev::whereIn('unit_id', collect($unt4)->pluck('id'))->count();
                $ttl5 = IsiMonev::whereIn('unit_id', collect($unt5)->pluck('id'))->count();
                $ttl6 = IsiMonev::whereIn('unit_id', collect($unt6)->pluck('id'))->count();
                $ttl7 = IsiMonev::whereIn('unit_id', collect($unt7)->pluck('id'))->count();
                $ttl8 = IsiMonev::whereIn('unit_id', collect($unt8)->pluck('id'))->count();
            }

            return view('admin.beranda.dashboard', compact('jml', 'jml1', 'jml2', 'jml3', 'jml4', 'jml5', 'jml6', 'jml7', 'jml8', 'ttl', 'ttl1', 'ttl2', 'ttl3', 'ttl4', 'ttl5', 'ttl6', 'ttl7', 'ttl8'));
        } else {
            return back()->witherror('Data Unit Kerja masih kosong... input terlebih dahulu');
        }
    }
}
