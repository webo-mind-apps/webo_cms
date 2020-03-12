<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['404_override']                                              = '';
$route['translate_uri_dashes']                                      = FALSE;

$route['default_controller']                                        = 'webo_home';
$route['client-master']                                             = 'Client_master';
$route['client-master/save-client-master']                          = 'Client_master/save_client_master';
$route['client-master/add-new']                                     = 'Client_master/add_new';
$route['client-master/client-master-edit-details/(:any)']           = 'Client_master/client_master_edit_details/$1';
$route['ssl-remainder']                                             = 'Ssl_remainder';
$route['ssl-remainder/dispaly-relavent-websites']                   = 'Ssl_remainder/dispaly_relavent_websites';
$route['ssl-remainder/view-ssl-remainder']                          = 'Ssl_remainder/view_ssl_remainder';
$route['ssl-remainder/insert-ssl-remainder']                        = 'Ssl_remainder/insert_ssl_remainder';
$route['ssl-remainder/delete-remainder-fun']                        = 'Ssl_remainder/delete_remainder_fun';
$route['ssl-view']                                                  = 'Ssl_view';
$route['ssl-update']                                                = 'Ssl_update';
$route['ssl-remainder/auto-fill']                                   = 'Ssl_remainder/auto_fill';
// $route['ssl-remainder/auto-fill-ssl-table']                      = 'Ssl_remainder/auto_fill_ssl_table';
$route['master-remainder']                                          = 'Master_remainder';
$route['client-master/delete-client']                               = 'Client_master/delete_client';
$route['master-remainder/save-master-remainder']                    = 'Master_remainder/save_master_remainder';
$route['master-remainder/edit-remainder-master']                    = 'Master_remainder/edit_remainder_master';
$route['master-remainder/master-remainder-edit-details/(:any)']     = 'Master_remainder/master_remainder_edit_details/$1';
$route['master-remainder/delete-remainder-master']                  = 'Master_remainder/delete_remainder_master';
$route['month-renewal']                                             = 'Month_renewal';
$route['dashboard']                                                 = 'Dashboard';
$route['service-master']                                            = 'Service_master';
$route['service-master/add-new']                                    = 'Service_master/add_new';
$route['master-remainder/add-new']                                  = 'Master_remainder/add_new';
$route['master-remainder']                                          = 'Master_remainder';
$route['service-master/save-service-master']                        = 'Service_master/save_service_master';
$route['service-master/service-master-edit-details/(:any)']         = 'Service_master/service_master_edit_details/$1';

