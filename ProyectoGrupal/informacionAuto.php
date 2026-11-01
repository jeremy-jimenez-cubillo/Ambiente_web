
<?php
    require_once "funciones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RentaCR - Información del Auto</title>

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

        <h1 class="titulo">Información del Vehículo</h1>

        <p>
            Consulte las características de nuestros vehículos
            y seleccione el que mejor se adapte a sus necesidades.
        </p>

        <!-- Catálogo de vehículos -->
        <section class="container mt-5 inicioSe2 p-4">

            <h2 class="titulo">Nuestro Catálogo de Vehículos</h2>
                    <!--
            PENDIENTE DE DESARROLLO:
            Actualmente se muestran vehículos de ejemplo porque
            todavía no se ha implementado la base de datos.

            a futuro, cada categoría permitirá
            consultar únicamente los vehículos correspondientes.

            La información de los vehículos se mapeaa de la
            base de datos cuando se implemente
        -->

            <!-- Toyota Yaris -->
            <div id="economico" class="border rounded-4 p-3 mb-3">

                <h3 class="titulo">Toyota Yaris 2023</h3>

                <p>Categoría: Vehículos Económicos</p>
                <p>Marca: Toyota</p>
                <p>Modelo: Yaris</p>
                <p>Año: 2023</p>
                <p>Capacidad: 5 pasajeros</p>
                <p>Transmisión: Automática</p>

                <a href="#formulario" class="btn btn-dark rounded-4">
                    Solicitar este vehículo
                </a>

            </div>

            <!-- Toyota RAV4 -->
            <div id="camioneta" class="border rounded-4 p-3 mb-3">

                <h3 class="titulo">Toyota RAV4 2024</h3>

                <p>Categoría: Camionetas</p>
                <p>Marca: Toyota</p>
                <p>Modelo: RAV4</p>
                <p>Año: 2024</p>
                <p>Capacidad: 5 pasajeros</p>
                <p>Transmisión: Automática</p>

                <a href="#formulario" class="btn btn-dark rounded-4">
                    Solicitar este vehículo
                </a>

            </div>

            <!-- BMW Serie 3 -->
            <div id="lujo" class="border rounded-4 p-3 mb-3">

                <h3 class="titulo">BMW Serie 3 2023</h3>

                <p>Categoría: Autos de Lujo/Deportivos</p>
                <p>Marca: BMW</p>
                <p>Modelo: Serie 3</p>
                <p>Año: 2023</p>
                <p>Capacidad: 5 pasajeros</p>
                <p>Transmisión: Automática</p>

                <a href="#formulario" class="btn btn-dark rounded-4">
                    Solicitar este vehículo
                </a>

            </div>

            <!-- Isuzu NPR -->
            <div id="carga" class="border rounded-4 p-3 mb-3">

                <h3 class="titulo">Isuzu NPR 2022</h3>

                <p>Categoría: Transporte de Carga Pesada</p>
                <p>Marca: Isuzu</p>
                <p>Modelo: NPR</p>
                <p>Año: 2022</p>
                <p>Capacidad: 3 pasajeros</p>
                <p>Transmisión: Manual</p>

                <a href="#formulario" class="btn btn-dark rounded-4">
                    Solicitar este vehículo
                </a>

            </div>

        </section>

        <!-- Formulario de renta -->
         <!--PENDIENTE DE DESARROLLO: El formulario de renta es una interfaz
            se debe implementar:
            - El procesamiento de los datos ingresados.
            - La validación de fechas y horas de alquiler.
            - El resumen previo a la confirmación.
            - El registro de la reservación en la base de datos.
            Estas funcionalidades se desarrollaran acorde cuando se haga la base de datos .-->
        <section id="formulario" class="container mt-5 inicioSe2 p-4">

            <h2 class="titulo">Formulario de Renta</h2>

            <p>
                Complete los siguientes datos para preparar
                su solicitud de alquiler.
            </p>

            <form>

                <div class="mb-3">

                    <label for="nombre" class="form-label">
                        Nombre completo
                    </label>

                    <input type="text"
                           class="form-control"
                           id="nombre"
                           required>

                </div>

                <div class="mb-3">

                    <label for="correo" class="form-label">
                        Correo electrónico
                    </label>

                    <input type="email"
                           class="form-control"
                           id="correo"
                           required>

                </div>

                <div class="mb-3">

                    <label for="vehiculo" class="form-label">
                        Seleccione el vehículo
                    </label>

                    <select class="form-select" id="vehiculo" required>

                        <option value="">Seleccione un vehículo</option>

                        <option value="Toyota Yaris 2023">
                            Toyota Yaris 2023
                        </option>

                        <option value="Toyota RAV4 2024">
                            Toyota RAV4 2024
                        </option>

                        <option value="BMW Serie 3 2023">
                            BMW Serie 3 2023
                        </option>

                        <option value="Isuzu NPR 2022">
                            Isuzu NPR 2022
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label for="fechaInicio" class="form-label">
                        Fecha de recogida
                    </label>

                    <input type="date"
                           class="form-control"
                           id="fechaInicio"
                           required>

                </div>

                <div class="mb-3">

                    <label for="horaInicio" class="form-label">
                        Hora de recogida
                    </label>

                    <input type="time"
                           class="form-control"
                           id="horaInicio"
                           required>

                </div>

                <div class="mb-3">

                    <label for="fechaFin" class="form-label">
                        Fecha de devolución
                    </label>

                    <input type="date"
                           class="form-control"
                           id="fechaFin"
                           required>

                </div>

                <div class="mb-3">

                    <label for="horaFin" class="form-label">
                        Hora de devolución
                    </label>

                    <input type="time"
                           class="form-control"
                           id="horaFin"
                           required>

                </div>

                <p>
                    La confirmación de la reserva estará disponible
                    cuando se implemente el procesamiento del formulario.
                </p>

            </form>

        </section>

        <div class="mt-4">
            <a href="categorias.php" class="btn btn-dark rounded-4">
                Volver a Categorías
            </a>
        </div>

    </main>

    <footer>
        <?php echo footerPag(); ?>
    </footer>

</body>
</html>
