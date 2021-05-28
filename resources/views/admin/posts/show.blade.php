@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<h4>Category: <a href="{{route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}} </a></h4>
<p>{{$post->content}}</p>
@endsection
