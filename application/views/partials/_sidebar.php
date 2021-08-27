<?php if ($this->user_previlage_model->UserPrevilage() == 'super_admin'): ?>
    <div class="col-md-2">
        <h4 class="text-center">Hi, <?php echo user_detail()['fname']; ?></h4>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url('all-users'); ?>">All users</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('add-office'); ?>">Add office</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('options'); ?>">Options</a></li>
        </ul>
    </div>

<?php elseif ($this->user_previlage_model->UserPrevilage() == 'manager'): ?>
    <div class="col-md-2">
        <h4 class="text-center">Hi, <?php echo user_detail()['fname']; ?></h4>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url(); ?>">Files send to me</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('my-uploads'); ?>">My uploads</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('all-users'); ?>">All users</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('add-office'); ?>">Add office</a></li>
        </ul>
    </div>

<?php elseif ($this->user_previlage_model->UserPrevilage() == 'user'): ?>
    <div class="col-md-2">
        <h4 class="text-center">Hi, <?php echo user_detail()['fname']; ?></h4>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url(); ?>">Files send to me</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('my-uploads'); ?>">My uploads</a></li>
            <li class="list-group-item"><a href="<?php echo base_url('add-file'); ?>">Add file</a></li>
        </ul>
    </div>

<?php else: ?>
    <div class="col-md-2">
        <h4 class="text-center">Hi, </h4>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        </ul>
    </div>
<?php endif; ?>
