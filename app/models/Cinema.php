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
        public function addEmployees($data){
            //query
            $this->db->query( 'INSERT INTO `employee` 
            (`employee_id`, `first_name`, `last_name`,`email`, `phone`, `birthdate`, `salary`, `hire_date`, `ssn`, `store_number`, `manager_id`) 
                 VALUES(NULL,:first_name,:last_name,:email, :phone, :birthdate, :salary, :hire_date, :ssn, :store_number, :manager_id )');
            //bind the values
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':birthdate', $data['birthdate']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':hire_date', $data['hire_date']);
            $this->db->bind(':ssn', $data['ssn']);
            //$this->db->bind(':address_id', $data['adress_id']);
            $this->db->bind(':store_number', $data['store_number']);
            $this->db->bind(':manager_id', $data['manager_id']);
            //execute
            $this->db->execute();


            



        }
    }