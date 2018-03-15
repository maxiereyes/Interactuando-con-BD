<?php

  require('conector.php');

  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorDB('localhost', 'u_evento', '888');
    $response['conexion'] = $con->initConexion('agenda');
    if ($response['conexion'] == "OK") {
      $data['start'] = '"'.$_POST['start_date']." ".$_POST['start_hour'].'"';
      $data['end'] = '"'.$_POST['end_date']." ".$_POST['end_hour'].'"';
      if ($con->actualizarData('eventos', $data, "id = ".$_POST['id'])) {
        $response['msg'] = "OK";
      }else{
        $response['msg'] = "Error al actualizar registro";
      }
    }else{
      $response['msg'] = "No se pudo conectar a la base de datos";
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesion";
  }

  echo json_encode($response);


 ?>
