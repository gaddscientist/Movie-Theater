<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-5 mx-auto">
        <div class="card card-body border-dark bg-light my-5 pb-0">
            <div class="card-header border-dark d-flex flex-column justify-content-center align-items-center">
                <h2><?php echo $data['movie']['movie_name']; ?></h2> 
                <p>Please enter the Information for the Movie</p>
            </div>
            <form class="mt-2" action="<?php echo URLROOT; ?>/cinemas/edit_movie/<?php echo $data['cinema_id']; ?>/<?php echo $data['movie_id']; ?>" method="post">
                <div class="d-flex flex-column align-items-center">

                    <!-- Movie Name -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="movie_name">Movie Name <sup>*</sup></label> 
                        <input type="text" name="movie_name" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['movie_name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- Duration -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="duration">Duration(minutes)</label> 
                        <input type="number" name="duration" min="0" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['duration']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- MPAA -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="rating_mpaa">MPAA Rating</label> 
                        <input type="text" name="rating_mpaa" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['rating_mpaa']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- IMDB -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="rating_imdb">imdb rating</label> 
                        <input type="number" name="rating_imdb" min="0" max="10" step="0.1"
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['rating_imdb']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- Director -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="director">Director <sup>*</sup></label> 
                        <input type="text" name="director" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['director']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- Genre -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="genre">Genre</label> 
                        <input type="text" name="genre" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['genre']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- Start Date -->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="start_date">Start Date</label> 
                        <input type="date" name="start_date" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['start_date']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                        
                    <!-- End Date-->
                    <div class="form-group w-50 pr-2 text-center">
                        <label for="end_date">End Date</label> 
                        <input type="date" name="end_date" 
                            class="form-control form-control-sm border-dark text-center <?php echo (!empty($data['movie_name_err'])) ? 'is-invalid' : '';?>" 
                            
                            value="<?php echo $data['movie']['end_date']; ?>">
                        <span class="invalid-feedback"><?php echo $data['movie_name_err']; ?></span>
                    </div> 
                </div>
                    
                <!-- Submit Button -->
                <div class="card-footer border-dark row d-flex justify-content-center">
                    <div>
                        <input type="submit" value="Update Movie Information" class="btn btn-success btn-block pb-2"> 
                    </div> 
                </div>
            </form>
        </div>
    </div>
 <?php require APPROOT . '/views/inc/footer.php'; ?>