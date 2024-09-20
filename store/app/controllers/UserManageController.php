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
                $userModel = $this->loadModel("AdminManage");
                $totalUsers = $userModel->getTotalUsers(); 
                $data = $userModel->getUserById([$_SESSION['userId']]);
                $this->renderView('UserDashboard/AdminDashboard', ['totalUsers' => $totalUsers, 'userData' => $data]);
                // $this->renderView('UserDashboard/AdminDashboard');

            } else {
                $data = $this->loadModel("UserManage")->getUserById($_SESSION['userId']);
                $this->renderView('UserDashboard/UserDashboard', ["userData" => $data]);
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
                    $_SESSION['userPhone'] = $user['contactNumber'];
                    $_SESSION['createdDate'] = $user['createdAt'];
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

            $_SESSION['userName'] = $uName;
            $_SESSION['userEmail'] = $uEmail;
            $_SESSION['userPhone'] = $uPhone;

            $signModel = $this->loadModel("UserManage");
            $signModel->updateDetails($userId, $uName, $uEmail, $uPhone);

            header('Location: ?updateuserdetails=success');
            exit();

        }

        // Render the view if not a POST request
        $this->renderView('UserDashboard/UserDashboard', ['userId' => $userId]);
    }

    //method to delete user account
    public function deleteUser()
    {
        $userId = $_SESSION['userId'];

        $deleteModel = $this->loadModel("UserManage");
        $deleteModel->deleteUser($userId);

        session_destroy();
        header('Location: home');
    }

    //method to show uder details ///////???///????//?????????//???/?///////?/???????????/?/?/?////?/?/?/?/?////?/?///?/?/
    public function getUserDetailsById()
    {
        session_start();
        $userId = $_SESSION['userId'];
        $userModel = $this->loadModel('UserManage');
        $user = $userModel->getUserById($userId);

        if ($user) {
            $_SESSION['createdDate'] = $user['createdAt'];
        }
    }
}
