@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(Auth::check())
  <section id="posts">
  <h1>Mes posts</h1>
  <?php $nb_posts = count($my_posts); ?>
  @for ($i = $nb_posts-1; $i >=0; $i--)
    <div class=post>
    <div class="container_vertical">
    <h2>{{$my_posts[$i]->title}}</h2>
    <p class="author">Posté le {{$my_posts[$i]->created_at}}  </p>
    <div class="container_horizental">
    <p class="description"> {{$my_posts[$i]->text}} </p>
    <?php echo $embeds[$i]?>
    <form action="{{route('add_to_playlist')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="post_id" value="{{$my_posts[$i]->id}}" />
    <input type="hidden" name="post_music_id" value="{{$my_posts[$i]->music_id}}" />
    <input type="submit" value="+" />
    </form>
    </div>
    </div>
    </div>
  @endfor
@else
  <h2>Veuillez vous concentrer un minimum et vous connecter pour bénéficier de toutes les fonctionnalités</h1>
@endif
</section>
@endsection
