@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card mb-5">
          <div class="card-header">
            <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
          </div>
          <div class="card-body">
            <p>{{ $thread->body }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        @foreach($thread->replies as $reply)
          @include('threads.reply')
        @endforeach
      </div>
    </div>

    @if(auth()->check())
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <form action="{{ $thread->path() . '/replies' }}" method="POST">
            @csrf()
            <div class="form-group">
              <textarea name="body" id="body" class="form-control" placeholder="Reply to thread" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Reply</button>
          </form>
        </div>
      </div>
    @else
      <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion.</p>
    @endif
  </div>
@endsection
