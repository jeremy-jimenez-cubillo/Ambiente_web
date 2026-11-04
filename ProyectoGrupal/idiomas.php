<?php
//Textos del sitio en cada idioma

function obtenerTextos()
{
    return array(

        // ------------------------------ ESPAÑOL ------------------------------
        "es" => array(
            
            "nav_otro"          => "Otro",
            "nav_soporte"       => "Soporte en línea",
            "nav_idioma"        => "Idioma del sitio",
            "nav_modo_claro"    => "Modo claro",
            "nav_modo_oscuro"   => "Modo oscuro",
            "footer_proyecto"   => "Proyecto Ambiente Web",

            
            "soporte_titulo"    => "Soporte en línea",
            "soporte_intro"     => "¿Tiene dudas sobre una reserva, un pago o su cuenta? Escríbanos y le responderemos lo antes posible.",
            "soporte_form"      => "Enviar una consulta",
            "soporte_horario"   => "Horario de atención",
            "soporte_horario_1" => "Lunes a viernes: 8:00 a. m. a 6:00 p. m.",
            "soporte_horario_2" => "Sábados: 9:00 a. m. a 1:00 p. m.",
            "soporte_horario_3" => "Domingos y feriados: cerrado",
            "soporte_contacto"  => "Otros medios de contacto",
            "soporte_telefono"  => "Teléfono",
            "soporte_correo"    => "Correo",

            
            "campo_nombre"      => "Nombre completo",
            "campo_correo"      => "Correo electrónico",
            "campo_asunto"      => "Asunto",
            "campo_mensaje"     => "Mensaje",
            "ph_nombre"         => "Digite su nombre",
            "ph_correo"         => "Digite su correo",
            "ph_mensaje"        => "Cuéntenos en qué podemos ayudarle (mínimo 10 caracteres)",
            "asunto_elegir"     => "Seleccione un asunto",
            "asunto_reservas"   => "Reservas y alquileres",
            "asunto_pagos"      => "Pagos y facturas",
            "asunto_cuenta"     => "Mi cuenta",
            "asunto_otro"       => "Otro",
            "btn_enviar"        => "Enviar consulta",

            
            "ok_enviada"        => "Consulta #%d recibida. Le responderemos al correo %s.",
            "err_nombre"        => "El nombre debe tener al menos 3 caracteres.",
            "err_correo"        => "El correo no tiene un formato válido.",
            "err_asunto"        => "Seleccione un asunto válido.",
            "err_mensaje"       => "El mensaje debe tener entre 10 y 500 caracteres.",
            "err_guardar"       => "No se pudo guardar la consulta. Intente de nuevo."
        ),

        // ------------------------------ ENGLISH ------------------------------
        "en" => array(
            "nav_otro"          => "More",
            "nav_soporte"       => "Online support",
            "nav_idioma"        => "Site language",
            "nav_modo_claro"    => "Light mode",
            "nav_modo_oscuro"   => "Dark mode",
            "footer_proyecto"   => "Web Environment Project",

            "soporte_titulo"    => "Online support",
            "soporte_intro"     => "Do you have a question about a booking, a payment or your account? Write to us and we will reply as soon as possible.",
            "soporte_form"      => "Send a message",
            "soporte_horario"   => "Support hours",
            "soporte_horario_1" => "Monday to Friday: 8:00 a.m. to 6:00 p.m.",
            "soporte_horario_2" => "Saturdays: 9:00 a.m. to 1:00 p.m.",
            "soporte_horario_3" => "Sundays and holidays: closed",
            "soporte_contacto"  => "Other ways to reach us",
            "soporte_telefono"  => "Phone",
            "soporte_correo"    => "Email",

            "campo_nombre"      => "Full name",
            "campo_correo"      => "Email address",
            "campo_asunto"      => "Subject",
            "campo_mensaje"     => "Message",
            "ph_nombre"         => "Enter your name",
            "ph_correo"         => "Enter your email",
            "ph_mensaje"        => "Tell us how we can help you (at least 10 characters)",
            "asunto_elegir"     => "Select a subject",
            "asunto_reservas"   => "Bookings and rentals",
            "asunto_pagos"      => "Payments and invoices",
            "asunto_cuenta"     => "My account",
            "asunto_otro"       => "Other",
            "btn_enviar"        => "Send message",

            "ok_enviada"        => "Message #%d received. We will reply to %s.",
            "err_nombre"        => "The name must have at least 3 characters.",
            "err_correo"        => "The email address is not valid.",
            "err_asunto"        => "Please select a valid subject.",
            "err_mensaje"       => "The message must be between 10 and 500 characters.",
            "err_guardar"       => "The message could not be saved. Please try again."
        )
    );
}
