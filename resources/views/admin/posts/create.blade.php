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
      <form class="" action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="category">Category</label>
            <select class="form-control @error('category') is-invalid @enderror" id="category"          name="category_id">
              <option value="">Select</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>                             @endforeach
            </select>
            @error('category')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title') }}">
          @error('title')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
          @error('content')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          Inserisci un'immagine di copertina:
          <input type="file" class="form-control-file @error('content') is-invalid @enderror" id="cover" name="cover">
          @error('cover')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary" name="button">Salva</button>

      </form>
    </div>

  </div>
</div>
@endsection
