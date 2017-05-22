<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['gioithieu'] = 'gioithieu/view';
$route['tintuc/list'] = 'tintuc/list_view';
$route['lienhe'] = 'lienhe';
$route['lienhe/save'] = 'lienhe/save';
$route['tintuc'] = 'tintuc';
$route['tintuc/details/(:num)'] = 'tintuc/details/$1';
$route['sanpham'] = 'sanpham/index';
$route['sanpham/(:num)'] = 'sanpham/viewProduct/$1';
$route['theloai/(:num)'] = 'sanpham/index/$1';

$route['ajaxProduct'] = 'sanpham/loadAjax';
$route['ajaxNews'] = 'tintuc/loadAjax';


$route['admin'] = 'admin/product';
$route['admin/product']['GET'] = 'admin/product';
$route['admin/product']['POST'] = 'admin/product/deteleProduct'; // do not 
$route['admin/product/add'] = 'admin/product/addProduct';
$route['admin/product/delete/(:num)'] = 'admin/product/deteleProduct/$1';
$route['admin/product/edit/(:num)'] = 'admin/product/updateProduct/$1';

$route['admin/category']['GET'] = 'admin/category';
$route['admin/category']['POST'] = 'admin/category/deteleCategory';
$route['admin/category/add'] = 'admin/category/addCategory';
$route['admin/category/delete/(:num)'] = 'admin/category/deteleCategory/$1';
$route['admin/category/edit/(:num)'] = 'admin/category/updateCategory/$1';

$route['admin/news']['GET'] = 'admin/news/index';
$route['admin/news']['POST'] = 'admin/news/deteleNews';
$route['admin/news/add'] = 'admin/news/addNews';
$route['admin/news/delete/(:num)'] = 'admin/news/deteleNews/$1';
$route['admin/news/edit/(:num)'] = 'admin/news/updateNews/$1';

$route['admin/user']['GET'] = 'admin/user/index';
$route['admin/user']['POST'] = 'admin/user/deteleUser';
$route['admin/user/add'] = 'admin/user/addUser';
$route['admin/user/delete/(:num)'] = 'admin/user/deteleUser/$1';
$route['admin/user/edit/(:num)'] = 'admin/user/updateUser/$1';


$route['search/(:any)'] = 'sanpham/search/$1';
$route['cart']['GET'] = 'cart/viewCart';
$route['cart/order']['GET'] = 'cart/order';
$route['cart']['POST'] = 'cart/actionCart';


$route['compare']['GET'] = 'Compare/viewCompare';
$route['compare']['POST'] = 'Compare/actionCompare';
$route['admin-sanpham'] = 'adminsanpham';
$route['admin-tintuc'] = 'admintintuc';
$route['admin-gioithieu'] = 'admingioithieu';
$route['admin-lienhe'] = 'adminlienhe';
$route['admin-caidat'] = 'admincaidat';
$route['admin-user'] = 'adminuser';
$route['admin-category'] = 'admincategory';
$route['admin-home'] = 'adminhome';
$route['user'] = 'user/login';
$route['logout'] = 'user/logout';


$route['billing/viewinvoice'] = 'invoice';