<?php
    // Class to interact with database for 'login' and 'register' pages
    class Manager {
        private $db;

        // Initialize database
        public function __construct() {
            $this->db = new Database;
        }

        // Register new Manager 
        public function register($data) {
            // SQL Query using named parameters
            $this->db->query('INSERT INTO manager VALUES (:cinema_id, :manager_id, :email, :password)');
            // Binds values from $data to named parameters in query string
            $this->db->bind(':cinema_id', $data['cinema_id']);
            $this->db->bind(':manager_id', $data['manager_id']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


        // Login User, validates login information
        public function login($email, $password) {
            // Query to get the manager with the specified email
            $this->db->query('SELECT * FROM manager WHERE email = :email');
            // Binds the given argument to the named parameter
            $this->db->bind(':email', $email);
            // Fetches the next row into $row
            $row = $this->db->single();

            // Pulls hashed password from returned manager 
            $hashed_password = $row->password;
            // Checks the hash agains a hashed version of the given password
            if(password_verify($password, $hashed_password)) {
                // Returns the manager if password is valid
                return $row;
            }
            else {
                return false;
            }
        }

        
        //===================SQL QUERIES=============================================================

        // Find manager by email
        public function findManagerByEmail($email) {
            // Calls query function from Database class in 'libraries' folder
            $this->db->query('SELECT * FROM manager WHERE email = :email');
            // Calls bind function from Database class in 'libraries' folder
            $this->db->bind(':email', $email);

            // Calls single function from Database class in 'libraries' folder
            $row = $this->db->single();

            // Checks row to see if the row exists
            if($this->db->rowCount() > 0) {
                // Email found
                return true;
            }
            else {
                // Email not found
                return false;
            }
        }


        // Find employee by email
        public function findEmployeeByEmail($email) {
            // Calls query function from Database class in 'libraries' folder
            $this->db->query('SELECT * FROM employee WHERE email = :email');
            // Calls bind function from Database class in 'libraries' folder
            $this->db->bind(':email', $email);

            // Calls single function from Database class in 'libraries' folder
            $row = $this->db->single();

            // Checks row to see if the row exists
            if($this->db->rowCount() > 0) {
                // Email found
                return true;
            }
            else {
                // Email not found
                return false;
            }
        }
        //===================END SQL QUERIES=============================================================

    }