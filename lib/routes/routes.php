<?php
use Symfony\Component\HttpFoundation\Response;
use Lib\Framework\Controllers\HomeController;

$app->map('/', function(){
    return new Response(HomeController::index());
});

$app->map('/url', function(){ 
    return new Response(HomeController::tinyUrl());
});

