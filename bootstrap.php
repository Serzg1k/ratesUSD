<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"));


// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'host' => 'vagrant.devtestnet.com',
    'dbname'=>'symfony',
    'user'=> 'vagrant',
    'password'=> 'vagrant',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);