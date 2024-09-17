<?php

class UserManageController extends Controller
{

    //method to display all users
    public function index()
    {
        $signModel = $this->loadModel("UserManage");
        $signModel = $signModel->getAllUsers();
        $this->renderView('');
    }

    //methhod to display user dashboard after checking if the user is logged in
    public function userDashboard()
    {
        if (isset($_SESSION['userId'])) {
            if ($_SESSION['isAdmin'] == 1) {
                $this->renderView('UserDashboard/AdminDashboard');
            } else {
                $this->renderView('UserDashboard/UserDashboard');
            }
        }
    }

    //method to register a new user
    public function registerNewUser()
    {
        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $signModel = $this->loadModel("UserManage");
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
        $this->renderView('Sign/SignIn');
    }

    //method to login a user
    public function loginUser()
    {

        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $signModel = $this->loadModel("UserManage");
            $uEmail = trim($_POST['uEmail']);
            $uPassword = trim($_POST['uPassword']);

            //validate the user input
            if (empty($uEmail) || empty($uPassword)) {
                // header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                // header('Location: ?error=invaildEmail');
                exit();
            } else {
                $user = $signModel->loginUser($uEmail, $uPassword);
                if ($user) {
                    session_start();
                    $_SESSION['userId'] = $user['userId'];
                    $_SESSION['userName'] = $user['name'];
                    $_SESSION['userEmail'] = $user['email'];
                    $_SESSION['userPhone'] = $user['phone'];
                    $_SESSION['isAdmin'] = $user['isAdmin'];
                    header("Location: home");
                    exit();
                } else {
                    header('Location: ?error=wronglogin');
                    exit();
                }
            }
        }
        $this->renderView('Sign/SignIn');
    }

    //method to logout a user
    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: home');
    }

    //method to delete a user account by userId
    public function deleteUserAccount($userId)
    {
        $signModel = $this->loadModel("UserManage");
        $signModel->deleteUser($userId);
        header('Location: home');
    }

    //method to dispaly a user by userId
    public function userById($userId)
    {
        $signModel = $this->loadModel("UserManage");
        $signModel = $signModel->getUserById($userId);
        $this->renderView('');
    }

    //method to update a user password
    public function updateUserPassword()
    {

        $userId = $_SESSION['userId'];


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $currentPassword = trim($_POST['currentPassword']);
            $newPassword = trim($_POST['newPassword']);
            $confirmPassword = trim($_POST['confirmPassword']);

            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
                header('Location: ?error=emptyinput');
                exit();
            }

            if ($newPassword !== $confirmPassword) {
                header('Location: ?error=passwordsdontmatch');
                exit();
            }

            if (strlen($newPassword) < 8) {
                header('Location: ?error=passwordshort');
                exit();
            }

            $signModel = $this->loadModel("UserManage");
            $user = $signModel->getUserById($userId);

            if ($user && password_verify($currentPassword, $user["userPassword"])) {
                $signModel->updatePassword($userId, $newPassword);

                $this->renderView('UserDashboard/UserDashboard', ['user' => $user]);

                exit();
            } else {

                exit();
            }
        } else {
            $this->renderView('UserDashboard/UserDashboard');
        }
    }

    //method to update a user details
    public function updateUserDetails()
    {
        $userId = $_SESSION['userId'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $uName = isset($_POST['uName']) ? trim($_POST['uName']) : null;
            $uEmail = isset($_POST['uEmail']) ? trim($_POST['uEmail']) : null;
            $uPhone = isset($_POST['uPhone']) ? trim($_POST['uPhone']) : null;

            if (!empty($uEmail) && !filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                // If the email is invalid, redirect with an error
                header('Location: ?error=invalidEmail');
                exit();
            }

            if (!empty($uPhone)) {
                $uPhone = filter_var($uPhone, FILTER_SANITIZE_NUMBER_INT);
                if (strlen($uPhone) != 10) {
                    // If the phone number is invalid, redirect with an error
                    header('Location: ?error=invalidPhone');
                    exit();
                }
            }

            $signModel = $this->loadModel("UserManage");
            $signModel->updateDetails($userId, $uName, $uEmail, $uPhone);

            header('Location: ?updateuserdetails=success');
            exit();
        }

        // Render the view if not a POST request
        $this->renderView('UserDashboard/UserDashboard', ['userId' => $userId]);
    }

    public function deleteUser()
    {
        $userId = $_SESSION['userId'];

        $deleteModel = $this->loadModel("UserManage");
        $deleteModel->deleteUser($userId);
        
        session_destroy();
        header('Location: home');
    }
    // public function deleteUser(){
    //     // session_start();

    //     if(isset($_SESSION['userId']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    //         $userId = $_POST['userId'];

    //         $deleteModel = $this->loadModel("UserManage");
    //         $isDeleted = $deleteModel->deleteUser($userId);

    //         if ($isDeleted){
    //             session_destroy();
    //             header('Location: home');
    //             exit();
    //         } else {
    //             header('Location: ?deleteAccount=failed');
    //             exit();
    //         }
    //     }
    // }


}
