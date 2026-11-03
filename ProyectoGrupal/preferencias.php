<?php
//Guarda el idioma y el modo (claro/oscuro) en la sesión
require_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: inicioSesion.php");
    exit;
}

$idioma = $_POST["idioma"] ?? "";
if (in_array($idioma, IDIOMAS_VALIDOS)) {
    $_SESSION["idioma"] = $idioma;
}

$tema = $_POST["tema"] ?? "";
if (in_array($tema, TEMAS_VALIDOS)) {
    $_SESSION["tema"] = $tema;
}

$volver = $_POST["volver"] ?? "";
if (!preg_match('/^[A-Za-z0-9_]+\.php$/', $volver) || !file_exists(__DIR__ . "/" . $volver)) {
    $volver = "inicioSesion.php";
}

header("Location: " . $volver);
exit;
