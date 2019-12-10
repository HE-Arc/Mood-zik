<div class="container_header_left">
<h1 class="title" onclick="window.location='{{ url('/') }}'">Moodzik</h1>

<nav>
      <li><a href="{{ route('post') }}">Ajouter un post</a></li>
      <li><a href="{{ route('post') }}">Tendences</a></li>
      <li><a href="{{ route('post') }}">Playlist</a></li>
</nav>

</div>



<div class="container_header_right">
<?php
	use Illuminate\Support\Facades\Auth;

	if(Auth::check())
	{
	//	echo "<li> <a href=\"\">Mon profil </a></li>";
		echo '<li><a href="' . route('profile') . '">Mon profil</a></li>';
		echo "<li> <a href=\"\">Se déconnecter</a></li>";
	}
	else
	{
		echo '<li><a href="' . route('login') . '">Connexion</a></li>';
		echo '<li><a href="' . route('register') . '">Inscription</a></li>';
	}

?>
</div>

</ul>
</nav>
