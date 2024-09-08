<?php

//define an arrey of routes for the application
$routes = [
    //route for home page, maps to the 'index' method of 'ViewController'
    '' => ['controller' => 'ViewController', 'method' => 'index'],

    'home' => ['controller' => 'ViewController', 'method' => 'index'],

    //route for about page
    'about' => ['controller' => 'ViewController', 'method' => 'aboutPage'],

    //route for service page
    'service' => ['controller' => 'ViewController', 'method' => 'servicePage'],

    //route for signin page
    'user/login' => ['controller' => 'UserManageController', 'method' => 'registerNewUser'],

    // '' => ['controller' => '', 'method' => ''],
    // '' => ['controller' => '', 'method' => ''],
    // '' => ['controller' => '', 'method' => ''],
];