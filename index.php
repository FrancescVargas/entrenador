<?php
require "vendor/autoload.php";
$app=new Slim\App();
$app->get("/",function($request,$response,$args)
          {
              $response->write("<h1>Entrenadores</h1>");
              return $response;
          });
$app->run();
?>
