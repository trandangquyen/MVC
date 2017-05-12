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
$route['admin/product'] = 'admin/product';
$route['admin/product/delete/(:num)'] = 'admin/product/deteleProduct/$1';
$route['admin/product/update/(:num)'] = 'admin/product/updateProduct/$1';

$route['admin/category'] = 'admin/category';
$route['admin/comment'] = 'admin/comment';

$route['admin/news'] = 'admin/news';
