@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <section class="not-found">
      <h1>404</h1>
      <a href="{{ get_home_url() }}" class="btn">HOME</a>
    </section>
  @endif
@endsection
