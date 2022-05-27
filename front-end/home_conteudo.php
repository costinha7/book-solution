<div class="container-fluid">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <div id="graficoPizza"></div>

  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", {
          role: "style"
        }],
        ["Livros Cadastrados", <?php 
        
include_once "./conexao.php";

$query_livro = "SELECT COUNT(*) INTO id_livro FROM livro";
$result_livro = $conn->prepare($query_livro);
$result_livro->execute();

if(($result_livro) AND ($result_livro->rowCount() != 0)){

    while($row_livro = $result_livro->fetch(PDO::FETCH_ASSOC)){
       //var_dump($row_livro);
       extract ($row_livro);
      
       echo "$id_livro";
    }

}else{
    echo "<p>Sem cadastros.</p>";
}
        
        ?>, "red"],
        ["Livros Alugados", <?php echo"1" ?>, "green"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2
      ]);

      var options = {
        title: "Grafico de Livros",
        width: 1270,
        height: 720,
        bar: {
          groupWidth: "25%"
        },
        legend: {
          position: "none"
        },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
  </script>
  <div id="barchart_values" style="width: 900px; height: 300px;"></div>
</div>