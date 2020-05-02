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

        public function getTotalDailyTickets($cinema_id, $date) {
            $this->db->query('SELECT dailyTickets(:cinema_id, :date) as total_tickets FROM dual');
            $this->db->bind(':cinema_id', $cinema_id);
            $this->db->bind(':date', $date);
            $result = json_decode(json_encode($this->db->single()), true);
            return $result['total_tickets'];
        }

        public function getDailyGrossSales($cinema_id, $date) {
            $this->db->query('SELECT dailyGrossSales(:cinema_id, :date) as gross_sales FROM dual');
            $this->db->bind(':cinema_id', $cinema_id);
            $this->db->bind(':date', $date);
            $result = json_decode(json_encode($this->db->single()), true);
            return $result['gross_sales'];
        }

        public function getDailySalesByType($cinema_id, $date, $type) {
            $this->db->query('SELECT dailySalesByType(:cinema_id, :date, :type) as type_sales FROM dual');
            $this->db->bind(':cinema_id', $cinema_id);
            $this->db->bind(':date', $date);
            $this->db->bind(':type', $type);
            $result = json_decode(json_encode($this->db->single()), true);
            return $result['type_sales'];
        }

        public function getDailyTransactions($cinema_id, $date) {
            $this->db->query('SELECT dailyTransactions(:cinema_id, :date) as num_transactions FROM dual');
            $this->db->bind(':cinema_id', $cinema_id);
            $this->db->bind(':date', $date);
            $result = json_decode(json_encode($this->db->single()), true);
            return $result['num_transactions'];
        }
    }