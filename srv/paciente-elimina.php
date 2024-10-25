<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/delete.php";
require_once __DIR__ . "/../lib/php/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PACIENTE.php";  // Cambiado de TABLA_PASATIEMPO a TABLA_PACIENTE

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");  // Recupera el ID del paciente
    delete(pdo: Bd::pdo(), from: PACIENTE, where: [PAC_ID => $id]);  // Cambiado de PASATIEMPO a PACIENTE
    devuelveNoContent();
});

