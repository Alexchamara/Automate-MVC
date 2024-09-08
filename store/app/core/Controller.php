<?php 

class Controller{
    //method to load a model, takes the model name as a parameter
    protected function loadModel($model){
        require_once '../app/models' . $model . '.php';
        return new $model;
    }

    //method to render a view 
    protected function renderView($viewPath, $data = [], $title = "Car Store"){
        //extract the data array into individual variables
        extract($data);
        //include the layout file
        require_once '../app/views/layout.php';
    }
}