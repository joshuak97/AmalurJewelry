<?php 
 session_start();
 include '../consulSQL.php';
 $consul_pedido=  ejecutarSQL::consultar("SELECT * FROM pedidos where id_pedido=".$_POST['id_pedido']);
 $pedido=mysqli_fetch_array($consul_pedido);
 ?>
   <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  
  <div class="form-group text-center">
      <h2>Folio: <?php echo $pedido['folio_pedido'];?></h2>
  </div>
  
 <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
                  <thead>
                   <tr>
                      <th>Codigo</th>
                      <th>Producto</th>
                     <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Producto</th>
                     <th>Cantidad</th>
                    </tr>
                  </tfoot>
                 
                  <tbody>
                 <?php
                 $consul_productos=  ejecutarSQL::consultar("SELECT * FROM producto inner join pedido_producto on producto.id_producto=pedido_producto.id_producto where id_pedido=".$_POST['id_pedido']);
                 while ($productos=mysqli_fetch_array($consul_productos)){
                 echo "<tr>
                      <td>".$productos['codigo']."</td>
                      <td>".$productos['nombre']."</td>
                      <td>".$productos['cantidad']."</td>
                     
                    </tr>";
                 }

                 ?>
                   
             
                  </tbody>
                </table>