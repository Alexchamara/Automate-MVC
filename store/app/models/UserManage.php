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
    public function registerUser($name, $email, $userPassword)
    {
        try {
            $this->db->query("INSERT INTO users (name, email, userPassword) VALUES (:name, :email, :userPassword)");

            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':userPassword', password_hash($userPassword, PASSWORD_DEFAULT));

            $this->db->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    //method to login a user by email and password
    public function loginUser($email, $userPassword)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");

        $this->db->bind(':email', $email);

        $this->db->execute();

        $user = $this->db->result();

        //check if the user exists
        if ($user) {
            $hashedPwd = $user["userPassword"];
            if (password_verify($userPassword, $hashedPwd)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //method to update a user password in the database
    public function updatePassword($userId, $newPassword)
    {
        $this->db->query("UPDATE users SET userPassword=:userPassword WHERE userId=:userId");

        $this->db->bind(':userPassword', password_hash($newPassword, PASSWORD_DEFAULT));
        $this->db->bind(':userId', $userId);

        $this->db->execute();
    }

    //method to retrieve a user by userId from the dataabase
    public function getUserById($userId)
    {
        $this->db->query("SELECT *, DATE(createdAt) as createdAt FROM users WHERE userId=:userId");

        $this->db->bind(':userId', $userId);

        $this->db->execute();

        return $this->db->result();
    }

    public function getUserByEmail($email)
    {
        try{
            $this->db->query("SELECT * FROM users WHERE email=:email");
            $this->db->bind(':email', $email);
            $this->db->execute();
            return $this->db->result();
        } catch (PDOException $e){
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    //method to delete a user account from the database by userId
    public function deleteUser($userId)
    {
        $this->db->query("DELETE FROM users WHERE userId=:userId");

        $this->db->bind(':userId', $userId);

        $this->db->execute();
    }

    //method to update user details
    public function updateDetails($userId, $name = null, $email = null, $contactNumber = null)
    {
        try {
            $query = "UPDATE users SET ";
            $params = [];

            // Add each field if it is provided
            if (!empty($name)) {
                $query .= "name = :name, ";
                $params[':name'] = $name;
            }
            if (!empty($email)) {
                $query .= "email = :email, ";
                $params[':email'] = $email;
            }
            if (!empty($contactNumber)) {
                $query .= "contactNumber = :contactNumber, ";
                $params[':contactNumber'] = $contactNumber;
            }

            // Check if there are any fields to update
            if (empty($params)) {
                return false;
            }

            // Remove the trailing comma and space
            $query = rtrim($query, ', ');

            $query .= " WHERE userId = :userId";
            $params[':userId'] = $userId;

            $this->db->query($query);

            // Bind the parameters dynamically
            foreach ($params as $key => $value) {
                $this->db->bind($key, $value);
            }

            return $this->db->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}
