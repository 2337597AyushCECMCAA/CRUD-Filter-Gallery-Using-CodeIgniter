<div class="container">
    <h2 class="text-center mb-3" style="background:#942c2c; padding: 10px 0; color:white; border-radius: 20px;"><?php echo $title; ?></h2>
    <hr>
    
    <!-- Display status message -->
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-6 ">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo !empty($image['title'])?$image['title']:''; ?>" >
                    <?php echo form_error('title','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Images:</label>
                    <input type="file" name="image" class="form-control" multiple>
                    <?php echo form_error('image','<p class="help-block text-danger">','</p>'); ?>
                    <?php if(!empty($image['file_name'])){ ?>
                        <div class="img-box mt-2">
                            <img style="width:100%; height:500px;" src="/codeigniter/uploads/images/<?php echo $image['file_name']; ?>" alt="Image">
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group mb-2">
                    <label>Division:</label>
                    <select name="division" class="form-control">
                        <option value="">Select Division</option>
                        <option value="Division 1" <?php echo !empty($image['division']) && $image['division'] == 'Division 1' ? 'selected' : ''; ?>>Division 1</option>
                        <option value="Division 2" <?php echo !empty($image['division']) && $image['division'] == 'Division 2' ? 'selected' : ''; ?>>Division 2</option>
                        <option value="Division 3" <?php echo !empty($image['division']) && $image['division'] == 'Division 3' ? 'selected' : ''; ?>>Division 3</option>
                        <option value="Division 4" <?php echo !empty($image['division']) && $image['division'] == 'Division 4' ? 'selected' : ''; ?>>Division 4</option>
                    </select>
                    <?php echo form_error('division','<p class="help-block text-danger">','</p>'); ?>
                </div>
                
                <div class="mt-3 d-flex justify-content-center gap-3 mb-4">
                    <a href="/codeigniter/index.php/manage_gallery" class="btn btn-secondary">Back</a>

                    <input type="hidden" name="id" value="<?php echo !empty($image['id'])?$image['id']:''; ?>">
                    <input type="submit" name="imgSubmit" class="btn btn-success" value="SUBMIT">
                </div>
            </form>
        </div>
    </div>
</div>
