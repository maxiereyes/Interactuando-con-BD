<?php
require('conector.php');

$con = new ConectorDB('localhost', 'c_user', '123456789');

if ($con->initConexion('agenda')=="OK") {
  $datos['email'] = "mreyes@gmail.com";
  $datos['nombre'] = "Maximiliano Reyes";
  $datos['contrasena'] = password_hash('123456', PASSWORD_DEFAULT);
  $datos['fecha_nacimiento'] = "1988-11-07";
  if ($con->insertarData('usuarios', $datos)) {
    $datos['email'] = "carlos_gomez@gmail.com";
    $datos['nombre'] = "Carlos Gomez";
    $datos['contrasena'] = password_hash('42681379', PASSWORD_DEFAULT);
    $datos['fecha_nacimiento'] = "1970-03-03";
    if ($con->insertarData('usuarios', $datos)) {
      $datos['email'] = "gloria_m@gmail.com";
      $datos['nombre'] = "Gloria Miralles";
      $datos['contrasena'] = password_hash('147258369', PASSWORD_DEFAULT);
      $datos['fecha_nacimiento'] = "1986-03-10";
      if ($con->insertarData('usuarios', $datos)) {
        echo "Se insertaron correctamente los registros de usuarios";
      }else{
        echo "Se ha producido un error al insertar el registro: " + toString($datos['nombre']);
      }
    }else{
      echo "Se ha producido un error al insertar el registro: " + toString($datos['nombre']);
    }
  }else{
    echo "Se ha producido un error al insertar el registro: " + toString($datos['nombre']);
  }
  $con->cerrarConexion();
}else{
  echo "Se presento un error en la conexion";
}

 ?>
