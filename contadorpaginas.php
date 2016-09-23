<?php


class ContadorMiddleware
{
    public function __invoke($request, $response, $next)
    {
        try{
             $con = new PDO('mysql:host=localhost;dbname=entrenador', "root");
         }catch(PDOException $e){

         }

        $c=$request->getUri()->getPath();

        $sql="update contador set contador=contador+1 where url='".$c."';";
            $res=$con->exec($sql);




        return $next($request, $response);
    }
}


class Contador2Middleware
{
    public function __invoke($request, $response, $next)
    {
        try{
             $con = new PDO('mysql:host=localhost;dbname=entrenador', "root");
         }catch(PDOException $e){

         }

        $c=$request->getUri()->getQuery();

        if($c!=="" && strlen($c)<6)
        {
        $sql="select temas.titulo from temas where temas.".$c.";";


        $res=$con->query($sql);


              $datos=$res->fetch();





        $sql2="update contador set contador=contador+1 where url='".$datos["titulo"]."';";


            $res2=$con->exec($sql2);




        }
        return $next($request, $response);

    }
}
?>
