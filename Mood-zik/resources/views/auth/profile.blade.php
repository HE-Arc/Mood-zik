@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h1>{{ Auth::user()->name }}</h1>
    </div>

</div>
@endsection
