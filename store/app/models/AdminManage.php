<?php

class AdminManage{

    //property to hold the database connection
    private $db;

    //constructor method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to get all admins from the database
    public function getAllAdmins()
    {
        $this->db->query("SELECT * FROM users WHERE isAdmin=1");
        $this->db->execute();
        return $this->db->results();
    }

    //method to add new admin to the database
    public function registerAdmin($name, $email, $userPassword) {
        try {
            $this->db->query("INSERT INTO users (name, email, userPassword, isAdmin) VALUES (:name, :email, :userPassword, TRUE)");
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
    ////////////////////////////////?????????//////??/??/??/?//?//?//?//?/?/
    //method to show all users
    public function getTotalUsers() {
        $this->db->query("SELECT COUNT(*) as total FROM users");
        $this->db->execute();
        return $this->db->result();
    }
}