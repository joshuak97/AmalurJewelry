
      function add_carrito(id_producto){
          var cantidad=document.getElementById('cantidad_prod').value;
       $.post("carrito/carrito.php", { id_producto: id_producto,cantidad:cantidad }, function(data){
 $("#carrito").html(data);
 }); 
 $.post("carrito/notificacion_carrito.php", function(data){
 $("#cart-num").html(data);
 }); 

      }


function eliminar_carrito(id_producto){
       $.post("carrito/eliminar_elemento.php", { id_producto: id_producto }, function(data){
 $("#carrito").html(data); });
 
 $.post("carrito/notificacion_carrito.php", function(data){
 $("#cart-num").html(data);
 }); 
 
 }
 
 function load_carrito(){
     $.post("carrito/carrito.php", function(data){
 $("#carrito").html(data);
 }); 
 $.post("carrito/notificacion_carrito.php", function(data){
 $("#cart-num").html(data);
 });     
}

 
load_carrito();

function modificar_cantidad(componente,posicion){
 var cantidad=componente.value;
 $.post("carrito/modificar_cantidad_carrito.php",{cantidad:cantidad,posicion:posicion} ,function(data){
 $("#suma_total").html(data);
 }); 
}

function actualizar_info_prod(codigo){
    alert("hola");
 $.post("carrito/actualizar_info_prod.php",{codigo:codigo} ,function(data){
 $("#info_prod").html(data);
 });   
}


function modificar_cantidad2(componente,posicion){
 var cantidad=componente.value;
 $.post("carrito/modificar_cantidad_carrito2.php",{cantidad:cantidad,posicion:posicion} ,function(data){
  $("#suma_total2").html(data);
  $("#suma_total3").html(data);
 }); 
 $.post("carrito/mostrar_total.php",{posicion:posicion} ,function(data){
  $("#total"+posicion).html(data);
 
 }); 
}

//Formulario Login.
$(document).ready(function() {

    $('#form-login form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#form-login form').serialize();
         var metodo=$('#form-login form').attr('method');
         var peticion=$('#form-login form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            
            error: function() {
                $("#res-login").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-login").html(data);
            }
        });
        return false;
    });
});
