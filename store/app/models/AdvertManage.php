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
    // public function getListings() {
    //     $this->db->query("SELECT * FROM car");
    //     $this->db->execute();
    //     return $this->db->results();
    // }

    //method to create a new advert
    public function createAdvert($make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $contactNumber, $advertEmail, $description)
    {
        try {
            $this->db->startTransaction();
            $this->db->query(
                "INSERT INTO car (make, model, engine, registrationYear, color, conditions, mileage, bodyType, fuelType, transmission, images, price, location, contactNumber, advertEmail, description) 
                VALUES (:make, :model, :engine, :registrationYear, :color, :conditions, :mileage, :bodyType, :fuelType, :transmission, :images, :price, :location, :contactNumber, :advertEmail, :description)"
            );

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
            $this->db->bind(':contactNumber', $contactNumber);
            $this->db->bind(':advertEmail', $advertEmail);
            $this->db->bind(':description', $description);

            $this->db->execute();

            require_once 'Listing.php';
            $newListing = new Listing();

            $newListing->createListing();

            $this->db->endTransaction();
        } catch (Exception $e) {
            $this->db->cancelTransaction();
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    //method to update advert details
    public function updateAdvert(
        $carId,
        $make,
        $model,
        $engine,
        $registrationYear,
        $color,
        $conditions,
        $mileage,
        $bodyType,
        $fuelType,
        $transmission,
        $images,
        $price,
        $location,
        $description
    ) {
        $this->db->query(
            "UPDATE car
            INNER JOIN listing ON car.carId = listing.carId
            SET 
                car.make = :make,
                car.model = :model,
                car.engine = :engine,
                car.registrationYear = :registrationYear,
                car.color = :color,
                car.conditions = :conditions,
                car.mileage = :mileage,
                car.bodyType = :bodyType,
                car.fuelType = :fuelType,
                car.transmission = :transmission,
                -- car.images = :images,
                car.price = :price,
                car.location = :location,
                car.description = :description
            WHERE car.carId = :carId"
        );

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
        // $this->db->bind(':images', $images);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':description', $description);

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
