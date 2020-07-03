@extends('layouts.app')

@section('content')
  <div id="home">
    <chart-usage></chart-usage>
    <usage :user="{{ Auth::user() }}"></usage>
  </div>
@endsection
