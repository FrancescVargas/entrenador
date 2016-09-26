<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Entrenador-Inicio</title>
    <script src="/Francesc/GIT-entrenador/entrenador/js/Chart.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/Francesc/GIT-entrenador/entrenador/css/estyles.css">
</head>

<body>
<header><h1>Entrenador</h1></header>
<nav>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/">Inicio</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/pregtemas">Preguntas por Temas</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/pregale">Preguntas Aleatorias</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/crearpre">Crear Preguntas</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/vercontador">Ver Estadísticas</a></div>
</nav>
<main>
    <table><tr><th colspan="2">
        <h2>Estadísticas de preguntas</h2></th></tr>
        <tr><td>
  <div class="chart">
<?php




      
echo '<canvas id="yourChart"></canvas>';

echo '<script>
var ctx = document.getElementById("yourChart");
var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: ["Aleatorias", "Por Temas"],
        datasets: [{
            label: "Aleatorias/Temas",
            data: ['.$data[7]["contador"].', '.$data[10]["contador"].'],
            backgroundColor: [
                "rgba(96, 59, 67, 0.2)",
                "rgba(255, 99, 132, 0.2)"
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(255,99,132,1)"
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script></div></td>';
      
     
echo '<td><div class="chart">';
      



echo '<canvas id="myChart"></canvas>';

echo '<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Ciencias", "Geografía", "Deportes", "Historia"],
        datasets: [{
            label: "Preguntas según Temas",
            data: ['.$data[1]["contador"].', '.$data[4]["contador"].','.$data[3]["contador"].','.$data[5]["contador"].'],
            backgroundColor: [
                "rgba(227, 28, 70, 0.2)",
                "rgba(21, 87, 152, 0.2)",
                "rgba(19, 62, 15, 0.2)",
                "rgba(232, 130, 12, 0.2)"
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(255,99,132,1)",
                "rgba(255,99,132,1)",
                "rgba(255,99,132,1)"
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>';

?>
            </div></td></tr></table>

</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
