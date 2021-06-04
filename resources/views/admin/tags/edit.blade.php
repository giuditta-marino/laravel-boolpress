@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <form class="" action="{{route('admin.tags.update', ['tag' => $tag->id])}}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="name">Nome tag</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $tag->name) }}">
          @error('name')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary" name="button">Salva</button>

      </form>
    </div>

  </div>
</div>
@endsection
