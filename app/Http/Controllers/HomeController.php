<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Posts::all();
        // dd($data);

        if (Auth::user()->role == 'admin') {
            return redirect('admin');
        } else {
            return view('home', compact('data'));
        }
    }

    /**
     * Show Post Blog.
     */
    public function show(string $id)
    {
        $data = Posts::find($id);
        // dd($data);


        return view('viewNews', compact('data'));
    }
}
