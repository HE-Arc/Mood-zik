<h1 class="title" onclick="window.location='{{ url('/') }}'">Moodzik</h1>
<?php
	use Illuminate\Support\Facades\Auth;

	if(Auth::check())
	{
		$user = Auth::user();
		echo '<p class="username">' . htmlentities($user->name) . '</p>';
	}
	else
	{
		echo '<a href="' . route('login') . '">Se connecter</a>';
	}
?>
