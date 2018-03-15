<?php
  require('conector.php');

  $con = new ConectorDB('localhost', 's_user', '2587913');

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion'] == "OK") {
    $consulta = $con->consultar(['usuarios'],
                                ['email','contrasena'],
                                'WHERE email = "'.$_POST['username'].'"');
    if ($consulta->num_rows>0) {
      $fila = $consulta->fetch_assoc();
      if (password_verify($_POST['password'], $fila['contrasena'])){
        session_start();
        $_SESSION['username']=$fila['email'];
        $response['msg'] = "OK";
      }else{
        $response['msg'] = "Usuario o Password incorrectas, intente de nuevo";
      }
    }else{
      $response['msg'] = "Usuario o password incorrectos, intente de nuevo";
    }
  }

  echo json_encode($response);

  $con->cerrarConexion();

 ?>
