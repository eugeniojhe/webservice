<?php
header('Content-type:application/json; charset=utf-8');
//lib loader
require_once 'Lib/Core/ClassLoader.php';
$al= new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

// App loader
require_once 'Lib/Core/AppLoader.php';
$al= new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');
$al->register();

print LivroRestServer::run($REQUEST); 

