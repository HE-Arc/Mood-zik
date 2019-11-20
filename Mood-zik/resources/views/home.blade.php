@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>
                <?php
                    $max = $nb_posts;
                    for($i = $nb_posts-1; $i >=0; $i--) {
                        echo '<div>';
                        echo '<h3>' . $username[$i]->name . '</h4>';
                        echo '<div>';
                        echo '<h3>' . $posts[$i]->title . '</h3>';
                        echo '<p>' . $posts[$i]->text . '</p>';
                        echo $posts[$i]->embed;
                        echo '</div>';
                        echo '</div>';
                    }

                 ?>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
