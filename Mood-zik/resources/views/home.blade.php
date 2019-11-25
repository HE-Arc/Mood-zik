@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="home">
    <div class="card-header">Posts</div>
    <?php
        $max = $nb_posts;
        for($i = $nb_posts-1; $i >=0; $i--) {
            echo '<div class=post>';
            echo '<div class="conteneur_v">';
            echo '<h3>' . $username[$i]->name . '</h3>';
            echo '<div class="post_content">';
            echo '<h3>' . $posts[$i]->title . '</h3>';
            echo '<p>' . $posts[$i]->text . '</p>';
            echo $posts[$i]->embed;
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
