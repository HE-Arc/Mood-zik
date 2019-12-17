@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
  <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
  <script src="{{ asset('js/post.js') }}" ></script>

@endsection

@section('content')

@if(Auth::check())
<section id="form_zone">
  <h1> Ajouter un nouveau post</h1>
  <form action="{{ route('post') }}" method="post" autocomplete="off">
      {{ csrf_field() }}

  <section class="input_zone">
    <label class="input">Titre du post:</label>
    <input type="text" name="title" placeholder="Entrez le titre de votre post" required />
  </section>

  <section class="input_zone">
    <div class="autocomplete" style="300px;">
    <label for="title">Votre morceau:</label>
    <input id="music" type="text" name="music" placeholder="Choisissez la musique" />
    <label id="errorLabel"></label>
    </div>
  </section>

  <section class="input_zone">
    <label>Votre description:</label>
    <textarea  name="text"  rows="1" cols="33" maxlength="200"  placeholder="Veuillez saisir la description de votre post"></textarea>
  </section>


  <button type="submit" id="button" class="btn btn-primary">Ajouter</button>
  </form>
</section>

@else
<section id="guest">
  <p class="information">Veuillez vous <a href="{{route('register')}}">inscrire</a> ou vous <a href="{{route('login')}}">connecter</a> pour ajouter un nouveau post !</h2>
</section>
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

    const musicField = document.getElementById("music");
    const button = document.getElementById("button");

    musicField.addEventListener('focusout', function (evt){

        if(!tabMusics.includes(musicField.value)){
          //alert('false');
          button.disabled = true;
          document.getElementById('errorLabel').innerHTML = "Veuillez entrer une chanson valide svp";
        }
        else{
          //alert('true');
          button.disabled = false;
          document.getElementById('errorLabel').innerHTML = "";
        }
    });

/*
    function validateMusic()
    {
      var musicInputText, returnText;
      musicInputText = document.getElementById("music").value;
      if(!tabMusics.includes(musicInputText))
      {

      }
    }
    */
</script>

@endsection
