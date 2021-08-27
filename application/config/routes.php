<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'pages/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'authentication/register';
$route['logout'] = 'authentication/logout';
$route['login'] = 'authentication/login';
$route['add-file'] = 'file/file';
$route['all-users'] = 'user/allusers';
$route['add-office'] = 'office/addoffice';
$route['edit-office'] = 'office/editoffice';
$route['options'] = 'options/index';
$route['my-uploads'] = 'file/myuploads';
$route['(:num)'] = 'pages/home/$1';
$route['my-uploads/(:num)'] = 'file/myuploads/$1';
