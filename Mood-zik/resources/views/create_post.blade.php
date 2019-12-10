@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/post.css') }}" rel="stylesheet">
  <script src="{{ asset('js/post.js') }}" ></script>

@endsection

@section('content')
<section id="home">
    <div class="card-header">Nouveau post</div>

<form action="{{ route('post') }}" method="post" autocomplete="off">
    {{ csrf_field() }}

    <div class=post>
        <div class="conteneur_v">
            <div class="post_content">
                <div class="textarea" style="300px;"> <label for="title">Entrez votre titre :</label></div>
                <textarea id="title" type="text" name="title" cols="50" rows="1" placeholder="Titre" style="overflow:auto;resize:none"></textarea>

                <div class="textarea" style="300px;"> <label for="title">Choisissez votre musique :</label></div>
                <textarea id="music" type="text" name="music" cols="50" rows="1" placeholder="Musique" style="overflow:auto;resize:none"></textarea>

                <div class="textarea" style="300px;"> <label for="title">Entrez votre texte :</label></div>
                <textarea id="text" type="text" name="text" cols="50" rows="5" placeholder="Texte" style="overflow:auto;resize:none"></textarea>
                </div></div>
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
            <label for="title"><p>Commentaire: Commencer par implémenter la création d'un post en collant le code spotify d'un iframe</p></label>
        </div>
    </div>
</form>


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
