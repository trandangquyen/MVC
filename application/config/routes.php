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




$route['admin/category'] = 'admin/category/index';
$route['admin/comment'] = 'admin/comment';
$route['admin/product'] = 'admin/product';
$route['admin/news'] = 'admin/news';
$route['admin-sanpham'] = 'adminsanpham';
$route['admin-tintuc'] = 'admintintuc';
$route['admin-gioithieu'] = 'admingioithieu';
$route['admin-lienhe'] = 'adminlienhe';
$route['admin-caidat'] = 'admincaidat';
$route['admin-user'] = 'adminuser';
$route['admin-category'] = 'admincategory';
$route['admin-home'] = 'adminhome';
