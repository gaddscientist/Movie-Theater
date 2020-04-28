<!-- Pulls info from URLs and creates array from them.  Decides what to load as a controller/method/parameter -->
<!-- Core of framework -->

<?php
    /*
    * App Core Class
    * Creates URL & loads core controller
    * URL FORMAT - /controller/method/params
    */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            // print_r($this->getUrl());

            // Gets cleaned array of url values
            $url = $this->getUrl();

            // Look in controllers for first value
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If it exists, set it as controller
                $this->currentController = ucwords($url[0]);
                // Unset value at 0 Index
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            // Ex. Employees = new Employees, where Employees is a controller
            $this->currentController = new $this->currentController;

            // Check for second part of url
            if (isset($url[1])) {
                // Check to see if method exists in controller
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // Unset value at 1 Index
                    unset($url[1]);
                }
            }

            // Get params if $url has remaining values after unsetting first two values
            // Otherwise instantiates to empty array
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            // Calls current method from current controller with params as the parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        // Function to get an array of values from a url address
        public function getUrl() {
            // Checks for a url
            if(isset($_GET['url'])) {
                // Trims off an ending '/' if it is present
                $url = rtrim($_GET['url'], '/');
                // Sanitizes url to ensure only normal characters are present
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // Separates the url into an aray of variables based on '/'
                $url = explode('/', $url);
                return $url;
            }
        }

    }
