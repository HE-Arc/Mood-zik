@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/post.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
  <script src="{{ asset('js/post.js') }}" ></script>

@endsection

@section('content')

@if(Auth::check())
<section class="form_zone">
  <h1> Ajouter un nouveau post </h1>



<form action="{{ route('post') }}" method="post" autocomplete="off">
      {{ csrf_field() }}
      <section class="input_zone">
              <label class="input">Titre du post</label>
              <input type="text" name="title" required />
      </section>

      <section class="input_zone">


        <div class="autocomplete" style="300px;">
        <label for="title">Choisissez votre morceau</label>
        <input id="music" type="text" name="music" placeholder="Music" />
      </div>
          </section>

      <section class="input_zone">
              <label>Votre description:</label>
               <textarea  name="text"  rows="1" cols="33" maxlength="200"></textarea>
      </section>


      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>


</section>
@else

  <h2>Veuillez vous concentrer un minimum et vous connecter pour bénificer de toutes les fonctionnalités</h1>

@endif




@endsection

@section('script')
<script>
    var tabMusics = [];
    <?php foreach ($musics_array as $music) : ?>
    tabMusics.push("<?php echo $music->title?>");
    <?php endforeach; ?>
    console.log(tabMusics);
    autocomplete(document.getElementById("music"), tabMusics);
</script>

@endsection
