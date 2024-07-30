<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        // dd($data);

        return view('produk', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk/addProduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'foto' => 'required|max:2000|mimes:jpg',
            'descProduk' => 'required|string',
        ]);

        // dd($validator);

        $validator['foto'] = $request->file('foto')->store('img');
        Produk::create($validator);
        return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(string $id)
    {
        $data = Produk::find($id);
        return view('produk/editProduk', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'foto' => 'required|max:2000|mimes:jpg',
            'descProduk' => 'required|string',
        ]);

        // dd($request);
        // dd($validator);

        $validator['foto'] = $request->file('foto')->store('img');

        Produk::find($id)->update($validator);
        return redirect('admin/produk')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::find($id)->delete();
        return redirect('admin/produk')->with('success', 'Data Berhasil di Hapus');
    }
}
