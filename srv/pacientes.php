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
  $render .=
   "<li>
     <p>
      <a href='modifica.html?id=$id'>$nombre</a>
     </p>
    </li>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
