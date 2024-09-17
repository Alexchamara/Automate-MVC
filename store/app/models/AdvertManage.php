<?php

class AdvertManage
{

    //property to hold the database connection
    private $db;

    //constroctor method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to get all listings
    public function getListings() {
        $this->db->query("SELECT * FROM car");
        $this->db->execute();
        return $this->db->results();
    }

    //method to create a new advert
    public function createAdvert($make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $description)
    {
        $this->db->query("INSERT INTO car (make, model, engine, registrationYear, color, conditions, mileage, bodyType, fuelType, transmission, images, price, location, description) VALUES (:make, :model, :engine, :registrationYear, :color, :conditions, :mileage, :bodyType, :fuelType, :transmission, :images, :price, :location, :description)");

        $this->db->bind(':make', $make);
        $this->db->bind(':model', $model);
        $this->db->bind(':engine', $engine);
        $this->db->bind(':registrationYear', $registrationYear);
        $this->db->bind(':color', $color);
        $this->db->bind(':conditions', $conditions);
        $this->db->bind(':mileage', $mileage);
        $this->db->bind(':bodyType', $bodyType);
        $this->db->bind(':fuelType', $fuelType);
        $this->db->bind(':transmission', $transmission);
        $this->db->bind(':images', $images);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':description', $description);

        $this->db->execute();

        require_once 'Listing.php';
        $newListing = new Listing();

        $addListing = $newListing->createListing($sellerId, $listingStatus, $boostAd);
    }

    //method to update advert details
    public function updateAdvert($carId, $make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $description)
    {
        $this->db->query("UPDATE car SET make=:make, model=:model, engine=:engine, registrationYear=:registrationYear, color=:color, conditions=:conditions, mileage=:mileage, bodyType=:bodyType, fuelType=:fuelType, transmission=:transmission, images=:images, price=:price, location=:location, description=:description WHERE carId=:carId");

        $this->db->bind(':carId', $carId);
        $this->db->bind(':make', $make);
        $this->db->bind(':model', $model);
        $this->db->bind(':engine', $engine);
        $this->db->bind(':registrationYear', $registrationYear);
        $this->db->bind(':color', $color);
        $this->db->bind(':conditions', $conditions);
        $this->db->bind(':mileage', $mileage);
        $this->db->bind(':bodyType', $bodyType);
        $this->db->bind(':fuelType', $fuelType);
        $this->db->bind(':transmission', $transmission);
        $this->db->bind(':images', $images);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    //method to delete an advert
    public function deleteAdvert($carId)
    {
        $this->db->query("DELETE FROM car WHERE carId=:carId");

        $this->db->bind(':carId', $carId);

        $this->db->execute();
    }

    //method to get adverts by location, model, registration year, condition, engine, fuel type, transmission, color, price
    public function getAdverts($location, $model, $engine, $registrationYear, $conditions, $mileage, $bodyType, $fuelType, $transmission, $color, $price)
    {
        $this->db->query("SELECT * FROM car WHERE location=:location AND model=:model AND engine=:engine AND registrationYear=:registrationYear AND conditions=:conditions AND mileage=:mileage AND bodyType=:bodyType AND fuelType=:fuelType AND transmission=:transmission AND color=:color AND price=:price");

        $this->db->bind(':location', $location);
        $this->db->bind(':model', $model);
        $this->db->bind(':engine', $engine);
        $this->db->bind(':registrationYear', $registrationYear);
        $this->db->bind(':conditions', $conditions);
        $this->db->bind(':mileage', $mileage);
        $this->db->bind(':bodyType', $bodyType);
        $this->db->bind(':fuelType', $fuelType);
        $this->db->bind(':transmission', $transmission);
        $this->db->bind(':color', $color);
        $this->db->bind(':price', $price);

        $this->db->execute();

        return $this->db->results();
    }
}
