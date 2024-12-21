<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Produk::all();
        $data = Produk::latest()->get();
        // dd($data);

        return view('produk', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kategori::all();
        return view('produk/addProduk', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'descProduk' => 'required|string',
            'foto' => 'required|max:2000|mimes:jpg,png,jpeg',
            'kategori' => 'nullable|array'
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
        $data = Produk::find($id);
        // dd($data['kategori']);

        return view('produk/viewProduk', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::find($id);
        $dataKategori = Kategori::all();
        return view('produk/editProduk', compact('data', 'dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'descProduk' => 'required|string',
            'foto' => 'max:2000|mimes:jpg,png,jpeg',
            'kategori' => 'nullable|array'
        ]);

        // dd($validator);

        if (!empty($validator['foto'])) {
            $validator['foto'] = $request->file('foto')->store('img');
            // dd($validator);
        }
        // $merge = array_merge($validator, array('penulis' => Auth::user()->name));

        if (empty($validator['kategori'])) {
            $validator['kategori'] = null;
        }

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
