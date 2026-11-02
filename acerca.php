<?php
session_start();
require_once "funciones_acerca.php";

$mensaje = $_SESSION["mensaje"] ?? null;
$old = $_SESSION["old"] ?? array();
unset($_SESSION["mensaje"], $_SESSION["old"]);

$preguntas = preguntasFrecuentes();
$valor = fn($campo) => htmlspecialchars($old[$campo] ?? "");
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de | RentaCR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bodyIPR">

<nav class="navbar navbar-expand-lg navbar-dark navClass">
    <div class="container">
        <a class="navbar-brand titulo" href="#">RentaCR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto titulo">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Alquiler</a></li>
                <li class="nav-item"><a class="nav-link active" href="acerca.php">Acerca de</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cuenta</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

    <h1 class="titulo text-center mb-4">Acerca de RentaCR</h1>

    <?php if ($mensaje): ?>
        <div class="alert alert-<?= $mensaje["tipo"] === "exito" ? "success" : "danger" ?>">
            <?= htmlspecialchars($mensaje["texto"]) ?>
        </div>
    <?php endif; ?>

    <h2 class="titulo mt-4 mb-3">Quiénes somos</h2>
    <div class="inicioSe2 p-4 mb-4">
        <p>RentaCR es una plataforma web que centraliza la flota, los precios y la disponibilidad de vehículos para que el cliente reserve desde cualquier lugar y en cualquier momento, sin llamadas ni esperas.</p>
        <h3 class="h5 h4Perfil">Para turistas</h3>
        <p>Recorra el país a su propio ritmo y llegue a destinos donde el transporte público no tiene cobertura.</p>
        <h3 class="h5 h4Perfil">Para usuarios nacionales</h3>
        <p>Un vehículo de sustitución inmediato y por el tiempo que necesite si el suyo está en reparación.</p>
        <h3 class="h5 h4Perfil">Transparencia</h3>
        <p class="mb-0">Precios claros, disponibilidad real y un resumen de su reserva antes de confirmar.</p>
    </div>

    <h2 class="titulo mt-4 mb-3">Preguntas frecuentes</h2>
    <div class="inicioSe2 p-4 mb-4">
        <?php foreach ($preguntas as $q): ?>
            <div class="mb-3 pb-2 border-bottom">
                <h3 class="h5 h4Perfil"><?= htmlspecialchars($q["p"]) ?></h3>
                <p class="mb-0"><?= htmlspecialchars($q["r"]) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="titulo mt-4 mb-3">Contáctenos</h2>
    <div class="inicioSe2 p-4 mb-4">
        <p>Teléfono: +506 2222-0000</p>
        <p>WhatsApp: +506 8888-0000</p>
        <p>Correo: info@rentacr.com</p>
        <p class="mb-0">Horario: lunes a domingo, 7:00 a.m. a 8:00 p.m.</p>
    </div>

    <h2 class="titulo mt-4 mb-3">Ubicación</h2>
    <div class="inicioSe2 p-4 mb-4">
        <p>Dirección: San José, Costa Rica</p>
        <p class="mb-0">Sucursal principal, frente al Parque Central.</p>
    </div>

    <h2 class="titulo mt-4 mb-3">Formulario de contacto</h2>
    <div class="inicioSe2 p-4 mb-4">
        <form method="post" action="procesar_contacto.php">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $valor("nombre") ?>">

            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required value="<?= $valor("correo") ?>">

            <label for="tipo">Tipo de mensaje</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option value="">Seleccione...</option>
                <?php foreach (tiposContacto() as $t): ?>
                    <option value="<?= $t ?>" <?= ($old["tipo"] ?? "") === $t ? "selected" : "" ?>><?= $t ?></option>
                <?php endforeach; ?>
            </select>

            <label for="mensaje">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" maxlength="500" required><?= $valor("mensaje") ?></textarea>

            <button type="submit" class="btn btn-primary mt-3">Enviar mensaje</button>
        </form>
    </div>

</main>

<footer class="navClass footClass text-center py-3 titulo">
    <small>&copy; 2026 RentaCR · Universidad Fidélitas</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>