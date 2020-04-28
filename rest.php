<?php
header('Content-type:application/json; charset=utf-8');
//lib loader
require_once 'Lib/Vendor/Core/ClassLoader.php';
$al= new Vendor\Core\ClassLoader;
$al->addNamespace('Vendor', 'Lib/Vendor');
$al->register();

// App loader
require_once 'Lib/Vendor/Core/AppLoader.php';
$al= new Vendor\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');
$al->register(); 
require_once "RestServer.php"; 
print_r($_REQUEST);
print RestServer::run($_REQUEST); 

