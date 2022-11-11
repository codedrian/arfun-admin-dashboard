<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)
->withServiceAccount('mynewmain-b15f0-firebase-adminsdk-t7uy1-234b2901d7.json')
->withDatabaseUri('https://mynewmain-b15f0-default-rtdb.asia-southeast1.firebasedatabase.app/');

$database = $factory->createDatabase();
?>