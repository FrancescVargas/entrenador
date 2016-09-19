<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Entrenador-Inicio</title>
    <link rel="stylesheet" type="text/css" href="/Francesc/GIT-entrenador/entrenador/css/estyles.css">
</head>

<body>
<header><h1>Entrenador</h1></header>
<nav>
  <div class="menu"><a href="http://localhost/Francesc/GIT-entrenador/entrenador/">Inicio</a></div>
  <div class="menu"><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/pregtemas">Preguntas por Temas</a></div>
  <div class="menu"><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/pregale">Preguntas Aleatorias</a></div>
  <div class="menu"><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/crearpre">Crear Preguntas</a></div>
</nav>
<main>
    
<?php


    echo "<div class='recuadro'>";

    foreach($data as $fila)
    {
        echo "<div class='arecuadro'><a href='http://localhost/Francesc/GIT-entrenador/entrenador/index.php/temas?id=".$fila["id"]."'>".$fila["titulo"]."</a></div>";
    }

    echo "<div>";
 ?>

</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
