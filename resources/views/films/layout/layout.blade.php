<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies List')</title>

    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Fondo atractivo para el cuerpo de la página */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        /* Estilo para el contenedor principal */
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        /* Estilo para los títulos */
        h1 {
            color: #ff6347;
        }

        /* Botones con un color llamativo */
        .btn-primary {
            background-color: #ff6347;
            border-color: #ff6347;
        }

        .btn-primary:hover {
            background-color: #ff4500;
            border-color: #ff4500;
        }

        /* Estilo para los enlaces */
        a {
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }

        /* Estilo para los formularios */
        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
        }

        /* Footer personalizado */
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
        }
    </style>
</head>

<body class="container">
    @include('master.header')
    @yield('content') <!-- This is where the page-specific content will be injected -->
    @include('master.footer')

    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
