<!--INTEGRANTES: 
- ERIKA DEL NEGRO
- GISELLE GIUDICE -->

<?php
    session_start();
    include("db.php");
   
    //recibir los datos y almacenarlos en variables
    $id = intval($_POST['id']);
    
    $nombre = $_POST['nombre_contacto'];
    $apellido = $_POST['apellido_contacto'];
    $cel_tel = $_POST['cel_tel'];
    $email = $_POST['email'];
    $comentario = $_POST['comentario'];
    $dni = $_POST['dni'];


    if($id == 0) // INSERTAR
    {
    //consulta para insertar
    $query = "  INSERT INTO CONTACTOS(NOMBRE, APELLIDO, CEL_TEL, EMAIL, COMENTARIO, DNI) 
    VALUES ('$nombre', '$apellido', '$cel_tel', '$email' ,'$comentario', '$dni')";
    }
    else // UPDATE
    {
      $query = "  UPDATE CONTACTOS SET  NOMBRE='" .$nombre ."', APELLIDO='" .$apellido ."', CEL_TEL='" .$cel_tel . "', EMAIL='" .$email ."', COMENTARIO='" .$comentario ."', DNI='" .$dni ."'  WHERE ID='" .$id ."'";

      echo $query;
    }

    //Ejecutar consulta
    if ($con->query($query) === TRUE) {
        //almacenamos
        $_SESSION['message'] = "Contacto guardado satisfactoriamente" ;
        $_SESSION['message_type'] = 'success';
        
      } else {
        $errormsg = "Error: " . $query . "<br>" . $con->error;
        //almacenamos
        $_SESSION['message'] = $errormsg;
        $_SESSION['message_type'] = 'danger';
        
      }   

    //Cerrar conexion
    $con->close();
     
    //readirecciona
    header("location: index.php");
    
     



?>

