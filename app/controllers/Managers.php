<?php
    class Managers extends Controller {
        public function __constructor() {

        }

        public function register() {
            // Checks to see if form is being submitted or loaded 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
            }
            else {
                // Init data 
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('managers/register', $data);
            }
        }

        public function login() {
            // Checks to see if form is being submitted or loaded 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
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
    }