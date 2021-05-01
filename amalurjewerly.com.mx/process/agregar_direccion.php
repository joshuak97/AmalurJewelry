<?php
session_start();
include "../config/consulSQL.php";

$calle=$_POST['calle'];
$numero_ext=$_POST['numero_ext'];
$numero_int=$_POST['numero_int'];
$colonia=$_POST['colonia'];
$ciudad=$_POST['ciudad'];
$estado=$_POST['estado'];
$pais=$_POST['pais'];
$cp=$_POST['cp'];
$id_usuario=$_SESSION['id_usuario'];



if(consultasSQL::InsertSQL("direccion_envio", "calle,numero_ext,numero_int,colonia,ciudad,estado,pais,cp,id_usuario", "'$calle','$numero_ext','$numero_int','$colonia','$ciudad','$estado','$pais','$cp','$id_usuario'")){
    
   echo '<script> window.location.href="../datos_envio.php";</script>'; 

    }else{
    
   echo 'error';
    
    }	
	


?>