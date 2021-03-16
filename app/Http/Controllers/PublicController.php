<?php

namespace App\Http\Controllers;

use App\Postagem;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postagens = Postagem::get();

        return view('public', ['postagens' => $postagens]);
    }

    public function postagem()
    {
        //$postagem = Postagem::get();

        return view('public_post');
    }
}
