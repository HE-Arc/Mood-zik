@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="home">
    <div class="card-header">Nouveau post</div>
    
<form action="{{ route('post') }}" method="post">
    {{ csrf_field() }}

    <div class=post>
        <div class="conteneur_v">
            <div class="post_content">
                <div><label for="title">Entrez votre titre :</label>
                <div></div> <textarea  type="text" id="title" name="title" cols="50" rows="1" maxlength="50" placeholder="Titre" style="overflow:auto;resize:none"></textarea> </div>
                <div> <label for="title">Choisissez votre morceau :</label>
                <div></div> <textarea  type="text" id="embed" name="embed" cols="50" rows="1" maxlength="50" placeholder="Musique" style="overflow:auto;resize:none"></textarea> </div>
                <div> <label for="title">Entrez votre texte (max 200 caractères) :</label>
                <div></div> <textarea  type="text" id="text" name="text" cols="50" rows="5" maxlength="200" placeholder="Texte" style="overflow:auto;resize:none"></textarea> </div>

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
    <label for="title"><p>Commentaire: Commencer par implémenter la création d'un post en collant le code spotify d'un iframe</p></label>
</form>
@endsection
