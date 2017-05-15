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
$route['admin/product']['POST'] = 'admin/product/deteleProduct';
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


$route['search/(:any)'] = 'sanpham/search/$1';


