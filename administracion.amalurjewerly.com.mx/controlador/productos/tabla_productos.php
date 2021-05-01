<?php 
 session_start();
 include '../consulSQL.php';
 ?>
   <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                     
                     
                      <th>P. Compra</th>
                      <th>P. Venta</th>
                      <th>Categoria</th>
                      <th>Fecha Creacion</th>
                      
                      <th>Imagen</th>
                      
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                     <th>P. Compra</th>
                      <th>P. Venta</th>
                      <th>Categoria</th>
                      <th>Fecha Creacion</th>
                      
                      <th>Imagen</th>
                      
                      <th>Opciones</th>
                    </tr>
                  </tfoot>
                 
                  <tbody>
                 <?php
                 $consul_productos=  ejecutarSQL::consultar("SELECT * FROM producto inner join categoria_prod on producto.id_categoria=categoria_prod.id_categoria");
                 while ($productos=mysqli_fetch_array($consul_productos)){
                 echo "<tr>
                      <td>".$productos['codigo']."</td>
                      <td>".$productos['nombre']."</td>
                      <td>".$productos['descripcion_prod']."</td>
                     <td>".$productos['precio_compra']."</td>
                     <td>".$productos['precio_venta']."</td>
                      <td>".$productos['nombre_categoria']."</td>
                      <td>".$productos['fecha_creacion']."</td>
                       <td><img src='img/img_productos/".$productos['codigo'].'/'.$productos['imagen']."' width='70' height='70'></td>";

                     
                     //Validamos el acceso para mostrar las opciones
                      echo "<td>";?>
                      <button class='btn btn-sm btn-warning' onclick="editar_producto(<?php echo $productos['id_producto'];?>);"><span class='fa fa-edit'></span></button>
                      <?php
                      echo "<button class='btn btn-sm btn-danger' onclick='eliminar_producto(".$productos['id_producto'].");'><span class='fa fa-times'></span></button>
                      </td>";                    echo "</tr>";
                 }

                 ?>
                   
             
                  </tbody>
                </table>