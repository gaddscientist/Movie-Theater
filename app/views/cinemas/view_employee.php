<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-6 mx-auto">
        <div class="card card-body border-dark bg-light my-5 pb-0">
            <div class="card-header  bg-light border-dark d-flex flex-column justify-content-center align-items-center">
                <h2><?php echo $data['employee']->first_name . ' ' . $data['employee']->last_name; ?></h2> 
                <p class="text-muted">Employee Information Card</p>
            </div>
            <!-- Top -->
            <ul class="list-group list-group-flush mb-5">
                <!-- Name -->
                <li class="list-group-item border-secondary mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50 text-left">Name:</p> 
                        <p class="text-right"><?php echo $data['employee']->first_name . ' ' . $data['employee']->last_name; ?></p>
                    </div>
                </li>

                <!-- Email -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Email:</p> 
                        <p><?php echo $data['employee']->email; ?></p>
                    </div>
                </li>

                <!-- Phone -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Phone Number:</p> 
                        <p><?php echo $data['employee']->phone; ?></p>
                    </div>
                </li>

                <!-- Birthdate -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Birthdate:</p> 
                        <p><?php echo $data['employee']->birthdate; ?></p>
                    </div>
                </li>

                <!-- Salary -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Salary:</p> 
                        <p><?php echo $data['employee']->salary; ?></p>
                    </div>
                </li>

                <!-- Hire Date -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Hire Date:</p> 
                        <p><?php echo $data['employee']->hire_date; ?></p>
                    </div>
                </li>

                <!-- SSN -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Social Security Number:</p> 
                        <p><?php echo $data['employee']->ssn; ?></p>
                    </div>
                </li>

                <!-- Address -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-25">Address:</p> 
                        <p><?php echo $data['address_string']; ?></p>
                    </div>
                </li>

            </ul>

            <!-- Submit Button -->
            <div class="card-footer d-flex justify-content-center border-dark">
                <div class="p-1">
                    <a href="<?php echo URLROOT; ?>/cinemas/edit_employee/<?php 
                                    echo $data['cinema_id']; ?>/<?php 
                                    echo $data['employee_id']; ?>" 
                                    class="btn btn-primary btn-block pb-2">Edit Employee</a>
                </div> 
                <div class="p-1">
                    <!-- <input type="submit" value="Delete Employee" class="btn btn-danger btn-block pb-2">  -->
                    <a href="<?php echo URLROOT; ?>/cinemas/delete_employee/<?php echo $data['cinema_id']; ?>/<?php echo $data['employee_id']; ?>" class="btn btn-danger btn-block pb-2">Delete Employee</a>
                </div> 
            </div>
            </form>
        </div>
    </div>
 <?php require APPROOT . '/views/inc/footer.php'; ?>