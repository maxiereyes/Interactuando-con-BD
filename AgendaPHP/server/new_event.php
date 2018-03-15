<?php

  require('conector.php');

  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorDB('localhost', 'c_evento', '44444');
    $response['conexion'] = $con->initConexion('agenda');
    if ($response['conexion'] == "OK") {
      $data['id'] = rand(0, 999999999);
      $data['titulo'] = '"'.$_POST['titulo'].'"';
      $data['start'] = '"'.$_POST['start_date'] . " " .$_POST['start_hour'].':00"';
      $data['end'] = '"'.$_POST['end_date'] . " " .$_POST['end_hour'].':00"';
      $data['dia_completo'] = $_POST['allDay'];
      $data['fk_usuario'] = '"'.$_SESSION['username'].'"';
      if ($resultado=$con->insertData('eventos', $data)) {
        $response['msg'] = "OK";
      }else{
        $response['msg'] = $con->mysqli_state();
      }
    }else{
      $response['msg'] = "No se pudo conectar a la base de datos";
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesion";
  }

  echo json_encode($response);


 ?>
