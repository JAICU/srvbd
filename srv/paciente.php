
<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PACIENTE.php";  // Cambiado de TABLA_PASATIEMPO a TABLA_PACIENTE

ejecutaServicio(function () {

    $id = recuperaIdEntero("id");

    $modelo = selectFirst(pdo: Bd::pdo(), from: PACIENTE, where: [PAC_ID => $id]);  // Cambiado de PASATIEMPO a PACIENTE

    if ($modelo === false) {
        $idHtml = htmlentities($id);
        throw new ProblemDetails(
            status: NOT_FOUND,
            title: "Paciente no encontrado.",
            type: "/error/pacientenoencontrado.html",  // Cambiado a un título más relevante
            detail: "No se encontró ningún paciente con el id $idHtml."
        );
    }

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $modelo[PAC_NOMBRE]],  // Cambiado de PAS_NOMBRE a PAC_NOMBRE
        "apellidoP" => ["value" => $modelo[PAC_APELLIDO_P]],  // Agregado para incluir apellido paterno
        "apellidoM" => ["value" => $modelo[PAC_APELLIDO_M]],  // Agregado para incluir apellido materno
        "fecha_nacimiento" => ["value" => $modelo[PAC_FECHA_NACIMIENTO]],  // Agregado para incluir fecha de nacimiento
        "telefono" => ["value" => $modelo[PAC_TELEFONO]],  // Agregado para incluir teléfono
        "usuario" => ["value" => $modelo[PAC_USUARIO]],  // Agregado para incluir usuario
        "correo" => ["value" => $modelo[PAC_CORREO]],  // Agregado para incluir correo
    ]);
});

