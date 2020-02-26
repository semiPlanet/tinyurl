<?php
use Symfony\Component\HttpFoundation\Response;
use Lib\Framework\Controllers\HomeController;

$app->map('/', function(){
    return new Response(HomeController::index());
});

$app->map('/about', function(){
    return new Response(HomeController::about());
});

$app->map('/page/{page}', function( $page){
    return new Response(HomeController::page($page));
});

$app->map('/url', function(){ 
    return new Response(HomeController::tinyUrl());
});

