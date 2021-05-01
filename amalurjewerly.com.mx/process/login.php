<?php
session_start();
sleep(2);

include '../config/consulSQL.php';
ini_set('date.timezone','America/Mexico_City');


if(!$_POST['user']=="" &&  !$_POST['password']==""){
    $nombre=$_POST['user'];
    $clave=md5($_POST['password']);
    $verUser=ejecutarSQL::consultar("select * from usuario where (user='$nombre' or correo='$nombre') and password='$clave'");
    $UserC=mysqli_num_rows($verUser);
    if($UserC>0){
        $acceso=mysqli_fetch_array($verUser);
        $_SESSION['nombre_completo']=$acceso['nombre']." ".$acceso['apellido'];
       
        $_SESSION['user']=$acceso['user'];
        
        $_SESSION['id_usuario']=$acceso['id_usuario'];
    
    if(isset($_GET['shop'])){
        
        echo '<script> window.location.href="datos_envio.php";</script>';
    }else{
    echo '<script> window.location.href="index.php";</script>';    
    }
    }else{
        echo "<br><div class='alert alert-danger alert-dismissable'>
        
        <div class='text-center'><h4 style='color:red;'>  <i class='fa-window-close-o'></i> Error!!</h4></div>
        Usuario o contraseña incorrectos, verifique su informacion.
        </div>"; 
    }
}else{
echo "<br><div class='alert alert-danger alert-dismissable'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4>  <i class='icon fa-window-close-o'></i> Error!!</h4>
Los campos no deben estar vacios.
</div>";    

}
?>