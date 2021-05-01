<?php
if($_POST['valor']=='OFERTAS'){
echo "<label>Introduzca un porcentaje (%):</label>";
  echo '<input type="number" name="descuento" step="0.01" class="form-control">';  
}else{
   echo '<input type="hidden" name="descuento" value="0">'; 
}
?>