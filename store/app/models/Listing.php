<?php

class Listing {
    //hold the database connection
    private $db;

    //method to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    //method to retrieve all listings from the database
    public function getAllListing()
    {
        $this->db->query("SELECT * FROM listing");
        $this->db->execute();
        return $this->db->results();
    }
}