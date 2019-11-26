@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

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
        <div class="card-header">Posts</div>
        <?php
            $nb_posts = count($posts);

            for($i = $nb_posts-1; $i >=0; $i--) {
                echo '<div class=post>';
                echo '<div class="conteneur_v">';
                echo '<div class="post_content">';
                echo '<h3>' . $posts[$i]->title . '</h3>';
                echo '<p>' . $posts[$i]->text . '</p>';
                echo $posts[$i]->embed;
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

         ?>
    </div>


</div>
@endsection
