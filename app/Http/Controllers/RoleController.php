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
        $cek  = RoleUser::where('role_id', collect($rl)->pluck('id'))->get();
        $mg   = collect($rusr)->pluck('user_id')->merge(collect($cek)->pluck('user_id'))->unique()->toArray();
        $user = User::whereNotIn('id', $mg)->orderby('name')->get();
        $eusr = User::all();

        // return $user;
        return view('admin.role.roleuser', compact('no', 'role', 'user', 'rusr', 'eusr'));
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

        $usr = request('user_id');

        foreach ($usr as $k) {
            // echo $k . '<br>';
            $cek = RoleUser::where('user_id', $k)->first();
            if (!$cek) {
                $asup = RoleUser::create(
                    [
                        'user_id' => $k,
                        'role_id' => request('role_id')
                    ]
                );
            }
        }

        return back()->withsuccess('Data berhasil disimpan');
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
            // $dt->first()->update([
            //     'role_id' => $role->first()->id
            // ]);
            // return back()->withdelete('Role User diubah menjadi role default');
            $dt->first()->delete();
            return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
        } else {
            return back()->witherror('Data tidak ditemukan');
        }
    }
}
