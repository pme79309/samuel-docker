<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costa Verde - BlogueroAstur.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="estilos/estiloCosta.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&family=Roboto+Condensed:wght@300&family=Work+Sans:wght@800&display=swap" rel="stylesheet">
</head>

<body>

    <!--Header-->
    <header>
        <img src="imagenes/logo.png" alt="Logotipo BlogueroAstur.com">
    </header>

    <!--Barra de navegacion-->
    <nav>
        <a href="#">Inicio</a>
        <a href="costaVerde.html">Costa Verde</a>
        <a href="turismo.html">Turismo Costa Verde</a>
    </nav>

    <div class="container">
        <!--Contenido principal-->
        <main>
            <!--Articulo-->
            <article id="inicio">
                <h1>Gracias por compartir tu experiencia</h1>

                <p>Hemos recibido correctamente los siguientes datos:</p>

                <?php

                    // Creamos variables
                    $nombre = $_POST['nombre'];
                    $email = $_POST['email'];
                    $exp = $_POST['exp'];
                    $cuentanos = $_POST['cuentanos'];

                    // Devolvemos informacion
                    echo "<ul><li>Nombre: " . $nombre . "</li>";
                    echo "<li>Email: " . $email . "</li>";
                    echo "<li>Tipo de experiencia: " . $exp . "</li>";
                    echo "<li>Tu experiencia: " . $cuentanos . "</li></ul>";

                    // No he incluido mas info porque, debido a la naturaleza del formulario, al usuario no le interesa saber el resto. Unicamente quiere confirmar que sus datos personales estan bien. Estos son su nombre, correo, el tipo de experiencia y la experiencia en si misma.
                ?>

            </article>
        </main>
        <aside>
            <section>
                <h3>Más información</h3>
                <ul>
                    <li><a href="https://es.wikipedia.org/wiki/Costa_Verde_(Espa%C3%B1a)">Costa Verde (Wikipedia)</a></li>
                    <li><a href="https://www.turismoasturias.es/organiza-tu-viaje/donde-dormir/alojamiento/campings/costa-verde">Costa Verde (Turismo Asturias)</a></li>
                    <li><a href="https://viajes.nationalgeographic.com.es/a/costa-verde-asturias_13185">Costa Verde (National Geographic)</a></li>
                </ul>
            </section>
            <section>
                <h3>Redes sociales</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </section>
        </aside>
    </div>
    <footer>
        <hr>
        <p class="autor">Autor: Samuel Soto López - Esto es un trabajo para el módulo de LMSGI del ciclo formativo de grado superior DAW (Desarrollo de Aplicaciones Web).</p>
    </footer>
</body>

</html>