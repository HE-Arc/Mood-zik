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
          <p class="author">Posté par {{$username[$i]->name}}  </p>
          <div class="container_horizental">
            <p class="description"> {{$posts[$i]->text}} </p>
            <?php echo $embed[$i]->embed; ?>
          </div>
        </div>
      </div>
    @endfor

</section>
@endsection
