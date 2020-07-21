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
curl -L -X GET 
"https://tuforty.com/api/v1/translator/money?value=329.99&amplanguage=fr&ampcurrency=GBP" \
-H 'Authorization: Bearer { TUFORTY_API_KEY }' \
-H 'Content-Type: application/json' \

# Response
{
  "language": "fr",
  "currency": "GBP",
  "whole_unit": "pound",
  "decimal_unit": "penny",
  "whole_translation": "trois cent vingt-neuf",
  "decimal_translation": "quatre-vingt-dix-neuf"
  "translation": "trois cent vingt-neuf livres, quatre-vingt-dix-neuf penny seulement"
}</code>
    </pre>
    <div class="text-right text-underline">
      <br>
      <a href="https://docs.tuforty.com/money-translation/money-translate-to-sentence" target="_">
        See more examples &rarr;
      </a>
    </div>
  </div>
</main>
@endsection