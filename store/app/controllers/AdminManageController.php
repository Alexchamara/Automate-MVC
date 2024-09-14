<?php

class AdminManageController extends Controller
{
    //method to register a new admin
    public function registerNewAdmin()
    {
        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $signModel = $this->loadModel("AdminManage");
            $uName = trim($_POST['uName']);
            $uEmail = trim($_POST['uEmail']);
            $uPassword = trim($_POST['uPassword']);
            $uPwdRepeat = trim($_POST['uPwdRepeat']);

            //validate the user input
            if (empty($uName) || empty($uEmail) || empty($uPassword) || empty($uPwdRepeat)) {
                // header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                // header('Location: ?error=invaildEmail');
                exit();
            } elseif ($uPassword !== $uPwdRepeat) {
                // header('Location: ?error=passwordsdontmatch');
                exit();
            } elseif (strlen($uPassword) < 8) {
                // header('Location: ?error=passwordshort');
                exit();
            } elseif ($signModel->getUserByEmail($uEmail)) {
                // header('Location: ?error=emailtaken');
                exit();
            } else {
                $signModel->registerUser($uName, $uEmail, $uPassword);
                header('Location: login');
                exit();
            }
        }
        $this->renderView('UserDashboard/AdminDashboard');
    }
}

    