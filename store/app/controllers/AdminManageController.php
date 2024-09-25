<?php

class AdminManageController extends Controller
{
    //method to register a new admin
    public function addNewAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $adminModel = $this->loadModel("AdminManage");
            $userModel = $this->loadModel("UserManage");
            $admName = trim($_POST['admName']);
            $admEmail = trim($_POST['admEmail']);
            $admPwd = trim($_POST['admPwd']);
            $admPwdRepeat = trim($_POST['admPwdRepeat']);

            if (empty($admName) || empty($admEmail) || empty($admPwd) || empty($admPwdRepeat)) {
                header('Location: ?error=emptyinput');
                exit();
            } elseif (!filter_var($admEmail, FILTER_VALIDATE_EMAIL)) {
                header('Location: ?error=invaildEmail');
                exit();
            } elseif ($admPwd !== $admPwdRepeat) {
                header('Location: ?error=passwordsdontmatch');
                exit();
            } elseif (strlen($admPwd) < 8) {
                header('Location: ?error=passwordshort');
                exit();
            } elseif ($userModel->getUserByEmail($admEmail)) {
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

    //method to delete a user
    public function deleteUser($userId)
    {
        $adminModel = $this->loadModel("AdminManage");
        $adminModel->deleteUser($userId);
        header('Location: ' . BASE_URL . 'dashboard');
    }

    //method to delete a listing
    public function deleteListing($listingId)
    {
        $adminModel = $this->loadModel("AdminManage");
        $adminModel->deleteListing($listingId);
        header('Location: ' . BASE_URL . 'dashboard');
    }
}
