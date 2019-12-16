@extends('layouts.app')


@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="home">
    <h1> Derniers Posts </h1>
    <?php
        for($i = $nb_posts-1; $i >=0; $i--) {
            echo '<div class=post>';
            echo '<div class="container_vertical">';
            echo '<h2>' . $posts[$i]->title . '</h2>';
            echo '<p class="author">';
            echo 'Posté par <a href="'  . route('user', ['id' => $posts[$i]->user_id]) . '">' . $username[$i]->name . '</a>';
            echo '</p>';
            echo '<div class="container_horizental">';
            echo '<p class="description">' . $posts[$i]->text . '</p>';
            echo $embed[$i]->embed;
            echo '<form action="' . route('add_to_playlist') . '" method="post">';
            echo csrf_field();
            echo '<input type="hidden" name="post_id" value="' . $posts[$i]->id . '" />';
            echo '<input type="hidden" name="post_music_id" value="' . $posts[$i]->music_id . '" />';
            echo '<input type="hidden" name="post_username" value="' . $username[$i]->name . '" />';
            echo '<input type="submit" value="Add" />';
            echo '</form>';
            //echo '<br /><a href="{{ route(\'add_to_playlist\', [\'id\' => '. $posts[$i]->id . ']) }}">Ajouter ce post à ma playlist</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }

     ?>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
</section>
@endsection
