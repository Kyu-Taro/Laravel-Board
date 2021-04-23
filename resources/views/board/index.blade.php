@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('board.store') }}" class="form_text">
    @csrf
    <input class="form-control" type="text" placeholder="つぶやいてね" aria-label="readonly input example" name="text">
    <button type="submit" class="btn btn-primary text_btn">つぶやく</button>
</form>

@foreach ($data as $value)
<div class="card">
    <h5 class="card-header">
        {{ $value->user->name }}
        <span class="config">...</span>
    </h5>
    <div class="card-body">
      <p class="card-text">{{ $value->content }}</p>
    </div>
</div>
@endforeach
@endsection
