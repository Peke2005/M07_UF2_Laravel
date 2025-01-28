<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">
    @include('master.header')
    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/filmsByYear>Pelis filtrado por año</a></li>
        <li><a href=/filmout/filmsByGenre>Pelis filtrado por genero</a></li>
        <li><a href=/filmout/sortFilms>Pelis ordenado por año de mas nuevo a mas antiguo</a></li>
        <li><a href=/filmout/countFilms>Contador de pelis</a></li>
    </ul>
    <div class="formulario">
        <h1>Añadir Película</h1>
        <form action="{{ route('createFilm') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="year" class="form-label">Año</label>
                <input type="number" id="year" name="year" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="genre" class="form-label">Género</label>
                <input type="text" id="genre" name="genre" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="country" class="form-label">País</label>
                <input type="text" id="country" name="country" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="duration" class="form-label">Duración</label>
                <input type="text" id="duration" name="duration" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="image_url" class="form-label">Imagen URL</label>
                <input type="text" id="image_url" name="image_url" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            @if ($errors->has('error'))
                <div style="color: red; margin-top: 1%;">
                    {{ $errors->first('error') }}
                </div>
            @endif
        </form>
    </div>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    @include('master.footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>
