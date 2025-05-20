<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no   = 1;
        $unit = UnitKerja::orderby('nama_unit')->get();

        return view('admin.unit_kerja.unit_kerja', compact('no', 'unit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Auth::user()->roles->pluck('role_name')->contains('Ngadimin')) {
        //     echo 'y';
        // } else {
        //     echo 'n';
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $asup = UnitKerja::create([
            'nama_unit' => request('nama_unit')
        ]);

        return back()->withsuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $dt = UnitKerja::where('id', request('id'))->get();

        if (count($dt) > 0) {
            $dt->first()->update([
                'nama_unit' => request('enama_unit')
            ]);
            return back()->withsuccess('Data berhasil diupdate');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
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
    public function destroy($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $unit->delete();

        // return $unit;

        return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
    }
}
