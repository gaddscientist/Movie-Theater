<?php
    class Pages extends Controller {
        public function __construct() {
            $this->managerModel = $this->model('Manager');
        }


        // Default method if no other is specified
        public function index() {
            $data = [
                'title' => 'Welcome'
            ];
            // Calls view() method from parent class
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);
        }
    }