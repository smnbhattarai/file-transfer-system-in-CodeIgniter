<div class="container">
    <div class="row">

        <?php echo error_display(); ?>
        <?php $this->load->view('partials/_sidebar'); ?>

        <div class="col-md-10">

            <?php echo form_open('register', 'class="form-horizontal" data-parsley-validate=""'); ?>
            <fieldset>

                <!-- Form Name -->
                <h4 class="text-center">Create new account</h4>
                <hr>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">First Name</label>
                    <div class="col-md-4">
                        <input id="firstname" name="firstname" placeholder="First Name" class="form-control input-md"
                               required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">Last Name</label>
                    <div class="col-md-4">
                        <input id="lastname" name="lastname" placeholder="Last Name" class="form-control input-md"
                               required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" placeholder="Email" class="form-control input-md" required=""
                               type="text" data-parsley-type="email">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password</label>
                    <div class="col-md-4">
                        <input id="password" name="password" placeholder="Password" class="form-control input-md"
                               required="" type="password">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password1">Confirm Password</label>
                    <div class="col-md-4">
                        <input id="password1" name="password1" placeholder="Confirm Password"
                               class="form-control input-md" data-parsley-equalto="#password" required=""
                               type="password">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="userlevel">Select User level</label>
                    <div class="col-md-4">
                        <select id="userlevel" name="userlevel" class="form-control" required="">
                            <option value="">Select user level</option>
                            <?php
                            foreach ($userlevel as $k => $users) {
                                echo '<option value="' . $k . '">' . $users . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="office">Select Office</label>
                    <div class="col-md-4">
                        <select id="office" name="office" class="form-control" required="">
                            <option value="">Select Office</option>
                            <?php
                            foreach ($alloffice as $k => $office) {
                                echo '<option value="' . $k . '">' . $office . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary pull-right">Register</button>
                    </div>
                </div>

            </fieldset>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>