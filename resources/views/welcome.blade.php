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
    <button class="button">
      Start here
    </button>
  </div>
  <lottie-player
  src="https://assets10.lottiefiles.com/packages/lf20_b1cGf4.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay >
  </lottie-player>
</main>
@endsection
