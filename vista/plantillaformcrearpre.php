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

<h2> Formulario para crear preguntas </h2>

<?php


if(isset($data["pregcreada"]))
{
    echo "<h2>".$data["pregcreada"]."<br>".$data["respcreada"]."</h2>";
    echo "<button><a href='/Francesc/GIT-entrenador/entrenador/index.php/crearpre'>Insertar más Preguntas</a></button>";
}
else
{
echo "<form method='post' action='/Francesc/GIT-entrenador/entrenador/index.php/meterpregunta'>
<label>Tema</label>
<select name='tema'>";
foreach($data as $fila)
{
  echo "<option value='".$fila["id"]."'>".$fila["titulo"]."</option>";
}
    echo "</select><br>";
echo "<label>Pregunta</label><input type='text' name='pregunta'>";
echo "<div id='resp'></div>";
echo "<input type='button' onclick='unamas()' value='Posibles Respuestas'>";

echo <<<java
    <script>
     i=0;
        function unamas()
        {

        var resp = document.querySelector('#resp');

        resp.innerHTML+="<input type='text' name='respuesta[]'><select name='verdad[]'><option value=0>Falso</option><option value=1>Verdadero</option></select><br>";
        i++;
        }
        </script>
java;


echo "<input type='submit' value='enviar'></form>";
}

 ?>


</main>
<footer><p>Por Francesc Vargas con la colaboración de Actibyti Barcelona</p></footer>
</body>





</html>
