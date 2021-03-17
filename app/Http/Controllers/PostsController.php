<?php

namespace App\Http\Controllers;

use App\Postagem;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

class PostsController extends Controller
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
    public function novo()
    {
        return view('novo');
    }

    public function editar($id)
    {
        $postagem = Postagem::findOrFail($id);
        return view('novo', ['postagem' => $postagem]);
    }

    public function salvar(Request $request)
    {
        $postagem = new Postagem();
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $upload = $request->imagem->storeAS('postagens','post'.$request->id);
            if (!$upload) {
                \Session::flash('erroMsg', 'Erro ao fazer o upload da imagem');
                return Redirect::to('home');
            }

        }

        $postagem = $postagem->create($request->all());

        \Session::flash('sucessoMsg', 'Post cadastrado com sucesso!');

        return Redirect::to('home');
    }

    public function atualizar($id, Request $request)
    {
        $postagem = Postagem::findOrFail($id);

        $postagem->update($request->all());

        \Session::flash('sucessoMsg', 'Post atualizado com sucesso!');

        return Redirect::to('home');
    }

    public function deletar($id)
    {
        $postagem = Postagem::findOrFail($id);

        $postagem->delete();

        \Session::flash('sucessoMsg', 'Post deletado com sucesso!');

        return Redirect::to('home');
    }
}
