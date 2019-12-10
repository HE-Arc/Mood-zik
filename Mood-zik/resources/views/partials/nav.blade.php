<nav>
      <a href="{{ url('/') }}">Accueil</a>
      <a href="{{ route('post') }}">Ajouter un post</a>
        @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
          @if (Route::has('register'))
              <a href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
        @else
            <a href="{{ route('profile')}}">{{ Auth::user()->name }}</a>
        @endguest
</nav>
