
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>


        google.charts.load('current', {'packages':['corechart']});

        function desenharPizza (){

            var tabela = new google.visualization.DataTable();
            tabela.addColumn('string','categorias');
            tabela.addColumn('number','valores');
            tabela.addRows([

                ['Tipo1',2000],
                ['Tipo2',500],
                ['Tipo3',230],
                ['Tipo4',50],
                ['Tipo5 ',900],
                ['Tipo6',260]
            ]);
            var opcoes ={
                'title':'Titulo Grafico',
                'heigth': 400, 
                'width': 700,
                'pieHole':1.0,
                is3D : true,
            };

            var grafico = new google.visualization.PieChart(document.getElementById('graficoPizza'));
            grafico.draw(tabela, opcoes);
    }

    google.charts.setOnLoadCallback(desenharPizza);


    </script>


    <div id="graficoPizza"></div>

    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Livros", 12000, "red"],
        ["Alugados", 6000, "green"],
        ["", 3500, "ruby"],
        ["", 2750, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Grafico de Livros",
        width: 1270,
        height: 720,
        bar: {groupWidth: "25%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="barchart_values" style="width: 900px; height: 300px;"></div>
