<!-- Filler for cinema page -->



<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1 class="text-center">Dashboard</h1>
    <h6 class="text-center">VideoPlex - Store ID: <?php echo $data['cinema_id']; ?></h6>
    <div class="mb-3"></div>

    <div class="row">
        <div class="col card mx-2 px-0 border-dark">
            <div class="mx-2">

                <p class="card-header text-center border-dark"><strong>Staff</strong></p>
                <!-- Search form -->
                <form class="card-header border-dark" action="post">
                    <div class="input-group mb-0">
                    <input type="text" class="form-control border-bottom border-top border-dark" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </form>
            </div>
            <div class="table-wrapper-scroll-y custom-scrollbar">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php foreach($data['employees'] as $employee) : ?>                     
                        <tr>
                            <th scope="row"><?php echo $employee->employee_id?></th>
                            <td><?php echo $employee->first_name?></td>
                            <td><?php echo $employee->last_name?></td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify/<?php echo $data['cinema_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="mx-2">
                <div class="card-footer border-dark">
                    <a href="<?php echo URLROOT; ?>/cinemas/modify/<?php echo $data['cinema_id'] ?>" class="btn btn-success w-100">Add New Employee </a>
                </div>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="col">
            <div class="card-columns d-flex flex-column justify-content-center">

                <!-- Manager Card -->
                <div class="col card border-dark">
                    <div class="card-container">
                        <p class="card-header mb-2 text-center border-dark"><strong>Manager</strong></p>
                        <div class="manager-container">
                            <div class="d-flex justify-content-center">
                                <div class="rounded-circle overflow-hidden mx-2 custom-circle-image">
                                    <img class="w-100 h-100" src="<?php echo URLROOT; ?>/public/img/profile-icon.png" alt="Card image cap">
                                </div>
                                <div class="d-flex flex-column">
                                    <h5 class="ml-4 mt-3 mb-1 mt-4"><?php echo $data['manager']['name']; ?></h5>
                                    <p class="text-center"><small class="font-weight-bold ml-4">Manager ID: <?php echo $data['manager']['id'] ?></small></p>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush mb-5 mt-4">
                                <li class="list-group-item pl-0"><span class="font-weight-bold">Email: </span><?php echo $data['manager']['email']; ?></li>
                                <li class="list-group-item pl-0"><span class="font-weight-bold">Phone: </span><?php echo $data['manager']['phone']; ?></li>
                                <li class="list-group-item border-bottom pl-0"><span class="font-weight-bold">Address: </span><small><?php echo $data['manager']['address']; ?></small></li>
                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Finances Card -->
                <div class="col card mb-0 border-dark">
                    <p class="card-header text-center border-dark"><strong>Finances - <span id="day2">Daily</span><span id="month2" style="display: none;">Monthly</span></strong></p>
                    <form class="text-center card-header mt-1 mb-4 py-1 border-dark" action="<?php echo URLROOT; ?>/cinemas/<?php echo $data['cinema_id'] ?>" method="post">
                        <label for="datepicker">Select a date:</label>
                        <input type="date" value="<?php echo $data['finances']['date_chosen']; ?>" name="date_chosen" id="datepicker">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="card-container">


                        <div id="day">
                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Tickets Sold:</span>
                                <span class="text-right"><?php echo $data['finances']['total_tickets']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Gross Sales:</span>
                                <span class="text-right">$<?php echo $data['finances']['gross_sales']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Credit Card Sales:</span>
                                <span class="text-right">$<?php echo $data['finances']['CREDIT']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Cash Sales:</span>
                                <span class="text-right">$<?php echo $data['finances']['CASH']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Gift Card Sales:</span>
                                <span class="text-right">$<?php echo $data['finances']['GIFT']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>


                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Number of Transactions: </span>
                                <span class="text-right"><?php echo $data['finances']['transactions']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>
                        </div>

                        <div id="month" style="display: none;">
                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Tickets Sold:</span>
                                <span class="text-right"><?php echo $data['monthly_finances']['total_tickets']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Gross Sales:</span>
                                <span class="text-right">$<?php echo $data['monthly_finances']['gross_sales']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Credit Card Sales:</span>
                                <span class="text-right">$<?php echo $data['monthly_finances']['CREDIT']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Cash Sales:</span>
                                <span class="text-right">$<?php echo $data['monthly_finances']['CASH']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>

                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Gift Card Sales:</span>
                                <span class="text-right">$<?php echo $data['monthly_finances']['GIFT']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>


                            <div class="d-flex justify-content-between">
                                <span class="text-left font-weight-bold">Number of Transactions: </span>
                                <span class="text-right"><?php echo $data['monthly_finances']['transactions']; ?></span>
                            </div>
                            <div class="border-bottom w-100 mb-3"></div>
                        </div>


                    </div>
                    <div class="mx-2">
                        <div class="card-footer border-dark">
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" style="box-shadow: none;" onchange="hideMonthly(this)" name="option1" id="daily" autocomplete="off" checked> Daily
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" onchange="hideDaily(this)" name="option2" id="monthly" autocomplete="off"> Monthly
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Shows Card -->
        <div class="col card mx-2 border-dark">
            <p class="card-header text-center border-dark"><strong>Shows</strong></p>
            <div class="card-body">
                <h5 class="card-title text-center">Current Movies</h5>
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item border-dark">Current Movie 1</li>
                    <li class="list-group-item">Current Movie 2</li>
                    <li class="list-group-item">Current Movie 3</li>
                    <li class="list-group-item">Current Movie 4</li>
                </ul>
                <h5 class="card-title text-center">Upcoming Movies</h5>
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item border-dark">Upcoming Movie 1</li>
                    <li class="list-group-item">Upcoming Movie 2</li>
                    <li class="list-group-item">Upcoming Movie 3</li>
                    <li class="list-group-item">Upcoming Movie 4</li>
                </ul>
            </div>
            <div class="card-footer border-dark">
                <a href="<?php echo URLROOT; ?>/cinemas/modify_movie" class="btn btn-success w-100">Add New Movie</a>
            </div>
        </div>
        <!-- <div class="col">
  <div class="card-columns d-flex flex-column justify-content-center">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">This is a longer card with shorter text.</p>
      </div>
    </div>
  </div>
</div> -->



    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>