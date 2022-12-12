<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)
->withServiceAccount(__DIR__ . '/ServiceAccountAdmin.json')
->withDatabaseUri('https://mynewmain-b15f0-default-rtdb.asia-southeast1.firebasedatabase.app/');


$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>