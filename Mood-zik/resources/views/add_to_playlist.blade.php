@extends('layouts.app')

@section('head')

@endsection

@section('content')
<div class="container">
    <div class="card">
        <h1>Ajouter à une playlist</h1>
    </div>
    <div class="card">
        <h3>Choisissez la playlist à laquelle vous voulez ajouter ce post</h3>
    </div>
    <div class="playlists">
      <h2>Vos playlists</h2>
      @foreach($playlists as $playlist)
        <div>
          <label>{{ $playlist }}</label>
        </div>
      @endforeach
      <br />
    </div>
</div>
@endsection
