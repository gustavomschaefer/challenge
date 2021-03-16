@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova postagem</div>

                <div class="card-body">

                    @if (Request::is('*/editar'))
                        {!! Form::model($postagem, ['method' => 'PATCH', 'url' => 'posts/'.$postagem->id]) !!}
                    @else
                        {!! Form::open(['url' => 'posts/salvar']) !!}
                    @endif

                    {!! Form::label('titulo', "Título") !!}
                    {!! Form::input('text', 'titulo', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
                    {!! Form::label('descricao', "Descrição") !!}
                    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                    {!! Form::input('text', 'imagem', null, ['class' => 'form-control', 'placeholder' => 'Imagem']) !!}

                    {!! Form::input('text', 'ativa', 'S', ['class' => 'form-control', 'hidden', 'placeholder' => 'Ativo']) !!}


                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}


                    {!! Form::close() !!}
                    <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                    <br>
                    <b>|| Usar AJAX no submit e uma barra de progresso (envio em % ou bytes, qualquer comunicação de andamento) ||</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
