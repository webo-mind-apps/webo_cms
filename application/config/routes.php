<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['404_override']                            = '';
$route['translate_uri_dashes']                    = FALSE;

$route['default_controller']                      = 'webo_home';
$route['client-master']                           = 'Client_master';
$route['client-master/save-client-master']        = 'Client_master/save_client_master';
$route['client-master/edit-client']               = 'Client_master/edit_client';
$route['client-master/edit-client-master']        = 'client_master/edit_client_master';
$route['ssl-remainder']                           = 'Ssl_remainder';
$route['ssl-remainder/dispaly-relavent-websites'] = 'Ssl_remainder/dispaly_relavent_websites';
$route['ssl-remainder/view-ssl-remainder']        = 'Ssl_remainder/view_ssl_remainder';
$route['ssl-remainder/insert-ssl-remainder']      = 'Ssl_remainder/insert_ssl_remainder';
$route['ssl-remainder/delete-remainder-fun']      = 'Ssl_remainder/delete_remainder_fun';
$route['ssl-view']                                = 'Ssl_view';
$route['ssl-remainder/auto-fill']                 = 'Ssl_remainder/auto_fill';
$route['master-remainder']                        = 'Master_remainder';
$route['client-master/delete-client']             = 'Client_master/delete_client';
$route['master-remainder/save-master-remainder']  = 'Master_remainder/save_master_remainder';
$route['master-remainder/edit-remainder-master']  = 'Master_remainder/edit_remainder_master';
$route['master-remainder/delete-remainder-master']  = 'Master_remainder/delete_remainder_master';
