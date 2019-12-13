@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/post.css') }}" rel="stylesheet">
  <script src="{{ asset('js/post.js') }}" ></script>

@endsection

@section('content')
<section id="newPost">
  <h1> Ajouter un nouveau post </h1>
  <form action="{{ route('post') }}" method="post" autocomplete="off">
    {{ csrf_field() }}


    <div class=post>
        <div class="conteneur_v">
            <div class="post_content">
                <div><label for="title"><h3>Nouveau post</h3></label></div>
                <div><label for="title">Entrez votre titre</label>
                <div></div> <textarea class="input" id="title" name="title" cols="50" rows="1">Titre</textarea> </div>
                <div class="autocomplete" style="300px;"> <label for="title">Choisissez votre morceau</label>


                <input id="music" type="text" name="music" placeholder="Music" />

                </div>

                <div> <label for="title">Entrez votre texte (max 200 caractères)</label>
                <div></div> <textarea class="input" id="text" name="text" cols="50" rows="5" maxlength="200">Texte</textarea> </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div><label for="title"><p>Commentaire: Commencer par implémenter la création d'un post en collant le code spotify d'un iframe</p></label></div>
</form>
</section>


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
