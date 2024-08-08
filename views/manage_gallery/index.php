<div class="container">
    <h2 class="text-center mb-5">Gallery Images Management</h2>
	
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="mb-4 d-flex align-items-center justify-content-between head">
            <div class="d-flex"><h5><?php echo $title; ?></h5></div>
            
            <div class="d-flex">
                <a href="<?php echo base_url('manage_gallery/add'); ?>" class="btn btn-success"><i class="plus"></i> Upload Image</a>
            </div>
        </div>
        
        <!-- Data list table --> 
        <table class="table table-striped table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th width="5%">#</th>
                    <th width="10%"></th>
                    <th width="25%">Title</th>
                    <th width="10%">Division</th> 
                    <th width="19%">Created</th>
                    <th width="8%">Status</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if(!empty($gallery)){ $i=0;  
                    foreach($gallery as $row){ $i++; 
                        $image = !empty($row['file_name']) ? '<img style="width:120px; height:50px;" src="/codeigniter/uploads/images/'.$row['file_name'].'" alt="" />' : ''; 
                        $statusLink = ($row['status'] == 1)?site_url('manage_gallery/block/'.$row['id']):site_url('manage_gallery/unblock/'.$row['id']);  
                        $statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active';  
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $image; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo !empty($row['division']) ? $row['division'] : 'N/A'; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><a  href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span style="color:black;" class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
                    <td>
                        <a href="/codeigniter/index.php/manage_gallery/view/<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                        <a href="/codeigniter/index.php/manage_gallery/edit/<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/codeigniter/index.php/manage_gallery/delete/<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="7">No image(s) found...</td></tr> 
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
