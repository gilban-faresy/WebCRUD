<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(5)->appends($request->all());

        return view('pages.kelola_akun', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required',
            'password' => 'required',
            'wa' => 'required'
        ], [
            'name.required' => 'Nama User Harus Diisi!',
            'name.max' => 'Nama User Harus Diisi Maksimal 100 karakter!',
            'email.required' => 'Isi Email Anda!',
            'password.required' => 'Isi Password Anda!',
            'wa.required' => 'Isi nomor handphone Anda!',
        ]);
// Setelah validasi berhasil, data dari form (semua data dalam $request) disimpan ke tabel users menggunakan model User.
        User::create($request->all());

        return redirect()->back()->with('success', 'Berhasil Menambah Akun!');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required',
            'password' => 'nullable',  // password tidak harus diisi
            'wa' => 'nullable|max:12',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'wa' => $request->wa,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('kelola_akun.data')->with('success', 'Berhasil Mengubah data akun!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Obat!');
    }
}
