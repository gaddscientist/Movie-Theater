<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1 class="text-center">Add Employee</h1>
    <h6 class="text-center">VideoPlex - Store ID: <?php echo $data['cinema_id']; ?></h6>
    <div class="mb-3"></div>

    <div class="card card-body bg-light mt-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2>Employee</h2> 
            <p>Please enter the Information for the New Employee</p>
        </div>
        <form action="<?php echo URLROOT; ?>/cinemas/modify/<?php echo $data['cinema_id']; ?>" method="post">
            <div class="form-group">
                <label for="first_name">First Name <sup>*</sup></label> 
                <input type="text" name="first_name" 
                     class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '';?>" 
                    
                    value="<?php echo $data['first_name']; ?>">
                <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="last_name">Last Name <sup>*</sup></label> 
                <input type="text" name="last_name" 
                    class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['last_name']; ?>">
                <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="email">Email <sup>*</sup></label> 
                <input type="text" name="email" 
                    class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="phone">Phone <sup>*</sup></label> 
                <input type="text" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="birthdate">Birth Date (yyyy-mm-dd)<sup>*</sup></label> 
                <input type="text" name="birthdate" 
                    class="form-control form-control-lg <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['birthdate']; ?>">
                <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="salary">Salary<sup>*</sup></label> 
                <input type="salary" name="salary" 
                    class="form-control form-control-lg <?php echo (!empty($data['salary_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['salary']; ?>">
                <span class="invalid-feedback"><?php echo $data['salary_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="hire_date">Hire Date (yyyy-mm-dd)<sup>*</sup></label> 
                <input type="hire_date" name="hire_date" 
                    class="form-control form-control-lg <?php echo (!empty($data['hire_date_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['hire_date']; ?>">
                <span class="invalid-feedback"><?php echo $data['hire_date_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="ssn">Social Security Nummber<sup>*</sup></label> 
                <input type="ssn" name="ssn" 
                    class="form-control form-control-lg <?php echo (!empty($data['ssn_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['ssn']; ?>">
                <span class="invalid-feedback"><?php echo $data['ssn_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="store_number">Store Number<sup>*</sup></label> 
                <input type="store_number" name="store_number" 
                    class="form-control form-control-lg <?php echo (!empty($data['store_number_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['cinema_id']; ?>">
                <span class="invalid-feedback"><?php echo $data['store_number_err']; ?></span>
            </div>  
            <div class="form-group">
                <label for="manager_id">Manager Id</label> 
                <input type="manager_id" name="manager_id" 
                    class="form-control form-control-lg <?php echo (!empty($data['manager_id_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['manager_id']; ?>">
                <span class="invalid-feedback"><?php echo $data['manager_id_err']; ?></span>
            </div> 

            

            <div class="row d-flex justify-content-center">
                <div>
                    <input type="submit" value="Add Employee" class="btn btn-success btn-block"> 
                </div> 
            </div>
        </form>
    </div>
    
    <?php require APPROOT . '/views/inc/footer.php'; ?>