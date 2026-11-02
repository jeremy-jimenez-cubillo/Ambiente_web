<?php
set_error_handler(function ($nivel, $mensaje, $archivo, $linea) {
    throw new ErrorException($mensaje, 0, $nivel, $archivo, $linea);
});

define("DIR_DATOS", __DIR__ . "/datos");
define("RUTA_CONTACTOS", DIR_DATOS . "/mensajes_contacto.txt");

function mensaje($tipo, $texto)
{
    $_SESSION["mensaje"] = array("tipo" => $tipo, "texto" => $texto);
}

function validarCorreo($correo)
{
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

function tiposContacto()
{
    return array("Sugerencia", "Reclamo", "Consulta");
}

function validarContacto($datos)
{
    $nombre = trim($datos["nombre"] ?? "");
    $correo = trim($datos["correo"] ?? "");
    $tipo   = $datos["tipo"] ?? "";
    $texto  = trim($datos["mensaje"] ?? "");

    foreach (array($nombre, $correo, $texto) as $campo) {
        if (preg_match('/[|\r\n]/', $campo)) {
            throw new Exception("Los campos no pueden contener el símbolo | ni saltos de línea.");
        }
    }

    if (strlen($nombre) < 3) {
        throw new Exception("El nombre debe tener al menos 3 caracteres.");
    }
    if (!validarCorreo($correo)) {
        throw new Exception("El correo no tiene un formato válido.");
    }
    if (array_search($tipo, tiposContacto()) === false) {
        throw new Exception("Seleccione un tipo de mensaje válido.");
    }
    $largo = strlen($texto);
    if ($largo < 10 || $largo > 500) {
        throw new Exception("El mensaje debe tener entre 10 y 500 caracteres.");
    }

    $formatear = fn($t) => mb_convert_case($t, MB_CASE_TITLE, "UTF-8");

    return array(
        "Fecha"   => date("d/m/Y H:i:s"),
        "Nombre"  => $formatear($nombre),
        "Correo"  => strtolower($correo),
        "Tipo"    => $tipo,
        "Mensaje" => $texto
    );
}

function guardarMensajes($mensajes)
{
    if (!is_dir(DIR_DATOS)) {
        mkdir(DIR_DATOS, 0777, true);
    }

    $archivo = fopen(RUTA_CONTACTOS, "w");

    foreach ($mensajes as $m) {
        fwrite($archivo, $m["Fecha"] . "|" . $m["Nombre"] . "|" . $m["Correo"] . "|" . $m["Tipo"] . "|" . $m["Mensaje"] . "\n");
    }

    fclose($archivo);
}

function leerMensajes()
{
    $mensajes = array();

    if (!file_exists(RUTA_CONTACTOS)) {
        return $mensajes;
    }

    $archivo = fopen(RUTA_CONTACTOS, "r");

    while (!feof($archivo)) {
        $linea = trim(fgets($archivo));

        if ($linea === "") {
            continue;
        }

        $partes = explode("|", $linea);

        if (count($partes) === 5) {
            array_push($mensajes, array(
                "Fecha"   => $partes[0],
                "Nombre"  => $partes[1],
                "Correo"  => $partes[2],
                "Tipo"    => $partes[3],
                "Mensaje" => $partes[4]
            ));
        }
    }

    fclose($archivo);

    return $mensajes;
}

function preguntasFrecuentes()
{
    return array(
        array("p" => "¿Cómo reservo un vehículo?",
              "r" => "Elija un vehículo en el listado, complete el formulario con las fechas y horas de recogida y entrega, y confirme la reserva en el resumen."),
        array("p" => "¿Necesito una cuenta para alquilar?",
              "r" => "Sí. Para confirmar una reserva debe registrarse e iniciar sesión. Desde su perfil puede revisar y editar sus datos."),
        array("p" => "¿Qué tipos de vehículos ofrecen?",
              "r" => "Autos económicos, camionetas, autos de lujo y deportivos, y transporte de carga pesada."),
        array("p" => "¿Puedo alquilar si mi vehículo está en reparación?",
              "r" => "Sí. RentaCR atiende a quienes necesitan un vehículo temporal por un accidente o reparación, con periodos flexibles."),
        array("p" => "¿Puedo ver el resumen antes de confirmar?",
              "r" => "Sí. Al presionar alquilar se muestra un resumen con el vehículo, las fechas y el total para que lo revise."),
        array("p" => "¿Cómo envío una sugerencia o reclamo?",
              "r" => "Use el formulario de contacto de esta página o escríbanos por teléfono o correo.")
    );
}