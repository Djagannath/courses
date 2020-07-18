<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
|
|	https://codeigniter.com/user_guide/general/routing.html
*/
$route['default_controller'] = 'Site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/index';
$route['admin/courses/create'] = 'admin/create';
$route['admin/courses/(:num)/edit'] = 'admin/edit/$1';
$route['admin/courses/(:num)/delete'] = 'admin/delete/$1';

$route['api/courses/list'] = 'api/list';
$route['api/courses/bought/(:num)'] = 'api/boughtCourses/$1';
$route['api/course/(:num)/buy'] = 'api/buy/$1';
$route['api/course/(:num)/cancel'] = 'api/cancel/$1';

$route['login/([a-z]+)'] = 'site/login/$1';
$route['logout'] = 'site/logout';
$route['courses'] = 'course/index';
