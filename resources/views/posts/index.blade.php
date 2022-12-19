@extends('layouts.app')

<style>
  #card {
    font-size: 30px;
    color: wheat;
    transition: .5s ease-in-out;
  }  

  #cards {
    font-size: 30px;
    color: red;
  }

  #card:hover {
    color: red;
    cursor: pointer;
  }

  #link {
    list-style: none;
    text-decoration: none;
  }

</style>

@section('content')

<div class="container">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="">Posts recentes</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Criar Post</a>
  </div>
  

  @foreach ($posts as $post)     
    <div class="card mb-4" style="width: 100%;">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
              <h5 class="card-title">{{ $post->title }}</h5>
              <a href="{{ route('like.create', $post->id) }}" class="d-flex align-item center" id="link">               
              <i class="fa-regular fa-heart" id="cards"></i>
                @foreach ($likes as $like)
                    @if ($like->post_id == $post->id && $like->id == $post->id && $like->stlike == 1)
                      <p>{{ count($likes) }}</p>
                    @endif
                @endforeach
              </a>              
          </div>          
          <p class="card-text">{{ $post->body }}</p>
          <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Ver post</a>
      </div>
    </div>
  @endforeach
</div>  
   
@endsection