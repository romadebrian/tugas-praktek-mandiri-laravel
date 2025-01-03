<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Posts;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Posts::all();
        // $data = Posts::orderBy('id', 'DESC')->get();
        $data = Posts::latest()->get();
        // dd($data);


        if (request()->path() == 'admin' or request()->path() == 'admin/news') {
            return view('news', compact('data'));
        } else {
            return view('home', compact('data'));
        }

        // if (Auth::user()->role == 'admin') {
        //     return view('news', compact('data'));
        // } else {
        //     return view('home', compact('data'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kategori::all();
        // dd($data);

        return view('addNews', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        // dd($request);
        $validator = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'foto' => 'required|max:2000|mimes:jpg,png,jpeg',
            'kategori' => 'nullable|array'
        ]);

        // dd($validator);

        // $category = '';
        // foreach ($request['category'] as $value) {
        //     $category .=  $value . ',';
        // }

        $validator['foto'] = $request->file('foto')->store('img'); // Menentukan file yang bisa di upload

        $merge = array_merge($validator, array('penulis' => Auth::user()->name));

        // dd($merge);

        Posts::create($merge);
        return redirect('admin')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Posts::find($id);
        // dd($data['kategori']);
        $dataProduk = Produk::all();

        return view('viewNews', compact('data', 'dataProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Posts::find($id);
        $dataKategori = Kategori::all();
        return view('editNews', compact('data', 'dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validator = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
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

        Posts::find($id)->update($validator);
        return redirect('admin')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Posts::find($id);
        // dd($data['image']);
        Storage::delete($data['foto']);
        Posts::find($id)->delete();
        return redirect('admin')->with('success', 'Data Berhasil di Hapus');
    }
}
