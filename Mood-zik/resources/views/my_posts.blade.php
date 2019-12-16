@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(Auth::check())
<section id="home">
    <h1>Mes posts</h1>

      <?php
      //print_r($embeds);

      $nb_posts = count($my_posts);
      for($i = $nb_posts-1; $i >=0; $i--) {
          echo '<div class=post>';
          echo '<div class="container_vertical">';
          echo '<h2>' . $my_posts[$i]->title . '</h2>';
          echo '<p class="author">' . 'Posté le ' . $my_posts[$i]->created_at . '</p>';
          echo '<div class="container_horizental">';
          echo '<p class="description">' . $my_posts[$i]->text . '</p>';
          echo $embeds[$i];
          echo '<form action="' . route('add_to_playlist') . '" method="post">';
          echo csrf_field();
          echo '<input type="hidden" name="post_id" value="' . $my_posts[$i]->id . '" />';
          echo '<input type="hidden" name="post_music_id" value="' . $my_posts[$i]->music_id . '" />';
          echo '<input type="submit" value="Add" />';
          echo '</form>';
          //echo '<br /><a href="{{ route(\'add_to_playlist\', [\'id\' => '. $posts[$i]->id . ']) }}">Ajouter ce post à ma playlist</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

      }

      ?>
    


</section>
@else

  <h2>Veuillez vous concentrer un minimum et vous connecter pour bénéficier de toutes les fonctionnalités</h1>

@endif

@endsection
