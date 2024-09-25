<?php

//define an arrey of routes for the application
$routes = [

    '' => ['controller' => 'ViewController', 'method' => 'index'],
    'home' => ['controller' => 'ViewController', 'method' => 'index'],
    'about' => ['controller' => 'ViewController', 'method' => 'aboutPage'],
    'service' => ['controller' => 'ViewController', 'method' => 'servicePage'],


    'sign' => ['controller' => 'ViewController', 'method' => 'signInPage'],
    'login' => ['controller' => 'UserManageController', 'method' => 'loginUser'],
    'register' => ['controller' => 'UserManageController', 'method' => 'registerNewUser'],
    'accessToCreateAdvert' => ['controller' => 'AdvertController', 'method' => 'index'],
    'createAdvert' => ['controller' => 'AdvertController', 'method' => 'createNewAdvert'],

    'logout' => ['controller' => 'UserManageController', 'method' => 'logoutUser'],
    'dashboard' => ['controller' => 'UserManageController', 'method' => 'userDashboard'],
    'changePassword' => ['controller' => 'UserManageController', 'method' => 'updateUserPassword'],
    'editProfile' => ['controller' => 'UserManageController', 'method' => 'updateUserDetails'],
    'deleteProfile' => ['controller' => 'UserManageController', 'method' => 'deleteUser'],
    
    //Admin
    'newAdmin' => ['controller' => 'AdminManageController', 'method' => 'addNewAdmin'],
    'deleteUser/id' => ['controller' => 'AdminManageController', 'method' => 'deleteUser'],

        
    //route for view product
    'allAdverts' => ['controller' => 'ListingController', 'method' => 'index'],
    'product/view' => ['controller' => 'ListingController', 'method' => 'view'],
    //route for listing view
    'listing' => ['controller' => 'ListingController', 'method' => 'displayListing'],
    'deleteList/id' => ['controller' => 'ListingController', 'method' => 'deleteListing'],

    //route for view user adverts
    'viewAdvert/id' => ['controller' => 'ListingController', 'method' => 'getAdvertById'],

    //route for edit listing
    'editList/id' => ['controller' => 'ListingController', 'method' => 'updateListing'],


];