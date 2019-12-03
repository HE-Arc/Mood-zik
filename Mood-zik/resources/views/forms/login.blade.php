@extends('layouts.app')

@section('content')
    <section>
      <h1>Connexion</h1>
      <form method="post" action="">
          <section>
              <label>Pseudo :</label>
              <input type="text" name="pseudo" />
          </section>
          <section>
              <label>Mot de passe :</label>
              <input type="password" name="password" />
              <a href="">Mot de passe oublié?</a>
          </section>
          <input type="submit" value="Connexion" />
          <p><a href="{{route('')}}">Créer un compte</a></p>
      </form>
    </section>

@endsection
