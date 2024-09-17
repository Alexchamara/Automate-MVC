<?php

class Listing {
    //hold the database connection
    private $db;

    //method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to retrieve all listings from the database
    public function getAllListing()
    {
        $this->db->query("SELECT * FROM listing");
        $this->db->execute();
        return $this->db->results();
    }

    //method to add a new listing to the database
    public function createListing($sellerId, $listingStatus, $boostAd){
        try {

            $listId = $this->db->getLastInsertId($sellerId);

            $this->db->query("INSERT INTO listing (carId, sellerId, listingStatus, boostAd) VALUES (:carId, :sellerId, :listingStatus, :boostAd)");

            $this->db->bind(':carId', $listId);
            $this->db->bind(':sellerId', $sellerId);
            $this->db->bind(':listingStatus', $listingStatus);
            $this->db->bind(':boostAd', $boostAd);
            
            $this->db->execute();

        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}