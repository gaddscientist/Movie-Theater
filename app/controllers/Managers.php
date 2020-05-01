<?php
    // Controller to handle logging in and registering
    class Managers extends Controller {
        // Models get loaded via the constructor
        public function __construct() {
            // Creates a managerModel variable and calls the model function to initialize it to
            $this->managerModel = $this->model('Manager');
        }

        // BEGIN: http://localhost/Movie-Theater/managers/register -----------------------------------------------------------------------------
        public function register() {
            // Checks to see if form is being submitted or loaded initially
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Initial data if POST request
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'cinema_id' => trim($_POST['cinema_id']),
                    'manager_id' => trim($_POST['manager_id']),
                    'email_err' => '',
                    'password_err' => '',
                    'cinema_id_err' => '',
                    'manager_id_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    // TODO: Function returns true/false, consider changing name
                    // Checks to see if email exists
                    if($this->managerModel->findManagerByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // TODO: Ensure cinema_id exists
                // Validate cinema_id 
                if(empty($data['cinema_id'])) {
                    $data['cinema_id_err'] = 'Please enter a Cinema ID Number';
                }

                // TODO: Ensure manager_id exists
                // Validate manager_id 
                if(empty($data['manager_id'])) {
                    $data['manager_id_err'] = 'Please enter a Manager ID Number';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                // Sets min password length
                elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }


                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                //===========IF VALID INPUT==================
                // Make sure no error messages have been set 
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) &&
                    empty($data['confirm_password_err'])) {
                        // Validated

                        // Hash the Password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                        // Register the manager 
                        if($this->managerModel->register($data)) {
                            redirect('managers/login');
                        }
                        else {
                            die('Something went wrong, user not registered');
                        }
                }
                //===========IF NOT VALID INPUT==================
                else {
                    // Load view with errors
                    $this->view('managers/register', $data);
                }
            }
            else {
                // Initial data if GET request
                $data = [
                    'email' => 'paulGuller@gmail.com',
                    'password' => '',
                    'confirm_password' => '',
                    'cinema_id' => '',
                    'manager_id' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'cinema_id_err' => '',
                    'manager_id_err' => ''
                ];

                // Load initial register view
                $this->view('managers/register', $data);
            }
        }
        // END: http://localhost/Movie-Theater/managers/register -----------------------------------------------------------------------------

        // BEGIN: http://localhost/Movie-Theater/managers/login -----------------------------------------------------------------------------
        public function login() {
            // Checks to see if form is being submitted or loaded 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Initial data if POST request
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Check if email exists
                if($this->managerModel->findManagerByEmail($data['email'])) {
                    // Manager found, do nothing

                }
                else {
                    // Manager not found
                    $data['email_err'] = 'Email not found';
                }

                //===========IF VALID INPUT==================
                // Make sure no error messages have been set 
                if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Validated
                        // Check and set logged in manager 
                        $loggedInManager = $this->managerModel->login($data['email'], $data['password']);

                        // If the manager was able to log in
                        if($loggedInManager) {
                            // Create session variables
                            $this->createManagerSession($loggedInManager);
                        }
                        else {
                            // Sets error message
                            $data['password_err'] = 'Password incorrect';

                            // Reloads view
                            $this->view('managers/login', $data);
                        }
                }
                //===========IF NOT VALID INPUT==================
                else {
                    // Load view with errors
                    $this->view('managers/login', $data);
                }
            }
            else {
                // Initial data if GET request
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('managers/login', $data);
            }
        }
        // END: http://localhost/Movie-Theater/managers/login -----------------------------------------------------------------------------

        // Sets session variables for the logged in manager
        public function createManagerSession($manager) {
            $_SESSION['manager_id'] = $manager->manager_id;
            $_SESSION['manager_email'] = $manager->email;
            if($_SESSION['manager_id'] == 100) {
                redirect('admins/index');
            } 
            else {
                redirect('pages/index');
            }
        }

        // Unsets session variables upon logout
        public function logout() {
            unset($_SESSION['manager_id']);
            unset($_SESSION['manager_email']);
            session_destroy();
            redirect('managers/login');
        }
    }