<?php

// VALIDATION ERROR DISPLAY
function error_display()
{
    $out = '';
    if (validation_errors()) {

        $out .= '<div class="container">';
        $out .= '<div class="row">';
        $out .= '<div class="col-md-6 col-md-offset-3">';
        $out .= '<div class="alert alert-warning fade in">';
        $out .= validation_errors();
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        return $out;

    } else {
        return;
    }
}


// CHECK IF USER IS SUPER ADMIN
function is_super_admin()
{
    $ci = get_instance();
    if ($ci->user_previlage_model->UserPrevilage() == 'super_admin') {
        return true;
    } else {
        return false;
    }
}


// CHECK IF USER IS MANAGER
function is_manager()
{
    $ci = get_instance();
    if ($ci->user_previlage_model->UserPrevilage() == 'manager') {
        return true;
    } else {
        return false;
    }
}


// CHECK IF LOGGED IN ONE IS NORMAL USER
function is_user()
{
    $ci = get_instance();
    if ($ci->user_previlage_model->UserPrevilage() == 'user') {
        return true;
    } else {
        return false;
    }
}


// GET SINGLE USER DETAIL
function user_detail()
{
    $ci = get_instance();
    $ud = $ci->user_model->UserDetail($ci->session->userdata('user_id'));
    return $ud;
}