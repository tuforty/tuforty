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
  <div class="text-editor__container">
    <div class="text-editor__icon close"></div>
    <div class="text-editor__icon minimize"></div>
    <div class="text-editor__icon resize"></div>
    <pre class="text-editor">
      <code class="language-bash">


curl --header "Content-Type: application/json" \
    --request POST \
    --data '{"value":"10000","language":"fr", decimal_unit: "cents"}' \
    https://api.tuforty.com/v1/translator/money
      </code>
    </pre>
  </div>
</main>
@endsection
