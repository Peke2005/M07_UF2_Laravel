<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
    <style>
        /* Estilos generales */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Contenedor principal */
        .container {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            border-radius: 15px;
            padding: 25px;
            margin-top: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        /* Estilo de los títulos */
        h1 {
            color: #333;
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        /* Botones */
        .btn-primary {
            background-color: lightpink;
            font-weight: bold;
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: purple;
            border-color: white;
            transform: scale(1.05);
        }

        /* Enlaces */
        a {
            color: #ff6347;
            font-weight: 500;
            font-size: 1.1rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #fff;
            text-decoration: underline;
        }

        /* Formulario */
        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 15px;
            padding: 12px;
            border: 2px solid #ddd;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #ff6347;
            box-shadow: 0 0 10px rgba(255, 99, 71, 0.7);
        }

        /* Footer */
        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 15px;
            width: 100%;
            bottom: 0;
        }

        /* Estilo para los enlaces del menú */
        .nav-item {
            font-weight: 500;
            padding-left: 15px;
            padding-right: 15px;
        }

        .nav-link {
            color: #fff !important;
            font-size: 1rem;
            padding: 8px 12px;
        }

        .nav-link:hover {
            color: #ff6347 !important;
        }

        /* Estilo para los links en la lista */
        ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        ul li {
            margin: 8px 0;
            font-size: 1rem;
            text-align: center;
        }

        ul li a {
            text-decoration: none;
            color: blueviolet;
            font-weight: 500;
        }

        ul li a:hover {
            color: #fff;
            text-decoration: underline;
        }

        /* Formulario destacable */
        .formulario {
            background: linear-gradient(135deg, #ff6347, #ff4500);
            padding: 25px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .formulario h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
    </style>
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
        <li><a href=/actorout/listactors>Todos los actores</a></li>
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
    @include('master.footer')
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>
