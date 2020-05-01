<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getCinemaAddresses() {
            $this->db->query('
                            SELECT cinema_id, street_address, city, state, zip
                            FROM cinema
                            JOIN address
                            USING (address_id)
                            ORDER BY state, city, street_address
                            ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function registerAddress($data, $returnType = 'bool') {
            $temp_id;
            // Adds address to address table
            $this->db->query('INSERT INTO address (street_address, city, state, zip) VALUES (:street_address, :city, :state, :zip)');
            $this->db->bind(':street_address', $data['street_address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':state', $data['state']);
            $this->db->bind(':zip', $data['zip']);

             // Execute
            if($this->db->execute()) {
                if($returnType = 'id') {
                    $this->db->query('SELECT LAST_INSERT_ID()');
                    $temp_id = json_decode(json_encode($this->db->single()), true);
                    return $temp_id['LAST_INSERT_ID()'];
                }
                return true;
            }
            else {
                return false;
            }
        }

        public function registerCinema($data) {
            $new_address_id = $this->registerAddress($data, 'id');
            $fields = '';
            $named_params = '';

            if(isset($data['manager_id'])) {
                $fields = $fields . ', manager_id';
                $named_params = $named_params . ', :manager_id';
            }
            if(isset($data['phone'])) {
                $fields = $fields . ', phone';
                $named_params = $named_params . ', :phone';
            }

            $this->db->query('INSERT INTO cinema (address_id' . $fields . ') VALUES (:address_id' . $named_params . ')');
            // $this->db->query('INSERT INTO cinema (address_id) VALUES (:address_id)');
            $this->db->bind(':address_id', $new_address_id);

            if(isset($data['manager_id'])) {
                $this->db->bind(':manager_id', $data['manager_id']);
            }
            if(isset($data['phone'])) {
                $this->db->bind(':phone', $data['phone']);
            }

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        
        public function findManagerById($id) {
            // Calls query function from Database class in 'libraries' folder
            $this->db->query('SELECT * FROM employee WHERE employee_id = :id');
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