<?php
header('Content-type:application/json; charset=utf-8');
//lib loader
  require_once 'Lib/Vendor/Core/ClassLoader.php';
//$al= new Vendor\Core\ClassLoader;
$al= new ClassLoader;
$al->addNamespace('Vendor', 'Lib/Vendor');
$al->register(); 

// App loader
require_once 'Lib/Vendor/Core/AppLoader.php';
 $al= new Vendor\Core\AppLoader;
//$al= new AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');

$al->addDirectory('Lib/Vendor/Control');
$al->addDirectory('Lib/Vendor/Core');
$al->addDirectory('Lib/Vendor/Database');
$al->addDirectory('Lib/Vendor/Log');
$al->register(); 
require_once "RestServer.php"; 
print RestServer::run($_REQUEST); 

