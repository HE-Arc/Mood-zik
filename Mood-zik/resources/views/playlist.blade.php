@extends('layouts.app')

@section('head')

@endsection

@if(Auth::check())
@section('content')
<div class="container">
  <h1>Ma playlist</h1>
</div>
@else

  <h2>Veuillez vous concentrer un minimum et vous connecter pour bénificer de toutes les fonctionnalités</h1>

@endif



@endsection
