<?php
    class Cinema {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getCinemaIdByManagerId($manager_id) {
            // Calls query function from Database class in 'libraries' folder
            $this->db->query('SELECT cinema_id FROM cinema WHERE employee_id = :id');
            // Calls bind function from Database class in 'libraries' folder
            $this->db->bind(':id', $manager_id);

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
        //a function to get the employees from the store id
        public function getEmployees($store_id){
            //make query
            $this->db->query( 'SELECT * FROM employee WHERE store_number =:store_id ');
            //bind the values
            $this->db->bind(':store_id',$store_id);
            //execute the query
            $results = $this->db->resultSet();
            //return the result
            return $results;
    
        }
    }