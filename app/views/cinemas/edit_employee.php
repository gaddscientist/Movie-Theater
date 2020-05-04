<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-8 mx-auto">
        <div class="card card-body border-dark bg-light my-5 pb-0">
            <div class="card-header border-dark d-flex flex-column justify-content-center align-items-center">
                <h2>Editing Employee For Store: <?php echo $data['cinema_id']; ?></h2> 
                <p>Please enter the Information for the Employee</p>
            </div>
            <form class="mt-2" action="<?php echo URLROOT; ?>/cinemas/edit_employee/<?php echo $data['cinema_id']; ?>/<?php echo $data['employee_id']; ?>" method="post">
                <!-- First Row -->
                <div class="d-flex mt-3">
                    <div class="form-group w-50 pr-2">
                        <label for="first_name">First Name <sup>*</sup></label> 
                        <input type="text" name="first_name" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['first_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
                    </div> 
                    <div class="form-group w-50 pl-2">
                        <label for="last_name">Last Name <sup>*</sup></label> 
                        <input type="text" name="last_name" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['last_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="d-flex">
                    <div class="form-group w-50 pr-2">
                        <label for="email">Email <sup>*</sup></label> 
                        <input type="text" name="email" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div> 
                    <div class="form-group w-50 pl-2">
                        <label for="phone">Phone <sup>*</sup></label> 
                        <input type="tel" name="phone" placeholder="333.333.3333" pattern="[0-9]{3}.[0-9]{3}.[0-9]{4}"
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['phone']; ?>">
                        <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
                    </div>
                </div>

                <!-- Third Row -->
                <div class="d-flex justify-content-between">
                    <div class="form-group group-3">
                        <label for="birthdate">Birth Date <sup>*</sup></label> 
                        <input type="date" name="birthdate" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['birthdate']; ?>">
                        <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
                    </div> 
                    <div class="form-group group-3">
                        <label for="salary">Salary <sup>*</sup></label> 
                        <input type="number" name="salary" min="0" step=".01" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['salary_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['salary']; ?>">
                        <span class="invalid-feedback"><?php echo $data['salary_err']; ?></span>
                    </div> 
                    <div class="form-group group-3">
                        <label for="ssn">Social Security Nummber <sup>*</sup></label> 
                        <input type="ssn" name="ssn" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['ssn_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['ssn']; ?>">
                        <span class="invalid-feedback"><?php echo $data['ssn_err']; ?></span>
                    </div>
                </div>

                <!-- Address Row -->
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-group pr-2 w-25">
                        <label for="street_address">Street Address <sup>*</sup></label> 
                        <input type="text" name="street_address" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['street_address_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['street_address']; ?>">
                        <span class="invalid-feedback"><?php echo $data['street_address_err']; ?></span>
                    </div> 
                    <div class="form-group px-2 w-25">
                        <label for="city">City <sup>*</sup></label> 
                        <input type="text" name="city"
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['city']; ?>">
                        <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                    </div> 
                    <div class="form-group px-2 w-25">
                        <label for="state">State <sup>*</sup></label> 
                        <input type="text" name="state" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['state_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['state']; ?>">
                        <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
                    </div>
                    <div class="form-group pl-2 w-25">
                        <label for="zip">Zip <sup>*</sup></label> 
                        <input type="text" name="zip" 
                            class="form-control form-control-sm border-dark <?php echo (!empty($data['zip_err'])) ? 'is-invalid' : '';?>" 
                            value="<?php echo $data['zip']; ?>">
                        <span class="invalid-feedback"><?php echo $data['zip_err']; ?></span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card-footer border-dark row d-flex justify-content-center">
                    <div>
                        <input type="submit" value="Update Employee Information" class="btn btn-success btn-block pb-2"> 
                    </div> 
                </div>
            </form>
        </div>
    </div>
 <?php require APPROOT . '/views/inc/footer.php'; ?>