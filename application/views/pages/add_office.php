<div class="container">
    <div class="row">

        <?php echo error_display(); ?>
        <?php $this->load->view('partials/_sidebar'); ?>

        <div class="col-md-10">

            <?php echo form_open('add-office', 'class="form-horizontal" data-parsley-validate=""'); ?>
            <fieldset>

                <!-- Form Name -->
                <h4 class="text-center">Add new office</h4>
                <hr>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_name">Office name</label>
                    <div class="col-md-4">
                        <input id="office_name" name="office_name" placeholder="Office name"
                               class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_address">Office address</label>
                    <div class="col-md-4">
                        <input id="office_address" name="office_address" placeholder="Office address"
                               class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_phone">Office phone number</label>
                    <div class="col-md-4">
                        <input id="office_phone" name="office_phone" placeholder="+1 234 56789"
                               class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-4">
                        <button class="btn btn-primary pull-right">Add office</button>
                    </div>
                </div>

            </fieldset>

            <?php echo form_close(); ?>

            <br><br>
            <h4 class="text-center">Available offices</h4>
            <hr>
            <table class="table table-responsive">
                <tr>
                    <th>S.No.</th>
                    <th>Office name</th>
                    <th>Office address</th>
                    <th>Phone number</th>
                </tr>

                <?php
                if (count($alloffice) > 0) {
                    foreach ($alloffice as $k => $office) {
                        echo '<tr>';
                        echo '<td>' . ++$k . '</td>';
                        echo '<td><a href="#" class="off-name" data-name="office_name" data-type="text" data-pk="' . $office['off_id'] . '" data-title="Edit office name">' . $office['off_name'] . '</a></td>';
                        echo '<td><a href="#" class="off-name" data-name="office_address" data-type="text" data-pk="' . $office['off_id'] . '" data-title="Edit office address">' . $office['off_address'] . '</a></td>';
                        echo '<td><a href="#" class="off-name" data-name="office_phone" data-type="text" data-pk="' . $office['off_id'] . '" data-title="Edit office phone number">' . $office['off_phone'] . '</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>

        </div>


    </div>
</div>