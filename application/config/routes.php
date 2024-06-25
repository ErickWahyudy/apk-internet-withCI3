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
$route['default_controller'] = 'Landingpage';
$route['404_override'] = 'notfound/index';
$route['maintenance'] = 'notfound/dalam_pengembangan';
$route['maintenance-server'] = 'notfound/perbaikan_server';

//landingpage
$route['about']       = 'Landingpage/about';
$route['contact']     = 'Landingpage/contact';
$route['feature']     = 'Landingpage/feature';
$route['project']     = 'Landingpage/project';
$route['service']     = 'Landingpage/service';
$route['speedtest']   = 'Landingpage/speedtest';
$route['team']        = 'Landingpage/team';
$route['testimonial'] = 'Landingpage/testimonial';
$route['feedback']    = 'feedback/feedback_add';
$route['lapor']       = 'Landingpage/lapor';

$route['register']          = 'Register/add';
$route['register_add']      = 'Register/api_add';
$route['promo']             = 'Register/promo';

$route['reset_password']            = 'reset_password/kirim_email';
$route['password_baru/(:any)']      = 'reset_password/reset/$1';

//API
$route['api/v1/pelanggan_view']     = 'API/pelanggan/view';
$route['api/v1/promo_view']         = 'API/pelanggan/promo_view';
$route['api/v1/email_view']         = 'API/email/view_email';
$route['api/v1/email_send']         = 'API/email/send_mail_all';

$route['api/payment/qris/(:any)']  = 'Struk/qris/$1';

$route['translate_uri_dashes'] = FALSE;
