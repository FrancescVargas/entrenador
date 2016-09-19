<?php
require "vendor/autoload.php";
$app=new Slim\App();
$c=$app->getContainer();

$c["bd"]=function()
{
    $pdo=new PDO("mysql:host=localhost;dbname=entrenador","root");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    return $pdo;
};


$c["view"]=new \Slim\Views\PhpRenderer("vista/");

try{
             $con = new PDO('mysql:host=localhost;dbname=entrenador', "root");
         }catch(PDOException $e){
             echo "<div class='error'>".$e->getMessage()."</div>";
             die();
         }

$app->get("/",function($request,$response,$args)
          {


            $response=$this->view->render($response,"plantillaprimera.php",[]);
            return $response;
          });


$app->get("/pregale",function($request,$response,$args)
          {


         $con=$this->bd;

           $sql="SELECT temas.titulo, preguntas.pregunta,preguntas.id  from temas,preguntas where preguntas.tema=temas.id  order by rand() limit 1;";

           $res=$con->query($sql);

           $datos["pregunta"]=$res->fetch();
            $datos["temaoale"]="ale";
          $sql2="SELECT respuestas.id,respuestas.respuesta,respuestas.verdadera from respuestas where respuestas.pregunta=".$datos["pregunta"]['id'].";";
           $res2=$con->query($sql2);
           $datos["respuesta"]=$res2->fetchAll();
            $response=$this->view->render($response,"plantillaleatorias.php",$datos);
            return $response;
          });



$app->get("/pregtemas",function($request,$response,$args)
          {


         $con=$this->bd;

           $sql="SELECT *  from temas;";

           $res=$con->query($sql);

           $datos=$res->fetchAll();

            $response=$this->view->render($response,"plantillatemas.php",$datos);
            return $response;
          });



$app->get("/temas",function($request,$response,$args)
          {


           $con=$this->bd;
           $params=$request->getQueryParams();
           $sql="SELECT temas.id as temaid,temas.titulo, preguntas.pregunta,preguntas.id  from temas,preguntas where preguntas.tema=temas.id and temas.id=".$params["id"]." order by rand() limit 1;";

           $res=$con->query($sql);

           $datos["pregunta"]=$res->fetch();
          $sql2="SELECT respuestas.id,respuestas.respuesta,respuestas.verdadera from respuestas where respuestas.pregunta=".$datos["pregunta"]['id'].";";
           $res2=$con->query($sql2);
           $datos["respuesta"]=$res2->fetchAll();
            $datos["temaoale"]="tema";
            $response=$this->view->render($response,"plantillaleatorias.php",$datos);
            return $response;
          });



$app->get("/resultado",function($request,$response,$args)
          {
            $con=$this->bd;
            $params=$request->getQueryParams();
              $sql="SELECT temas.id,temas.titulo,preguntas.pregunta,respuestas.respuesta  from respuestas,preguntas,temas where preguntas.id=respuestas.pregunta and temas.id=preguntas.tema and preguntas.id=".$params["id"]." and respuestas.verdadera=1;";

           $res=$con->query($sql);

           $datos[0]=$res->fetch();
           $datos[1]=$params["resp"];
            $datos["temaoale"]=$params["temaoale"];

              $response=$this->view->render($response,"plantillaresultado.php",$datos);
            return $response;


          });

$app->get("/crearpre",function($request,$response,$args)
          {
              $con=$this->bd;
              $sql="SELECT * from temas;";
              $res=$con->query($sql);
              $datos=$res->fetchAll();

            $response=$this->view->render($response,"plantillaformcrearpre.php",$datos);
            return $response;


          });

$app->post("/meterpregunta",function($request,$response,$args)
          {
              $con=$this->bd;
              $params=$request->getParsedBody();
            $sql="insert into preguntas(preguntas.tema,preguntas.pregunta) values('${params["tema"]}','${params["pregunta"]}');";
            $res=$con->exec($sql);
            if($res===FALSE)
              {
                  $datos["pregcreada"]= "<p>Error al añadir datos en respuestas</p>";
                  echo "<p>".$conexion->errorInfo()[2]."</p>";
              }
          else
              {
                  $datos["pregcreada"]= "<p>Se han añadido $res filas en la tabla respuestas</p>";
              }
              
            $preguntaid="select preguntas.id from preguntas where preguntas.pregunta='".$params["pregunta"]."';";
            $res2=$con->query($preguntaid);
            $res2=$res2->fetch();
              
            for($i=0;$i<count($params["respuesta"]);$i++)
            {
                $sql2="insert into respuestas(respuestas.respuesta,respuestas.pregunta,respuestas.verdadera) values('".$params["respuesta"][$i]."','".$res2["id"]."','".$params["verdad"][$i]."');";
            $res3=$con->exec($sql2);
                
            
            }
              $respu=count($params["respuesta"]);
              
              $datos["respcreada"]= "<p>Se han añadido $respu filas en la tabla respuestas</p>";
             
             
           $response=$this->view->render($response,"plantillaformcrearpre.php",$datos);
            return $response;


          });




$app->run();
?>
