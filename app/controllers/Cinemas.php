
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

            $employees = $this->cinemaModel->getEmployees($id);

            $data = [
                'cinema_id' => $id,
                'employees'=>$employees
            ];

            // Calls view() method from parent class
            $this->view('cinemas/index', $data);
        }
        
       
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
                    
                    'birthdate' => trim($_POST['birthdate']),
                    'salary' =>  trim($_POST['salary']),
                    'hire_date' => trim($_POST['hire_date']),
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
            /*
                  // Validate first_name 
                  if(empty($data['first_name'])) {
                    $data['first_name_err'] = 'Please enter the street address';
                }
                // Validate last_name
                if(empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter a last_name';
                }
                elseif(!ctype_alpha($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter letters only';
                }
         */
             
                //add the employee
                $this->cinemaModel->addEmployees($data);
                flash('emp_message', 'Employee Successfully Added');
                redirect('admins/index');
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
                        'store_number' =>'',
                        'manager_id' =>'',
                        //inital stuff so as not to break the page
                        'cinema_id' => $id,
                        'employees'=>$employees
                    ];       
                    $this->view('cinemas/modify', $data);                }
            
        }
        
        
    }

   

