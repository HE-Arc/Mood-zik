@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')

<form action="{{ route('post') }}" method="post">
    {{ csrf_field() }}

    <div class=post>
        <div class="conteneur_v">
            <div class="post_content">
                <div><label for="title"><h3>Nouveau post</h3></label></div>
                <div><label for="title">Entrez votre titre</label>
                <div></div> <textarea class="input" id="title" name="title" cols="50" rows="1">Titre</textarea> </div>
                <div> <label for="title">Choisissez votre morceau</label>
                <div></div> <textarea class="input" id="search" name="search" placeholder="Search Music" cols="50" rows="1"></textarea></div>
                <div class="table-responsive">
                  <h3 align="center">Musiques : <span id="total_records"></span></h3>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Titre</th>
                        <th>Artiste</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>

                </div>
                <div> <label for="title">Entrez votre texte (max 200 caractères)</label>
                <div></div> <textarea class="input" id="text" name="text" cols="50" rows="5" maxlength="200">Texte</textarea> </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div><label for="title"><p>Commentaire: Commencer par implémenter la création d'un post en collant le code spotify d'un iframe</p></label></div>
</form>
@endsection

@section('script')
<script>
  $('document').ready(function(){

      fetch_music_data();

      function fetch_music_data(query = '')
      {
          $.ajax({
              url:"{{ route('live_search.action') }}",
              method: 'GET',
              data: {query:query},
              dataType: 'json',
              success: function(data)
              {
                  $('tbody').html(data.table_data);
                  $('#total_records').text(data.total_data);
              }
          })
      }

      $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_music_data(query);
      });
  });
</script>

@endsection
