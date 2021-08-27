<div class="container">
    <div class="row">

        <?php echo error_display(); ?>
        <?php if (!empty($error)) echo $error; ?>

        <?php $this->load->view('partials/_sidebar'); ?>

        <div class="col-md-10">

            <?php echo form_open_multipart('add-file', 'class="form-horizontal" data-parsley-validate=""'); ?>
            <fieldset>

                <!-- Form Name -->
                <h4 class="text-center">Upload file</h4>
                <hr>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="title">File title</label>
                    <div class="col-md-4">
                        <input id="title" name="title" placeholder="File title" class="form-control input-md"
                               type="text" required="">

                    </div>
                </div>

                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="file">Select file</label>
                    <div class="col-md-4">
                        <input id="file" name="file" class="input-file" type="file" required="">
                        <span class="help-block">Maximum file size 7MB</span>
                    </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="checkboxes">Select office(s) to send</label>
                    <div class="col-md-6">
                        <?php
                        foreach ($alloffice as $k => $office) {
                            echo '<div class="checkbox"><label for="location-' . $k . '">';
                            echo '<input name="location[]" id="location-' . $k . '" value="' . $k . '" type="checkbox">';
                            echo $office;
                            echo '</label></div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button id="file_submit" name="file_submit" class="btn btn-primary">Upload file</button>
                    </div>
                </div>

            </fieldset>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>