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
              $nb_posts = count($playlist);
              print_r($nb_posts);
              print_r($playlist);
              /*
              for($i=0; $i < $nb_posts; $i++)
              {
                echo '<div class=post>';
                echo '<div class="container_vertical">';
                echo '<h2>' . $playlist[$i]->title . '</h2>';
                echo '<p class="author">' . 'Posté par ' . $usernames[$i]->name . '</p>';
                echo '<div class="container_horizental">';
                echo '<p class="description">' . $playlist[$i]->text . '</p>';
                echo $embeds[$i]->embed;
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              */
           ?>

          <br />
          <a href="{{ route('playlists')  }}">Créer une nouvelle playlist</a>
        </div>
    </div>


</div>
@endsection
