<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getCinemaIdByManagerId($manager_id) {
            // Calls query function from Database class in 'libraries' folder
            $this->db->query('SELECT cinema_id FROM cinema WHERE employee_id = :id');
            // Calls bind function from Database class in 'libraries' folder
            $this->db->bind(':id', $id);

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