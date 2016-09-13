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

$app->get("/",function($request,$response,$args)
          {
            $response=$this->view->render($response,"plantillaprimera.php",[]);
            return $response;
          });
$app->run();
?>
