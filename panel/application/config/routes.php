<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['invoice-details-mail/(:any)'] = 'invoices_public/index/$1';
$route['invoice-details-mails/(:any)'] = 'invoices_public/details/$1';


/********************* start $permission set route **********************************/
$route['admin/permission'] = 'permission/index';
$route['admin/add-permission'] = 'permission/add';
$route['admin/permission-details/(:num)'] = 'permission/details/$1';
$route['admin/permission-edit/(:num)'] = 'permission/edit/$1';
$route['admin/add-permission-post'] = 'permission/add_post';

/*********************** end $permission set route ********************************/


//support_tickets
$route['admin/support-tickets'] = 'support_tickets/index';

$route['admin/invoices/?(:any)'] = 'invoices/index/$1';
$route['admin/add-invoices'] = 'invoices/add';
$route['admin/add-invoices-post'] = 'invoices/add_post';
$route['admin/invoice-details/(:num)'] = 'invoices/details/$1';
$route['admin/invoice-send-mail/(:num)'] = 'invoices/invoice_send_mail/$1';
$route['admin/invoice-send-mail-post'] = 'invoices/invoice_send_mail_post';

$route['admin/sms-reports'] = 'sms_reports/index';
$route['admin/add-sms-reports'] = 'sms_reports/add';
$route['admin/add-sms-reports-post'] = 'sms_reports/add_post';
$route['admin/sms-reports-details/(:num)'] = 'sms_reports/details/$1';
$route['admin/sms-reports-send/(:num)'] = 'sms_reports/sms_send/$1';

$route['admin/files'] = 'file_history/index';
$route['admin/add/files'] = 'file_history/add';
$route['admin/file-details/(:num)'] = 'file_history/details/$1';

$route['admin/dashboard'] = 'dashboard/index';
$route['dashboard'] = 'dashboard/index';
$route['admin'] = 'dashboard/index';
// $route['admin/users'] = 'auth/users';


$route['index'] = 'home/index';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'home/error_404';
$route['default_controller'] = 'home';
$route['send-messages']='messages/add_send_message';
$route['receive-messages']='messages/receive_message';
$route['messages']='messages/index';
$route['admin/message/sentmail/(:num)']='messages/sentmail/$1';
$route['admin/message/details/(:num)']='messages/details/$1';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['login-post'] = 'auth/login_post';
$route['admin/change-password/(:num)'] = 'auth/user_change_password/$1';
$route['admin/change-password'] = 'auth/change_password';

// project

$route['admin/add-projects'] = 'projects/add';
$route['admin/projects'] = 'projects/index';
$route['admin/project-details/(:any)'] = 'projects/project_details/$1';
$route['admin/project-edit/(:any)'] = 'projects/project_edit/$1';
$route['admin/project-reports/(:any)'] = 'projects/projectReports/$1';
$route['admin/project/report/(:num)'] = 'projects/projectReportEdit/$1';


// apartment
$route['admin/project/add-apartments/(:any)'] = 'apartment/add/$1';
$route['admin/project/apartments/(:any)'] = 'apartment/index/$1';
$route['admin/project/apartment-details/(:any)'] = 'apartment/apartments_details/$1';
$route['admin/project/apartment-edit/(:any)'] = 'apartment/apartment_edit/$1';
$route['admin/project/apartment-reports/(:any)'] = 'apartment/apartmentReports/$1';
$route['admin/project/apartment/report/(:num)'] = 'apartment/apartmentReportEdit/$1';

$route['admin/project/apartments'] = 'apartment/allApartments';
$route['admin/project/apartment/files/(:any)'] = 'apartment/files/$1';
//sub_admin
$route['admin/sub-admin'] = 'sub_admin/index';
$route['admin/add-sub-admin'] = 'sub_admin/add';
$route['admin/sub-admin-edit/(:num)'] = 'sub_admin/edit/$1';
$route['admin/add-sub-admin-post'] = 'sub_admin/add_user_post';
$route['admin/sub-admin-details/(:num)'] = 'sub_admin/details/$1';


//clients
$route['admin/clients'] = 'clients/index';
$route['admin/add-client'] = 'clients/add';
$route['admin/client-edit/(:any)'] = 'clients/edit/$1';
$route['admin/client-details/(:any)'] = 'clients/details/$1';
$route['admin/client-bought-apartments/(:any)'] = 'clients/boughtApartments/$1';

//contractor
$route['admin/contractor'] = 'contractor/index';
$route['admin/add-contractor'] = 'contractor/add';
$route['admin/edit-contractor/(:any)'] = 'contractor/edit/$1';
$route['admin/contractor-details/(:any)'] = 'contractor/details/$1';
$route['admin/contractor-clients/(:any)'] = 'contractor/allClients/$1';
$route['admin/contractor-workers/(:any)'] = 'contractor/allWorkers/$1';

//workers
$route['admin/workers'] = 'workers/index';
$route['admin/add-worker'] = 'workers/add';
$route['admin/worker-edit/(:any)'] = 'workers/edit/$1';
$route['admin/worker-details/(:any)'] = 'workers/details/$1';
$route['admin/worker-assigned-projects/(:any)'] = 'workers/assignedProjects/$1';


//finance
$route['admin/finance'] = 'finance/index';
$route['admin/finance/add-payment'] = 'finance/add';
$route['admin/finance/edit-payment/(:num)'] = 'finance/edit/$1';
$route['admin/contractor/payment/history/(:any)'] = 'finance/contratorPaymentHistory/$1';
$route['admin/finance/month'] = 'finance/get_finance_by_month';
$route['admin/finance/year'] = 'finance/get_finance_by_year';
//users
$route['admin/add-users'] = 'auth/user_add';
$route['admin/users'] = 'auth/users';
$route['admin/users/(:num)'] = 'auth/details/$1';
$route['admin/profile'] = 'auth/profile';
$route['admin/user-edit/(:num)'] = 'auth/users_edit/$1';

//page
$route['admin/add-page'] = 'page/add_page';
$route['admin/pages'] = 'page/pages';
$route['admin/update-page/(:num)'] = 'page/update_page/$1';

//poll
$route['admin/add-poll'] = 'poll/add_poll';
$route['admin/polls'] = 'poll/polls';
$route['admin/update-poll/(:num)'] = 'poll/update_poll/$1';

//widget
$route['admin/add-widget'] = 'widget/add_widget';
$route['admin/widgets'] = 'widget/widgets';
$route['admin/update-widget/(:num)'] = 'widget/update_widget/$1';

//post
$route['admin/add-post'] = 'post/add_post';
$route['admin/posts'] = 'post/posts';
$route['admin/pending-posts'] = 'post/pending_posts';
$route['admin/author-posts'] = 'post/author_posts';
$route['admin/recommended-posts'] = 'post/recommended_posts';
$route['admin/featured-posts'] = 'post/featured_posts';
$route['admin/featured-slider-posts'] = 'post/featured_slider_posts';
$route['admin/update-post/(:num)'] = 'post/update_post/$1';
$route['admin/breaking-news'] = 'post/breaking_news';

//video
$route['admin/add-video'] = 'video/add_video';
$route['admin/videos'] = 'video/videos';
$route['admin/pending-videos'] = 'video/pending_videos';
$route['admin/update-video/(:num)'] = 'video/update_video/$1';


//gallery-category
$route['admin/gallery-categories'] = 'category/gallery_categories';
$route['admin/update-gallery-category/(:num)'] = 'category/update_gallery_category/$1';
$route['admin/delete-gallery-category-post'] = '';

//gallery
$route['admin/gallery'] = 'gallery/index';
$route['admin/update-gallery-image/(:num)'] = 'gallery/update_gallery_image/$1';


//contact messages
$route['admin/contact-messages'] = 'admin/contact_messages';

//newsletter
$route['admin/newsletter'] = 'admin/newsletter';

//update profile
$route['admin/update-profile'] = 'admin/update_profile';

//settings
$route['admin/settings'] = 'admin/settings';
$route['admin/visual-settings'] = 'admin/visual_settings';

//seo tools
$route['admin/seo-tools'] = 'admin/seo_tools';

//social login configuration
$route['admin/social-login-configuration'] = 'admin/social_login_configuration';

//font options
$route['admin/font-options'] = 'admin/font_options';

//api app

$route['webapi/app/(:any)/?(:any)/?(:any)/?(:any)'] = 'api/index';


$route['webtools/(:any)/?(:any)'] = 'tools/index';
$route['admin/chat'] = 'chat/index';