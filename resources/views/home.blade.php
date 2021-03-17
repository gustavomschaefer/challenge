@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>

                <button type="button" class="btn btn-labeled btn-success col-2 m-2" onclick="window.location='{{ URL::to('posts/novo') }}'">
                    + Nova
                </button>

                @if (Session::has('sucessoMsg'))
                    <div class="alert alert-success"> {{Session::get('sucessoMsg')}} </div>
                @endif

                <div class="card-body">
                    <b>|| Adicione aqui uma listagem de postagens, com botão de publicar e remover ||</b>
                </div>

                @foreach ($postagens as $postagem)
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$postagem->titulo}}</h5>
                            <p class="card-text">{{$postagem->descricao}}</p>
                            <a href="postagem/{{$postagem->id}}" class="btn btn-primary">Abrir postagem</a>
                            <a href="posts/{{$postagem->id}}/editar" class="btn btn-default btn-sm">Editar</a>

                            {!! Form::open(['method' => 'DELETE', 'url' => 'posts/'.$postagem->id, 'style' => 'display: inline;']) !!}
                            <button type="submit" class="btn btn-sm">Excluir</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
