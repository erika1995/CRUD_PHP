<!--INTEGRANTES: 
- ERIKA DEL NEGRO
- GISELLE GIUDICE -->

<?php
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        include("db.php");

        //consulta a base de datos
        $query = "DELETE FROM contactos WHERE ID = $id"; // solo elimina las tareas que sea igual al id que le pasa por el metodo get

        //Ejecutar
        if($con->query($query) === TRUE){
            //almacenamos
            $_SESSION['message'] = 'Contacto eliminado satisfactoriamente';
            $_SESSION['message_type'] = 'danger';
           
        }else{
            $errormsg = "Error: " . $query . "<br>" . $con->error;
            //almacenamos
            $_SESSION['message'] = $errormsg;
            $_SESSION['message_type'] = 'alert';
        }   
        
        //Cerrar conexion
        $con->close();

        header("Location: index.php");
    }
?>