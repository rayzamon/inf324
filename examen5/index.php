<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <!--<link rel="stylesheet" href="css/icon-font.css">-->

    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <title>Inscripciones</title>
</head>

<body>

    <header class="header">
        <div class="header__logo-box">
            <img src="img/logo-white.png" alt="Logo" class="header__logo">
        </div>

        <div class="header__text-box">
            <h1 class="heading-primary">
                <span class="heading-primary--main">INCRIPCIONES</span>
            </h1>

            <!--<h1 class="heading-primary">
                <span class="heading-primary--sub">Seleccione un color de fondo UwU</span>
            </h1>-->
            <!-- Agregar una sección para seleccionar el color de fondo -->
            <!--<input type="color" id="colorFondo">
            <a href="#section-tours" class="btn btn--white btn--animated" onclick="cambiarColorFondo()">cambiar
                color</a>-->

                <h1 class="heading-primary">
                    <span class="heading-primary--sub">Por favor identifiquese</span>
                </h1>
            
                <form action="sesion.php" method="post">
                     <!-- Campos de entrada de texto para nombre de usuario y contraseña -->
                    <h1 for="nombre">Nombre de usuario:</h1>
                    <input type="text" id="nombre" name="nombre" value="" required>
                    <br>
                    <h1 for="contrasena">Contraseña:</h1>
                    <input type="password" id="contrasena" name="contrasena" value ="" required>
                    <br>
                    <br>
                    <!-- Botones para elegir el rol -->
                    <button type="submit" class="btn btn--white btn--animated" name="rol" value="estudiante">Soy Estudiante</button>
                    <button type="submit" class="btn btn--white btn--animated" name="rol" value="docente">Soy Docente</button>
                </form>
            

        <!--    <a href="#section-tours" class="btn btn--white btn--animated" onclick="irComoEstudiante()">soy estudiante</a>
            <a href="#section-tours" class="btn btn--white btn--animated" onclick="irComoDocente()">soy docente</a>-->
        </div>
    </header>




    <script>

    </script>

    <!--
        <section class="grid-test">
            <div class="row">
                <div class="col-1-of-2">
                    Col 1 of 2
                </div>
                <div class="col-1-of-2">
                    Col 1 of 2
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-2-of-3">
                    Col 2 of 3
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-2-of-4">
                    Col 2 of 4
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-3-of-4">
                    Col 3 of 4
                </div>
            </div>
        </section>
        -->

</body>

</html>