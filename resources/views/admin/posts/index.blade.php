@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div><a href="{{ route('index') }}">Pagina di benvenuto</a></div>
      <div><a href="{{ route('admin.index') }}">Dashboard</a></div>
      <div><a href="{{ route('admin.posts.index') }}">Posts</a></div>
      <div><a href="#">Users</a></div>
      <div><a href="{{ route('admin.categories.index') }}">Categories</a></div>
      <div><a href="#">Tags</a></div>
      <div><a href="#">Contattaci</a></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('admin.posts.create')}}">Scrivi un nuovo post</a>
    </div>
  </div>
    <div class="row justify-content-center">
      @foreach($posts as $post)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                  {{ $post->content }}
                </div>
                <div class="text-center">
                  <div class="edit">
                    <a href="{{route('admin.posts.edit', ['post' => $post->id])}}">Modifica post</a>
                  </div>
                  <div class="read">
                    <a href="{{route('admin.posts.show', ['post' => $post->id])}}">Apri post</a>
                  </div>
                </div>
            </div>
        </div>

@endforeach
</div>
</div>
@endsection
