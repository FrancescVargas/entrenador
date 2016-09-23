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
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/">Inicio</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/pregtemas">Preguntas por Temas</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/pregale">Preguntas Aleatorias</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/crearpre">Crear Preguntas</a></div>
  <div class="menu"><a href="/Francesc/GIT-entrenador/entrenador/index.php/vercontador">Ver Estadísticas</a></div>
</nav>
<main>
<?php


echo "<h2>Pregunta de ".$data["pregunta"]["titulo"]."</h2>";
echo "<h3>".$data["pregunta"]["pregunta"]."</h3>";


    echo '<form action="resultado" method="get">';
    echo '<input type="hidden" name="id" value="'.$data["pregunta"]["id"].'">';
    echo '<input type="hidden" name="temaoale" value="'.$data["temaoale"].'">';
    for($i=0;$i<count($data["respuesta"]);$i++)
    {
       echo '<input type="radio" name="resp" value="'.$data["respuesta"][$i]["verdadera"].'">'.$data["respuesta"][$i]["respuesta"].'<br>';
    }

  echo '<input type="submit" value="Ok">

</form>';


    if($data["temaoale"]=="ale")
    {
    echo '<button><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/pregale">Otra pregunta, por favor?</a></button>';
    }
    if($data["temaoale"]=="tema")
    {
    echo '<button><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/temas?id='.$data["pregunta"]["temaid"].'">Otra pregunta de '.$data["pregunta"]["titulo"].'?</a></button>';
    }


 ?>

</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
