@extends('layouts.app')

@section('content')
<div class="feed api-keys__page">
  <div class="card api-key__card">
    <p class="api-key">29128912817827</p>
    <ion-icon name="copy" size="large"></ion-icon>
  </div>
  <div class="api-keys__actions">
    <button class="button button--round button--dark fullWidth">Hide</button>
    <button class="button button--round button--dark fullWidth">Regenerate</button>
  </div>
</div>
@endsection
