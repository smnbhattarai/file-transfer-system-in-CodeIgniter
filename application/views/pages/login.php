<!-- Login form -->
<div class="container">
    <?php echo error_display(); ?>
    <?php echo form_open('/login', 'class="form-signin" data-parsley-validate=""'); ?>
    <h3 class="form-signin-heading">Please sign in</h3>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required=""
           type="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
    <?php echo form_close(); ?>
</div> <!-- /container -->
<!-- Login form -->
            
          