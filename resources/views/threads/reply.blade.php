<div class="card mb-2">
  <div class="card-header">
    <div class="level">
      <span class="flex-fill">
        {{ $reply->created_at->diffForHumans() }} by <a href="{{ $reply->owner->path() }}">{{ $reply->owner->name }}</a>
      </span>

      <div>
        <form method="POST" action="/replies/{{ $reply->id }}/favourites">
          @csrf()
          <button type="submit" class="btn btn-default"{{ $reply->isFavourited() ? ' disabled' : '' }}>
            {{ $reply->favourites_count }} {{ Str::plural('Favourite', $reply->favourites_count ) }}
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="card-body">
    <p>{{ $reply->body }}</p>
  </div>
</div>
