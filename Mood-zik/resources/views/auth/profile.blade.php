@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h1>{{ Auth::user()->name }}</h1>
    </div>
    <div class="card">
        <p>
          {{ Auth::user()->email }}<br />
          <a href="{{ __('Logout') }}"
          onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Déconexion</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </p>
        <div class="playlists">
          <h2>Votre playlists</h2>
          

          <br />
          <a href="{{ route('playlists')  }}">Créer une nouvelle playlist</a>
        </div>
    </div>


</div>
@endsection
