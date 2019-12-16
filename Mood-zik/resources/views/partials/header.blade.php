<div class="container_header_left">
<h1 class="title" onclick="window.location='{{ url('/') }}'">Moodzik</h1>

<nav>
      <li><a href="{{ route('post') }}">Ajouter un post</a></li>
      <li><a href="{{ route('posts') }}">Mes posts</a></li>
      <li><a href="{{ route('playlist') }}">Ma playlist</a></li>
</nav>

</div>



<?php

	use Illuminate\Support\Facades\Auth;
  ?>

	@if(Auth::check())

    <div class="container_header_right">
		<li><a href="{{route('profile')}}">Mon profil</a></li>

<li>
    <a href="{{ __('Logout') }}"
    onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Déconnexion</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


@else
  <div class="container_header_right">
		<li><a href="{{ route('login') }}">Connexion</a></li>
		<li><a href="{{ route('register')}}">Inscription</a></li>
</div>
@endif




</ul>
</nav>
