@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div><a href="{{ route('index') }}">Pagina di benvenuto</a></div>
        <div><a href="{{ route('admin.index') }}">Dashboard</a></div>
        <div><a href="{{ route('admin.posts.index') }}">Posts</a></div>
        <div><a href="#">Users</a></div>
        <div><a href="{{ route('admin.categories.index') }}">Categories</a></div>
        <div><a href="#">Tags</a></div>      
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
