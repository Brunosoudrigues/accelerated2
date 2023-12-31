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
$route->get("/cadastroprodutos","Web:productsinsert");
$route->get("/api-address","Web:api-address");
$route->get("/api-faq","Web:apiFaq");
$route->get("/api-login","Web:apiLogin");
$route->get("/api-insert","Web:apiinsert");




$route->get("/api-listproducts","Web:apilistproducts");

$route->get("/produtos/{categoryName}","Web:products");

$route->group("/app");
$route->get("/", "App:home");
$route->get("/upload", "App:upload");

$route->get("/carrinho","App:cart");
$route->get("/perfil","App:profile");
$route->get("/alteracaoperfil","App:alteration");
$route->get("/historico","App:listhistorico");

$route->group(null);

// aqui abaixo vai ser a parte administrativa 

$route->group("/admin");
$route->get("/", "Adm:home");
$route->get("/produtos", "Adm:products");
$route->get("/cadastrocliente", "Adm:registercliente");
$route->get("/alteracaocliente", "Adm:alterationcliente");
$route->get("/cadastroproduto", "Adm:registerproducts");
$route->get("/alteracaoproduto", "Adm:alterationproducts");
$route->get("/faq", "Adm:faq");
$route->get("/listaclientes", "Adm:listclient");
$route->get("/listaprodutos", "Adm:listprodutos");
$route->group(null);
// ate aqui 

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
