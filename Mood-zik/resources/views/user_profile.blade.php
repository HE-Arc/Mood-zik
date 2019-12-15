@extends('layouts.app')

@section('head')

@endsection

@section('content')
<div class="container">
  <h1><?php echo $username ?></h1>
  <?php
  //print_r($embeds);

  $nb_posts = count($posts);
  for($i = $nb_posts-1; $i >=0; $i--) {
      echo '<div class=post>';
      echo '<div class="container_vertical">';
      echo '<h2>' . $posts[$i]->title . '</h2>';
      echo '<p class="author">' . 'Posté par ' . $username . '</p>';
      echo '<div class="container_horizental">';
      echo '<p class="description">' . $posts[$i]->text . '</p>';
      echo $embeds[$i];
      echo '<form action="' . route('add_to_playlist') . '" method="post">';
      echo csrf_field();
      echo '<input type="hidden" name="post_id" value="' . $posts[$i]->id . '" />';
      echo '<input type="hidden" name="post_music_id" value="' . $posts[$i]->music_id . '" />';
      echo '<input type="submit" value="Add" />';
      echo '</form>';
      //echo '<br /><a href="{{ route(\'add_to_playlist\', [\'id\' => '. $posts[$i]->id . ']) }}">Ajouter ce post à ma playlist</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

  }

  ?>

</div>


@endsection
