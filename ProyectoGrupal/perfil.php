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
                    <h2 class="text-center titulo">Perfil de Usuario</h2> <br>
                        <div class="p-4 mb-1 bg-light-subtle text-light-emphasis border rounded-4 border-black bordes"><br>
                            <h4 class="text-left h4Perfil">Datos Personales</h4> <br>
                            <form method="post">
                                <input type="hidden" id="cambio" value="cambio">
                                <div class="row row-cols-2">
                                    <div class="mb-3 row">
                                        <label for="nombre" class="col-sm-3 col-form-label"> Nombre </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="nombre" class="form-control-plaintext"  required>
                                        </div>
                                    
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="apellido" class="col-sm-3 col-form-label"> Apellido </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="apellido" class="form-control-plaintext" required>
                                        </div>
                                    </div>

                                     <div class="mb-3 row">
                                        <label for="correo" class="col-sm-3 col-form-label"> Correo Electrónico </label>
                                        <div class="col-lg-9 text-center">
                                        <input type="email" id="correo" class="form-control-plaintext" required>
                                        </div>
                                    </div>
                

                                    <div class="mb-3 row">
                                        <label for="telefono" class="col-sm-3 col-form-label"> Número de Telefono </label> 
                                        <div class="col-lg-5 text-center">
                                            <input type="text" id="telefono" class="form-control-plaintext" required>
                                        </div>
                                        <div class="col-3">
                                            <span id="contrasenaCantidad" class="form-text" style="font-size: smaller;">
                                            </span>
                                        </div>
                                    </div>
  
                                </div> <br>
                                <!--Anadir if para mostrar y editar-->
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-dark rounded-4 mb-3" type="submit">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    <br>

                        <div class="p-4 mb-1 bg-light-subtle text-light-emphasis border rounded-4 border-black bordes"><br>
                            <h4 class="text-left h4Perfil">Mis Rentas</h4> <br>
                            <table class="table">
                                <thead>
                                    <tr><th scope="col" >Renta Reciente</th><th scope="col">Categoria</th><th scope="col">Fecha de Retiro</th><th scope="col">Estado</th></tr>
                                </thead>
                                <tbody>
                                    <?php //autosRentados()?>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <div class="p-4 mb-1 bg-light-subtle text-light-emphasis border rounded-4 border-black bordes"><br>
                            <h4 class="text-left h4Perfil">Metodo de Pago</h4> <br>
                            
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