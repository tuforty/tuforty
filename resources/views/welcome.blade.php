@extends('layouts.landing')
@section('content')
<main class="landing__hero">
  <div>
    <h1>
      Concise money <br> translation to words
    </h1>
    <p>
      Easily support translation for money values in over 50 indigienious
      languages, and make users feel home.
    </p>
    <button class="button button--dark button--round">
      Get started
    </button>
  </div>
  <img src="{{ asset('img/code.png') }}" alt="Code Sample">
</main>
@endsection
