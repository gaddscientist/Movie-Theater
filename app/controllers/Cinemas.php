
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

                if(isset($_POST['date_chosen'])) {
                    $tempDate = trim($_POST['date_chosen']);
                }
                else {
                    $tempDate = date("Y-m-d");
                }

                if(isset($_POST['search_name'])) {
                    $tempName = trim($_POST['search_name']);
                }
                else {
                    $tempName = '';
                }

                $data = [
                    'cinema_id' => $id,
                    'employees' => array(),
                    'search_name' => $tempName,
                    'manager' => array(
                        'id' => '',
                        'name' => '',
                        'email' =>'',
                        'phone' => '',
                        'address' => ''
                    ),
                    'finances' => array (
                        'date_chosen' => $tempDate,
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
                    'current_movies' => array(),
                    'upcoming_movies' => array()
                ];

                // Employees
                if($data['search_name'] !== '') {
                    $data['employees'] = $this->cinemaModel->getEmployeesBySearch($data['search_name'], $data['cinema_id']);
                }
                else {
                    $data['employees'] = $this->cinemaModel->getEmployees($data['cinema_id']);
                }

                // Manager
                $data['manager']['id'] = $this->cinemaModel->getManagerIdByCinemaId($data['cinema_id']);
                $data['manager']['name'] = $this->cinemaModel->getManagerNameById($data['manager']['id']);
                $data['manager']['email'] = $this->cinemaModel->getManagerEmailById($data['manager']['id']);
                $data['manager']['phone'] = $this->cinemaModel->getManagerPhoneById($data['manager']['id']);
                $data['manager']['address'] = $this->cinemaModel->getManagerAddressById($data['manager']['id']);

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

                // Movie
                $data['current_movies'] = $this->cinemaModel->getCurrentMovies();
                $data['upcoming_movies'] = $this->cinemaModel->getUpcomingMovies();

            }
            else {

                $data = [
                    'cinema_id' => $id,
                    'employees' => array(),
                    'manager' => array(
                        'id' => '',
                        'name' => '',
                        'email' =>'',
                        'phone' => '',
                        'address' => ''
                    ),
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
                    'current_movies' => array(),
                    'upcoming_movies' => array()
                ];
                
                // Employees
                $data['employees'] = $this->cinemaModel->getEmployees($data['cinema_id']);
                
                // Manager
                $data['manager']['id'] = $this->cinemaModel->getManagerIdByCinemaId($data['cinema_id']);
                $data['manager']['name'] = $this->cinemaModel->getManagerNameById($data['manager']['id']);
                $data['manager']['email'] = $this->cinemaModel->getManagerEmailById($data['manager']['id']);
                $data['manager']['phone'] = $this->cinemaModel->getManagerPhoneById($data['manager']['id']);
                $data['manager']['address'] = $this->cinemaModel->getManagerAddressById($data['manager']['id']);

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

                // Movie
                $data['current_movies'] = $this->cinemaModel->getCurrentMovies();
                $data['upcoming_movies'] = $this->cinemaModel->getUpcomingMovies();
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
        
       
        //add employeee
        public function modify($cinema_id, $id) {
            // Checks to see if form is being submitted or loaded initially
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
            
                 // Initial data if POST request
                 $data = [
                     // Data for insert
                     'employee_id' => '',
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'store_number'=> $cinema_id,
                    'birthdate' => trim($_POST['birthdate']),
                    'salary' =>  trim($_POST['salary']),
                    // 'hire_date' => trim($_POST['hire_date']), CHANGE TO CURDATE() in SQL
                    'ssn' => trim($_POST['ssn']),
                    'manager_id' => $id,
                    'street_address' => trim($_POST['street_address']),
                    'city' => trim($_POST['city']),
                    'state' => trim($_POST['state']),
                    'zip' => trim($_POST['zip']),
                    // Err meesages 
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'salary_err' => '',
                    'ssn_err'=> '',
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => ''
                ];
                
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
               
                //add the employee
                $this->cinemaModel->addEmployee($data);
                flash('emp_message', 'Employee Successfully Added');
                
                redirect('cinemas/index/' . $cinema_id . '/' . $id);
            }
            else {
                // Initial data if GET request
                $data=[
                    'employee_id' => '',
                    'employee' => array(),
                    'address' => array(),
                    'address_id' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'phone' => '',
                    'birthdate' => '',
                    'salary' =>  '',
                    'ssn' => '',
                    'street_address' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'cinema_id' => $cinema_id,
                    // Err meesages 
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'salary_err' => '',
                    'ssn_err'=> '',
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => ''
                ];       

                $this->view('cinemas/modify', $data);
            }
        }

        public function edit_employee($cinema_id, $id) {
             // Checks to see if form is being submitted or loaded initially
             if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
            
                 // Initial data if POST request
                 $data = [
                     // Data for insert
                    'employee_id' => $id,
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'store_number'=> $cinema_id,
                    'birthdate' => trim($_POST['birthdate']),
                    'salary' =>  trim($_POST['salary']),
                    // 'hire_date' => trim($_POST['hire_date']), CHANGE TO CURDATE() in SQL
                    'ssn' => trim($_POST['ssn']),
                    'manager_id' => '',
                    'street_address' => trim($_POST['street_address']),
                    'city' => trim($_POST['city']),
                    'state' => trim($_POST['state']),
                    'zip' => trim($_POST['zip']),
                    // Err meesages 
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'salary_err' => '',
                    'ssn_err'=> '',
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => ''
                ];
                
                // Update the employee
                $this->cinemaModel->updateEmployee($data);
                flash('emp_message', 'Employee Successfully Added');
                
                redirect('cinemas/index/' . $cinema_id . '/' . $id);
            }
            else {
                // Initial data if GET request
                $data=[
                    'employee_id' => $id,
                    'employee' => array(),
                    'address' => array(),
                    'address_id' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'phone' => '',
                    'birthdate' => '',
                    'salary' =>  '',
                    'ssn' => '',
                    'street_address' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'cinema_id' => $cinema_id,
                    // Err meesages 
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'phone_err' => '',
                    'birthdate_err' => '',
                    'salary_err' => '',
                    'ssn_err'=> '',
                    'street_address_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'zip_err' => ''
                ];       

                // If a employee_id is passed in the url, the view will auto load
                if(isset($id)) {
                    $data['employee'] = json_decode(json_encode($this->cinemaModel->getEmployeeById($id)), true);

                    $data['address_id'] = $data['employee']['address_id'];
                    $data['address'] = json_decode(json_encode($this->cinemaModel->getAddressByAddressId($data['address_id'])), true);
                    foreach($data['employee'] as $employee_field => $value) {
                        $data[$employee_field] = $value;
                    }
                    foreach($data['address'] as $address_field => $value) {
                        $data[$address_field] = $value;
                    }

                    $this->view('cinemas/edit_employee', $data);
                }

                $this->view('cinemas/edit_employee', $data);
            }
        }

        public function view_employee($cinema_id, $employee_id) {

            $data = [
                'cinema_id' => $cinema_id,
                'employee_id' => $employee_id,
                'employee' => array(),
                'address_string' => ''
            ];

            $data['employee'] = $this->cinemaModel->getEmployeeById($data['employee_id']);
            $data['address_string'] = $this->cinemaModel->getManagerAddressById($data['employee_id']);

            $this->view('cinemas/view_employee', $data);

        }

        public function delete_employee($cinema_id, $employee_id) {
            $this->cinemaModel->deleteEmployeeById($employee_id);
            redirect('cinemas/index/' . $cinema_id);
        }

        // Movie
        public function view_movie($cinema_id, $movie_id) {
            $data = [
                'cinema_id' => $cinema_id,
                'movie_id' => $movie_id,
                'movie' => array()
            ];

            $data['movie'] = $this->cinemaModel->getMovieById($data['movie_id']);

            $this->view('cinemas/view_movie', $data);
        }

        public function edit_movie($cinema_id, $id) {
             // Checks to see if form is being submitted or loaded initially
             if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
            
                 // Initial data if POST request
                 $data = [
                     // Data for insert
                    'movie_id' => $id,
                    'movie' => array(),
                    'cinema_id'=> $cinema_id,
                    'movie_name' => trim($_POST['movie_name']),
                    'duration' => trim($_POST['duration']),
                    'rating_mpaa' => trim($_POST['rating_mpaa']),
                    'rating_imdb' => trim($_POST['rating_imdb']),
                    'director' =>  trim($_POST['director']),
                    'genre' => trim($_POST['genre']),
                    'start_date' => trim($_POST['start_date']),
                    'end_date' => trim($_POST['end_date']),
                    // Err meesages 
                    'movie_name' => '',
                    'duration_err' => '',
                    'rating_mpaa_err' => '',
                    'rating_imdb_err' => '',
                    'director_err' => '',
                    'genre_err' => '',
                    'start_date_err'=> '',
                    'end_date_err' => ''
                ];
                
                // Update the movie 
                $this->cinemaModel->updateMovie($data);
                flash('emp_message', 'Movie Successfully Added');
                
                redirect('cinemas/index/' . $cinema_id . '/' . $id);
            }
            else {
                // Initial data if GET request
                $data=[
                    'movie_id' => $id,
                    'movie' => array(),
                    'cinema_id'=> $cinema_id,
                    'movie_name' => '',
                    'duration' => '',
                    'rating_mpaa' => '',
                    'rating_imdb' => '',
                    'director' =>  '',
                    'genre' => '',
                    'start_date' => '',
                    'end_date' => '',
                    // Err meesages 
                    'movie_name' => '',
                    'duration_err' => '',
                    'rating_mpaa_err' => '',
                    'rating_imdb_err' => '',
                    'director_err' => '',
                    'genre_err' => '',
                    'start_date_err'=> '',
                    'end_date_err' => ''
                ];       


                // If a employee_id is passed in the url, the view will auto load
                if(isset($id)) {
                    $data['movie'] = json_decode(json_encode($this->cinemaModel->getMovieById($id)), true);

                    foreach($data['movie'] as $movie_field => $value) {
                        $data[$movie_field] = $value;
                    }

                    $this->view('cinemas/edit_movie', $data);
                }

                $this->view('cinemas/edit_movie', $data);
            }
        }

        public function delete_movie($cinema_id, $movie_id) {
            $this->cinemaModel->deleteMovieById($movie_id);
            redirect('cinemas/index/' . $cinema_id);
        }


    }

   

