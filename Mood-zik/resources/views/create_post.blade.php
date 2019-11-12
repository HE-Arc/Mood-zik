<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <h1>Mood'Zikkk</h1>
    
    <form action="/products" method="post">
        {{ csrf_field() }}
        
        <h2>Nouveau post</h2>
        <div>
            <label for="title">Entrez votre titre</label>
        <div>
        </div>
            <input type="text" class="form-control" id="productName"  name="name">
        </div>
        <div>
            <label for="title">Choisissez votre morceau</label>
        <div>
        </div>
            <input type="text" class="form-control" id="productName"  name="name">
        </div>
        <div>
            <label for="title">Entrez votre texte</label>
        <div>
        </div>
            <input type="text" class="form-control" id="productName"  name="name">
        </div>

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
    </form>
  </body>
</html>
