<?php
    // Cinema controller
    // Controls pages related to one cinema
    class Cinemas extends Controller {
        // Models are created in the constructor
        public function __construct() {
            // TODO: Only using manager Model for example, needs to be changed
            // $this->cinemaModel = $this->model('Cinema');
        }


        // Default method if no other is specified
        public function index() {
            $data = [
                'title' => 'Cinema Page'
            ];

            // Calls view() method from parent class
            $this->view('cinemas/index', $data);
        }
        
    }