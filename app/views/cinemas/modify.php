<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1 class="text-center">Add Employee</h1>
    <h6 class="text-center">VideoPlex - Store ID: <?php echo $data['cinema_id']; ?></h6>
    <div class="mb-3"></div>

    <div class="card card-body bg-light mt-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2>Employee</h2> 
            <p>Please enter the Information for the New Employee</p>
        </div>
        <form action="<?php echo URLROOT; ?>/admins/add_cinema" method="post">
            <div class="form-group">
                <label for="street_address">First Name <sup>*</sup></label> 
                <input type="text" name="street_address" 
                    class="form-control form-control-lg <?php echo (!empty($data['street_address_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['street_address']; ?>">
                <span class="invalid-feedback"><?php echo $data['street_address_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="city">Last Name <sup>*</sup></label> 
                <input type="text" name="city" 
                    class="form-control form-control-lg <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['city']; ?>">
                <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="state">Email <sup>*</sup></label> 
                <input type="text" name="state" 
                    class="form-control form-control-lg <?php echo (!empty($data['state_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['state']; ?>">
                <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="zip">Phone <sup>*</sup></label> 
                <input type="text" name="zip" 
                    class="form-control form-control-lg <?php echo (!empty($data['zip_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['zip']; ?>">
                <span class="invalid-feedback"><?php echo $data['zip_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="manager_id">Birth Date (yyyy-mm-dd)</label> 
                <input type="text" name="manager_id" 
                    class="form-control form-control-lg <?php echo (!empty($data['manager_id_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['manager_id']; ?>">
                <span class="invalid-feedback"><?php echo $data['manager_id_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="phone">Salary</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="phone">Hire Date (yyyy-mm-dd)</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="phone">Social Security Nummber</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="phone">Address Id</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 

            <div class="form-group">
                <label for="phone">Store Number</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div>  
            <div class="form-group">
                <label for="phone">Manager Id</label> 
                <input type="phone" name="phone" 
                    class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div> 

            

            <div class="row d-flex justify-content-center">
                <div>
                    <input type="submit" value="Add Cinema" class="btn btn-success btn-block"> 
                </div> 
            </div>
        </form>
    </div>
    
    <?php require APPROOT . '/views/inc/footer.php'; ?>