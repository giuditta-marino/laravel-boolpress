@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Nuovo post</h3>
    </div>
  </div>
  <!-- @if ($errors->any())
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
  @endif -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form class="" action="{{route('admin.categories.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="name">Nome</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
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
