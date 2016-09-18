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

$route['default_controller'] = "web";
$route['404_override'] = 'web/error';

//route web
//route berita
$route['berita'] = "web/berita";
$route['berita'] = "web/berita/index";
$route['berita/page'] = "web/berita/index";
$route['berita/page/(:num)'] = "web/berita/index/$1";
$route['berita/(:num)'] = "web/berita/index/$1";
$route['berita/detail/(:num)/(:any)'] = "web/berita/detail/$1/$2";
$route['berita/detail/(:any)/(:any)'] = "web/berita/detail/$1/$2";
$route['berita/read/(:any)'] = "web/berita/read/$1";
$route['berita/detail/(:any)'] = "web/berita/detail/$1";
$route['berita/(:any)'] = "web/berita/detail/$1";
//route artikel
$route['artikel'] = "web/artikel";
$route['artikel'] = "web/artikel/index";
$route['artikel/page'] = "web/artikel/index";
$route['artikel/page/(:num)'] = "web/artikel/index/$1";
$route['artikel/(:num)'] = "web/artikel/index/$1";
$route['artikel/detail/(:num)/(:any)'] = "web/artikel/detail/$1/$2";
$route['artikel/detail/(:any)/(:any)'] = "web/artikel/detail/$1/$2";
$route['artikel/read/(:any)'] = "web/artikel/read/$1";
$route['artikel/detail/(:any)'] = "web/artikel/detail/$1";
$route['artikel/(:any)'] = "web/artikel/detail/$1";
//route agenda
$route['agenda'] = "web/agenda";
$route['agenda'] = "web/agenda/index";
$route['agenda/page'] = "web/agenda/index";
$route['agenda/page/(:num)'] = "web/agenda/index/$1";
$route['agenda/(:num)'] = "web/agenda/index/$1";
$route['agenda/detail/(:num)/(:any)'] = "web/agenda/detail/$1/$2";
$route['agenda/detail/(:any)/(:any)'] = "web/agenda/detail/$1/$2";
$route['agenda/read/(:any)'] = "web/agenda/read/$1";
$route['agenda/detail/(:any)'] = "web/agenda/detail/$1";
$route['agenda/(:any)'] = "web/agenda/detail/$1";
//route pengumuman
$route['pengumuman'] = "web/pengumuman";
$route['pengumuman'] = "web/pengumuman/index";
$route['pengumuman/page'] = "web/pengumuman/index";
$route['pengumuman/page/(:num)'] = "web/pengumuman/index/$1";
$route['pengumuman/(:num)'] = "web/pengumuman/index/$1";
$route['pengumuman/detail/(:num)/(:any)'] = "web/pengumuman/detail/$1/$2";
$route['pengumuman/detail/(:any)/(:any)'] = "web/pengumuman/detail/$1/$2";
$route['pengumuman/read/(:any)'] = "web/pengumuman/read/$1";
$route['pengumuman/detail/(:any)'] = "web/pengumuman/detail/$1";
$route['pengumuman/(:any)'] = "web/pengumuman/detail/$1";
//route tentang
$route['profil'] = "web/profil";
$route['visi-dan-misi'] = "web/visi_misi";
$route['struktur-organisasi'] = "web/struktur_organisasi";
$route['progam-studi/teknik-informatika'] = "web/teknik_informatika";
$route['progam-studi/sistem-informasi'] = "web/sistem_informasi";
//pages
$route['about-us'] = "web/about_us";
$route['disclaimer'] = "web/disclaimer";
$route['terms-of-service'] = "web/terms_of_service";
$route['privacy-policy'] = "web/privacy_policy";
//route file
$route['file'] = "web/file";
//route galeri
$route['galeri'] = "web/galeri";
//route kontak
$route['kontak'] = "web/kontak";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
