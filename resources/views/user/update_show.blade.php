@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <form action="{{ route('user.update') }}" method="post" class="update_form">
        @csrf
        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            年齢:
            <input type="text" value="{{ $user->profile->age }}" name="age">
            </li>
            <li class="list-group-item">
                性別:
                <input type="radio" value="1" name="gender" @if($user->profile->gender === 1) checked @endif>男性
                <input type="radio" value="2" name="gender" @if($user->profile->gender === 2) checked @endif>女性
            </li>
            <li class="list-group-item">
                自己紹介:
                <input type="text" value="{{ $user->profile->text }}" name="text">
            </li>
        </ul>
        <input type="submit" class="btn btn-primary" value="変更">
    </form>
  </div>
@endsection
