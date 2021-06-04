@extends('layouts.app')

@section('content')
  @if($post->category)
  <div class="row justify-content-center">
    <div class="col-md-8">
  <h1>Categoria: {{$category->name}} </h1>
    </div>
  </div>
  @endif
@endsection
