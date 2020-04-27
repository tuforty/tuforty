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
    <button class="button button--dark">
      Get started
    </button>
  </div>
  <lottie-player
  src="https://assets5.lottiefiles.com/packages/lf20_CueyLB.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop autoplay >
  </lottie-player>
</main>
@endsection
