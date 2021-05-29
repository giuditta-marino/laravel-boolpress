@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('admin.categories.create')}}">Aggiungi una categoria</a>
    </div>
  </div>
    <div class="row justify-content-center">
      @foreach($categories as $category)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ $category->name }}</div>

                <div class="card-body">
                </div>
                <div class="text-center">
                  <div class="edit">
                    <a href="{{route('admin.categories.edit', ['category' => $category->id])}}">Modifica categoria</a>
                  </div>
                  <div class="read">
                    <a href="{{route('admin.categories.show', ['category' => $category->id])}}">Mostra categoria</a>
                  </div>
                  <div class="delete">
                    <a class="btn btn-danger" onclick="event.preventDefault();this.nextElementSibling.submit()"> Delete</a>
                    <form class="" action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </div>
                </div>
            </div>
        </div>

  @endforeach
  </div>
</div>
@endsection
