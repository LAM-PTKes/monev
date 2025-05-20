<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no   = 1;
        $role = Role::where('role_name', '!=', 'Ngadimin')->orderby('role_name')->get();

        return view('admin.role.role', compact('no', 'role'));
        // return $role;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $no   = 1;
        $role = Role::whereNotIn('role_name', ['Ngadimin'])->orderby('role_name')->get();
        $rl   = Role::where('role_name', 'Ngadimin')->get();
        $rusr = RoleUser::whereNotIn('role_id', collect($rl)->pluck('id'))->latest()->get();
        $user = User::orderby('name')->get();

        // return $rusr;
        return view('admin.role.roleuser', compact('no', 'role', 'user', 'rusr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asup = Role::create([
            'role_name' => request('role_name')
        ]);

        return back()->withsuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $cek  =  RoleUser::where('user_id', request('user_id'))->get();

        if (count($cek) == 0) {

            $asup = RoleUser::create([
                'user_id' => request('user_id'),
                'role_id' => request('role_id')
            ]);
            return back()->withsuccess('Data berhasil disimpan');
        } else {
            return back()->witherror('User sudah Terdaftar');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $dt = Role::where('id', request('id'))->get();

        if (count($dt) > 0) {
            $dt->first()->update([
                'role_name' => request('erole_name')
            ]);
            return back()->withsuccess('Data berhasil diupdate');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dt = RoleUser::where('id', request('id'))->get();

        if (count($dt) > 0) {
            $dt->first()->update([
                'user_id' => request('euser_id'),
                'role_id' => request('erole_id')
            ]);
            return back()->withsuccess('Data berhasil diupdate');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dt = Role::where('id', $id)->get();

        if (count($dt) > 0) {
            $dt->first()->delete();

            return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {

        $dt = RoleUser::where('id', $id)->get();

        if (count($dt) > 0) {
            $role = Role::where('role_name', 'User')->get();
            $dt->first()->update([
                'role_id' => $role->first()->id
            ]);

            return back()->withdelete('Role User diubah menjadi role default');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }
}
