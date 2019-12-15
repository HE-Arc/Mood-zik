@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@if(Auth::check())
@section('content')
<section id="home">
  <h1>Ma playlist</h1>
  <?php
  for($i=$nb_posts-1; $i >=0; $i--)
  {
    echo '<div class=post>';
    echo '<div class="container_vertical">';
    echo '<h2>' . $playlist[$i]->title . '</h2>';
    echo '<p class="author">' . 'Posté par ' . 'XXX' . ',le ' . $playlist[$i]->created_at .'</p>';
    echo '<h3>' . 'Description de l\'auteur: ' . '</h3>';
    echo '<div class="container_horizental">';
    echo '<p class="description">' . $playlist[$i]->text . '</p>';
    echo $embeds[$i]->embed;

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  //print_r($embeds);

  //$nb_posts = count($playlist);
  //print_r($playlist[0]->title);
  //print_r($playlist[0]->user_id);
  //print_r($usernames[0]->name);
//  print_r($embeds[0]->embed);
//  print_r($embeds[1]->embed);
//  print_r($playlist[0]->username);
  //print_r($usernames[0])
  /*
  for($i = 0; $i < $nb_posts; $i++) {
      echo '<div class=post>';
      echo '<div class="container_vertical">';
      echo '<h2>' . $playlist[$i]->title . '</h2>';
      echo '<p class="author">' . 'Posté par ' . $usernames[$i] . '</p>';
      echo '<div class="container_horizental">';
      echo '<p class="description">' . $playlist[$i]->text . '</p>';
      echo $embeds[$i]->embed;
      echo '<form action="' . route('add_to_playlist') . '" method="post">';
      echo csrf_field();
      echo '<input type="hidden" name="post_id" value="' . $playlist[$i]->id . '" />';
      echo '<input type="hidden" name="post_music_id" value="' . $playlist[$i]->music_id . '" />';
      echo '<input type="submit" value="Add" />';
      echo '</form>';
      //echo '<br /><a href="{{ route(\'add_to_playlist\', [\'id\' => '. $posts[$i]->id . ']) }}">Ajouter ce post à ma playlist</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

  }
*/
  ?>
</section>
@else

  <h2>Veuillez vous concentrer un minimum et vous connecter pour bénificer de toutes les fonctionnalités</h1>

@endif



@endsection
