<?php

// class App
// {
//     //define the default controller to be used
//     protected $controller = 'ViewController';

//     //define the default method to be used
//     protected $method = 'index';

//     //initilaze parameters to be passed to the method
//     protected $params = [];

//     //constructor method 
//     public function __construct()
//     {

//         //parse the URL to get its components by calling below parseUrl() private method
//         $urlParts = $this->parseUrl();

//         //import the routes confiduration file
//         require_once '../app/routes.php';

//         //check if the first part of the URL exists
//         if (isset($urlParts[0])) {
//             $route = $urlParts[0];
//         }

//         //check if the second part of the URL exists
//         if ($urlParts[1]) {
//             $route = $urlParts[0] . '/' . $urlParts[1];
//         }

//         //check if the route exists in the routes array in router.php file
//         if (isset($routes[$route])) {

//             //set the controller & method based on the route configuration
//             $this->controller = $routes[$route]['controller'];
//             $this->method = $routes[$route]['method'];

//             //set the remaining parts of the url to the params
//             $this->params = array_slice($urlParts, 2);
//         } else {
//             //if the route not found display the error message
//             echo '404 - route not found';
//             return;
//         }

//         //include the controller file
//         require_once '../app/controllers' . $this->controller . '.php';

//         //create an object (Instantiate controller) from the imported controller
//         $this->controller = new $this->controller;

//         //call the method of the controller with the parameters
//         call_user_func_array([$this->controller, $this->method], $this->params);
//     }

//     //function to parse the URL and return its components
//     public function parseUrl() {
//         //check if the 'url' parameter is set in the GET request
//         //it will process url configurations through .htaccess
//         if(isset($_GET['url'])){
//             //trim any trailing slashes from the URL, sanitize it, and split it into an array
//             return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
//         }
//         //return the array with empty string if 'url' parameter is not set
//         return [''];

//     }
// }


class App
{
    // Initialize default controller to be used
    protected $controller = 'ViewController';

    // Initialize default method to be called in the controller
    protected $method = 'index';

    // Initialize parameters to be passed to the method
    protected $params = [];

    // Constructor method
    public function __construct()
    {
        // Parse the URL to get its components by calling below parseUrl() private method
        $urlParts = $this->parseUrl();

        // Import the routes configuration file
        require_once '../app/routes.php';

        // Check if the first part of the URL exists
        if (isset($urlParts[0])) {
            // Set the route to the first part of the URL
            $route = $urlParts[0];
        }

        // Check if the second part of the URL exists
        if (isset($urlParts[1])) {
            // Append the second part of the URL to the route
            $route = $urlParts[0] . '/' . $urlParts[1];
        }

        // Check if the route exists in the routes array in router.php file
        if (isset($routes[$route])) {
            // Set the controller based on the route configuration
            $this->controller = $routes[$route]['controller'];
            // Set the method based on the route configuration
            $this->method = $routes[$route]['method'];
            // Set the remaining parts of the url to the params
            $this->params = array_slice($urlParts, 2);

        } else {
            // If the route is not found, display a 404 error message
            echo "404 - Route Not found!";
            return;
        }

        // Include the controller file
        require_once '../app/controllers/' . $this->controller . '.php';

        // Create an object (Instantiate controller) from the imported controller
        $this->controller = new $this->controller;

        // Call the method of the controller with the parameters
        // --------------------------------------------------------------------------------------------------------------------
        // call_user_func_array() is used to call a callback function with an array of parameters to be passed to the function
        // Ex: call_user_func_array([BookController, updateBook], [$id])
        // In the above example this function will call updateBook($id) method in BookController class
        // --------------------------------------------------------------------------------------------------------------------
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Function to parse the URL and return its components
    private function parseUrl()
    {
        // Check if the 'url' parameter is set in the GET request (.htaccess configurations will process the url)
        if (isset($_GET['url'])) {
            // Trim any trailing slashes from the URL, sanitize it, and split it into an array
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        // Return an array with an empty string if 'url' parameter is not set 
        return [''];
    }
}