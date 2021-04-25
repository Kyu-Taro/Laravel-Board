@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('board.store') }}" class="form_text">
    @csrf
    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
    @if($errors->has('content') > 0)
        @foreach ($errors->get('content') as $error)
            <div class="error_class">
                <span class="error_msg">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    <input class="form-control" type="text" placeholder="つぶやいてね" aria-label="readonly input example" name="content">
    <button type="submit" class="btn btn-primary text_btn">つぶやく</button>
</form>

@foreach ($data as $value)
<div class="card">
    <h5 class="card-header">
        <a href="{{ route('user.show', ['id' => $value->user->id]) }}">{{ $value->user->name }}</a>
        @if(Auth::id() === $value->user_id)
        <span class="config">...</span>
        <div class="card-div on_off">
            <ul class="config-card">
                <li><a href="{{ route('board.show', ['id' => $value->id]) }}">編集</a></li>
                <li><a href="{{ route('board.delete', ['id' => $value->id]) }}">削除</a></li>
            </ul>
        </div>
        @endif
    </h5>
    <div class="card-body">
      <p class="card-text">{{ $value->content }}</p>
    </div>
</div>
@endforeach
@endsection
