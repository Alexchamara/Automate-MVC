<?php

class CarController extends Controller
{
    //method to display all cars
    public function index()
    {
        $carModel = $this->loadModel("Car");
        $cars = $carModel->getAllCar();
        $this->renderView('');
    }

    //Method to add a new car
    public function addNewCar()
    {
        //check if the request method is POST by checking whether the user is clicked submit button
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $carModel = $this->loadModel("Car");
            $carModel->addCar(
                $_POST["make"],
                $_POST["model"],
                $_POST["color"],
                $_POST["conditions"],
                $_POST["mileage"],
                $_POST["bodyType"],
                $_POST["fuelType"],
                $_POST["images"],
                $_POST["price"],
                $_POST["location"],
                $_POST["description"],
            );
            header('');
        }

        //render view to add a new car
        $this->renderView('');
    }

    public function updateCarById($carId){
        //load the Car model
        $carModel = $this->loadModel("Car");

        //check if the update request method is POST by checking whether the user is clicked submit button
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $carModel = $this->loadModel("Car");
            $carModel->updateCar(
                $_POST["make"],
                $_POST["model"],
                $_POST["color"],
                $_POST["conditions"],
                $_POST["mileage"],
                $_POST["bodyType"],
                $_POST["fuelType"],
                $_POST["images"],
                $_POST["price"],
                $_POST["location"],
                $_POST["description"],
            );
            header('');
        }

        //retrieve the car with the given carId
        $car = $carModel->getCarById($carId);
        //render the view to update the car
        $this->renderView('');
    }

    public function showCarById($carId)
    {
        $carModel = $this->loadModel("Car");
        $car = $carModel->getCarById($carId);
        $this->renderView('');
    }

    //method to delete a car by carId
    public function deleteCarById($carId)
    {
        $carModel = $this->loadModel("Car");
        $carModel->deleteCar($carId);
        header('');
    }
}
