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
            <div class="imagen">
                
            </div>
        </header>
    
        <main>
            <div class="container-lg inicioSe">
                <div class="text-bg-light p-3 border container-lg inicioSe2"> <br>
                    <h2 class="text-center titulo">Registro Nuevo Usuario</h2> <br>
                        <div class="border-bottom"></class=>
                            <form method="post">
                                <input type="hidden" id="registro" value="registrar">
                                <div class="container-lg">
                                    <div class="mb-3 row">
                                        <label for="correo" class="col-sm-3 col-form-label"> Correo Electrónico </label>
                                    <div class="col-lg-5 text-center">
                                        <input type="email" id="correo" class="form-control" placeholder="Digite su Correo" required>
                                    </div>
                                        <div class="col-3">
                                            <span id="contrasenaCantidad" class="form-text" style="font-size: smaller;">
                                            Debe de ser un correo valido. No previamente usado en el sitio.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="telefono" class="col-sm-3 col-form-label"> Número de Telefono </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="telefono" class="form-control" placeholder="Digite su Numero" required>
                                        </div>
                                        <div class="col-3">
                                            <span id="contrasenaCantidad" class="form-text" style="font-size: smaller;">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nombre" class="col-sm-3 col-form-label"> Nombre </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="nombre" class="form-control" placeholder="Digite su Nombre" required>
                                        </div>
                                        <div class="col-3">
                                            <span id="contrasenaCantidad" class="form-text" style="font-size: smaller;">
                                            El nombre debe tener más de 3 caracteres.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="apellido" class="col-sm-3 col-form-label"> Apellido </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="apellido" class="form-control" placeholder="Digite su Apellido" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="contrasena" class="col-sm-3 col-form-label"> Contraseña </label>  
                                        <div class="col-lg-5 text-center">
                                            <input type="password" id="contrasena" class="form-control" placeholder="Digite su Contraseña" required>
                                        </div>
                                        <div class="col-3">
                                            <span id="contrasenaCantidad" class="form-text" style="font-size: smaller;">
                                            Debe de ser 8-20 caracteres de largo.
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="contrasena2" class="col-sm-3 col-form-label"> Confirmar Contraseña </label>  
                                        <div class="col-lg-5 text-center">
                                            <input type="password" id="contrasena2" class="form-control" placeholder="Confirmar Contraseña" required>
                                        </div>
                                    </div>
                                </div> <br>

                                <div class="d-grid gap-2 col-2 mx-auto">
                                    <button class="btn btn-dark rounded-4" type="submit">Registrar</button>
                                </div>
                            </form>
                        </div>
                    <br>
                
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