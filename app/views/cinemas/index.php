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
                    <tbody>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">100</th>
                            <td>Steven</td>
                            <td>King</td>
                            <td class="text-center"><a href="<?php echo URLROOT; ?>/cinemas/modify_employee"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mx-2">
                <div class="card-footer border-dark">
                    <a href="<?php echo URLROOT; ?>/cinemas/modify_employee" class="btn btn-success w-100">Add New Employee</a>
                </div>
            </div>
        </div>
        <div class="col card mx-2 border-dark">
            <p class="card-header text-center border-dark"><strong>Finances</strong></p>
            <form class="text-center card-header mt-1 mb-4 py-1 border-dark" action="post">
                <label for="datepicker">Select a date:</label>
                <input type="date" name="selDate" id="datepicker">
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="card-container">
                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Gross Sales:</span><span class="text-right">$1234.56</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>

                <div class="d-flex justify-content-between">
                    <span class="text-left font-weight-bold">Tickets Sold:</span><span class="text-right">142</span>
                </div>
                <div class="border-bottom w-100 mb-3"></div>
            </div>
            <div class="mx-2">
                <div class="card-footer border-dark">
                    <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Daily
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Monthly
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col card mx-2 border-dark">
            <p class="card-header text-center border-dark"><strong>Shows</strong></p>
            <p class="px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi consequatur aliquam nihil architecto, temporibus a excepturi non error maiores at est cum consectetur eos laborum incidunt libero optio explicabo sint perferendis, sequi cupiditate? Vel ea voluptatibus maxime sit hic cum magni error. Ipsa est, dicta eligendi recusandae placeat laudantium. Fugiat?</p>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>