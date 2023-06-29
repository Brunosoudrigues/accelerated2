<?php

require __DIR__ . "/vendor/autoload.php";


use CoffeeCode\Router\Router;

ob_start();


$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/login", "Web:login");
$route->get("/cadastro","Web:register");
$route->get("/faq","Web:faq");
$route->get("/alteracao","Web:alteration");
$route->get("/carrinho","Web:cart");
$route->get("/ops/{errcode}", "Web:error");
$route->get("/produtos","Web:products");
$route->get("/produtos/{categoryName}","Web:products");

$route->group("/app");
$route->get("/", "App:home");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
