@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<h4>Category:
  @if ($post->category)
    <a href="{{route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}} </a>
  @endif
</h4>
<h4>Tags:
  @foreach($post->tags as $tag)
    <a href="{{route('tag.index', ['slug' => $tag->slug])}}">#{{$tag->name}} </a>
  @endforeach
</h4>
<p>{{$post->content}}</p>
@endsection
