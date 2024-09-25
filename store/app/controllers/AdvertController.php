<?php

class AdvertController extends Controller
{
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

    public function payment()
    {
        $this->renderView('Advert/Payment');
    }


    //method to create a new advert
    public function createNewAdvert()
    {
        // check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
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
            $contactNumber = trim($_POST['contactNumber']);
            $advertEmail = trim($_POST['advertEmail']);
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
            if (empty($contactNumber)) $emptyFields[] = 'contactNumber';
            if (empty($advertEmail)) $emptyFields[] = 'advertEmail';
            if (empty($description)) $emptyFields[] = 'description';

            // Validate the user input
            if (!empty($emptyFields)) {
                $queryString = http_build_query(['error' => 'emptyinput', 'fields' => $emptyFields]);
                header('Location: ?' . $queryString);
                exit();
            } else {
                $advertModel = $this->loadModel("AdvertManage");
                $advertModel->createAdvert($make, $model, $engine, $registrationYear, $color, $conditions, $mileage, $bodyType, $fuelType, $transmission, $images, $price, $location, $contactNumber, $advertEmail, $description);
                header('Location: dashboard');
                exit();
            }
        }
        $this->renderView('Advert/CreateAdvert');
    }

    //method to update an advert
    public function updateAdvert()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $advertModel = $this->loadModel("AdvertManage");
            $carId = trim($_POST['carId']);

            // Create an associative array to store the updated fields
            $fieldsToUpdate = [];

            if (!empty(trim($_POST['make']))) {
                $fieldsToUpdate['make'] = trim($_POST['make']);
            }
            if (!empty(trim($_POST['model']))) {
                $fieldsToUpdate['model'] = trim($_POST['model']);
            }
            if (!empty(trim($_POST['engine']))) {
                $fieldsToUpdate['engine'] = trim($_POST['engine']);
            }
            if (!empty(trim($_POST['registrationYear']))) {
                $fieldsToUpdate['registrationYear'] = trim($_POST['registrationYear']);
            }
            if (!empty(trim($_POST['color']))) {
                $fieldsToUpdate['color'] = trim($_POST['color']);
            }
            if (!empty(trim($_POST['conditions']))) {
                $fieldsToUpdate['conditions'] = trim($_POST['conditions']);
            }
            if (!empty(trim($_POST['mileage']))) {
                $fieldsToUpdate['mileage'] = trim($_POST['mileage']);
            }
            if (!empty(trim($_POST['bodyType']))) {
                $fieldsToUpdate['bodyType'] = trim($_POST['bodyType']);
            }
            if (!empty(trim($_POST['fuelType']))) {
                $fieldsToUpdate['fuelType'] = trim($_POST['fuelType']);
            }
            if (!empty(trim($_POST['transmission']))) {
                $fieldsToUpdate['transmission'] = trim($_POST['transmission']);
            }
            // if (!empty(trim($_POST['images']))) {
            //     $fieldsToUpdate['images'] = trim($_POST['images']);
            // }
            if (!empty(trim($_POST['price']))) {
                $fieldsToUpdate['price'] = trim($_POST['price']);
            }
            if (!empty(trim($_POST['location']))) {
                $fieldsToUpdate['location'] = trim($_POST['location']);
            }
            if (!empty(trim($_POST['description']))) {
                $fieldsToUpdate['description'] = trim($_POST['description']);
            }

            // Ensure at least one field is provided for update
            if (count($fieldsToUpdate) > 0) {
                // Call the model's method to perform the update
                $advertModel->updateAdvert($carId, $fieldsToUpdate);

                // Redirect to index after successful update
                header('Location: home');
                exit();
            } else {
                // No fields provided, redirect with an error message
                header('Location: ?error=noinput');
                exit();
            }
        }

        // Render the update view if not a POST request
        $this->renderView('Advert/UpdateAdvert');
    }


    //method to view a product
    public function productView($id)
    {
        $advertModel = $this->loadModel("Listing");

        $result = $advertModel->getListingById($id);

        if ($result) {
            $this->renderView('Advert/ProductView', ['listing' => $result["listing"], 'car' => $result["car"]]);
        } else {
            header('Location: ?error=notfound');
            exit();
        }
        $this->renderView('Advert/ProductView', ['listing' => $result["listing"], 'car' => $result["car"]]);
    }
}
