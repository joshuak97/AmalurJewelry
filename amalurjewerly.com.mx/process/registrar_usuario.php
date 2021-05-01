<?php
session_start();
sleep(2);

include '../config/consulSQL.php';
ini_set('date.timezone','America/Mexico_City');


if($_POST['password']==$_POST['confirm-password']){
$user=$_POST['user'];
                    $nombre=$_POST['nombre'];
                    $apellido=$_POST['apellido'];
                    $correo=$_POST['correo'];
                    $password=md5($_POST['password']);
                    $fecha_creacion='NOW()';
                    $telefono=$_POST['telefono'];
                    $id_tipousu=2;
  
    $verUser=ejecutarSQL::consultar("select * from usuario where user='$user'");
    $UserC=mysqli_num_rows($verUser);
    if($UserC<=0){
        $verUser2=ejecutarSQL::consultar("select * from usuario where correo='$correo'");
    $UserC2=mysqli_num_rows($verUser2);
        if($UserC2<=0){
       
       
    
          if(consultasSQL::InsertSQL("usuario","user,nombre,apellido,correo,password,fecha_creacion,telefono,id_tipousu", "'$user','$nombre','$apellido','$correo','$password',$fecha_creacion,'$telefono','$id_tipousu'")){
    
  echo "<br><div class='alert alert-success alert-dismissable'>
        
        <div class='text-center'><h4 style='color:green;'>  <i class='fa-window-close-o'></i>Exito</h4></div>
      Se ha registrado con correctamente.
        </div>";  

    }else{
    
    echo "<br><div class='alert alert-danger alert-dismissable'>
        
        <div class='text-center'><h4 style='color:red;'>  <i class='fa-window-close-o'></i> Error!!</h4></div>
       Ocurrio un error al registrar la informacion.
        </div>";
    
    }	
    }else{
       echo "<br><div class='alert alert-danger alert-dismissable'>
        
        <div class='text-center'><h4 style='color:red;'>  <i class='fa-window-close-o'></i> Error!!</h4></div>
       Ya existe un usuario registrado con este correo
        </div>";  
    }
    }else{
        echo "<br><div class='alert alert-danger alert-dismissable'>
        
        <div class='text-center'><h4 style='color:red;'>  <i class='fa-window-close-o'></i> Error!!</h4></div>
       Ya existe un usuario registrado con este nombre de usuario
        </div>"; 
    }
}else{
echo "<br><div class='alert alert-danger alert-dismissable'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4>  <i class='icon fa-window-close-o'></i> Error!!</h4>
Las contraseñas no coinciden.
</div>";    

}
?>