
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
                ),
                'monthly_finances' => array (
                    'total_tickets' => '',
                    'gross_sales' => '',
                    'CREDIT' => '',
                    'CASH' => '',
                    'GIFT' => '',
                    'transactions' => ''
                )
            ];

            // Daily finances
            $data['finances']['total_tickets'] = $this->cinemaModel->getTotalDailyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['gross_sales'] = $this->cinemaModel->getDailyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['CREDIT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['finances']['CASH'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['finances']['GIFT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['finances']['transactions'] = $this->cinemaModel->getDailyTransactions($data['cinema_id'], $data['finances']['date_chosen']);

            // Monthly finances
            $data['monthly_finances']['total_tickets'] = $this->cinemaModel->getTotalMonthlyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['monthly_finances']['gross_sales'] = $this->cinemaModel->getMonthlyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['monthly_finances']['CREDIT'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['monthly_finances']['CASH'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['monthly_finances']['GIFT'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['monthly_finances']['transactions'] = $this->cinemaModel->getMonthlyTransactions($data['cinema_id'], $data['finances']['date_chosen']);

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
                ),
                'monthly_finances' => array (
                    'total_tickets' => '',
                    'gross_sales' => '',
                    'CREDIT' => '',
                    'CASH' => '',
                    'GIFT' => '',
                    'transactions' => ''
                ),
                'employees' => ''
            ];

            // Daily finances
            $data['finances']['total_tickets'] = $this->cinemaModel->getTotalDailyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['gross_sales'] = $this->cinemaModel->getDailyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['finances']['CREDIT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['finances']['CASH'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['finances']['GIFT'] = $this->cinemaModel->getDailySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['finances']['transactions'] = $this->cinemaModel->getDailyTransactions($data['cinema_id'], $data['finances']['date_chosen']);

            // Monthly finances
            $data['monthly_finances']['total_tickets'] = $this->cinemaModel->getTotalMonthlyTickets($data['cinema_id'], $data['finances']['date_chosen']);
            $data['monthly_finances']['gross_sales'] = $this->cinemaModel->getMonthlyGrossSales($data['cinema_id'], $data['finances']['date_chosen']);
            $data['monthly_finances']['CREDIT'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CREDIT');
            $data['monthly_finances']['CASH'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'CASH');
            $data['monthly_finances']['GIFT'] = $this->cinemaModel->getMonthlySalesByType($data['cinema_id'], $data['finances']['date_chosen'], 'GIFT');
            $data['monthly_finances']['transactions'] = $this->cinemaModel->getMonthlyTransactions($data['cinema_id'], $data['finances']['date_chosen']);
            
            // Employees
            $data['employees'] = $this->cinemaModel->getEmployees($data['cinema_id']);
        }

        if(!isset($data['finances']['total_tickets'])) {
            $data['finances']['total_tickets'] = 0;
        }
        foreach($data['finances'] as $key => $value) {
            if(!isset($data['finances'][$key])) {
                $data['finances'][$key] = '0.00';
            }
        }

        if(!isset($data['monthly_finances']['total_tickets'])) {
            $data['monthly_finances']['total_tickets'] = 0;
        }
        foreach($data['monthly_finances'] as $key => $value) {
            if(!isset($data['monthly_finances'][$key])) {
                $data['monthly_finances'][$key] = '0.00';
            }
        }

        // Calls view() method from parent class
        $this->view('cinemas/index', $data);
        }
        
       
//edit employee





        //add employeee
        public function modify($id) {
            // Checks to see if form is being submitted or loaded initially
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
            
                 // Initial data if POST request
                 $data = [
                     //data for insert
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'store_number'=>$id,
                    'birthdate' => trim($_POST['birthdate']),
                    'salary' =>  trim($_POST['salary']),
                    'hire_date' => trim($_POST['hire_date']),
                    'ssn' => trim($_POST['ssn']),
                    'manager_id' =>trim($_POST['manager_id']),
                    //err meesages 
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'salary_err' => '',
                    'hire_date_err' => '',
                    'ssn_err'=> '',
                    'store_number_err'=>'',
                    'manager_id_err'=>''
                ];
                
            //basic validation
            
                  // Validate first_name 
                if(empty($data['first_name'])) {
                   $data['first_name_err'] = 'Please enter the First Name';
                }
                // Validate last_name
                if(empty($data['last_name'])) {
                  $data['last_name_err'] = 'Please enter a last_name';
                }
              if(empty($data['ssn'])) {
                   $data['ssn_err'] = 'Please enter ssn';
                   $this->view('cinemas/modify'.$id, $data);                

              }
                
               
         //    if(!is_int($data['store_number'])){
           //      $data['store_number_err']='not integer';
        
             //}
             
                //add the employee
                $this->cinemaModel->addEmployees($data);
                flash('emp_message', 'Employee Successfully Added');
                
                redirect('cinemas/index/'.$id);
            
            
            
             
            }
            else {
                 // Initial data if GET request
                 $employees = $this->cinemaModel->getEmployees($id);
                    $data=[
                        'first_name' => '',
                        'last_name' => '',
                        'email' => '',
                        'phone' => '',
                        'birthdate' => '',
                        'salary' =>  '',
                        'hire_date' => '',
                        'ssn' => '',
                        'store_number' =>$id,
                        'manager_id' =>'',
                        //inital stuff so as not to break the page
                        'cinema_id' => $id,
                        'employees'=>$employees
                    ];       
                    $this->view('cinemas/modify', $data);                }
            
        }
        
        
    }

   

