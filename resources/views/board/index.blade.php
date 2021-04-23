@extends('layouts.app')

@section('content')
<form method="POST" action="" class="form_text">
    <input class="form-control" type="text" placeholder="つぶやいてね" aria-label="readonly input example" name="text">
    <button type="submit" class="btn btn-primary text_btn">つぶやく</button>
</form>
<div class="card">
    <h5 class="card-header">[名前が入る]</h5>
    <div class="card-body">
      <p class="card-text">つぶやきが入る</p>
    </div>
</div>
@endsection
