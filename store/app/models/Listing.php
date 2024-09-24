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

    //method to get all listings by user
    public function getAdvertByUser()
    {
        try {
            $this->db->startTransaction();
            $this->db->query("SELECT * FROM car LEFT JOIN listing ON car.carId = listing.carId WHERE sellerId = :sellerId");
            $this->db->bind(':sellerId', $_SESSION["userId"]);
            $this->db->execute();
            $results = $this->db->results();
            $this->db->endTransaction();
            return $results;
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            echo $e->getMessage();
        }
        // $this->db->query("SELECT * FROM car LEFT JOIN listing ON car.carId = listing.carId WHERE sellerId = :sellerId");
        // $this->db->bind(':sellerId', $_SESSION["userId"]);
        // $this->db->execute();
        // return $this->db->results();
    }

    //method to delete a listing
    public function deleteListing($id)
    {
        try {
            $this->db->startTransaction();

            $this->db->query("SELECT carId FROM listing WHERE listingId = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            $listing = $this->db->result();

            if ($listing) {
                $this->db->query("DELETE FROM listing WHERE listingId = :id");
                $this->db->bind(':id', $id);
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

    //method to update a listing

    public function updateListing($id, $fieldsToUpdate)
    {
        try {
            $this->db->startTransaction();
    
            $this->db->query("SELECT carId FROM listing WHERE listingId = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            $listing = $this->db->result();
    
            if ($listing) {
                $updateFields = [];
                $params = [':carId' => $listing['carId']];
    
                foreach ($fieldsToUpdate as $field => $value) {
                    $updateFields[] = "$field = :$field";
                    $params[":$field"] = $value;
                }
    
                $updateQuery = "UPDATE car SET " . implode(', ', $updateFields) . " WHERE carId = :carId";
                $this->db->query($updateQuery);
    
                foreach ($params as $key => $value) {
                    $this->db->bind($key, $value);
                }
    
                $this->db->execute();
    
                $this->db->endTransaction();
    
                return true;
    
            } else {
                $this->db->cancelTransaction();
                error_log("Listing not found with ID: $id");
                return false;
            }
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            error_log("Error updating listing: " . $e->getMessage());
            return false;
        }
    }
}
