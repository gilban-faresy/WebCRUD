<?php

namespace App\Http\Controllers;

use App\Models\Diamond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $orderBy = $request->sort_stock ? 'stock' : 'name';
        // appends : menambahkan/membawa request pagination (data-data pagination tidak berubah meskipun ada request)
        $diamonds = Diamond::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(9)->appends($request->all());
        return view('pages.data_jual', compact('diamonds'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diamond.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ], [
            'name.required' => 'Nama Obat Harus Diisi!',
            'name.max' => 'Nama Obat Harus Diisi Maksimal 100 karakter!',
            'price.required' => 'Harga Obat Harus Diisi!',
            'price.numeric' => 'Harga Obat Harus Diisi Dengan Angka!',
            'description.required' => 'Stock Obat Harus Diisi!',
            'image.required' => ' foto Harus Diisi!',

        ]);
        $image = $request->file('image');
        $ImageName = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'photo-akun/'.$ImageName;
        Storage::disk('public')->put($path,file_get_contents($image));

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        $data['image'] = $ImageName;

        Diamond::create($data);


        return redirect()->back()->with('success', 'Berhasil Menambah penjualan akun!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diamond $diamond)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $diamond = Diamond::find($id);
        return view('diamond.edit', compact('diamond'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required'
        ]);

        $image = $request->file('image');
        $ImageName = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'photo-akun/'.$ImageName;
        Storage::disk('public')->put($path,file_get_contents($image));

        Diamond::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $ImageName,
        ]);

        return redirect()->route('data_jual.data')->with('success', 'Berhasil Mengupdate  penjualan akun!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Diamond::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Obat!');
    }
}
