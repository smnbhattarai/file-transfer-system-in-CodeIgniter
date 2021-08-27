<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $office_name; ?></title>

    <link href="<?php echo base_url('css/main-style.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <link rel="icon" type="image/ico" href="favicon.ico">

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>

</head>

<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $office_name; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <?php if ($this->user_previlage_model->UserPrevilage() == 'super_admin'): ?>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="<?php echo base_url('add-file'); ?>"><i class="fa fa-file" aria-hidden="true"></i> Add
                            file</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('register'); ?>"><i class="fa fa-user" aria-hidden="true"></i>
                            Register</a></li>
                    <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout</a></li>
                </ul>


            <?php elseif ($this->user_previlage_model->UserPrevilage() == 'manager'): ?>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="<?php echo base_url('add-file'); ?>"><i class="fa fa-file" aria-hidden="true"></i> Add
                            file</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('register'); ?>"><i class="fa fa-user" aria-hidden="true"></i>
                            Register</a></li>
                    <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout</a></li>
                </ul>

            <?php elseif ($this->user_previlage_model->UserPrevilage() == 'user'): ?>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="<?php echo base_url('add-file'); ?>"><i class="fa fa-file" aria-hidden="true"></i> Add
                            file</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout</a></li>
                </ul>

            <?php else: ?>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                </ul>
            <?php endif; ?>

        </div><!--/.nav-collapse -->
    </div>
</nav>


<?php if ($this->session->flashdata('message_success')) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('message_success') . '</p>'; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('message_failure')) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('message_failure') . '</p>'; ?>
        </div>
    </div>
</div>
<?php endif; ?>