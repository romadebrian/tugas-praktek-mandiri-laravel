<?php

namespace App\Http\Controllers;

use App\Models\Posts;
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
        $data = Posts::orderBy('id', 'DESC')->get();
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
        return view('addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        // dd($request['category']);
        $validator = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|max:2000|mimes:jpg,png,jpeg',
            'category' => 'nullable|array'
        ]);

        // dd($validator);

        // $category = '';
        // foreach ($request['category'] as $value) {
        //     $category .=  $value . ',';
        // }

        $validator['image'] = $request->file('image')->store('img'); // Menentukan file yang bisa di upload

        $merge = array_merge($validator, array('author' => Auth::user()->name));

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
        // dd($data);


        return view('viewNews', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Posts::find($id);
        return view('editNews', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'max:2000|mimes:jpg,png,jpeg',
        ]);

        // dd($request);
        // dd($validator);
        // dd($request);


        if (!empty($validator['image'])) {
            $validator['image'] = $request->file('image')->store('img');
            // dd($validator);
        }

        // dd($validator);


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
        Storage::delete($data['image']);
        Posts::find($id)->delete();
        return redirect('admin')->with('success', 'Data Berhasil di Hapus');
    }
}
