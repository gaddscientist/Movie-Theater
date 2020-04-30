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

            // Addes addresses to $data to be passed to view
            $data = [
                'cinema_addresses' => $cinema_addresses
            ];

            // Calls view with $data passed to it
            $this->view('admins/index', $data);
        }

        public function add_cinema() {
            // $data to be passed to view
            $data = [];

            // Calls view with $data passed to it
            $this->view('admins/add_cinema');
        }
    }