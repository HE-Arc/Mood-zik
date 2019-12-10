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
            echo '<p class="author">' . 'Posté par ' . $username[$i]->name . '</p>';
            echo '<div class="container_horizental">';
            echo '<p class="description">' . $posts[$i]->text . '</p>';
            echo $embed[$i]->embed;
            echo '<br /><a href="{{ route(' . 'add_to_playlist' . ') }}">Ajouter ce post à ma playlist</a>';
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
