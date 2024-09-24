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
}
