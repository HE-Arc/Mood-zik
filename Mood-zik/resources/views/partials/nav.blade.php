<nav>
  <ul>
    <li>
      <a href="{{ url('/') }}">{{ config('app.name', 'Mood\'Zik') }}</a>
    </li>
    <li>
      @guest
          <h1>invité</h1>
      @else
          <a href="{{ route('post') }}">Nouveau Poste</a>
      @endguest
    </li>
    <li>
      <ul>
        @guest
          <li>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li>
              <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li>
            <a href="{{ route('profile')}}">{{ Auth::user()->name }}</a>
          </li>
        @endguest
      </ul>
    </li>
  </ul>
</nav>
