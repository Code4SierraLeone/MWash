<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'home';
$route['explore/(:any)/(:any)/(:any)/(:any)'] = 'explore/index/$1/$2/$3/$4';

$route['subserv/add/one'] = 'subscription/add_subscriber_one';
$route['subserv/add/two'] = 'subscription/add_subscriber_two';
$route['sub/getsubno'] = 'subscription/get_subscribers';

$route['community/getupdates'] = 'community/get_updates';

$route['fusion/get/(:num)'] = 'fusion/get_data/$1';
$route['fusion/update/(:any)/(:num)/(:any)'] = 'fusion/update_row/$1/$2/$3';
$route['fusion/getlast'] = 'fusion/get_lastrow';
$route['fusion/newdatarow'] = 'fusion/insert_newrow';
$route['fusion/count/(:any)/(:any)/(:any)/(:any)'] = 'fusion/count_waterpoints/$1/$2/$3/$4';

$route['login'] = 'admin/login';
$route['register'] = 'admin/register';
$route['logout'] = 'admin/logout';
$route['dash'] = 'admin/dash';
$route['dash/newpoint'] = 'admin/newpoint';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;