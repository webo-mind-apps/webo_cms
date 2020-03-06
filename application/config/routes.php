<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['404_override']                            = '';
$route['translate_uri_dashes']                    = FALSE;

$route['default_controller']                      = 'webo_home';
$route['client-master']                           = 'Client_master';
$route['client-master/save-client-master']        = 'Client_master/save_client_master';
$route['client-master/edit-client']               = 'Client_master/edit_client';
$route['client-master/edit-client-master'] = 'client_master/edit_client_master';
$route['ssl-remainder']                           = 'Ssl_remainder';
$route['ssl-remainder/dispaly-relavent-websites'] = 'Ssl_remainder/dispaly_relavent_websites';  
$route['ssl-remainder/view-ssl-remainder']        = 'Ssl_remainder/view_ssl_remainder';  
$route['ssl-view']                                = 'Ssl_view';  
$route['master-remainder']                        = 'Master_remainder'; 