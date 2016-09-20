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
</nav>
<main>
<?php




if($data[1]==1)
{
    echo "<h2 class='resultado'>Correcto!!</h2>";

}

if($data[1]==0)
{
    echo "<h2 class='resultado'>Fallaste!!</h2>";

}
echo "<h3>La respuesta a la pregunta ".$data[0]["pregunta"]." es<br><span> ".$data[0]["respuesta"]."</span></h3>";

  if($data["temaoale"]=="ale")
    {
    echo '<button><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/pregale">Otra pregunta, por favor?</a></button>';
    }
    if($data["temaoale"]=="tema")
    {
    echo '<button><a href="http://localhost/Francesc/GIT-entrenador/entrenador/index.php/temas?id='.$data[0]["id"].'">Otra pregunta de '.$data[0]["titulo"].'?</a></button>';
    }

 ?>

</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
