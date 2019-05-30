<?php

//include dirname(__FILE__).'../app/models/';
//include dirname(__FILE__).'../app/controllers/';
//include dirname(__FILE__).'../app/views/';

require_once '../app/init.php';

//-------------------------------------

require '../config.php';

$pdo = new Pdo('mysql:host=localhost;dbname=' . DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$app = new App($pdo, 'UploadController', 'alpha');


?>