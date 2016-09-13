<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>crear bd Contactos</title>
    </head>
    <body>
        <h1>INSTALACION</h1>

        <?php

          try
            {
                $conexion = new PDO('mysql:host=localhost', "root");
            }
          catch(PDOException $e)
            {
                echo "Error:".$e->getMessage();
                die();
            }

        // borramos la base de datos antes que nada para no tener que borrarla en myadmin


          $sql="drop database if exists entrenador;";
          $res=$conexion->exec($sql);


        // creamos la base de datos entrenador

          $sql="create database entrenador;";
          $res=$conexion->exec($sql); //exec nos devuelve el número de filas afectadas o "false" (o "0") si no ha podido crear la BD
          if($res===FALSE)
              {
                  echo "<p>No se ha podido crear la base de datos</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Base de Datos creada</p>";
              }

          // nos conectamos a la base de datos que hemos creado

          $sql="use entrenador;";

          $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>No se ha podido crear la base de datos</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Conectados a 'entrenador'</p>";
              }


         //creamos tabla temas

          $sql=<<<sql
create table temas(
	id int primary key auto_increment,
    titulo varchar(20) not null,
    titulourl varchar(20) not null


);
sql;
       $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>No se ha podido crear la tabla temas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Tabla temas creada!!!</p>";
              }


       //insertamos en temas

         $sql=<<<sql
INSERT INTO `temas`(`titulo`,`titulourl`) VALUES ('Ciencias', 'ciencias'),('Geografía', 'geografia'),('Historia', 'historia'),('Deportes', 'deportes');
sql;

          $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>Error al añadir datos en temas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Se han añadido $res filas en la tabla temas</p>";
              }


        // creamos tabla preguntas

           $sql=<<<sql
create table preguntas(
	id int primary key auto_increment,
	pregunta varchar(100) not null,
  tema int,
  foreign key (tema) references temas(id) ON DELETE CASCADE ON UPDATE CASCADE
);
sql;

          $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>No se ha podido crear la tabla preguntas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Tabla preguntas creada!!!</p>";
              }


              // insertamos datos preguntas


        $sql=<<<sql
    INSERT INTO `preguntas` (`pregunta`,`tema`) VALUES ('¿Qué es el Big Bang?','1'),('Si decimos que Murcia está situada a 38ºN, nos referimos a:','2'),
    ('¿En qué año tuvo lugar la guerra del Golfo Pérsico?', '3'),('¿Qué deporte es el que usa el balón más grande?', '4');
sql;

        $res=$conexion->exec($sql);
        if($res===FALSE)
            {
                echo "<p>Error al añadir datos en preguntas</p>";
                echo "<p>".$conexion->errorInfo()[2]."</p>";
            }
        else
            {
                echo "<p>Se han añadido $res filas en la tabla preguntas</p>";
            }


        // creamos tabla respuestas


          $sql=<<<sql
create table respuestas(
	id int primary key auto_increment,
	respuesta varchar (100),
  verdadera tinyint(1),
    pregunta int,
	foreign key (pregunta) references preguntas(id) ON DELETE CASCADE ON UPDATE CASCADE

);
sql;

          $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>No se ha podido crear la tabla respuestas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Tabla respuestas creada!!!</p>";
              }



        // insertamos en respuestas


         $sql=<<<sql

INSERT INTO `respuestas` (`respuesta`, `verdadera`, `pregunta`) VALUES ('Una gran torre construida en el siglo XIX en Londres con un reloj en ella', '0', '1'),
('La explosión que dio como origen el universo', '1', '1'),('Su longitud', '0', '2'),('Su latitud', '1', '2'),('1980', '0', '3'),('1991', '1', '3'),('Rugby', '0', '4'),
('Baloncesto', '1', '4');
sql;

          $res=$conexion->exec($sql);
          if($res===FALSE)
              {
                  echo "<p>Error al añadir datos en respuestas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  echo "<p>Se han añadido $res filas en la tabla respuestas</p>";
              }




        ?>
    </body>
</html>
