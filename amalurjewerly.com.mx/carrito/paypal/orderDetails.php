<?php

session_start();
include '../../config/consulSQL.php';
ini_set('date.timezone','America/Mexico_City');

$id_direccion=$_GET['direccion'];
$id_usuario=$_SESSION['id_usuario'];
$total_pedido=$_SESSION['sumaTotal'];
$nombre_cliente=$_SESSION['nombre'];
$correo=$_SESSION['email'];
$estado="PAGADO";
$fecha_pedido='NOW()';
$folio_pedido=substr(date('YmdHis',time()), 2);
$validar=0;

if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
    
        $paymentID = $_GET['paymentID'];
        $payerID = $_GET['payerID'];
        $token = $_GET['token'];
        $pid = $_GET['pid'];   
        
     
if(consultasSQL::InsertSQL("pedidos", "id_direccion,id_usuario,total_pedido,status,fecha_pedido,folio_pedido", "'$id_direccion','$id_usuario','$total_pedido','$estado',$fecha_pedido,'$folio_pedido'")){
        
        $consultaP=ejecutarSQL::consultar("select * from pedidos where id_usuario=".$_SESSION['id_usuario']." order by id_pedido desc limit 1");
        $pedido=mysqli_fetch_array($consultaP);
        $id_pedido=$pedido['id_pedido'];
        for($i=0;$i<$_SESSION['contadorProducto'];$i++){
            $consulta=ejecutarSQL::consultar("select * from producto where id_producto=".$_SESSION['tablaProducto'][$i]); 
            $prod=mysqli_fetch_array($consulta);
            $id_producto=$_SESSION['tablaProducto'][$i];
            $cantidad=$_SESSION['cantidad'][$i];
            $precio_costo=$prod['precio_costo'];
            $precio_venta=$prod['precio_venta'];
            $nueva_existencia=$prod['existencia']-$_SESSION['cantidad'][$i];
            if(consultasSQL::InsertSQL("pedido_producto", "id_producto,id_pedido,cantidad,precio_venta,precio_costo", "'$id_producto','$id_pedido','$cantidad','$precio_venta','$precio_compra'")){
                
                consultasSQL::UpdateSQL("producto", "existencia='$nueva_existencia'", "id_producto='".$_SESSION['tablaProducto'][$i]."'"); 
            }else{
            $validar=1;
                
            }
        }
        if(validar==0){
            $_SESSION['cantidad']=array();
            $_SESSION['tablaProducto']=array();
            $_SESSION['contadorProducto']=0;
        echo '<script>window.location.href="../../detalles_orden.php?id_pedido='.$id_pedido.'";</script>';
        }else{
        echo ' <div class="alert alert-danger">
          <strong>Error</strong> Error al capturar pedido, favor de contactar a soporte.
        </div>';    
        }
}else{
    echo 'error al registrar el producto';
}
    } else {
        echo 'error al procesar el pago';
    }