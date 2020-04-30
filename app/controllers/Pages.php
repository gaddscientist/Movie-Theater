<?php
    // Default controller
    // Controls 'Movie-Theater/' as well as any 'pages/' url's
    class Pages extends Controller {
        // Models are created in the constructor
        public function __construct() {
            // TODO: Only using manager Model for example, needs to be changed
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

        // function for the 'about/' url
        public function about() {
            $data = [
                'title' => 'About Us'
            ];

            $this->view('pages/about', $data);
        }
    }