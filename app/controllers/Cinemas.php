<?php
    // Cinema controller
    // Controls pages related to one cinema
    class Cinemas extends Controller {
        // Models are created in the constructor
        public function __construct() {
            // If user is not logged in, redirect to login page
            if(!isLoggedIn()) {
                redirect('managers/login');
            }
            // If logged in user is not the manager
            elseif($_SESSION['manager_id'] != 100) {
                redirect('cinemas/index/' . $_SESSION['cinema_id']);
            }

            $this->cinemaModel = $this->model('Cinema');
        }


        // Default method if no other is specified
        public function index($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'cinema_id' => $id,
                'finances' => array (
                    'date_chosen' => trim($_POST['date_chosen']),
                    'total_tickets' => '',
                    'gross_sales' => '',
                    'CREDIT' => '',
                    'CASH' => '',
                    'GIFT' => '',
                    'transactions' => ''
                )
            ];

            $data['finances']['total_tickets'] = $this->cinemaModel->getTotalDailyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['gross_sales'] = $this->cinemaModel->getDailyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['CREDIT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['finances']['CASH'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['finances']['GIFT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['finances']['transactions'] = $this->cinemaModel->getDailyTransactions($data['cinema_id'], $data['finances']['date_chosen']);

        }
        else {

            $data = [
                'cinema_id' => $id,
                'finances' => array (
                    'date_chosen' => date("Y-m-d"),
                    'total_tickets' => '',
                    'gross_sales' => '',
                    'CREDIT' => '',
                    'CASH' => '',
                    'GIFT' => '',
                    'transactions' => ''
                )
            ];

            $data['finances']['total_tickets'] = $this->cinemaModel->getTotalDailyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['gross_sales'] = $this->cinemaModel->getDailyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['CREDIT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['finances']['CASH'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['finances']['GIFT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['finances']['transactions'] = $this->cinemaModel->getDailyTransactions($data['cinema_id'], $data['finances']['date_chosen']);
        }

        if(!isset($data['finances']['total_tickets'])) {
            $data['finances']['total_tickets'] = 0;
        }
        foreach($data['finances'] as $key => $value) {
            if(!isset($data['finances'][$key])) {
                $data['finances'][$key] = '0.00';
            }
        }


        // Calls view() method from parent class
        $this->view('cinemas/index', $data);
        }
        
    }