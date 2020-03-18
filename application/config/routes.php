<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['404_override']                                          = '';
$route['translate_uri_dashes']                                  = FALSE;
//Client_master--------------------
$route['default_controller']                                    = 'webo_home';
$route['client-master']                                         = 'Client_master';
$route['client-master/save-client-master']                      = 'Client_master/save_client_master';
$route['client-master/add-new']                                 = 'Client_master/add_new';
$route['client-master/client-master-edit-details/(:any)']       = 'Client_master/client_master_edit_details/$1';
$route['client-master/edit-client']                             = 'Client_master/edit_client';
$route['client-master/edit-client-master']                      = 'client_master/edit_client_master';
$route['client-master/delete-client']                           = 'Client_master/delete_client';
//Client_master--------------------

//ADD SSL reminder-------------------
$route['ssl-reminder']                                         = 'Ssl_reminder';
$route['ssl-reminder/dispaly-relavent-websites']               = 'Ssl_reminder/dispaly_relavent_websites';
$route['ssl-reminder/view-ssl-reminder']                      = 'Ssl_reminder/view_ssl_reminder';
$route['ssl-reminder/insert-ssl-reminder']                    = 'Ssl_reminder/insert_ssl_reminder';
$route['ssl-reminder/delete-reminder-fun']                    = 'Ssl_reminder/delete_reminder_fun';

//SSL VIEW RENEWAL-----------------------             
$route['ssl-view']                                              = 'Ssl_view';
$route['ssl-reminder/auto-fill']                               = 'Ssl_reminder/auto_fill';
$route['ssl-view/ssl-view-edit-details/(:any)']                 = 'Ssl_view/ssl_view_edit_details/$1';
$route['ssl-view/update-ssl-view']                              = 'ssl_view/update_ssl_view';
$route['ssl-view/save-paid-details']                            = 'Ssl_view/save_paid_details';


//MASTER reminder------------------------
$route['master-reminder']                                      = 'Master_reminder';
$route['master-reminder/save-master-reminder']                = 'Master_reminder/save_master_reminder';
$route['master-reminder/edit-reminder-master']                = 'Master_reminder/edit_reminder_master';
$route['master-reminder/master-reminder-edit-details/(:any)'] = 'Master_reminder/master_reminder_edit_details/$1';
$route['master-reminder/delete-reminder-master']              = 'Master_reminder/delete_reminder_master';
$route['master-reminder/add-new']                              = 'Master_reminder/add_new';


//SERVICE MASTER-----------------------------
$route['month-renewal']                                         = 'Month_renewal';
$route['service-master']                                        = 'Service_master';
$route['service-master/add-new']                                = 'Service_master/add_new'; 
$route['service-master/save-service-master']                    = 'Service_master/save_service_master';
$route['service-master/service-master-edit-details/(:any)']     = 'Service_master/service_master_edit_details/$1';

//DASHBOARD------------------------------------
$route['dashboard']                                             = 'dashboard';

//SSl update------------------------------------
$route['ssl-update']                                            = 'Ssl_update';

//GST update------------------------------------
$route['gst-per']                                                = 'gst';
$route['gst-per/per-insert']                                     = 'gst/percentage_insert';

