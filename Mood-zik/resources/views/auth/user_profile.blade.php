@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/profil.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/posts.css') }}" rel="stylesheet">

@endsection

@section('content')
<section id="posts">
<div class="container">
  <h1>Les posts de {{$username}}</h1>
  <?php $nb_posts = count($posts) ?>
  @for ($i = $nb_posts-1; $i >=0; $i--)
  <div class=post>
  <div class="container_vertical">
  <h2>{{$posts[$i]->title}}</h2>
  <p class="author">Posté le {{$posts[$i]->created_at}}  </p>
  <div class="container_horizental">
  <p class="description"> {{$posts[$i]->text}} </p>
  <div class="container_horizental">
  <?php echo $embeds[$i]?>
  <form action="{{route('add_to_playlist')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="post_id" value="{{$posts[$i]->id}}" />
  <input type="hidden" name="post_music_id" value="{{$posts[$i]->music_id}}" />
  <input type="submit" title="Ajouter à la playlist" value="+" />
  </form>
  </div>
  </div>
  </div>
  </div>
  @endfor

</div>
</section>

@endsection
