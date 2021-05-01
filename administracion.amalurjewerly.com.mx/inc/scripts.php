 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="js/modulos.js"></script>
    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!--Formularios-->
  <!--Formularios-->
  <script>
   <?php
   $ventas_por_mes="";
   $devolucion_por_mes="";
   ini_set('date.timezone','America/Mexico_City');
   for ($i=1; $i <= 12; $i++) { 
    $anio=date('Y',time());
    if($i<10){
    $mes="0".$i;
    }else{
    $mes=$i;
    }
    $fecha=$anio."-".$mes;
    $consul_productos=  ejecutarSQL::consultar("SELECT SUM(total_pedido) FROM pedidos where estado='PAGADO' AND fecha_pedido like '%$fecha%'");
    $venta=mysqli_fetch_array($consul_productos);
    
    if($venta['SUM(total_pedido)']>0){
       $total_mes=$venta['SUM(total_pedido)']; 
    }else{
    $total_mes=0;    
    }
    if($i<12){
        
    $ventas_por_mes.=round($total_mes).",";
  }else{
    $ventas_por_mes.=round($total_mes);
  }
  
   $consul_productos2=  ejecutarSQL::consultar("SELECT SUM(total_pedido) FROM pedidos where estado='DEVOLUCION' AND fecha_pedido like '%$fecha%'");
    $venta2=mysqli_fetch_array($consul_productos2);
    
    if($venta2['SUM(total_pedido)']>0){
       $total_mes=$venta['SUM(total_pedido)']; 
    }else{
    $total_mes=0;    
    }
    if($i<12){
        
    $devolucion_por_mes.=round($total_mes).",";
  }else{
    $devolucion_por_mes.=round($total_mes);
  }
   }
   
   
   $ventas_diarias="";
   $fecha=date('Y-m-d',time());
   $ventas_genericos=0;
   $ventas_patente=0;
   //Consultamos las ventas diarias:
$consul_producto=ejecutarSQL::consultar("SELECT SUM(total_pedido) FROM pedidos WHERE fecha_pedido like '%$fecha%' AND estado='PAGADO'");
$ganancias=mysqli_fetch_array($consul_producto);
 $ganancia_diaria=['SUM(total_pedido)']; 


//Consultamos las devoluciones diarias
$consul_producto2=ejecutarSQL::consultar("SELECT SUM(total_pedido) FROM pedidos WHERE fecha_pedido like '%$fecha%' AND estado='DEVOLUCION'");
$devolucion=mysqli_fetch_array($consul_producto2);
 $devolucion_diaria=['SUM(total_pedido)']; 
 
$ventas_diarias=$devolucion_diaria.",".$ganancia_diaria;

   ?>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [{
      label: ["Ganancias","Devoluciones"],
      lineTension: 0.3,
      backgroundColor: ["#fbb0ee","#d1d3e2"],
      borderColor: ["#fbb0ee","#d1d3e2"],
      pointRadius: 3,
      pointBackgroundColor: ["#fbb0ee","#d1d3e2"],
      pointBorderColor: ["#fbb0ee","#d1d3e2"],
      pointHoverRadius: [3,3],
      pointHoverBackgroundColor: ["#fbb0ee","#d1d3e2"],
      pointHoverBorderColor: ["#fbb0ee","#d1d3e2"],
      pointHitRadius: [10,10],
      pointBorderWidth: [2,2],
      data: [<?php echo $ventas_por_mes.",".$devolucion_por_mes;?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Devoluciones", "Ganancias"],
    datasets: [{
      data: [<?php echo $ventas_diarias;?>],
      backgroundColor: ['#d1d3e2', '#fbb0ee'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
  </script>