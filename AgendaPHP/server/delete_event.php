<?php

  require('conector.php');

  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorDB('localhost', 'd_evento', '55555');
    $response['conexion'] = $con->initConexion('agenda');
    if ($response['conexion'] == "OK") {
      if ($con->deleteData('eventos', "id = ".$_POST['id'])) {
        $response['msg'] = "OK";
      }else{
        $response['msg'] = "Error al eliminar registro";
      }
    }else{
      $response['msg'] = "No se pudo conectar a la base de datos";
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesion";
  }

  echo json_encode($response);


 ?>
