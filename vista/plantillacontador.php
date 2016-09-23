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
  <div style="width:400px;">
<?php


echo "<h2>Estadísticas de preguntas</2>";
echo "<h3>Preguntas Aleatorias: ".$data[7]["contador"]."</3>";
echo "<h3>Preguntas Por Temas: ".$data[10]["contador"]."</3>";
echo "<h3>De las cuales: <br>
Ciencias: ".$data[1]["contador"]."<br>
Geografía: ".$data[4]["contador"]."<br>
Deportes: ".$data[3]["contador"]."<br>
Historia: ".$data[5]["contador"]."</br>";



echo '<canvas id="myChart" width="50" height="50"></canvas>';

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
                "rgba(255, 99, 132, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(255, 99, 132, 0.2)"
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
</div>

</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
