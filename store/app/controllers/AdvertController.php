<?php

class AdvertController extends Controller
{

    //method to display all adverts
    // public function index()
    // {
    //     $advertModel = $this->loadModel("AdvertManage");
    //     $adverts = $advertModel->getAllAdverts();
    //     $this->renderView('Advert/AdvertView', ['adverts' => $adverts]);
    // }

    //method to display create advert page after checking if the user is logged in
    public function index()
    {
        if (isset($_SESSION['userId'])) {
            $this->renderView('Advert/createAdvert');
        } else {
            header('Location: sign');
            exit();
        }
    }

    //method to display all adverts
    public function getAllListings()
    {
        $advertModel = $this->loadModel("AdvertManage");
        $adverts = $advertModel->getListings();
        $this->renderView('Advert/AdvertListing');
    }
    

    //method to create a new advert
    public function createNewAdvert()
    {
        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $advertModel = $this->loadModel("AdvertManage");
            $make = trim($_POST['make']);
            $model = trim($_POST['model']);
            $engine = trim($_POST['engine']);
            $registrationYear = trim($_POST['registrationYear']);
            $color = trim($_POST['color']);     //Add color into the form
            $conditions = trim($_POST['conditions']);
            $mileage = trim($_POST['mileage']);
            $bodyType = trim($_POST['bodyType']);
            $fuelType = trim($_POST['fuelType']);
            $transmission = trim($_POST['transmission']);
            $images = trim($_POST['images']);
            $price = trim($_POST['price']);
            $location = trim($_POST['location']);
            $description = trim($_POST['description']);

            // Collect empty fields
            $emptyFields = [];
            if (empty($make)) $emptyFields[] = 'make';
            if (empty($model)) $emptyFields[] = 'model';
            if (empty($engine)) $emptyFields[] = 'engine';
            if (empty($registrationYear)) $emptyFields[] = 'registrationYear';
            if (empty($color)) $emptyFields[] = 'color';
            if (empty($conditions)) $emptyFields[] = 'conditions';
            if (empty($mileage)) $emptyFields[] = 'mileage';
            if (empty($bodyType)) $emptyFields[] = 'bodyType';
            if (empty($fuelType)) $emptyFields[] = 'fuelType';
            if (empty($transmission)) $emptyFields[] = 'transmission';
            if (empty($images)) $emptyFields[] = 'images';
            if (empty($price)) $emptyFields[] = 'price';
            if (empty($location)) $emptyFields[] = 'location';
            if (empty($description)) $emptyFields[] = 'description';

            // Validate the user input
            if (!empty($emptyFields)) {
                $queryString = http_build_query(['error' => 'emptyinput', 'fields' => $emptyFields]);
                header('Location: ?' . $queryString);
                exit();
            } else {
                $advertModel->createAdvert($make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $description);
                header('Location: home');
                exit();
            }
        }
        $this->renderView('Advert/CreateAdvert');
    }

    //method to update an advert
    public function updateAdvert()
    {
        //check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $advertModel = $this->loadModel("AdvertManage");
            $carId = trim($_POST['carId']);
            $make = trim($_POST['make']);
            $model = trim($_POST['model']);
            $engine = trim($_POST['engine']);
            $registrationYear = trim($_POST['registrationYear']);
            $color = trim($_POST['color']);
            $conditions = trim($_POST['conditions']);
            $mileage = trim($_POST['mileage']);
            $bodyType = trim($_POST['bodyType']);
            $fuelType = trim($_POST['fuelType']);
            $transmission = trim($_POST['transmission']);
            $images = trim($_POST['images']);
            $price = trim($_POST['price']);
            $location = trim($_POST['location']);
            $description = trim($_POST['description']);

            //validate the user input
            if (empty($make) || empty($model) || empty($engine) || empty($registrationYear) || empty($color) || empty($conditions) || empty($mileage) || empty($bodyType) || empty($fuelType) || empty($transmission) || empty($images) || empty($price) || empty($location) || empty($description)) {
                header('Location: ?error=emptyinput');
                exit();
            } else {
                $advertModel->updateAdvert($carId, $make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $description);
                header('Location: index');
                exit();
            }
        }
        $this->renderView('Advert/UpdateAdvert');
    }

    //method to delete an advert
    public function deleteAdvert($carId)
    {
        $advertModel = $this->loadModel("AdvertManage");
        $advertModel->deleteAdvert($carId);
        header('Location: index');
    }

    //method to get adverts by location, model, registration year, condition, engine, fuel type, transmission, color, price
    public function getAdvertsByFilter()
    {
        $advertModel = $this->loadModel("AdvertManage");
        $location = trim($_POST['location']);
        $model = trim($_POST['model']);
        $engine = trim($_POST['engine']);
        $registrationYear = trim($_POST['registrationYear']);
        $conditions = trim($_POST['conditions']);
        $mileage = trim($_POST['mileage']);
        $fuelType = trim($_POST['fuelType']);
        $transmission = trim($_POST['transmission']);
        $color = trim($_POST['color']);
        $price = trim($_POST['price']);

        $adverts = $advertModel->getAdvertsByFilter($location, $model, $engine, $registrationYear, $conditions, $mileage, $fuelType, $transmission, $color, $price);
        $this->renderView('Advert/AdvertView', ['adverts' => $adverts]);
    }
}
