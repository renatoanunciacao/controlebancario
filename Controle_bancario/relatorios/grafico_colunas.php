 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
         
       <?php 
             require('../config.php');
            require('../bibliotecas/adodb5/adodb.inc.php');
            require('../conecta.php');
            $con = new conecta();
            $sql = "select * from depositos order by DEP_VALOR";
            $res = $con->bd->Execute($sql);
            
            $rotulos = array('Depósitos');
            $valores = array(null);
            while($reg = $res->FetchNextObject())
            {
                array_push($rotulos, $reg->DEP_VALOR);
                $sql_2 = "select sum(DEP_VALOR) as TOTAL from depositos where dep_valor = ".$reg->DEP_CODIGO;
                $res_2 = $con->bd->Execute($sql_2);
                $reg_2 = $res_2->FetchNextObject();
                array_push($valores, (int)$reg_2->TOTAL);
            }
            $grafico = array($rotulos, $valores);
   
         
         
         
         ?>
            
        
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($grafico);?>);

    
      var options = {
        title: "Depósitos efetuados",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "right" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>