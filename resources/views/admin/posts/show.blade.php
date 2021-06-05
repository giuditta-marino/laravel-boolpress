@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
@if($post->cover)
<img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
@endif
@if($post->category)
<h4>Category: <a href="{{route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}} </a></h4>
@endif
<p>{{$post->content}}</p>

<div class="delete">
  <a class="btn btn-danger" onclick="event.preventDefault();this.nextElementSibling.submit()"> Delete</a>
  <form class="" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
  </form>
</div>
@endsection
