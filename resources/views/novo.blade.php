@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova postagem</div>

                <div class="card-body">

                    @if (Request::is('*/editar'))
                        {!! Form::model($postagem, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'url' => 'posts/'.$postagem->id]) !!}
                    @else
                        {!! Form::open(['url' => 'posts/salvar', 'enctype' => 'multipart/form-data']) !!}
                    @endif

                    {!! Form::label('titulo', "Título") !!}
                    {!! Form::input('text', 'titulo', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
                    {!! Form::label('descricao', "Descrição") !!}
                    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                    {!! Form::input('file', 'imagem', null, ['id' => 'imagem', 'class' => 'form-control']) !!}




{{--                      @csrf
                    <input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start" >
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Select a file or drag here</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                            <br>
                            <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                        </div>
                    </label>
  --}}





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
