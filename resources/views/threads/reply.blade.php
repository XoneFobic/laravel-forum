<div class="card mb-2">
  <div class="card-header">
    {{ $reply->created_at->diffForHumans() }} by
    <a href="{{ $reply->owner->path() }}">{{ $reply->owner->name }}</a>
  </div>
  <div class="card-body">
    <p>{{ $reply->body }}</p>
  </div>
</div>
