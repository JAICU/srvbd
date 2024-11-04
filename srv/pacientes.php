<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PACIENTE.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: PACIENTE,  orderBy: PAC_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[PAC_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[PAC_NOMBRE]);
  $apellidoP = htmlentities($modelo[PAC_APELLIDO_P]);
  $apellidoM = htmlentities($modelo[PAC_APELLIDO_M]);
  $fechaNacimiento = htmlentities($modelo[PAC_FECHA_NACIMIENTO]);
  $telefono = htmlentities($modelo[PAC_TELEFONO]);
  $usuario = htmlentities($modelo[PAC_USUARIO]);
  $correo = htmlentities($modelo[PAC_CORREO]);


  $render .="
   <dt><a href='modifica.html?id=$id'>$nombre $apellidoP $apellidoM</a></dt>
        <dd>Fecha de nacimiento: $fechaNacimiento | Teléfono: $telefono | Usuario: $usuario | Correo: $correo</dd>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
