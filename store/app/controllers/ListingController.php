<?php
class ListingController extends Controller {

    //method to display all listings
    public function index(){
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
    public function getAllAdvertsByUser(){
        $advertModel = $this->loadModel("Listing");
        $advert = $advertModel->getAdvertByUser();
        return $advert;
    }

    
}