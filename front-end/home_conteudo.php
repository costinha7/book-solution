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
        ["Livros Cadastrados", "red"]
        ["Livros Alugados", "green"]

        <?php
        include 'conexao.php';
        $sql = "SELECT * FROM livro";
        $buscar = mysqli_query($conexao,$sql);

        while($dados = mysqli_fetch_array($buscar)){
          $livro = $dados['livro'];
          $id_livro = $dados ['id_livro'];
        ?>
        ['<?php echo $livro?>', <?php echo $id_livro?>],
     <?php } ?>
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