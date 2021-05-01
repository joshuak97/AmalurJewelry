<?php
$_SESSION['contadorProducto']=0;
$_SESSION['cantidad']=array();
$_SESSION['precio_costo']=array();
$_SESSION['tablaProducto']=array();

?>
 <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
  </script>
<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">PRODUCTOS</h1>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           <div class="card-header py-3 form-inline">
            <!--Botones visibles en escritorio-->
             <div class="col-md-4 d-none d-sm-none d-md-block"></div>
             <div class="col-md-8 d-none d-sm-none d-md-block">
         
             
              
              <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_agregar_entradas">Nueva entrada de productos</a>
                      <a class="dropdown-item" href="home.php?modulo=entradas_producto">Ver todas las entradas</a>
                     
                    </div>
                                   <a class="btn btn-info float-right dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" style="color: white;margin: 1%"><i class="fa fa-truck"></i>  Entradas de productos</a>
              <a class="btn btn-primary float-right" data-toggle="modal" data-target="#modal_agregar_set" style="color: white;margin: 1%"><i class="fa fa-plus"></i>Agregar Sets</a>
              
              <a class="btn btn-success float-right" data-toggle="modal" data-target="#modal_agregar_producto" style="color: white;margin: 1%"><i class="fa fa-plus"></i>  Nuevo producto</a>
              </div>
              <!--Botones visibles en movil-->
              <div class="col-md-12 d-block d-sm-block d-md-none text-center">
              <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#modal_agregar_producto" style="color: white; margin: 1%;"><i class="fa fa-plus"></i></a>
            
             
           
              </div>
           
            </div>
            <div class="card-body">
               <div id="res-form-eliminar-producto">
                <?php
                if (isset($_GET['alert'])){
                  switch ($_GET['alert']) {
                    case 1:
                      echo "<br><div class='alert alert-danger alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <div class='text-center'><h5>  <i class='fa-window-close-o'></i>No se puede eliminar.</h5></div>
                      <p class='text-center'>Existen entradas o salidas registradas de este producto.</p>";
                      break;
                      case 2:
                      echo "<br><div class='alert alert-primary alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <div class='text-center'><h5>  <i class='fa-window-close-o'></i>El producto ha sido eliminado.</h5></div>
                    
                      </div>";
                      break;

                      case 3:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h5></div>
                       <p class='text-center'>Error al eliminar, por favor intente de nuevo.</p>
                       </div>";
                      break;

                       case 4:
                       echo "<br><div class='alert alert-success alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Correcto.</h5></div>
                       <p class='text-center'>Se ha registrado un nuevo producto con exito.</p>
                       </div>";
                      break;
                       case 5:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Error.</h5></div>
                       <p class='text-center'>Este producto ya se encuentra registrado.</p>
                       </div>";
                      break;
                       case 6:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h5></div>
                       <p class='text-center'>Debe cargar una imagen del producto.</p>
                       </div>";
                      break;
                       case 7:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h5></div>
                       <p class='text-center'>Error al cargar la imagen del producto, favor de intentarlo nuevamente.</p>
                       </div>";
                      break;

                      case 8:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>Ha ocurrido un error.</h5></div>
                       <p class='text-center'>Solo se admiten imagenes en formato jpg o png.</p>
                       </div>";
                      break;
                      
                      

                      case 9:
                       echo "<br><div class='alert alert-success alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>¡Correcto!.</h5></div>
                       <p class='text-center'>La informacion se ha actualizado.</p>
                       </div>";
                      break;

                      case 10:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>¡Error!.</h5></div>
                       <p class='text-center'>Ha ocurrido un error, Favor de intentarlo de nuevo.</p>
                       </div>";
                      break;
                    
                    case 11:
                       echo "<br><div class='alert alert-danger alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <div class='text-center'><h5>  <i class='fa-window-close-o'></i>¡Error!.</h5></div>
                       <p class='text-center'>No se puede crear el directorio.</p>
                       </div>";
                    default:
                      
                      break;
                  }
                }
                ?>
              </div>
              <div class="table-responsive" id="tabla_productos">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                     
                     
                      <th>P. Compra</th>
                      <th>P. Venta</th>
                      <th>Categoria</th>
                      <th>Existencia</th>
                      <th>Fecha Creacion</th>
                      <th>Seccion</th>
                      <th>Descuento</th>
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
                      <th>Existencia</th>
                      <th>Fecha Creacion</th>
                      <th>Seccion</th>
                      <th>Descuento</th>
                      <th>Imagen</th>
                      
                      <th>Opciones</th>
                    </tr>
                  </tfoot>
                 
                  <tbody>
                 <?php
                 $consul_productos=  ejecutarSQL::consultar("SELECT * FROM producto inner join categoria_prod on producto.id_categoria=categoria_prod.id_categoria");
                 while ($productos=mysqli_fetch_array($consul_productos)){
                     $imagen=explode(',',$productos['imagen']);
                 echo "<tr>
                      <td>".$productos['codigo']."</td>
                      <td>".$productos['nombre']."</td>
                      <td>".$productos['descripcion_prod']."</td>
                     <td>".$productos['precio_compra']."</td>
                     <td>".$productos['precio_venta']."</td>
                      <td>".$productos['nombre_categoria']."</td>
                      <td>".$productos['existencia']."</td>
                      <td>".$productos['fecha_creacion']."</td>
                      <td>".$productos['seccion']."</td>
                      <td>".$productos['descuento']."% </td>
                       <td><img src='img/img_productos/".$productos['codigo']."/".$imagen[0]."' width='70' height='70'></td>";

                     
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
              </div>
              <div id="#res-venta"></div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


<!--********************************** MODAL AGREGAR PRODUCTO *********************************************************** -->

<div class="modal fade" id="modal_agregar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 

     <form action="controlador/productos/agregar_producto.php" method="post" id="form_agregar_producto" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
     
      <div class="modal-body"><!--Begin body-->
      
      <div class="form-group">
      <label>Codigo:</label>
      <input type="text" name="codigo"  class="form-control" placeholder="Codigo del producto" required="">
      </div> 

      <div class="form-group">
      <label>Nombre:</label>
      <input type="text" name="nombre_producto"  class="form-control" placeholder="Nombre del producto" required="">
      </div> 
      
      <div class="form-group"> 
      <label>Descripcion</label>
      <textarea type="text" name="descripcion" class="form-control" placeholder="Descripcion del producto" required=""></textarea> 
      </div> 
      
     
     <div class="form-group"> 
      <label>Precio de compra:</label>
      <input type="number" step="0.01" name="precio_compra" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group"> 
      <label>Precio de venta:</label>
      <input type="number" step="0.01" name="precio_venta" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group">
      <label>Categoria:</label>
      <select class="form-control" name="id_categoria"  required="">
      <option selected="" value="">Seleccione una opción</option>
      <?php
       $consul_proveedores=  ejecutarSQL::consultar("SELECT * FROM categoria_prod");
       while ($proveedores=mysqli_fetch_array($consul_proveedores)){
       echo '<option value="'.$proveedores['id_categoria'].'">'.$proveedores['nombre_categoria'].'</option>';
       }
      ?>
      </select>
      </div>
      
      <div class="form-group"> 
      <label>Existencia</label>
      <input type="number" name="existencia" class="form-control" placeholder="0" required="">
      </div>
      
     <!-- <div class="form-group"> 
      <label>Enlace</label>
      <input type="text" name="link" class="form-control" required="">
      </div>-->

       <div class="form-group">
      <label>Seccion:</label>
      <select class="form-control" name="seccion"   onchange="aplicar_descuento(this);" required="">
      <option selected="" value="">Seleccione una opción</option>
      <option value="PRODUCTOS">PRODUCTOS</option>
      <option value="OFERTAS">OFERTAS</option>
      <option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="NUEVO">NUEVO</option>
      </select>
      </div>
    
      <div id="descuento" class="form-group"> 
     
      <input type="hidden" name="descuento" value="0">
      </div>
    
      <div class="form-group"> 
      <label>Imagen:</label>
      <input type="file" name="img[]" multiple="" class="form-control" required="">
      </div>
      <input type="hidden" name="id_sucursal" value="<?php echo $_SESSION['id_sucursal'];?>" required="">
      <div class="text-center" id="res-form-agregar-producto"></div>
      </div><!--End body-->
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
       
      </div>
    </form>
      
       

    
    </div>
    
  </div>
</div>


<!--********************************** MODAL AGREGAR SETS *********************************************************** -->

<div class="modal fade" id="modal_agregar_set" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 

     <form action="controlador/productos/agregar_set.php" method="post" id="form_agregar_producto" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Set</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
     
      <div class="modal-body"><!--Begin body-->
      
     

      <div class="form-group">
      <label>Nombre:</label>
      <input type="text" name="nombre_producto"  class="form-control" placeholder="Nombre del set" required="">
      </div> 
      
     
      
     
     <div class="form-group"> 
      <label>Precio de compra:</label>
      <input type="number" step="0.01" name="precio_compra" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group"> 
      <label>Precio de venta:</label>
      <input type="number" step="0.01" name="precio_venta" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group">
      <label>Categoria:</label>
      <select class="form-control" name="id_categoria"  required="">
      <option selected="" value="">Seleccione una opción</option>
      <?php
       $consul_proveedores=  ejecutarSQL::consultar("SELECT * FROM categoria_prod");
       while ($proveedores=mysqli_fetch_array($consul_proveedores)){
       echo '<option value="'.$proveedores['id_categoria'].'">'.$proveedores['nombre_categoria'].'</option>';
       }
      ?>
      </select>
      </div>
    
      
     <!-- <div class="form-group"> 
      <label>Enlace</label>
      <input type="text" name="link" class="form-control" required="">
      </div>-->

       <div class="form-group">
      <label>Seccion:</label>
      <select class="form-control" name="seccion"   onchange="aplicar_descuento2(this);" required="">
      <option selected="" value="">Seleccione una opción</option>
      <option value="PRODUCTOS">PRODUCTOS</option>
      <option value="OFERTAS">OFERTAS</option>
      <option value="MAS VENDIDO">MAS VENDIDO</option>
      <option value="NUEVO">NUEVO</option>
      </select>
      </div>
    
      <div id="descuento2" class="form-group"> 
     
      <input type="hidden" name="descuento" value="0">
      </div>
    
    <div class="field_wrapper">
       
    <div class="form-group">
        <label>Producto:</label>
        <input type="text"  placeholder="Codigo de producto" class="form-control"name="codigo[]"  value=""/>
        <input type="text"  placeholder="Descripcion del producto" class="form-control"name="descripcion[]" value=""/>
        <input type="number"  class="form-control"placeholder="Existencias" name="stock[]" value=""/>
        <input type="file"  placeholder="imagen" class="form-control"name="img[]" value=""/>
        
    </div>
    
</div>  
 <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field"><i class="fa fa-plus"></i> Agregar otro producto</a>
      <input type="hidden" name="id_sucursal" value="<?php echo $_SESSION['id_sucursal'];?>" required="">
      <div class="text-center" id="res-form-agregar-producto"></div>
      </div><!--End body-->
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
       
      </div>
    </form>
      
       

    
    </div>
    
  </div>
</div>

<!--*************************************************MODAL EDITAR PRODUCTO**************************************************-->


<div class="modal fade" id="modal_editar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 

     <form action="controlador/productos/editar_producto.php" method="post" id="form_editar_producto" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
     
      <div class="modal-body" id="campos-editar-producto"><!--Begin body-->
      
      <input type="hidden" name="id_producto" id="id_producto" required="">
      <div class="form-group">
      <label>Codigo:</label>
      <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo de producto" required="">
      </div> 
     
      <div class="form-group"> 
      <label>Descripcion</label>
      <textarea type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Descripcion del producto" required=""></textarea> 
      </div> 
     
      <div class="form-group"> 
      <label>Precio de venta:</label>
      <input type="number" step="0.01" name="precio_venta" id="precio_venta" class="form-control" placeholder="$0.00" required="">
      </div>
      <div class="form-group">
      <label>categorias:</label>
      <select class="form-control" name="id_categoria"  id="id_categoria" required="">
      
      </select>
      </div>
      <div class="form-group"> 
      <label>Existencia</label>
      <input type="number"name="existencia" id="existencia" class="form-control" placeholder="0" required="">
      </div>
      

      <div class="form-group">
      <label>Sección:</label>
      <select class="form-control" name="seccion"  id="seccion" required="">
      
      </select>
      </div>
     
      
      <div class="form-group"> 
      <label>Imagen:</label>
      <input type="file" name="img[]" class="form-control" required="">
      </div>
      </div><!--End body-->
       
      <div class="text-center" id="res-form-editar-producto"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    </form>
      
    </div>
    
  </div>
</div>

<!--************************************************MODAL ELIMINAR producto*********************************************-->
  <div class="modal fade" id="modal_eliminar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="controlador/productos/eliminar_producto.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar a este producto?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <input type="hidden" name="id_producto" id="id_producto_e" value="">
        <div class="modal-body">Seleccione eliminar para confirmar la operación.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" onclick="confirmar_eliminar_producto();">Eliminar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
  


  <!--************************************************MODAL AGREGAR ENTRADA DE PRODUCTO*********************************************-->
  <div class="modal fade" id="modal_agregar_entradas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <form action="controlador/productos/agregar_entradas_productos.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Entrada de Producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <input type="hidden" name="id_sucursal" value="<?php echo $_SESSION['id_sucursal']?>">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="folio_entrada" class="form-control" placeholder="Folio de la nota o factura" required="">
          </div>
          <div class="form-group"> 
            <label>Fecha de entrada:</label>
          <input type="date" name="fecha_entrada" class="form-control" required="">
          </div>
         <input type="hidden" name="id_proveedor" value="0">
      <div class="form-group"> 
            <label>Foto o archivo de la nota o factura (opcional):</label>
          <input type="file" name="archivo" class="form-control">
          </div>

          <div class="form-group"> 
            <label>Seleccione los productos a ingresar:</label>
          <input type="text" id="txtcodigo_entradas" onkeyup="consultar_productos_entrada(this);" class="form-control" placeholder="ingrese codigo o nomre del producto">
          </div>
          <div id="tabla_productos_entrada" id="table-responsive"></div>
          <div class="form-group"><label>Lista de productos:</label></div>
          <div id="tabla_entradas" class="table-responsive">
          <table class="table table-bordered">
          <tr><td>Codigo</td><td>Articulo</td><td>Costo</td><td>Cantidad</td><td>Eliminar</td></tr>
        </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <div class="res-entradas"></div>
        </div>
      </form>
      </div>
    </div>
  </div>

