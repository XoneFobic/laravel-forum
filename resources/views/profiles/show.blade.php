@extends('layouts.app')

@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{ $profileUser->name }}</h1>
      <p class="lead">
        <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
      </p>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @foreach($threads as $thread)
          <div class="card mb-5">
            <div class="card-header">
              <div class="level">
                <span class="flex-fill"><a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}</span>
                <span>{{ $thread->created_at->diffForHumans() }}</span>
              </div>
            </div>
            <div class="card-body">
              <p>{{ $thread->body }}</p>
            </div>
          </div>
        @endforeach
        {{ $threads->links() }}
      </div>
    </div>
  </div>
@endsection
