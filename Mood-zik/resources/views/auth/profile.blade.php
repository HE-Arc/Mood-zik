@extends('layouts.app')

@section('head')

  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
  <link href="{{ asset('css/guest.css') }}" rel="stylesheet">


@endsection

@section('content')
@if(Auth::check())
<section id="profil">

        <h1>Mon profil</h1>


        <p class="title"> Nom d'utilisateur: </p>
        <p>{{ Auth::user()->name }}</p>


        <p class="title"> Adresse mail: </p>
        <p> {{ Auth::user()->email }}</p>


      

        <button type="submit">
        <a href="{{ __('Logout') }}"
        onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Déconnexion</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </button>

</section>

@else
<section id="guest">
  <p class="information">Veuillez vous <a href="{{route('register')}}">inscrire</a> ou vous <a href="{{route('login')}}">connecter</a> pour accéder à cette page !</p>
</section>
@endif

</div>
@endsection
