<?php
    class Managers extends Controller {
        // Models get loaded via the constructor
        public function __construct() {
            $this->managerModel = $this->model('Manager');
        }

        public function register() {
            // Checks to see if form is being submitted or loaded 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
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
                    // Checks to see if email exists
                    // Function returns true/false
                    if($this->managerModel->findManagerByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate cinema_id 
                if(empty($data['cinema_id'])) {
                    $data['cinema_id_err'] = 'Please enter a Cinema ID Number';
                }

                // Validate manager_id 
                if(empty($data['manager_id'])) {
                    $data['manager_id_err'] = 'Please enter a Manager ID Number';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
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

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) &&
                    empty($data['confirm_password_err'])) {
                        // Validated

                        // Hash Password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                        // Register User
                        if($this->managerModel->register($data)) {
                            redirect('managers/login');
                        }
                        else {
                            die('Something went wrong, user not registered');
                        }
                }
                else {
                    // Load view with errors
                    $this->view('managers/register', $data);
                }
            }
            else {
                // Init data 
                $data = [
                    'email' => '',
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

                // Load view
                $this->view('managers/register', $data);
            }
        }

        public function login() {
            // Checks to see if form is being submitted or loaded 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
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

                // Check for username
                if($this->managerModel->findManagerByEmail($data['email'])) {
                    // Manager found 

                }
                else {
                    // Manager not found
                    $data['email_err'] = 'Email not found';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Validated
                        // Check and set logged in user
                        $loggedInManager = $this->managerModel->login($data['email'], $data['password']);

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
                else {
                    // Load view with errors
                    $this->view('managers/login', $data);
                }
            }
            else {
                // Init data 
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

        public function createManagerSession($manager) {
            $_SESSION['manager_id'] = $manager->manager_id;
            $_SESSION['manager_email'] = $manager->email;
            redirect('pages/index');
        }

        public function logout() {
            unset($_SESSION['manager_id']);
            unset($_SESSION['manager_email']);
            session_destroy();
            redirect('managers/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['manager_id'])) {
                return true;
            }
            else {
                return false;
            }
        }
    }