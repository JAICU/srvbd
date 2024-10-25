<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS PACIENTE (  
      id_paciente INTEGER PRIMARY KEY,    
      nombre TEXT NOT NULL,                
      apellidoP TEXT NOT NULL,             
      apellidoM TEXT NOT NULL,             
      fecha_nacimiento TEXT NOT NULL,      
      telefono TEXT,                       
      usuario TEXT NOT NULL UNIQUE,        
      correo TEXT NOT NULL UNIQUE,         
      contrasena TEXT NOT NULL              
     )"
   );
  }

  return self::$pdo;
 }
}
