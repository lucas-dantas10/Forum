@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Post</h1>

        <form action="{{ route('post.update', $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" placeholder="Novo título">
            </div>

            <div class="form-group">
                <label for="subtitle">Texto</label>
                <input type="text" name="body" class="form-control" placeholder="Novo texto">
            </div>

            <button class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection