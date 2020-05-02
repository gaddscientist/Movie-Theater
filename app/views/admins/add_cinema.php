<!-- View for Admin cinema creation -->
<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/admins/index" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2>Add a new Cinema</h2> 
            <p>Please enter the address of the new cinema:</p>
        </div>
        <form action="<?php echo URLROOT; ?>/admins/add_cinema" method="post">
            <div class="form-group">
                <label for="street_address">Street Address: <sup>*</sup></label> 
                <input type="text" name="street_address" 
                    class="form-control form-control-lg <?php echo (!empty($data['street_address_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['street_address']; ?>">
                <span class="invalid-feedback"><?php echo $data['street_address_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="city">City: <sup>*</sup></label> 
                <input type="text" name="city" 
                    class="form-control form-control-lg <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['city']; ?>">
                <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="state">State(ex. VA): <sup>*</sup></label> 
                <input type="text" name="state" 
                    class="form-control form-control-lg <?php echo (!empty($data['state_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['state']; ?>">
                <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="zip">Zip Code: <sup>*</sup></label> 
                <input type="text" name="zip" 
                    class="form-control form-control-lg <?php echo (!empty($data['zip_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['zip']; ?>">
                <span class="invalid-feedback"><?php echo $data['zip_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="manager_id">Manager ID Number(optional):</label> 
                <input type="text" name="manager_id" 
                    class="form-control form-control-lg <?php echo (!empty($data['manager_id_err'])) ? 'is-invalid' : '';?>" 
                    value="<?php echo $data['manager_id']; ?>">
                <span class="invalid-feedback"><?php echo $data['manager_id_err']; ?></span>
            </div> 
            <div class="form-group">
                <label for="phone">Phone Number(optional):</label> 
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