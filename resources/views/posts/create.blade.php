@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Criar Post</h1>

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtitle">Texto</label>
            <input type="text" name="body" class="form-control">
        </div>

        <button class="btn btn-primary">Criar</button>
    </form>
</div>

@endsection