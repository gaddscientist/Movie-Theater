<?php
    class Manager {
        private $db;

        // Initialize database
        public function __construct() {
            $this->db = new Database;
        }

        // Find manager by email
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
    }