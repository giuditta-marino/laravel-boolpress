@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <form class="" action="{{ route('contact') }}" method="post">
      @csrf
      @method('POST')

      <div class="form-group">
        <label for="name">Nome e cognome</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Indirizzo e-mail</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="subject">Oggetto</label>
        <input class="form-control @error('subject') is-invalid @enderror" id="subject" type="text" name="subject" value="{{ old('email') }}">
        @error('subject')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Messaggio</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
        @error('content')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button class="btn btn-primary" type="submit" name="button">Invia</button>

    </form>
  </div>
</div>
@endsection
