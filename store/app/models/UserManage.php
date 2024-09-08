<?php

class UserManage
{

    //proprty to hold the database connection
    private $db;

    //constroctor method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to get all user from the database
    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        $this->db->results();
    }

    //method to add new user to the database
    public function registerUser($name, $email, $userName, $userPassword)
    {
        $this->db->query("INSERT INTO users (name, email, userName, userPassword) VALUES (:name, :email, :userName, :userPassword)");

        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':userName', $userName);
        $this->db->bind(':userPassword', $userPassword);

        $this->db->execute();
    }

    //method to update user's password to the database
    public function updateUserPassword($userId, $userPassword)
    {
        $this->db->query("UPDATE users SET userPassword=:userPassword WHERE userId=:userId");

        $this->db->bind(":userId", $userId);
        $this->db->bind(":userPassword", $userPassword);

        $this->db->execute();
    }

    //method to retrieve a user by userId from the dataabase
    public function getUserById($userId)
    {
        $this->db->query("SELECT * FROM users WHERE userId=:userId");

        $this->db->bind(':userId', $userId);

        $this->db->execute();

        return $this->db->result();
    }

    //method to delete a user account from the database by userId
    public function deleteUser($userId)
    {
        $this->db->query("DELETE FROM users WHERE userId=:userId");

        $this->db->bind(':userId', $userId);

        $this->db->execute();
    }
}
