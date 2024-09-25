<?php
//start the session
session_start();

//include the configuration, Database, Controller and App class file
require_once '../app/config/config.php';
require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';
require_once '../app/core/App.php';

//create a new instance of the App class
$app = new App();
