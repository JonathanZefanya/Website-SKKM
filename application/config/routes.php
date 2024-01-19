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

$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Routing for Pengumuman section */
$route['pengumuman/(:any)'] = 'pengumuman/single/$1';

/* Routing for Admin section */

/* Routing for Mahasiswa section */
$route['mahasiswa/daftar-skkm'] = 'mahasiswa/skkm';
$route['mahasiswa/daftar-skkm-valid'] = 'mahasiswa/skkm/list_skkm_valid';
$route['mahasiswa/daftar-skkm-tidak-valid'] = 'mahasiswa/skkm/list_skkm_tidak_valid';
$route['mahasiswa/daftar-skkm-belum-valid'] = 'mahasiswa/skkm/list_skkm_belum_valid';
$route['mahasiswa/skkm/cetak-laporan'] = 'mahasiswa/skkm/cetak_laporan';

/* Routing for UP2KK section */
$route['up2kk/daftar-mahasiswa'] = 'up2kk/validasi';
$route['up2kk/daftar-skkm'] = 'up2kk/skkm';
$route['up2kk/daftar-skkm-valid'] = 'up2kk/skkm/list_skkm_valid';
$route['up2kk/daftar-skkm-valid/(:num)'] = 'up2kk/skkm/list_skkm/$1';
$route['up2kk/daftar-skkm-tidak-valid'] = 'up2kk/validasi/list_skkm_tidak_valid';
$route['up2kk/daftar-skkm-belum-valid'] = 'up2kk/validasi/list_skkm_belum_valid';
$route['up2kk/validasi/daftar-skkm/(:num)'] = 'up2kk/validasi/list_skkm/$1';
$route['up2kk/validasi/skkm/(:num)'] = 'up2kk/validasi/edit_skkm/$1';