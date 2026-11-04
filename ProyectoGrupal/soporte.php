<?php
//Soporte en línea
// Muestra el formulario de consulta, valida los datos y los guarda en datos/soporte.txt.


require_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $consulta = validarConsulta($_POST);
        $ticket   = guardarConsulta($consulta);

        unset($_SESSION["soporte_datos"]);
        $_SESSION["soporte_mensaje"] = array(
            "tipo"  => "success",
            "texto" => sprintf(t("ok_enviada"), $ticket, $consulta["correo"])
        );

    } catch (Exception $e) {
        $_SESSION["soporte_datos"]   = $_POST;
        $_SESSION["soporte_mensaje"] = array("tipo" => "danger", "texto" => $e->getMessage());
    }

    header("Location: soporte.php");
    exit;
}

$mensaje = $_SESSION["soporte_mensaje"] ?? null;
$datos   = $_SESSION["soporte_datos"] ?? array();
unset($_SESSION["soporte_mensaje"], $_SESSION["soporte_datos"]);

$valor = fn($campo) => htmlspecialchars($datos[$campo] ?? "");
$asuntoElegido = $datos["asunto"] ?? "";
?>
<!DOCTYPE html>
<html lang="<?= idiomaActual() ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>RentaCR - <?= htmlspecialchars(t("soporte_titulo")) ?></title>
    </head>

    <body class="bodyIPR">
        <header>
            <?php echo headerNav() ?>
        </header>

        <main class="container mt-4 mb-5">

            <h1 class="titulo"><?= htmlspecialchars(t("soporte_titulo")) ?></h1>
            <p><?= htmlspecialchars(t("soporte_intro")) ?></p>

            <!-- Mensaje de éxito o de error -->
            <?php if ($mensaje): ?>
                <div class="alert alert-<?= htmlspecialchars($mensaje["tipo"]) ?>" role="alert">
                    <?= htmlspecialchars($mensaje["texto"]) ?>
                </div>
            <?php endif; ?>

            <div class="row g-4">

                <!-- FORMULARIO DE CONSULTA -->
                <section class="col-lg-7">
                    <div class="text-bg-light border rounded-4 p-4 h-100">
                        <h2 class="h4 titulo mb-3"><?= htmlspecialchars(t("soporte_form")) ?></h2>

                        <form method="post" action="soporte.php">

                            <div class="mb-3">
                                <label for="nombre" class="form-label"><?= htmlspecialchars(t("campo_nombre")) ?></label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required
                                       placeholder="<?= htmlspecialchars(t("ph_nombre")) ?>" value="<?= $valor("nombre") ?>">
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label"><?= htmlspecialchars(t("campo_correo")) ?></label>
                                <input type="email" id="correo" name="correo" class="form-control" required
                                       placeholder="<?= htmlspecialchars(t("ph_correo")) ?>" value="<?= $valor("correo") ?>">
                            </div>

                            <div class="mb-3">
                                <label for="asunto" class="form-label"><?= htmlspecialchars(t("campo_asunto")) ?></label>
                                <select id="asunto" name="asunto" class="form-select" required>
                                    <option value=""><?= htmlspecialchars(t("asunto_elegir")) ?></option>
                                    <?php foreach (ASUNTOS_VALIDOS as $clave): ?>
                                        <option value="<?= $clave ?>" <?= ($asuntoElegido === $clave) ? "selected" : "" ?>>
                                            <?= htmlspecialchars(t("asunto_" . $clave)) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="mensaje" class="form-label"><?= htmlspecialchars(t("campo_mensaje")) ?></label>
                                <textarea id="mensaje" name="mensaje" class="form-control" rows="5" maxlength="500" required
                                          placeholder="<?= htmlspecialchars(t("ph_mensaje")) ?>"><?= $valor("mensaje") ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-dark rounded-4 px-4"><?= htmlspecialchars(t("btn_enviar")) ?></button>
                        </form>
                    </div>
                </section>

                <!-- HORARIO Y CONTACTO -->
                <aside class="col-lg-5">
                    <div class="text-bg-light border rounded-4 p-4 mb-4">
                        <h2 class="h5 titulo"><?= htmlspecialchars(t("soporte_horario")) ?></h2>
                        <ul class="mb-0">
                            <li><?= htmlspecialchars(t("soporte_horario_1")) ?></li>
                            <li><?= htmlspecialchars(t("soporte_horario_2")) ?></li>
                            <li><?= htmlspecialchars(t("soporte_horario_3")) ?></li>
                        </ul>
                    </div>

                    <div class="text-bg-light border rounded-4 p-4">
                        <h2 class="h5 titulo"><?= htmlspecialchars(t("soporte_contacto")) ?></h2>
                        <p class="mb-1"><?= htmlspecialchars(t("soporte_telefono")) ?>: 2222-0000</p>
                        <p class="mb-0"><?= htmlspecialchars(t("soporte_correo")) ?>: soporte@rentacr.example</p>
                    </div>
                </aside>

            </div>
        </main>

        <footer>
            <?php echo footerPag() ?>
        </footer>
    </body>
</html>
