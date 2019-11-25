@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h1>{{ Auth::user()->name }}</h1>
    </div>
    <div class="card">
        <p>
          {{ Auth::user()->email }}<br />
          <a href="{{ __('Logout') }}">Déconexion</a>
        </p>
    </div>

</div>
@endsection
