@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-5">
          <div class="card-header">
            <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
          </div>
          <div class="card-body">
            <p>{{ $thread->body }}</p>
          </div>
        </div>

        @foreach($replies as $reply)
          @include('threads.reply')
        @endforeach

        {{ $replies->links() }}

        @if(auth()->check())
          <form action="{{ $thread->path() . '/replies' }}" method="POST">
            @csrf()
            <div class="form-group">
              <textarea name="body" id="body" class="form-control" placeholder="Reply to thread" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Reply</button>
          </form>
        @else
          <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion.</p>
        @endif
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p>This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#">{{ $thread->creator->name }}</a> and
              currently has {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
