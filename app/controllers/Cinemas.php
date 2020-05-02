<?php
    // Cinema controller
    // Controls pages related to one cinema
    class Cinemas extends Controller {
        // Models are created in the constructor
        public function __construct() {
            // If user is not logged in, redirect to login page
            if(!isLoggedIn()) {
                redirect('managers/login');
            }
            // If logged in user is not the manager
            elseif($_SESSION['manager_id'] != 100) {
                redirect('cinemas/index/' . $_SESSION['cinema_id']);
            }

            $this->cinemaModel = $this->model('Cinema');
        }



        // Default method if no other is specified
        public function index($id) {
            $data = [
                'cinema_id' => $id
            ];

            // Calls view() method from parent class
            $this->view('cinemas/index', $data);
        }
        
    }