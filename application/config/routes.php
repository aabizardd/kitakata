<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

//auth

$route['registrasi'] = 'auth/registrasi';
$route['forgot_password'] = 'auth/forgot_password';

// route user
$route['home'] = 'home';
$route['shop'] = 'shop';
$route['checkout'] = 'transaction/checkout';
$route['pesanan'] = 'transaction/cek_pesanan';
$route['detail_pesanan/(:num)'] = 'transaction/detail_pesanan/$1';

$route['detail_product/(:num)'] = 'product/index/$1';
$route['cart'] = 'shop/cart';
$route['tambah_keranjang/(:num)'] = 'shop/tambah_keranjang/$1';
$route['delete_cart/(:any)'] = 'shop/delete_cart/$1';

//admin
$route['logout'] = 'admin/logout';
$route['admin/book'] = 'admin/kelola_buku';


$route['default_controller'] = 'home';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;