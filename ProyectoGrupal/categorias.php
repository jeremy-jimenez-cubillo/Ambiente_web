
<?php
    require_once "funciones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RentaCR - Categorías de Vehículos</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bodyIPR">

    <header>
        <?php echo headerNav(); ?>
    </header>

    <main class="container text-white mt-5">

        <h1 class="titulo">Categorías de Vehículos</h1>

        <p>
            En RentaCR contamos con diferentes categorías
            de vehículos para adaptarnos a las necesidades
            de nuestros clientes.
        </p>

        <section class="container mt-5 inicioSe2 p-4">

            <h2 class="titulo">Tipos de vehículos disponibles</h2>

            <ul class="list-unstyled">

                <!-- Vehículos Económicos -->
                <li class="border rounded-4 p-3 mb-3">

                    <h3 class="titulo">Vehículos Económicos</h3>

                    <p>
                        Vehículos ideales para desplazamientos diarios
                        y viajes económicos.
                    </p>

                    <a href="informacionAuto.php#economico" class="btn btn-dark rounded-4">
                        Ver vehículo
                    </a>

                </li>

                <!-- Camionetas -->
                <li class="border rounded-4 p-3 mb-3">

                    <h3 class="titulo">Camionetas</h3>

                    <p>
                        Vehículos espaciosos y cómodos, ideales para
                        viajes familiares y recorridos largos.
                    </p>

                    <a href="informacionAuto.php#camioneta" class="btn btn-dark rounded-4">
                        Ver vehículo
                    </a>

                </li>

                <!-- Autos de Lujo/Deportivos -->
                <li class="border rounded-4 p-3 mb-3">

                    <h3 class="titulo">Autos de Lujo/Deportivos</h3>

                    <p>
                        Vehículos de alta gama, ideales para quienes
                        buscan comodidad y elegancia.
                    </p>

                    <a href="informacionAuto.php#lujo" class="btn btn-dark rounded-4">
                        Ver vehículo
                    </a>

                </li>

                <!-- Transporte de Carga Pesada -->
                <li class="border rounded-4 p-3 mb-3">

                    <h3 class="titulo">Transporte de Carga Pesada</h3>

                    <p>
                        Vehículos diseñados para transportar mercancías
                        y cargas de gran tamaño.
                    </p>

                    <a href="informacionAuto.php#carga" class="btn btn-dark rounded-4">
                        Ver vehículo
                    </a>

                </li>

            </ul>

        </section>

    </main>

    <footer>
        <?php echo footerPag(); ?>
    </footer>

</body>
</html>
