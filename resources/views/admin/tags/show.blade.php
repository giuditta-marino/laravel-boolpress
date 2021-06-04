@extends('layouts.app')

@section('content')
  @if($post->category)
  <h1>Categoria: {{$category->name}} </h1>
  @endif
@endsection
