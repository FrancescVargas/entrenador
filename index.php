<?php
require "vendor/autoload.php";
$app=new Slim\App();
$c=$app->getContainer();
$app->get("/",function($request,$response,$args)
          {
              $response->write("<h1>Entrenadores</h1>");
              return $response;
          });
$app->run();
?>
