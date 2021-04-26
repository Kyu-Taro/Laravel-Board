@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{ $data['user']->name }}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
          年齢:
            @if($data['user']->profile->age === null)
            未設定
            @else
            {{ $data['user']->profile->age }}
            @endif
        </li>
      <li class="list-group-item">
          性別:
          @if($data['user']->profile->gender === null)
          未設定
          @elseif ($data['user']->profile->gender === 1)
          男性
          @elseif ($data['user']->profile->gender === 2)
          女性
          @endif
        </li>
        <li class="list-group-item">
            自己紹介<br/>
            @if($data['user']->profile->text === null)
            未設定
            @else
            {{ $data['user']->profile->text }}
            @endif
        </li>
    </ul>
    @if(Auth::id() === $data['user']->id)
    <a class="btn btn-primary" href="{{ route('user.profile_update_show') }}">プロフィール変更</a>
    @endif
  </div>

@foreach ($data['boards'] as $value)
<div class="card">
    <h5 class="card-header">
        {{ $value->user->name }}
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
