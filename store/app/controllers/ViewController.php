<?php

class ViewController extends Controller
{

    //method to display home page
    public function index()
    {
        $this->renderView('View/Home');
    }

    //method to display about page
    public function aboutPage()
    {
        $this->renderView('View/About');
    }

    //method to display service page
    public function servicePage()
    {
        // if (isset($_SESSION['isAdmin'])) {
        //     if ($_SESSION['isAdmin'] == 1) {
        //         $this->renderView('View/Service');
        //     } else {
        //         header('Location: home');
        //         exit();
        //     }
        // }
        $this->renderView('View/Service');
    }

    public function signInPage()
    {
        $this->renderView('Sign/SignIn');
    }
}
