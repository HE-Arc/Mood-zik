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
          <?php
              for($playlist as $post)
              {
                echo '<div class=post>';
                echo '<div class="container_vertical">';
                echo '<h2>' . $post->title . '</h2>';
                echo '<p class="author">' . 'Posté par ' . $username[$i]->name . '</p>';
                echo '<div class="container_horizental">';
                echo '<p class="description">' . $posts[$i]->text . '</p>';
                echo $embed[$i]->embed;
              }
           ?>

          <br />
          <a href="{{ route('playlists')  }}">Créer une nouvelle playlist</a>
        </div>
    </div>


</div>
@endsection
