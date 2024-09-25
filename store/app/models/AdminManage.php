<?php

class AdminManage
{

    //property to hold the database connection
    private $db;

    //constructor method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to add new admin to the database
    public function registerAdmin($name, $email, $userPassword)
    {
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

    // Method to get all non-admin users
    public function getAllUsers()
    {
        try {
            $this->db->startTransaction();

            $this->db->query("SELECT *, DATE(createdAt) as createdAt FROM users WHERE isAdmin = 0");
            $this->db->execute();
            $users = $this->db->results();

            $this->db->endTransaction();
            return $users;
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    
    //method to delete user from the system and database and related table data
    public function deleteUser($sellerId)
    {
        try {
            $this->db->startTransaction();
            
            $this->db->query("SELECT sellerId FROM listing WHERE sellerId = :sellerId;");
            $this->db->bind(':sellerId', $sellerId);
            $this->db->execute();
            $seller = $this->db->result();
            
            if ($seller) {
                $this->db->query("DELETE FROM listing WHERE sellerId = :sellerId;");
                $this->db->bind(':sellerId', $sellerId);
                $this->db->execute();
            }
            
            $this->db->query("DELETE FROM users WHERE userId = :sellerId;");
            $this->db->bind(':sellerId', $sellerId);
            $this->db->execute();
            
            $this->db->endTransaction();
            return true;
        } catch (PDOException $e) {
            $this->db->cancelTransaction();
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    //method to get all listings
    public function getAllListings()
    {
        try {
            $this->db->startTransaction();
    
            $this->db->query("SELECT listing.*, car.* FROM listing JOIN car ON listing.carId = car.carId");
            $this->db->execute();
            $listings = $this->db->results();
    
            $this->db->endTransaction();
            return $listings;
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    //method to delete a listing
    public function deleteListing($listingId)
    {
        try {
            $this->db->startTransaction();

            $this->db->query("SELECT carId FROM listing WHERE listingId = :id");
            $this->db->bind(':id', $listingId);
            $this->db->execute();
            $listing = $this->db->result();

            if ($listing) {
                $this->db->query("DELETE FROM listing WHERE listingId = :id");
                $this->db->bind(':id', $listingId);
                $this->db->execute();

                $this->db->query("DELETE FROM car WHERE carId = :carId");
                $this->db->bind(':carId', $listing['carId']);
                $this->db->execute();
            }

            $this->db->endTransaction();
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            error_log("Error deleting listing: " . $e->getMessage());
        }
    }
}
