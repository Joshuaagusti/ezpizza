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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Productos';
$route['productos/product_list'] = 'Productos/product_list';
$route['admin/add_product'] = 'Productos/añadir';
$route['admin/users'] = 'Productos/adminUsers';
$route['productos/addProduct'] = 'Productos/addProduct';
$route['productos/details/(:num)'] = 'Productos/details/$1';
$route['feedback/submit'] = 'FeedbackController/submit';
$route['session/set'] = 'SessionController/set_session';
$route['session/get'] = 'SessionController/get_session';
$route['session/check'] = 'SessionController/check_session';
$route['session/unset'] = 'SessionController/unset_session';
$route['session/destroy'] = 'SessionController/destroy_session';
$route['login'] = 'Login';
$route['edituser'] = 'EdituserController';
// application/config/routes.php
$route['register'] = 'register/index'; // This will show the registration form
$route['register/aunthenticate'] = 'register/create_cliente'; // This will handle the form submission

$route['profile/update_profile'] = 'register/Update_profile';

$route['payment'] = 'Payment';
$route['productos/search_products'] = 'Productos/search_products';
$route['productos/mycart'] = 'Cart_controller/index';
$route['productos/track'] = 'Productos/track_orders';
$route['cart/add'] = 'Cart_controller/add_to_cart';
$route['cart/get_cart'] = 'Cart_controller/get_cart';
$route['cart/get_cart_summary'] = 'Cart_controller/get_cart_summary';
$route['cart/update_quantity'] = 'Cart_controller/update_quantity';
$route['cart/remove_item'] = 'Cart_controller/delete_item';
$route['contact'] = 'Contact_Controller';
$route['order_history'] = 'order_Controller';
$route['order'] = 'order_Controller/create_order';
// In application/config/routes.php
$route['productos/update_product'] = 'productos/update_product';  // URL: /productos/update_product
$route['productos/delete_product'] = 'productos/delete_product';  // URL: /productos/delete_product

$route['admin/delete_user'] = 'admin/delete_user';
$route['admin/make_admin'] = 'admin/make_admin';
$route['admin/revoke_admin'] = 'admin/revoke_admin';
$route['admin/overview'] = 'Analytics';




//localhost/Website/clientes_veterinaria







