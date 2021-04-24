@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('board.store') }}" class="form_text">
    @csrf
    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
    <input class="form-control" type="text" placeholder="つぶやいてね" aria-label="readonly input example" name="content">
    <button type="submit" class="btn btn-primary text_btn">つぶやく</button>
</form>

@foreach ($data as $value)
<div class="card">
    <h5 class="card-header">
        {{ $value->user->name }}
        <span class="config">...</span>
        <div class="card-div on_off">
            <ul class="config-card">
                <li><a href="{{ route('board.show', ['id' => $value->id]) }}">編集</a></li>
                <li><a href="{{ route('board.index') }}">削除</a></li>
            </ul>
        </div>
    </h5>
    <div class="card-body">
      <p class="card-text">{{ $value->content }}</p>
    </div>
</div>
@endforeach
@endsection
