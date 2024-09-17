<?php

class AdminManageController extends Controller
{
    //method to register a new admin
    // public function registerNewAdmin()
    // {
    //     //check if the request method is POST
    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //         $signModel = $this->loadModel("AdminManage");
    //         $uName = trim($_POST['uName']);
    //         $uEmail = trim($_POST['uEmail']);
    //         $uPassword = trim($_POST['uPassword']);
    //         $uPwdRepeat = trim($_POST['uPwdRepeat']);

    //         //validate the user input
    //         if (empty($uName) || empty($uEmail) || empty($uPassword) || empty($uPwdRepeat)) {
    //             // header('Location: ?error=emptyinput');
    //             exit();
    //         } elseif (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
    //             // header('Location: ?error=invaildEmail');
    //             exit();
    //         } elseif ($uPassword !== $uPwdRepeat) {
    //             // header('Location: ?error=passwordsdontmatch');
    //             exit();
    //         } elseif (strlen($uPassword) < 8) {
    //             // header('Location: ?error=passwordshort');
    //             exit();
    //         } elseif ($signModel->getUserByEmail($uEmail)) {
    //             // header('Location: ?error=emailtaken');
    //             exit();
    //         } else {
    //             $signModel->registerUser($uName, $uEmail, $uPassword);
    //             header('Location: login');
    //             exit();
    //         }
    //     }
    //     $this->renderView('UserDashboard/AdminDashboard');
    // }

    public function addNewAdmin(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $adminModel = $this->loadModel("AdminManage");
            $userModel = $this->loadModel("UserManage");
            $admName = trim($_POST['admName']);
            $admEmail = trim($_POST['admEmail']);
            $admPwd = trim($_POST['admPwd']);
            $admPwdRepeat = trim($_POST['admPwdRepeat']);

            if (empty($admName) || empty($admEmail) || empty($admPwd) || empty($admPwdRepeat)){
                header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($admEmail, FILTER_VALIDATE_EMAIL)){
                header('Location: ?error=invaildEmail');
                exit();
            } elseif ($admPwd !== $admPwdRepeat){
                header('Location: ?error=passwordsdontmatch');
                exit();
            } elseif (strlen($admPwd) < 8){
                header('Location: ?error=passwordshort');
                exit();
            } elseif ($userModel->getUserByEmail($admEmail)){
                header('Location: ?error=emailtaken');
                exit();
            } else {
                $adminModel->registerAdmin($admName, $admEmail, $admPwd);
                header('Location: dashboard');
                exit();
            }
        }
        $this->renderView('UserDashboard/AdminDashboard');
    }

    // public function addNewAdmin() {
    //     try {
    //         $name = $_POST['name'];
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];

    //         // Enable error reporting
    //         ini_set('display_errors', 1);
    //         ini_set('display_startup_errors', 1);
    //         error_reporting(E_ALL);

    //         // Load the model
    //         $adminModel = $this->loadModel('AdminManage');
    //         $result = $adminModel->registerAdmin($name, $email, $password);

    //         if ($result) {
    //             echo "Admin registered successfully.";
    //         } else {
    //             echo "Failed to register admin.";
    //         }
    //     } catch (Exception $e) {
    //         error_log("Error: " . $e->getMessage());
    //         echo "An error occurred: " . $e->getMessage();
    //     }
    // }
}

    