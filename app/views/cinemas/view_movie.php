<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-6 mx-auto">
        <div class="card card-body border-dark bg-light my-5 pb-0">
            <div class="card-header  bg-light border-dark d-flex flex-column justify-content-center align-items-center">
                <h2><?php echo $data['movie']->movie_name; ?></h2> 
                <p class="text-muted">Movie Information Card</p>
            </div>
            <!-- Top -->
            <ul class="list-group list-group-flush mb-5">

                <!-- Duration -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Duration:</p> 
                        <p><?php echo $data['movie']->duration; ?> Min</p>
                    </div>
                </li>

                <!-- MPAA -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">MPAA Rating:</p> 
                        <p><?php echo $data['movie']->rating_mpaa; ?></p>
                    </div>
                </li>

                <!-- IMDB -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">IMDB Rating:</p> 
                        <p><?php echo $data['movie']->rating_imdb; ?></p>
                    </div>
                </li>

                <!-- Director -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Director:</p> 
                        <p><?php echo $data['movie']->director; ?></p>
                    </div>
                </li>

                <!-- Genre -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Genre:</p> 
                        <p><?php echo $data['movie']->genre; ?></p>
                    </div>
                </li>

                <!-- Start Date -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">Start Date:</p> 
                        <p><?php echo $data['movie']->start_date; ?></p>
                    </div>
                </li>

                <!-- End Date -->
                <li class="list-group-item mb-0 pb-0">
                    <div class="d-flex justify-content-between pt-1">
                        <p class="w-50">End Date:</p> 
                        <p><?php echo $data['movie']->end_date; ?></p>
                    </div>
                </li>

            </ul>

            <!-- Submit Button -->
            <div class="card-footer d-flex justify-content-center border-dark">
                <div class="p-1">
                    <a href="<?php echo URLROOT; ?>/cinemas/edit_movie/<?php 
                                    echo $data['cinema_id']; ?>/<?php 
                                    echo $data['movie_id']; ?>" 
                                    class="btn btn-primary btn-block pb-2">Edit Movie</a>
                </div> 
                <div class="p-1">
                    <a href="<?php echo URLROOT; ?>/cinemas/delete_movie/<?php echo $data['cinema_id']; ?>/<?php echo $data['movie_id']; ?>" class="btn btn-danger btn-block pb-2">Delete Movie</a>
                </div> 
            </div>
            </form>
        </div>
    </div>
 <?php require APPROOT . '/views/inc/footer.php'; ?>