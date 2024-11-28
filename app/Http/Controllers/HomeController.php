<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Produit::latest()->paginate(8);
        return view('home',compact('products'))
                ->with('i', (request()->input('page',1) -1) * 8);    }
}
