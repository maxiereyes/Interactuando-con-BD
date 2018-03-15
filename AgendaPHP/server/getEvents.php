<?php
  require('conector.php');

  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorDB('localhost', 's_evento', '22222');
    $response['conexion'] = $con->initConexion('agenda');
    if ($response['conexion'] == "OK") {
      $resultado = $con->consultar(['eventos'], ['*'], 'WHERE fk_usuario = "'.$_SESSION['username'].'"');
      $i = 0;
      while ($fila=$resultado->fetch_assoc()) {
        $response['eventos'][$i]['id'] = $fila['id'];
        $response['eventos'][$i]['title'] = $fila['titulo'];
        $response['eventos'][$i]['start'] = $fila['start'];
        $response['eventos'][$i]['end'] = $fila['end'];
        $i++;
      }
      $response['msg'] = "OK";
    }else{
      $response['msg'] = "No se pudo conectar a la base de datos";
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesion";
  }

  echo json_encode($response);

 ?>
