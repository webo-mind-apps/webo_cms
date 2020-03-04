<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['client-master']     = 'Client_master';
$route['client-master/save-client-master']     = 'Client_master/save_client_master';
$route['ssl-remainder']     = 'Ssl_remainder';
$route['master-remainder']  = 'Master_remainder';

$route['default_controller'] = 'webo_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
