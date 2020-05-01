<!-- View for Admin home page -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>VideoPlex Cinema Locations</h1> 
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/admins/add_cinema" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Cinema
        </a>
    </div>
</div>
<div class="font-weight-bold mb-3 ">
    <u>Please select a cinema to interact with:</u>
</div>

<?php foreach($data['cinema_addresses'] as $cinema_address) : ?>
    <a href="<?php echo URLROOT; ?>/cinemas/index/<?php echo $cinema_address->cinema_id; ?>" class="clickable-card">
        <div class="card card-body mb-3">
            <h4 class="card-title">VideoPlex - Store Number: <?php echo $cinema_address->cinema_id; ?></h4>
            <div class="bg-secondary p-2 mb-3"><?php echo $cinema_address->street_address . ' ' . $cinema_address->city . ', ' . $cinema_address->state . ' ' . $cinema_address->zip; ?></div> 
        </div>
    </a>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>