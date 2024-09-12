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
            // $signModel = $this->loadModel("UserManage");
            // $this->renderView('UserDashboard/UserDashboard');
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
                header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                header('Location: ?error=invaildEmail');
                exit();
            } elseif ($uPassword !== $uPwdRepeat) {
                header('Location: ?error=passwordsdontmatch');
                exit();
            } elseif (strlen($uPassword) < 8) {
                header('Location: ?error=passwordshort');
                exit();
            } elseif ($signModel->getUserByEmail($uEmail)) {
                header('Location: ?error=emailtaken');
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
                header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                header('Location: ?error=invaildEmail');
                exit();
            } else {
                $user = $signModel->loginUser($uEmail, $uPassword);
                if ($user) {
                    session_start();
                    $_SESSION['userId'] = $user['userId'];
                    $_SESSION['userName'] = $user['name'];
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
        header('');
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            $userId = $_SESSION['userId'];
            $signModel = $this->loadModel("UserManage");
            $user = $signModel->getUserById($userId);

            if ($user && password_verify($currentPassword, $user->userPassword)) {
                $signModel->updatePassword($userId, $newPassword);

                header('Location: ?updatepassword=success');
                exit();
            } else {
                header('Location: ?error=incorrectpassword' . $currentPassword . $user->userPassword);
                exit();
            }
        }
        else {
            $this->renderView('UserDashboard/UserDashboard');
        }
    }
}
