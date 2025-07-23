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
$route['default_controller'] = 'auth/login'; // Halaman pertama adalah login
$route['auth/login'] = 'auth/login'; // Routing untuk login
$route['dashboard/dboard'] = 'dboard/index';
$route['mahasiswa'] = 'mahasiswa'; // Routing untuk halaman mahasiswa
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard/print'] = 'dashboard/print';
$route['dashboard/exportExcel'] = 'dashboard/exportExcel';
$route['mahasiswa/tampil_grafik'] = 'mahasiswa/tampil_grafik';
$route['dosen'] = 'dashboard/dosenview';  // This maps /dosen to Dashboard/dosen
$route['dashboard/jadwal'] = 'jadwalkuliah';  // Pastikan ini ada, dan jadwalkuliah adalah controller yang sesuai
$route['jadwalkuliah/jadwal'] = 'jadwalkuliah/jadwal';
$route['jadwalkuliah/detail/(:num)'] = 'jadwalkuliah/detail/$1';
$route['dosen/export_pdf'] = 'dosen/export_pdf';
$route['dashboard/generate_pdf'] = 'dashboard/generate_pdf';
$route['jadwal/print'] = 'jadwalkuliah/print';
$route['dosen/print_dosen'] = 'dosen/print';
$route['dashboard/dosen'] = 'dashboard/dosen';  // Mengarah ke controller Dosen dalam controller Dashboard
$route['dashboard/print'] = 'dashboard/print';
$route['dboard/chart-data'] = 'dboard/get_chart_data';
$route['dashboard/profil_view'] = 'profil/index';
$route['profil/upload_foto'] = 'profil/upload_foto';  // Mengarah ke method upload_foto di controller Profil
$route['profil'] = 'profil/index';
$route['profil/update_profil'] = 'profil/update_profil';
$route['profil/upload_foto'] = 'profil/upload_foto';
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/login_process'] = 'auth/login_process';
$route['auth/register_process'] = 'auth/register_process';
$route['jadwalkuliah/edit/(:num)'] = 'jadwalkuliah/edit/$1';
$route['jadwalkuliah/update'] = 'jadwalkuliah/update';
$route['jadwalkuliah'] = 'jadwalkuliah/index';
$route['jadwalkuliah/tambah'] = 'jadwalkuliah/tambah';
$route['jadwalkuliah/simpan'] = 'jadwalkuliah/simpan';
$route['jadwalkuliah/Jadwal_edit/(:num)'] = 'jadwalkuliah/jadwal_edit/$1';
$route['jadwalkuliah/update/(:num)'] = 'jadwalkuliah/update/$1';
$route['Auth/forgot_password'] = 'Auth/forgot_password';
$route['Auth/change_password'] = 'Auth/change_password';




















