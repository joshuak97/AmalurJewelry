<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           <div class="card-header py-3 form-inline">
              <div class="col-md-10"></div><div class="col-md-2"><!--<a class="btn btn-success float-right d-none d-sm-none d-md-block" style="color: white; text-align: right;" data-toggle="modal" data-target="#modal_agregar_categoria"><i class="fa fa-plus"></i>  Nuevo categoria</a>-->
              <a class="btn btn-success btn-circle float-right d-block d-sm-block d-md-none" style="color: white; text-align: right;"><i class="fa fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body">
              <div id="res-form-eliminar-categoria">
                <?php
                if (isset($_GET['alert'])) {
                  switch ($_GET['alert']) {
                    case 1:
                      echo "<br><div class='alert alert-danger alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <div class='text-center'><h5>  <i class='fa-window-close-o'></i>No se puede eliminar.</h5></div>
                      <p class='text-center'>Existen productos registrados de esta categoria.</p>
                      </div>";
                      break;
                      case 2:
                      echo "<br><div class='alert alert-primary alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <div class='text-center'><h5>  <i class='fa-window-close-o'></i>La categoria ha sido eliminada.</h5></div>
                    
                      </div>";
                      break;

                      case 3:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h5></div>
                       <p class='text-center'>Error al eliminar, por favor intente de nuevo.</p>
                       </div>";
                      break;
                    
                    default:
                      
                      break;
                  }
                }
                ?>
              </div>
              <div class="table-responsive" >

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 
                  <thead>
                    <th>N°</th>
                    <th>Folio</th>
                     <th>Cliente</th>
                    <th>Contacto</th>
                     <th>Direccion</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Estatus</th>
                    <th>Detalles</th>
                 </thead>
                  <tfoot>
                   <th>N°</th>
                    <th>Folio</th>
                     <th>Cliente</th>
                    <th>Contacto</th>
                     <th>Direccion</th>
                      <th>Fecha</th>
                       <th>Total</th>
                      <th>Estatus</th>
                    <th>Detalles</th>
                 </tfoot>
                  
                  <tbody>
                    <?php
                    $count=1;
                 $consul_categorias=  ejecutarSQL::consultar("SELECT * FROM pedidos inner join direccion_envio on pedidos.id_direccion=direccion_envio.id_direccion inner join usuario on pedidos.id_usuario=usuario.id_usuario order by id_pedido desc");
                 while ($categorias=mysqli_fetch_array($consul_categorias)){
                     if($categorias['numero_int']>0){
              $int=" No. int ".$categorias['numero_int']." ";  
              }else{
            $int="";      
              }
                 echo "<tr>
                 <td>".$count."</td>
                 <td>".$categorias['folio_pedido']."</td>
                  <td>".$categorias['nombre']." ".$categorias['apellido']."</td>
                  <td>".$categorias['telefono']."</td>
                  <td>".$categorias['calle']." No Exterior ".$categorias['numero_ext']." ".$int." ".$categorias['colonia']." ".$categorias['ciudad']." ".$categorias['estado']." ".$categorias['pais']." ".$categorias['cp']."</td>
                  <td>".$categorias['fecha_pedido']."</td>
                  <td>$".$categorias['total_pedido']."</td>
                  <td>".$categorias['status']."</td><td>
                  ";
                 $count++;
                 ?>
                  <button class='btn btn-sm btn-warning' onclick="detalles_pedido(<?php echo $categorias['id_pedido'];?>);"><span class='fa fa-list'></span></button>

                 <?php
                 echo "</td>
                 </tr>";
                 }
                 ?> 
                  </tbody>
                  

                </table>
              </div>
            </div>
          </div>

        </div>
       

<!--*************************************************MODAL DETALLES PEDIDO**************************************************-->


<div class="modal fade" id="modal_detalles_pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 

     
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles de pedido</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
     
      <div class="modal-body" id="tabla_detalles_pedido"><!--Begin body-->
      
     
          
      </div><!--End body-->
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       

      </div>
  
      
    </div>
    
  </div>
</div>


