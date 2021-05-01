<?php
include('../consulSQL.php');

$consulta=ejecutarSQL::consultar("SELECT*FROM producto where id_producto=".$_POST['id_producto']);
    while($fila=mysqli_fetch_array($consulta)){
?>
<input type="hidden" name="id_producto" value="<?php echo $fila['id_producto'];?>" id="id_producto" required="">
<div class="form-group">
      <label>Codigo:</label>
      <input type="text" name="codigo" id="codigo" class="form-control" value="<?php echo $fila['codigo'];?>" placeholder="Codigo de producto" required="">
      </div> 

      <div class="form-group">
      <label>Nombre de producto:</label>
      <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="<?php echo $fila['nombre'];?>" placeholder="Nombre del producto" required="">
      </div> 
     
      <div class="form-group"> 
      <label>Descripcion</label>
      <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion del producto" required=""><?php echo $fila['descripcion_prod'];?></textarea> 
      </div> 
     
     <div class="form-group"> 
      <label>Precio de compra:</label>
      <input type="number" step="0.01" name="precio_compra" id="precio_compra" value="<?php echo $fila['precio_compra'];?>" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group"> 
      <label>Precio de venta:</label>
      <input type="number" step="0.01" name="precio_venta" id="precio_venta" value="<?php echo $fila['precio_venta'];?>" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group">
      <label>Categoria:</label>
      <select class="form-control" name="id_categoria"  id="id_categoria" required="">
 
      <?php 
 
  $consul_proveedores=  ejecutarSQL::consultar("SELECT * FROM categoria_prod WHERE id_categoria=".$fila['id_categoria']);
       while ($proveedores=mysqli_fetch_array($consul_proveedores)){
       echo '<option value="'.$proveedores['id_categoria'].'">'.$proveedores['nombre_categoria'].'</option>';
       }
 $consul_proveedores=  ejecutarSQL::consultar("SELECT * FROM categoria_prod WHERE id_categoria!=".$fila['id_categoria']);
       while ($proveedores=mysqli_fetch_array($consul_proveedores)){
       echo '<option value="'.$proveedores['id_categoria'].'">'.$proveedores['nombre_categoria'].'</option>';
       }

 ?>
      </select>
      </div>

       <div class="form-group">
      <label>Seccion:</label>
      <select class="form-control" name="seccion"  id="seccion" onchange="aplicar_descuento2(this);" required="">
 
      <?php 
 if ($fila['seccion']=="PRODUCTOS") {
  echo ' <option value="PRODUCTOS">PRODUCTOS</option>
      <option value="OFERTAS">OFERTAS</option>
      <option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="NUEVO">NUEVO</option>';     
 }else if($fila['seccion']=="OFERTAS") {

echo ' <option value="OFERTAS">OFERTAS</option>
<option value="PRODUCTOS">PRODUCTOS</option>      
      <option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="NUEVO">NUEVO</option>';

 }else if($fila['seccion']=="MAS VENDIDO"){

echo '<option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="PRODUCTOS">PRODUCTOS</option>
      <option value="OFERTAS">OFERTAS</option> 
      <option value="NUEVO">NUEVO</option>';

 }else if($fila['seccion']=="NUEVO"){

echo '<option value="NUEVO">NUEVO</option>
      <option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="PRODUCTOS">PRODUCTOS</option>
      <option value="OFERTAS">OFERTAS</option>';

 }


      
      

 ?>
      </select>
      </div>

      <div id="descuento2" class="form-group"> 
     
      <input type="hidden" name="descuento" value="0">
      </div>

      <div class="form-group"> 
      <label>Imagen:</label>
      <input type="file" name="img" class="form-control" >
      </div>

      <?php
       
    }
?>

