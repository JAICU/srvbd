<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PACIENTE.php";  // Cambiado de TABLA_PASATIEMPO a TABLA_PACIENTE

ejecutaServicio(function () {

    $id = recuperaIdEntero("id");
    $nombre = recuperaTexto("nombre");
    $apellidoP = recuperaTexto("apellidoP");  // Agregado para recuperar apellido paterno
    $apellidoM = recuperaTexto("apellidoM");  // Agregado para recuperar apellido materno
    $fechaNacimiento = recuperaTexto("fecha_nacimiento");  // Agregado para recuperar fecha de nacimiento
    $telefono = recuperaTexto("telefono");  // Agregado para recuperar teléfono
    $usuario = recuperaTexto("usuario");  // Agregado para recuperar usuario
    $correo = recuperaTexto("correo");  // Agregado para recuperar correo
    $contrasena = recuperaTexto("contrasena");  // Agregado para recuperar contraseña

    $nombre = validaNombre($nombre);
    // Aquí puedes agregar más validaciones si es necesario para los otros campos

    update(
        pdo: Bd::pdo(),
        table: PACIENTE,  // Cambiado de PASATIEMPO a PACIENTE
        set: [
            PAC_NOMBRE => $nombre,
            PAC_APELLIDO_P => $apellidoP,    // Actualización de apellido paterno
            PAC_APELLIDO_M => $apellidoM,    // Actualización de apellido materno
            PAC_FECHA_NACIMIENTO => $fechaNacimiento, // Actualización de fecha de nacimiento
            PAC_TELEFONO => $telefono,        // Actualización de teléfono
            PAC_USUARIO => $usuario,          // Actualización de usuario
            PAC_CORREO => $correo,            // Actualización de correo
            PAC_CONTRASENA => $contrasena     // Actualización de contraseña
        ],
        where: [PAC_ID => $id]  // Cambiado de PAS_ID a PAC_ID
    );

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "apellidoP" => ["value" => $apellidoP],  // Agregado para incluir apellido paterno en la respuesta
        "apellidoM" => ["value" => $apellidoM],  // Agregado para incluir apellido materno en la respuesta
        "fecha_nacimiento" => ["value" => $fechaNacimiento], // Agregado para incluir fecha de nacimiento en la respuesta
        "telefono" => ["value" => $telefono],      // Agregado para incluir teléfono en la respuesta
        "usuario" => ["value" => $usuario],        // Agregado para incluir usuario en la respuesta
        "correo" => ["value" => $correo]           // Agregado para incluir correo en la respuesta
    ]);
});

