<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getCinemaAddresses() {
            $this->db->query('
                            SELECT street_address, city, state, zip
                            FROM cinema
                            JOIN address
                            USING (address_id)
                            ');

            $results = $this->db->resultSet();

            return $results;
        }
    }