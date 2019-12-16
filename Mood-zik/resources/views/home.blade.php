@extends('layouts.app')


@section('head')
  <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="posts">
    <h1> Derniers Posts </h1>

    @for ($i = $nb_posts-1; $i >= 0; $i--)
      <div class=post>
        <div class="container_vertical">
          <h2>{{$posts[$i]->title}}</h2>
          <p class="author">Posté par
            <a href="{{route('user', ['id' => $posts[$i]->user_id])}}"> {{$username[$i]->name}} </a>
          </p>
          <div class="container_horizental">
            <p class="description"> {{$posts[$i]->text}} </p>
            <?php echo $embed[$i]->embed; ?>
            <form action="{{route('add_to_playlist')}}" method="post">
            <input type="hidden" name="post_id" value="{{$posts[$i]->id}}" />
            {{csrf_field()}}
            <input type="hidden" name="post_music_id" value="{{$posts[$i]->music_id}}" />
            <input type="hidden" name="post_username" value="{{$username[$i]->name}}" />
            <input type="submit" value="+" />
            </form>
          </div>
        </div>
      </div>
    @endfor

</section>
@endsection
