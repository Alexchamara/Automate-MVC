<?php

class Car
{
    //hold the database connection
    private $db;

    //method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to add a new car to the database
    public function addCar($make, $model, $color, $conditions, $mileage, $bodyType, $fuelType, $images, $price, $location, $description)
    {
        $this->db->query("INSERT INTO car (make, model, color, conditions, mileage, bodyType, fuelType, images, price, location, description) VALUES (:make, :model, :color, :conditions, :mileage, :bodyType, :fuelType, :images, :price, :location, :description)");

        //bind the value parameter to the database
        $this->db->bind(':make', $make);
        $this->db->bind(':model', $model);
        $this->db->bind(':color', $color);
        $this->db->bind(':conditions', $conditions);
        $this->db->bind(':mileage', $mileage);
        $this->db->bind(':bodyType', $bodyType);
        $this->db->bind(':fuelType', $fuelType);
        $this->db->bind(':images', $images);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':description', $description);

        $this->db->execute();
    }

    public function createListing(){
        
    }

    //method to update an existing car in the database
    public function updateCar($carId, $make, $model, $color, $conditions, $mileage, $bodyType, $fuelType, $images, $price, $location, $description)
    {
        $this->db->query("UPDATE book SET make=:make, model=:model, color=:color, conditions=:conditions, mileage=:mileage, bodyType=:bodyType, fuelType=:fuelType, images=:images, price=:price, location=:location, description=:description WHERE carId=:carId");

        $this->db->bind(':make', $make);
        $this->db->bind(':model', $model);
        $this->db->bind(':color', $color);
        $this->db->bind(':conditions', $conditions);
        $this->db->bind(':mileage', $mileage);
        $this->db->bind(':bodyType', $bodyType);
        $this->db->bind(':fuelType', $fuelType);
        $this->db->bind(':images', $images);
        $this->db->bind(':price', $price);
        $this->db->bind(':location', $location);
        $this->db->bind(':description', $description);
        $this->db->bind(':carId', $carId);

        $this->db->execute();
    }

    //method to retrive a car by carId from the database
    public function getCarById($carId)
    {
        $this->db->query("SELECT * FROM car WHERE carId=:carId");
        $this->db->bind(':carId', $carId);
        $this->db->execute();
        return $this->db->result();
    }

    //method to delete a car from the database by carId
    public function deleteCar($carId)
    {
        $this->db->query("DELETE FROM car WHERE carId=:carId");
        $this->db->bind(':carId', $carId);
        $this->db->execute();
    }
}
