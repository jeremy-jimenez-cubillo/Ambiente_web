<?php
require_once "otro.php";

function headerNav() {

    return '<link rel="stylesheet" href="css/otro.css">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a href="/ProyectoGrupal/inicioSesion.php" class="navbar-brand mb-0 h1 ">RentaCar</a>'
                    . menuOtro() . '
                </div>
            </nav> <br>';
}

function footerPag(){
    return '<br> <p class="fw-light text-center footClass">'
            . htmlspecialchars(t("footer_proyecto"), ENT_QUOTES, "UTF-8") .
            '</p>
            <p class="fw-lighter text-center footClass">SC-502</p>';
}
?>