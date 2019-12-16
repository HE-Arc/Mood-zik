@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
@endsection


@section('content')
@if(Auth::check())
<section id="posts">
  <h1>Ma playlist</h1>
  @if($nb_posts == 0 )
  <div class=post>
  <p>Vous n'avez actuellement aucun post dans votre playlist !</p>
</div>
  @endif
  @for ($i = $nb_posts-1; $i >= 0; $i--)
    <div class=post>
    <div class="container_vertical">
    <h2>{{$playlist[$i]->title}}</h2>
    <p class="author">Posté par
    <a href="{{route('user', ['id' => $playlist[$i]->user_id])}}"> {{$usernames[$i]->username}} </a>
    </p>
    <h3> Description de l'auteur : </h3>
    <div class="container_horizental">
    <p class="description"> {{$playlist[$i]->text}} </p>
    <?php echo $embeds[$i]->embed; ?>
    </div>
    </div>
    </div>
  @endfor
</section>
@else
<section id="guest">
  <p class="information">Veuillez vous <a href="{{route('register')}}">inscrire</a> ou vous <a href="{{route('login')}}">connecter</a> pour accéder à cette page !</p>
</section>
@endif



@endsection
