<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        $this->db->query("SELECT *FROM users");
        $this->db->execute();
        $this->db->results();
    }

    //method to create a new user to the database
    public function createUser($name, $email, $userName, $password, $contactNumber, $advertEmail, $location)
    {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO users (name, email, userName, password, contactNumber, advertEmail, location) VALUES (:name, :email, :userName, :hashedPwd, :contactNumber, :advertEmail, :location)");

        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':userName', $userName);
        $this->db->bind(':hashedPwd', $password);
        $this->db->bind(':contactNumber', $contactNumber);
        $this->db->bind(':advertEmail', $advertEmail);
        $this->db->bind(':location', $location);

        $this->db->execute();
    }

    //method to check if userName or email already exsists to the databse
    public function userNameOrEmailExists($userName, $email)
    {
        $this->db->query("SELECT * FROM users WHERE userName = ? OR email = ?");

        $this->db->bind(':userName', $userName);
        $this->db->bind(':email', $email);

        return $this->db->result();
    }
}
