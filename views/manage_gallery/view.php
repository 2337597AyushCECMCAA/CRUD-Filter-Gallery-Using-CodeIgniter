<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-bold" style="background:#913831; padding: 10px 0; color:white; border-radius: 20px;">
                <?php echo !empty($image['title']) ? $image['title'] : ''; ?>
            </h5>
            <?php if (!empty($image['division'])) { ?>
                <p class="text-center" style="font-size: 18px; color: #fff; background: #8c5b5b; padding: 10px; border-radius: 10px;">
                    Division: <?php echo $image['division']; ?>
                </p>
            <?php } ?>
            <?php if (!empty($image['file_name'])) { ?>
                <div class="img-box text-center mb-4 mt-3">
                    <img style="width:100%; height:500px;" src="/codeigniter/uploads/images/<?php echo $image['file_name']; ?>" alt="Image">
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo base_url('manage_gallery'); ?>" class="btn btn-primary">Back to List</a>
    </div>
</div>
