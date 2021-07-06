<!--INTEGRANTES: 
- ERIKA DEL NEGRO
- GISELLE GIUDICE -->

<?php
    include("db.php");
    include("Includes/header.php");
    session_start();
    $valmessage = '';
    $valtype = '';
    if(isset($_SESSION['message'])) { 

        $valmessage=$_SESSION['message'];
        $valtype=$_SESSION['message_type'];
        
    }
    $id = 0;
    $nombre = "";
    $apellido = "";
    $cel_tel = "";
    $email = "";
    $comentario = "";
    $dni = "";

    if(isset($_GET['id']) && $_GET['action'] = "edit"){
      
        $id = $_GET['id'];
        $query = "SELECT * FROM contactos WHERE id= $id";
        $resultado = mysqli_query($con, $query);

        //si existe puede actualizar
        if(mysqli_num_rows($resultado) == 1){

           $row = mysqli_fetch_array($resultado);
           $nombre = $row['NOMBRE'];
           $apellido = $row['APELLIDO'];
           $cel_tel = $row['CEL_TEL'];
           $email = $row['EMAIL'];
           $comentario = $row['COMENTARIO'];
           $dni = $row['DNI'];
           
        } 

    }

?>

<div class="container p-4">

    <div class="row">
    
       <div class="col-md-4">
       
            <?php 
        
            if($valmessage != "") { ?>
                
                <div style='color: black' class="alert alert-<?php echo $valtype ?> alert-dismissible fade show" role="alert">
                <?php echo $valmessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" 
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php }   ?>

            <div class="card card-body">

                <form action="save_contact.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $id ?>"/>

                    <div class="form-group">
                        
                        <input type="text" name="nombre_contacto" class="form-control" value="<?php echo $nombre ?>"
                        placeholder="Nombre" autofocus>
                        
                    </div>

                    <br>

                    <div class="form-group">
                    
                        <input type="text" name="apellido_contacto" value="<?php echo $apellido ?>" class="form-control"
                        placeholder="Apellido">
                    
                    </div>

                    <br>

                    <div class="form-group">
                    
                        <input type="number" name="cel_tel" value="<?php echo $cel_tel ?>" class="form-control"
                        placeholder="Celular/Tel">
                    
                    </div>
                    
                    <br>

                    <div class="form-group">
                    
                        <input type="Email" name="email" value="<?php echo $email ?>" class="form-control" 
                        placeholder="Email">
                    
                    </div>

                    <br>

                    <div class="form-gorup">

                        <input type="number" name="dni" value="<?php echo $dni ?>" class="form-control"
                        placeholder="DNI">

                    </div>

                    <br>

                    <div class="form-group">
                    
                        <textarea name="comentario"   class="form-control"
                        placeholder="Comentario"><?php echo $comentario ?></textarea>
                    
                    </div>

                    <br>

                        <input type="submit" class="btn btn-success btn-block"
                        name="Guardar Contacto" value="Guardar Contacto"
                        class="rounded-pill">    

                </form>
            
            </div>

       </div>

       <div class="col-md-8">
            <table class="table table-bordered">
                    
                    <thead>
                    
                        <tr>
                        
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cel_Tel</th>
                            <th>Email</th>
                            <th>Comentario</th>
                            <th>DNI</th>
                            <th>Creado</th>
                            <th>Acciones </th>
                    
                        </tr>

                    </thead>
                
                    <tbody>
                    
                        <?php 
                         
    
                        $query = "SELECT * FROM contactos";
                        $resultado= mysqli_query($con, $query);
                    
                        while($row = mysqli_fetch_array($resultado)){ ?>

                            <tr>

                                <td> <?php echo $row ['NOMBRE']?></td>
                                <td> <?php echo $row ['APELLIDO']?></td>
                                <td> <?php echo $row ['CEL_TEL']?></td>
                                <td> <?php echo $row ['EMAIL']?></td>
                                <td> <?php echo $row ['COMENTARIO']?></td>
                                <td><?php echo $row['DNI']?></td>
                                <td ><?php echo $row['FECHA_CREACION']?></td>
                                
                                <td>
                                
                                    <a href="index.php?action=edit&id=<?php echo $row['ID']?>" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <!--Doble espacio para los íconos-->
                                    &nbsp;
                                
                                    <a href="delete.php?id=<?php echo $row['ID']?>" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                
                                </td>


                            </tr>

                        <?php } ?>

                    </tbody>

                </table>
    
         </div>
    </div>


</div>

<?php  session_unset(); echo "a"  ?>

<?php include("includes/footer.php")?>



