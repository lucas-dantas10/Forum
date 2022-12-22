@extends('layouts.app')

<style>
  #card {
    font-size: 30px;
    color: wheat;
    transition: .5s ease-in-out;
  }  

  #cards-empty {
    font-size: 30px;
    color: wheat;
    transition: .5s ease-in-out;
  }

  #cards-empty:hover {
    font-size: 30px;
    color: red;
    cursor: pointer;
  }

  .cards {
    font-size: 30px;
    color: red;
  }

  .cards:hover {
    color: red;
    cursor: pointer;
  }

  #link {
    list-style: none;
    text-decoration: none;
  }

  #edit {
    padding: 11px;
    margin-left: 1rem;
  }

  #component {
    margin-bottom: -1rem;
  }

</style>

@section('content')

<div class="container">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="">Posts recentes</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Criar Post</a>
  </div>
  

  @forelse ($posts as $post)     
    <div class="card mb-4" style="width: 100%;">
      <div class="card-body">
          <div class="d-flex align-items-start justify-content-between" id="component">
            <h5 class="card-title">{{ $post->title }}</h5>
              @if ($post->like->isNotEmpty())
                <heart :id="{{ $post->id }}" class="cards" :likes="{{ $post->like->count() }}"></heart>
              @else 
                <heart :id="{{ $post->id }}" :likes="{{ $post->like->count() }}" class="cards"></heart>
              @endif
          </div>        

          <p class="card-text">{{ $post->body }}</p>

            <div>
              <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Ver post</a>
              <a href="{{ route('post.edit', $post->id) }}">
                <i class="fa-regular fa-pencil btn btn-primary" id="edit"></i>
              </a>
              <a href="{{ route('post.delete', $post->id) }}">
                <i class="fa-solid fa-x btn btn-primary" id="edit"></i>
              </a>  
            </div>     
      </div>
    </div>

    @empty 
      <p>Nenhum Post Cadastrado</p>
  @endforelse


</div>  

{!! $posts->links() !!}
   
@endsection