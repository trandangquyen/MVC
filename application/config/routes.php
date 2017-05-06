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

$route['tintuc/delete/(:num)'] = 'tintuc/deleteTintuc/$1';
