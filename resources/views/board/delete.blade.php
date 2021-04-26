@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('board.destroy', ['board' => $data->id]) }}" class="form_text">
    @csrf
    <input type="hidden" value="{{ $data->id }}" name="id">
    <input class="form-control" type="text" aria-label="readonly input example" name="content" value="{{ $data->content }}" readonly>
    <button type="submit" class="btn btn-primary text_btn">削除</button>
</form>
@endsection
