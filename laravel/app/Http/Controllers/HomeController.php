<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postagens = Postagem::orderBy('id', 'desc')->simplePaginate(9);

        return view('home', compact('postagens'));
    }


}
