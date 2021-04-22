<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['signin'] = 'pages/signin';
$route['register'] = 'pages/register';

$route['dashboard'] = 'users/dashboard';
$route['users/show/(:any)'] = 'users/show/$1';
$route['users/edit'] = 'users/edit';

$route['dashboard/admin'] = 'admin/dashboard';
$route['users/new'] = 'admin/new';
$route['users/edit/(:any)'] = 'admin/edit_user/$1';
$route['admin/remove/(:any)'] = 'admin/remove_user/$1';
