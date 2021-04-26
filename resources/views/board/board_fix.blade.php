@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('board.update', ['board' => $data->id]) }}" class="form_text">
    @csrf
    <input type="hidden" value="{{ $data->id }}" name="id">
    @if($errors->has('content'))
        <div class="error_class">
            <span class="error_msg">{{ $errors->first('content') }}</span>
        </div>
    @endif
    <input class="form-control" type="text" aria-label="readonly input example" name="content" value="{{ $data->content }}">
    <button type="submit" class="btn btn-primary text_btn">変更</button>
</form>
@endsection
