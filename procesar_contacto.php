<?php
session_start();
require_once "funciones_acerca.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: acerca.php");
    exit;
}

try {
    $contacto = validarContacto($_POST);

    $mensajes = leerMensajes();
    array_push($mensajes, $contacto);
    guardarMensajes($mensajes);

    mensaje("exito", "¡Gracias! Su mensaje fue enviado correctamente.");
} catch (Exception $e) {
    $_SESSION["old"] = $_POST;
    mensaje("error", "Error: " . $e->getMessage());
}

header("Location: acerca.php");
exit;