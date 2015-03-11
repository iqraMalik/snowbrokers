<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'home/index';
$route['contact'] = 'contact/index';
$route['contact/sent'] = 'contact/sent';
$route['pages/(:any)'] = 'pages/index/$1';
$route['404_override'] = 'errors/page_missing';

/*admin*/
$route['admin'] = 'admin/admin_login/index';
$route['admin/login'] = 'admin/admin_login/index';
$route['admin/logout'] = 'admin/admin_login/logout';
$route['admin/admin_login/validate_credentials'] = 'admin/admin_login/validate_credentials';

$route['admin/dashboard'] = 'admin/admin_dashboard/index';
$route['admin/myaccount'] = 'admin/admin_myaccount/index';
$route['admin/myaccount/updt'] = 'admin/admin_myaccount/updt';
$route['admin/chngpassword'] = 'admin/admin_chngpassword/index';
$route['admin/chngpassword/updt'] = 'admin/admin_chngpassword/updt';
$route['admin/sitesetting'] = 'admin/admin_sitesetting/index';
$route['admin/sitesetting/updt'] = 'admin/admin_sitesetting/updt';

$route['admin/pages'] = 'admin/admin_pages/index';
$route['admin/pages/add'] = 'admin/admin_pages/add';
$route['admin/pages/update'] = 'admin/admin_pages/update';
$route['admin/pages/update/(:any)'] = 'admin/admin_pages/update/$1';
//$route['admin/pages/delete/(:any)'] = 'admin/admin_pages/delete/$1';//..............not requer
$route['admin/pages/(:any)'] = 'admin/admin_pages/index/$1'; //$1 = page number
//........................

$route['admin/users'] = 'admin/admin_users/index';
$route['admin/users/add'] = 'admin/admin_users/add';
$route['admin/users/update'] = 'admin/admin_users/update';
$route['admin/users/update/:num'] = 'admin/admin_users/update/$1';
$route['admin/users/delete/(:any)'] = 'admin/admin_usersetting/delete/$1';
$route['admin/users/(:any)'] = 'admin/admin_users/index/$1'; //$1 = page number

$route['admin/category'] = 'admin/admin_category/index';
$route['admin/category/(:any)'] = 'admin/admin_category/index/$1'; //$1 = page number

$route['admin/admin_order'] = 'admin/admin_order/index';
$route['admin/admin_order/(:num)'] = 'admin/admin_order/index/$1'; //$1 = page number

$route['admin/admin_currency'] = 'admin/admin_currency/index';
$route['admin/admin_currency/(:num)'] = 'admin/admin_currency/index/$1'; //$1 = page number

$route['admin/terms_condition'] = 'admin/terms_condition/index';
$route['admin/terms_condition/(:num)'] = 'admin/terms_condition/index/$1'; //$1 = page number

$route['admin/admin_product'] = 'admin/admin_product/index';
$route['admin/admin_product/(:num)'] = 'admin/admin_product/index/$1'; /*for pagination only*/

$route['admin/color_controler'] = 'admin/color_controler/index';
$route['admin/color_controler/(:num)'] = 'admin/color_controler/index/$1'; /*for pagination only*/

$route['admin/admin_country_management'] = 'admin/admin_country_management/index';
$route['admin/admin_country_management/(:num)'] = 'admin/admin_country_management/index/$1'; /*for pagination only*/

$route['active'] = 'active/index';
$route['active/(:any)'] = 'active/index/$1'; /*for pagination only*/

