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

    //route for sign in page
    'sign' => ['controller' => 'ViewController', 'method' => 'signInPage'],

    //route for login
    'login' => ['controller' => 'UserManageController', 'method' => 'loginUser'],

    //route for signup
    'register' => ['controller' => 'UserManageController', 'method' => 'registerNewUser'],

    //route for logout
    'logout' => ['controller' => 'UserManageController', 'method' => 'logoutUser'],

    //route for display all adverts
    'allAdverts' => ['controller' => 'AdvertController', 'method' => 'getAllListings'],

    //route for user dashboard
    'dashboard' => ['controller' => 'UserManageController', 'method' => 'userDashboard'],

    //route for edit user password
    'changePassword' => ['controller' => 'UserManageController', 'method' => 'updateUserPassword'],

    //route for create a new advert
    'createAdvert' => ['controller' => 'AdvertController', 'method' => 'index'],
    
    // '' => ['controller' => '', 'method' => ''],
    // '' => ['controller' => '', 'method' => ''],
];