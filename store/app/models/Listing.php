<?php

class Listing
{
    //hold the database connection
    private $db;

    //method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to retrieve all listings from the database
    public function getListing()
    {
        $this->db->query("SELECT * FROM listing");
        $this->db->execute();
        return $this->db->results();
    }

    //method to add a new listing to the database
    public function createListing($boostAd = 0)
    {

        $listId = $this->db->getLastInsertId();

        $this->db->query("INSERT INTO listing (carId, sellerId, boostAd) VALUES (:carId, :sellerId, :boostAd)");

        $this->db->bind(':carId', $listId);
        $this->db->bind(':sellerId', $_SESSION["userId"]);
        $this->db->bind(':boostAd', $boostAd);

        $this->db->execute();
    }

    // method to get a listing data by listingId
    public function getListingById($id)
    {
        try {
            $this->db->startTransaction();

            $this->db->query("SELECT * FROM listing WHERE listingId=:id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            $listing = $this->db->result();

            $this->db->query("SELECT * FROM car WHERE carId=:carId");
            $this->db->bind(':carId', $listing["carId"]);
            $this->db->execute();
            $car = $this->db->result();

            $this->db->endTransaction();

            return ["listing" => $listing, "car" => $car];
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            echo $e->getMessage();
        }
    }

    //method to get all listings
    public function getAllListings()
    {
        try {
            $this->db->startTransaction();
            $this->db->query("SELECT listing.*, car.* FROM listing JOIN car ON listing.carId = car.carId");
            $this->db->execute();

            $results = $this->db->results();

            $this->db->endTransaction();

            return $results;
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            echo $e->getMessage();
        }
    }
}
