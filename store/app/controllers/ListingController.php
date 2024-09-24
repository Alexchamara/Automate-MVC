<?php
class ListingController extends Controller
{

    //method to display all listings
    public function index()
    {
        $advertModel = $this->loadModel("Listing");
        $product = $advertModel->getAllListings();
        $this->renderView('Advert/AdvertListing', ['product' => $product]);
    }

    //method to display listing data in the view
    public function displayListing()
    {
        $advertModel = $this->loadModel("Listing");
        $listing = $advertModel->getAllListings();
        $this->renderView('Advert/ListingContainer', ['listing' => $listing]);
    }

    //method to view a product
    public function getAdvertById($id)
    {
        $advertModel = $this->loadModel("Listing");
        $result = $advertModel->getListingById($id);
        if (isset($id)) {
            $this->renderView('Advert/ProductView', ['listing' => $result["listing"], 'car' => $result["car"]]);
        } else {
            header('Location: ?error=notfound');
            exit();
        }
    }

    //method to view user adverts on user dashboard
    public function getAllAdvertsByUser()
    {
        $advertModel = $this->loadModel("Listing");
        $advert = $advertModel->getAdvertByUser();
        return $advert;
    }

    //method to delete a listing
    public function deleteListing($id)
    {
        $advertModel = $this->loadModel("Listing");
        $advertModel->deleteListing($id);
        header('Location: ' . BASE_URL . 'dashboard');    
    }

    //method to update a listing
    public function updateListing($id)
    {
        $advertModel = $this->loadModel("Listing");
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fieldsToUpdate = [];
            $errors = [];
    
            // Validate and sanitize input fields
            if (!empty(trim($_POST['bodyType']))) {
                $fieldsToUpdate['bodyType'] = trim($_POST['bodyType']);
            }
    
            if (!empty(trim($_POST['fuelType']))) {
                $fieldsToUpdate['fuelType'] = trim($_POST['fuelType']);
            }
    
            if (!empty(trim($_POST['transmission']))) {
                $fieldsToUpdate['transmission'] = trim($_POST['transmission']);
            }
    
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
    
            if (!empty(trim($_POST['images']))) {
                $fieldsToUpdate['images'] = trim($_POST['images']);
            }
    
            if (!empty(trim($_POST['price']))) {
                $fieldsToUpdate['price'] = trim($_POST['price']);
            }
    
            if (!empty(trim($_POST['location']))) {
                $fieldsToUpdate['location'] = trim($_POST['location']);
            }
    
            if (!empty(trim($_POST['contactNumber']))) {
                $fieldsToUpdate['contactNumber'] = trim($_POST['contactNumber']);
            }
    
            if (!empty(trim($_POST['advertEmail']))) {
                $fieldsToUpdate['advertEmail'] = trim($_POST['advertEmail']);
            }
    
            if (!empty(trim($_POST['description']))) {
                $fieldsToUpdate['description'] = trim($_POST['description']);
            }
    
            // If there are no validation errors, proceed with the update
            if (empty($errors)) {
                $updateResult = $advertModel->updateListing($id, $fieldsToUpdate);
                if ($updateResult) {
                    header('Location: ' . BASE_URL . 'dashboard');
                    exit();
                } else {
                    $errors['database'] = "Failed to update the listing.";
                    $this->renderView('Advert/UpdateAdvert', ['errors' => $errors, 'fields' => $_POST]);
                }
            } else {
                // Handle validation errors
                $this->renderView('Advert/UpdateAdvert', ['errors' => $errors, 'fields' => $_POST]);
            }
        } else {
            // Handle GET request
            $listing = $advertModel->getListingById($id);
            $this->renderView('Advert/UpdateAdvert', ['listing' => $listing]);
        }
    }
}