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

    //method to register a new user
    public function registerNewUser()
    {
        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $signModel = $this->loadModel("UserManage");
            $signModel->registerUser(
                $_POST['uName'],
                $_POST['uEmail'], 
                $_POST['userName'], 
                $_POST['uPassword']);
            header('Location: ../login');
        }
        $this->renderView('Sign/SignIn');
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

    //method to update user's password by userId
    public function updatePassword($userId)
    {
        $signModel = $this->loadModel("UserManage");

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $signModel->updateUserPassword($userId, $_POST['uPassword']);
            header('Location: ../../users');
        }
        //should add renderView?
    }
}
