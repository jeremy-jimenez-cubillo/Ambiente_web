<?php
    require_once "funciones.php";
?>

<!DOCKTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <title>RentaCR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body class="bodyIPR"> 
        <header>
            <?php echo headerNav() ?>
        </header>
    
        <main>
            <div class="container-lg inicioSe">
                <div class="text-bg-light p-3 border container-lg inicioSe2"> <br>
                    <h2 class="text-center titulo">Inicio de Sesión</h2> <br>
                        <div class="border-bottom"></class=>
                            <form method="post">
                                <div class="mb-3 text-center">
                                    <label for="correo" class="form-label">
                                        <div class="col-lg-30 text-center">
                                            <input type="email" id="correo" class="form-control" placeholder="Digite su Correo" required>
                                        </div>
                                    </label> 
                                </div>
                                <div class="col-auto text-center mx-auto">
                                <label for="contrasena" class="form-label">
                                        <input type="password" id="contrasena" class="form-control" placeholder="Digite su Contraseña" required>
                                </label> 
                                </div> <br>
                                <div class="d-grid gap-2 col-2 mx-auto">
                                    <button class="btn btn-dark rounded-4" type="submit">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    <br>
                    <div class="container-sm text-center">
                        <div class="row">
                            <div class="col">
                                <p>¿Nuevo usuario? <a href="/ProyectoGrupal/registro.php"> Registrar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>


        <footer>
            <?php echo footerPag() ?>
        </footer>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>