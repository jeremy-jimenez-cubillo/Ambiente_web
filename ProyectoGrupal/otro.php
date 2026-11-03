<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "idiomas.php";

date_default_timezone_set("America/Costa_Rica");

define("IDIOMAS_VALIDOS", array("es", "en"));
define("TEMAS_VALIDOS", array("claro", "oscuro"));
define("ASUNTOS_VALIDOS", array("reservas", "pagos", "cuenta", "otro"));

// Carpeta y archivo donde se guardan las consultas de soporte.
define("DIR_SOPORTE", __DIR__ . "/datos");
define("RUTA_SOPORTE", DIR_SOPORTE . "/soporte.txt");



// IDIOMA Y MODO 



function idiomaActual()
{
    $idioma = $_SESSION["idioma"] ?? "es";
    return in_array($idioma, IDIOMAS_VALIDOS) ? $idioma : "es";
}


function temaActual()
{
    $tema = $_SESSION["tema"] ?? "oscuro";
    return in_array($tema, TEMAS_VALIDOS) ? $tema : "oscuro";
}


function t($clave)
{
    $textos = obtenerTextos();
    return $textos[idiomaActual()][$clave] ?? $clave;
}



// MENÚ 

function menuOtro()
{
    $idioma = idiomaActual();
    $tema   = temaActual();


    $paginaActual = htmlspecialchars(basename($_SERVER["SCRIPT_NAME"]));


    $claseEs = ($idioma === "es") ? "btn-secondary" : "btn-outline-secondary";
    $claseEn = ($idioma === "en") ? "btn-secondary" : "btn-outline-secondary";

    $nuevoTema    = ($tema === "oscuro") ? "claro" : "oscuro";
    $textoTema    = ($tema === "oscuro") ? t("nav_modo_claro") : t("nav_modo_oscuro");
    $nombreIdioma = htmlspecialchars(t("nav_idioma"));
    $textoSoporte = htmlspecialchars(t("nav_soporte"));
    $textoTema    = htmlspecialchars($textoTema);

    $bsTema = ($tema === "oscuro") ? "dark" : "light";
    $script = "<script>
        document.documentElement.setAttribute('data-bs-theme', '$bsTema');
        document.documentElement.lang = '$idioma';
    </script>";

    return $script . '
        <div class="d-flex align-items-center flex-wrap gap-2 menuOtro">
            <a href="soporte.php" class="btn btn-sm btn-outline-secondary">' . $textoSoporte . '</a>

            <form method="post" action="preferencias.php" class="d-flex gap-1 m-0" aria-label="' . $nombreIdioma . '">
                <input type="hidden" name="volver" value="' . $paginaActual . '">
                <button type="submit" name="idioma" value="es" class="btn btn-sm ' . $claseEs . '">ES</button>
                <button type="submit" name="idioma" value="en" class="btn btn-sm ' . $claseEn . '">EN</button>
            </form>

            <form method="post" action="preferencias.php" class="m-0">
                <input type="hidden" name="volver" value="' . $paginaActual . '">
                <button type="submit" name="tema" value="' . $nuevoTema . '" class="btn btn-sm btn-outline-secondary">' . $textoTema . '</button>
            </form>
        </div>';
}

// SOPORTE EN LÍNEA

function longitudTexto($texto)
{
    return function_exists("mb_strlen") ? mb_strlen($texto, "UTF-8") : strlen($texto);
}

function validarConsulta($datos)
{
    $nombre  = trim($datos["nombre"] ?? "");
    $correo  = trim($datos["correo"] ?? "");
    $asunto  = $datos["asunto"] ?? "";
    $mensaje = trim($datos["mensaje"] ?? "");

    if (longitudTexto($nombre) < 3) {
        throw new Exception(t("err_nombre"));
    }

    if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
        throw new Exception(t("err_correo"));
    }

    if (!in_array($asunto, ASUNTOS_VALIDOS)) {
        throw new Exception(t("err_asunto"));
    }

    if (longitudTexto($mensaje) < 10 || longitudTexto($mensaje) > 500) {
        throw new Exception(t("err_mensaje"));
    }

    return array("nombre" => $nombre, "correo" => strtolower($correo), "asunto" => $asunto, "mensaje" => $mensaje);
}

function leerConsultas()
{
    $consultas = array();

    if (!file_exists(RUTA_SOPORTE)) {
        return $consultas;
    }

    $archivo = fopen(RUTA_SOPORTE, "r");

    while (!feof($archivo)) {
        $linea = trim(fgets($archivo));

        if ($linea !== "") {
            array_push($consultas, $linea);
        }
    }

    fclose($archivo);

    return $consultas;
}

// Guarda una consulta al final de soporte.txt y devuelve su número de ticket.
function guardarConsulta($consulta)
{
    if (!is_dir(DIR_SOPORTE)) {
        @mkdir(DIR_SOPORTE, 0777, true);
    }

    $ticket = count(leerConsultas()) + 1;

    $limpiar = fn($texto) => str_replace(array("|", "\r", "\n"), array("/", " ", " "), $texto);

    $linea = $ticket . "|" . date("d/m/Y H:i:s") . "|"
           . $limpiar($consulta["nombre"]) . "|"
           . $limpiar($consulta["correo"]) . "|"
           . $limpiar($consulta["asunto"]) . "|"
           . $limpiar($consulta["mensaje"]) . "\n";

    $archivo = @fopen(RUTA_SOPORTE, "a");

    if ($archivo === false) {
        throw new Exception(t("err_guardar"));
    }

    fwrite($archivo, $linea);
    fclose($archivo);

    return $ticket;
}
