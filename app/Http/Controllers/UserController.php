<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no   = 1;
        $user = User::whereNotIn('email', ['bang@gmail.com', 'bangdheenk@gmail.com', 'bangdheenks@gmail.com'])->orderby('name')->get();

        return view('admin.user.user', compact('no', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = User::where('email', request('email'))->get();
        if (count($cek) == 0) {
            $asup = User::create([
                'name'              => request('name'),
                'email'             => request('email'),
                'password'          => Hash::make(request('password')),
                'email_verified_at' => Carbon::now(),
            ]);
            return back()->withsuccess('Data Berhasil Disimpan');
        } else {
            return back()->witherror("Email, Sudah Terdaftar");
        }
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
    public function edit()
    {
        $cek = User::where('id', request('id'))->get();

        if (count($cek) > 0) {
            if (empty(request('epassword'))) {
                $cek->first()->update([
                    'name'              => request('ename'),
                    'email_verified_at' => Carbon::now(),
                ]);
            } else {
                $cek->first()->update([
                    'name'              => request('ename'),
                    'password'          => Hash::make(request('epassword')),
                    'email_verified_at' => Carbon::now()
                ]);
            }
            return back()->withsuccess('Data Berhasil Disimpan');
        } else {
            return back()->witherror("Data tidak ditemukan");
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
    public function destroy(User $id)
    {

        $usr = User::where('id', $id->id)->get();
        if (count($usr) > 0) {
            $id->delete();
            return back()->withdelete('Data yang dihapus permanen tidak bisa dikembalikan');
        } else {
            return back()->witherror("hapus Data Gagal, Data tidak ditemukan");
        }
    }
}
