<?php
    // Controller to handle functionality restricted to the admin 
    class Admins extends Controller {

        public function __construct() {
            // If admin is not logged in, redirect to login page
            if(!isLoggedIn()) {
                redirect('managers/login');
            }
            // If logged in user is not the manager
            elseif($_SESSION['manager_id'] != 100) {
                redirect('pages/index');
            }

            // Admin model is created
            $this->adminModel = $this->model('Admin');
        }

        public function index() {
            // Get Cinema addresses
            $cinema_addresses = $this->adminModel->getCinemaAddresses();

            // Adds addresses to $data to be passed to view
            $data = [
                'cinema_addresses' => $cinema_addresses
            ];

            // Calls view with $data passed to it
            $this->view('admins/index', $data);
        }

// BEGIN: http://localhost/Movie-Theater/admins/add_cinema-----------------------------------------------------------------------------
        public function add_cinema() {
            // Checks to see if form is being submitted or loaded initially
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Initial data if POST request
                $data = [
                    'street_address' => trim($_POST['street_address']),
                    'city' => trim($_POST['city']),
                    'state' => trim($_POST['state']),
                    'zip' => trim($_POST['zip']),
                    'manager_id' => trim($_POST['manager_id']),
                    'phone' => trim($_POST['phone']),
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => '',
                    'manager_id_err' => '',
                    'phone_err' => ''
                ];

                // Validate street_address 
                if(empty($data['street_address'])) {
                    $data['street_address_err'] = 'Please enter the street address';
                }

                // Validate city
                if(empty($data['city'])) {
                    $data['city_err'] = 'Please enter a city';
                }
                elseif(!ctype_alpha($data['city'])) {
                    $data['city_err'] = 'Please enter letters only';
                }

                // Validate state
                if(empty($data['state'])) {
                    $data['state_err'] = 'Please enter a state';
                }
                elseif(strlen($data['state']) != 2 || !ctype_alpha($data['state'])) {
                    $data['state_err'] = 'Please enter the state as two letters';
                }
                else {
                    $data['state'] = strtoupper($data['state']);
                }

                // Validate zip 
                if(empty($data['zip'])) {
                    $data['zip_err'] = 'Please enter a zip code';
                }
                elseif(!is_numeric($data['zip']) || strlen($data['zip']) != 5) {
                    $data['zip_err'] = 'Please enter a 5 digit number';
                }

                // Validate manager_id
                if(!empty($data['manager_id'])) {
                    // If the manager_id isn't found
                    if(!($this->adminModel->findManagerById($data['manager_id']))) {
                        $data['manager_id_err'] = 'That Employee ID does not exist. Please create the cinema then add a manager or employees';
                    }
                    //continue
                }


                //===========IF VALID INPUT==================
                // Make sure no error messages have been set 
                if(empty($data['street_address_err']) && empty($data['city_err']) && empty($data['state_err']) &&
                    empty($data['zip_err']) && empty($data['manager_id_err'])) {
                        // Validated

                        // Register the Cinema
                        if($this->adminModel->registerCinema($data)) {
                            flash('cinema_message', 'Cinema Successfully Added');
                            redirect('admins/index');
                        }
                        else {
                            die('Something went wrong, cinema not registered');
                        }
                }
                //===========IF NOT VALID INPUT==================
                else {
                    // Load view with errors
                    $this->view('admins/add_cinema', $data);
                }
            }
            else {
                // Initial data if GET request
                $data = [
                    'street_address' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'manager_id' => '',
                    'phone' => '',
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => '',
                    'manager_id_err' => '',
                    'phone_err' => ''
                ];

                // Load initial add_cinema view
                $this->view('admins/add_cinema', $data);
            }
        }
        // END: http://localhost/Movie-Theater/admins/add_cinema-----------------------------------------------------------------------------

    }