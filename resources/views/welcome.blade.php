@extends('layouts.landing')
@section('content')
<main class="landing__hero">
  <div>
    <h1>
      Concise money <br> translation to words
    </h1>
    <p>
      Easily support translation for money values in 60+ languages, and make users feel home.
    </p>
    <button class="button button--dark button--round">
      <a class="border" href="{{ route('register') }}">
        Get started
      </a>
    </button>
  </div>
  <div class="text-editor__container">
    <div class="text-editor__icon close"></div>
    <div class="text-editor__icon minimize"></div>
    <div class="text-editor__icon resize"></div>
    <pre class="text-editor">
      <code class="language-bash">
curl -L -X GET 'https://tuforty.com/api/v1/translator/money' \
-H 'Content-Type: application/json' \
-H 'Authorization: Bearer { TURFORTY_API_KEY }' \
-d '{"value": 345.345, "language": "fr", "whole_unit": "dollars", "decimal_unit": "cent"}'

# Response
{
  "language": "fr",
  "decimal_unit": "cent", 
  "whole_unit": "dollars", 
  "decimal_translation": "trente cinq"
  "whole_translation": "Trois cent quarante cinq",
  "translation": "trois cent quarante-cinq dollars, trente-cinq cents seulement"
}</code>
    </pre>
  </div>
</main>
@endsection