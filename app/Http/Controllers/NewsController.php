<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Posts::all();
        // dd($data);
        return view('news', compact('data'));
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
        $validator = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
        ]);

        // dd($validator);

        Posts::create($validator);
        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
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
            'image' => 'required|string',
        ]);

        // dd($request);
        Posts::find($id)->update($validator);
        return redirect('/')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Posts::find($id)->delete();
        return redirect('/')->with('success', 'Data Berhasil di Hapus');
    }
}
