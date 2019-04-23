@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">Create a new thread</div>
          <div class="card-body">
            <form action="/threads" method="POST">
              @csrf

              <div class="form-group">
                <label for="channel_id">Choose a Channel: <span class="text-danger">*</span></label>
                <select class="form-control" id="channel_id" name="channel_id" required>
                  <option value="">Choose a Channel...</option>
                  @foreach(\App\Channel::all() as $channel)
                    <option
                      value="{{ $channel->id }}"{{ intval(old('channel_id')) === $channel->id ? ' selected' : '' }}>{{ $channel->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span></label>
                <input class="form-control" id="title" name="title" placeholder="Title" required type="text" value="{{ old('title') }}">
              </div>

              <div class="form-group">
                <label for="body">Body: <span class="text-danger">*</span></label>
                <textarea class="form-control" id="body" name="body" placeholder="Body" required rows="8">{{ old('body ') }}</textarea>
              </div>

              <div class="form-group">
                <button class="btn btn-primary" type="submit">Publish</button>
              </div>

              @if(count($errors))
                <ul class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
