@extends('layouts.app')

@section('head')


@endsection

@section('content')

<form action="" method="post" autocomplete="off">
    {{ csrf_field()  }}

    <div>
        <div class="conteneur_v">
            <label><h3>Nouvelle playlist</h3></label>
              <label for="name">Nom de la playlist</label>
              <input type="text" id="name" name="name"/>
              <input type="submit" id="submit" value="Valider" />
        </div>
    </div>
</form>

@endsection
