<?php

class ViewController extends Controller{

    //method to display home page
    public function index(){
        $this->renderView('View/Home');
    }

    //method to display about page
    public function aboutPage(){
        $this->renderView('View/About');
    }

    //method to display service page
    public function servicePage(){
        $this->renderView('View/Service');
    }


}
