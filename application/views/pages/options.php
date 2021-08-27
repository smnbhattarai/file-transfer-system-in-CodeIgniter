<div class="container">
    <div class="row">


        <?php $this->load->view('partials/_sidebar'); ?>


        <div class="col-md-10">


            <?php echo form_open('options', 'class="form-horizontal" data-parsley-validate=""'); ?>
            <fieldset>

                <!-- Form Name -->
                <h4 class="text-center">Site Options</h4>
                <hr>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_name">Office name</label>
                    <div class="col-md-4">
                        <input id="office_name" name="office_name" placeholder="Office name"
                               class="form-control input-md" required="" type="text"
                               value="<?php if (!empty($office_detail['office_name'])) echo $office_detail['office_name']; ?>">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_address">Office address</label>
                    <div class="col-md-4">
                        <input id="office_address" name="office_address" placeholder="Office address"
                               class="form-control input-md" type="text"
                               value="<?php if (!empty($office_detail['office_address'])) echo $office_detail['office_address']; ?>">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office_phone">Office phone number</label>
                    <div class="col-md-4">
                        <input id="office_phone" name="office_phone" placeholder="Office phone number"
                               class="form-control input-md" type="text"
                               value="<?php if (!empty($office_detail['office_phone'])) echo $office_detail['office_phone']; ?>">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="off_submit"></label>
                    <div class="col-md-4">
                        <button id="off_submit" name="off_submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </div>

            </fieldset>
            <?php echo form_close(); ?>


        </div>


    </div>
</div>