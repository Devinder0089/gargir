<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['index'] = 'home/index';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'home/error_404';
$route['default_controller'] = 'home';
$route['send-messages']='messages/add_send_message';
$route['receive-messages']='messages/receive_message';
$route['messages']='messages/index';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['login-post'] = 'auth/login_post';


$route['admin/dashboard'] = 'admin/index';
$route['dashboard'] = 'admin/index';
$route['admin'] = 'admin/index';
$route['admin/change-password/(:num)'] = 'auth/user_change_password/$1';
$route['admin/change-password'] = 'auth/change_password';

$route['admin/add-projects'] = 'projects/add';
$route['admin/projects'] = 'projects/index';
$route['admin/project-details/(:num)'] = 'projects/project_details/$1';


$route['admin/add-users'] = 'auth/user_add';

$route['admin/contractor'] = 'auth/get_contractor';
$route['admin/users'] = 'auth/users';
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

//category
$route['admin/categories'] = 'category/categories';
$route['admin/update-category/(:num)'] = 'category/update_category/$1';
$route['admin/subcategories'] = 'category/subcategories';
$route['admin/update-subcategory/(:num)'] = 'category/update_subcategory/$1';

//gallery-category
$route['admin/gallery-categories'] = 'category/gallery_categories';
$route['admin/update-gallery-category/(:num)'] = 'category/update_gallery_category/$1';
$route['admin/delete-gallery-category-post'] = '';

//gallery
$route['admin/gallery'] = 'gallery/index';
$route['admin/update-gallery-image/(:num)'] = 'gallery/update_gallery_image/$1';

//comments
$route['admin/comments'] = 'admin/comments';


//contact messages
$route['admin/contact-messages'] = 'admin/contact_messages';

//ads
$route['admin/ads'] = 'admin/ads';

//newsletter
$route['admin/newsletter'] = 'admin/newsletter';

//update profile
$route['admin/update-profile'] = 'admin/update_profile';

//settings
$route['settings'] = 'admin/settings';
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
