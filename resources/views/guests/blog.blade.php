@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
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
                </div>
            </div>
            <a href="{{route('post', ['post => $post->slug'])}}">Apri post</a>
        </div>

@endforeach
  </div>
</div>
@endsection
