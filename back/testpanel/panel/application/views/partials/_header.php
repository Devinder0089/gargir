<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?></title>
        <meta name="description" content="<?php echo html_escape($description); ?>"/>
        <meta name="keywords" content="<?php echo html_escape($keywords); ?>"/>
        <meta name="author" content="EkamSoftwares"/>
        <meta name="robots" content="all"/>
        <meta name="revisit-after" content="1 Days"/>
        <meta property=og:locale content=en_US/>
        <meta property=og:site_name content="<?php echo $settings->application_name; ?>"/>
<?php if (isset($page_type)): ?>
        <meta property="og:type" content="<?php echo $og_type; ?>"/>
        <meta property="og:title" content="<?php echo html_escape($post->title); ?>"/>
        <meta property="og:description" content="<?php echo html_escape($post->summary); ?>"/>
        <meta property="og:url" content="<?php echo $og_url; ?>"/>
        <meta property="og:image" content="<?php echo $og_image; ?>"/>
        <meta property="og:image:width" content="750" />
        <meta property="og:image:height" content="500" />
        <meta name=twitter:card content=summary/>
        <meta name=twitter:title content="<?php echo html_escape($post->title); ?>"/>
        <meta name=twitter:description content="<?php echo html_escape($post->summary); ?>"/>
        <meta name=twitter:image content="<?php echo $og_image; ?>"/>
<?php else: ?>
        <meta property=og:type content=website/>
        <meta property=og:title content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
        <meta property=og:description content="<?php echo html_escape($description); ?>"/>
        <meta property=og:url content="<?php echo base_url(); ?>"/>
        <meta name=twitter:card content=summary/>
        <meta name=twitter:title content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
        <meta name=twitter:description content="<?php echo html_escape($description); ?>"/>
<?php endif; ?>

        <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

        <!-- Font-awesome CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Simple-line-icons CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/simple-line-icons/css/simple-line-icons.css"
              rel="stylesheet"/>

        <!-- Ionicons CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>

        <?php echo $primary_font_url; ?>
        <?php echo $secondary_font_url; ?>
        <?php echo $tertiary_font_url; ?>

        <!-- Owl Carousel -->
        <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet"/>

        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/minimal/green.css"/>

        <!-- Jquery Confirm CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet"/>

        <!-- Magnific Popup-->
        <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"/>

        <!-- Style -->
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet"/>

        <!-- Color CSS -->
        <?php if ($vsettings->site_color == '') : ?>
            <link href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet"/>
        <?php else : ?>
            <link href="<?php echo base_url(); ?>assets/css/colors/<?php echo html_escape($vsettings->site_color); ?>.css"
                  rel="stylesheet"/>
        <?php endif; ?>

        <!-- Responsive -->
        <link href="<?php echo base_url(); ?>assets/css/responsive.min.css" rel="stylesheet"/>

        <!--Include Font Style-->
        <?php $this->load->view('partials/_font_style'); ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php echo $settings->google_analytics; ?>
    </head>
<body>

<header id="header">

    <div class="top-bar">
        <div class="container">

            <div class="col-sm-12">
                <div class="row">
                    <ul class="top-menu top-menu-left">
                        <!--Print top menu pages-->
                        <?php foreach ($top_menu_pages as $page): ?>
                            <?php if ($page->visibility == 1): ?>
                                <li>
                                    <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if (auth_check()): ?>
                            <?php if (user()->role == "admin" || user()->role == "author") { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin"><?php echo trans("admin_panel"); ?></a>
                                </li>
                            <?php } ?>
                        <?php endif; ?>
                    </ul>


                    <ul class="top-menu top-menu-right">
                        <!--Check auth-->
                        <?php if (auth_check()): ?>
                            <li class="dropdown profile-dropdown">
                                <a class="dropdown-toggle a-profile" data-toggle="dropdown" href="#"
                                   aria-expanded="false">
                                    <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>">
                                    <?php echo html_escape(user()->username); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <?php if (user()->role == "admin" || user()->role == "author") { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>profile/<?php echo user()->slug; ?>">
                                                <i class="fa fa-bars"></i>
                                                <?php echo trans("my_posts"); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>reading-list">
                                            <i class="fa fa-star"></i>
                                            <?php echo trans("title_reading_list"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>update-profile">
                                            <i class="fa fa-user"></i>
                                            <?php echo trans("update_profile"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>change-password">
                                            <i class="fa fa-lock"></i>
                                            <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>logout">
                                            <i class="fa fa-sign-out"></i>
                                            <?php echo trans("logout"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        <?php else: ?>
                            <li class="top-li-auth">
                                <a href="#" data-toggle="modal"
                                   data-target="#modal-login"><?php echo trans("login"); ?></a>
                                <span>/</span>
                                <a href="<?php echo base_url(); ?>register"><?php echo trans("register"); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="top-menu top-menu-social">
                        <!--Include social media links-->
                        <?php $this->load->view('partials/_social_media_links', ['rss_hide' => false]); ?>
                    </ul>

                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <div class="logo-banner">
        <div class="container">

            <div class="col-sm-12">
                <div class="row">

                    <div class="left">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo get_logo($vsettings); ?>" alt="logo" class="logo">
                        </a>
                    </div>

                    <div class="right">
                        <div class="pull-right">
                            <!--Include banner-->
                            <?php $this->load->view('partials/_ad_spaces', ['ad' => "header"]); ?>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-default main-menu megamenu">
        <div class="container">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <div class="row">

                    <ul class="nav navbar-nav">
                        <li class="<?php echo (uri_string() == "" || uri_string() == "index") ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("nav_home"); ?></a>
                        </li>

                        <!--Categories-->
                        <?php foreach ($categories as $item): ?>

                            <?php if (is_category_has_subcategory($item->id)): ?>
                                <!--Include mega menu-->
                                <?php $this->load->view('partials/_megamenu_multicategory', ['item' => $item]); ?>
                            <?php else: ?>
                                <!--Include mega menu-->
                                <?php $this->load->view('partials/_megamenu_singlecategory', ['item' => $item]); ?>
                            <?php endif; ?>

                        <?php endforeach; ?>



                        <?php foreach ($main_menu_pages as $page): ?>

                            <!--Check if video page-->
                            <?php if ($page->slug == "videos" && $page->visibility == 1): ?>
                                <li class="dropdown megamenu-fw mega-li-video <?php echo (uri_string() == "videos") ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() . html_escape($page->slug); ?>"
                                       class="dropdown-toggle disabled" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        <?php echo html_escape($page->title); ?> <span class="caret"></span>
                                    </a>

                                    <!--Check if there are video posts-->
                                    <?php if (count($last_videos) > 0): ?>
                                        <ul class="dropdown-menu megamenu-content" role="menu" data-mega-ul="video">
                                            <li>

                                                <div class="col-sm-12">
                                                    <div class="row">

                                                        <div class="sub-menu-right sub-menu-video">
                                                            <div class="row row-menu-right">

                                                                <?php foreach ($last_videos as $video): ?>

                                                                    <div class="col-sm-3 menu-post-item">

                                                                        <a href="<?php echo base_url(); ?>video/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">
                                                                            <div class="video-image">

                                                                                <img src="<?php echo base_url(); ?>assets/img/video_bg_sm.jpg" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-bg-sm">

                                                                                <!--If image from url-->
                                                                                <?php if (empty($video->image_url)): ?>

                                                                                    <img src="<?php echo base_url() . html_escape($video->image_default); ?>"
                                                                                         alt="<?php echo html_escape($video->title); ?>"
                                                                                         class="img-responsive">

                                                                                <?php else: ?>

                                                                                    <img src="<?php echo html_escape($video->image_url); ?>"
                                                                                         alt="<?php echo html_escape($video->title); ?>"
                                                                                         class="img-responsive">

                                                                                <?php endif; ?>

                                                                                <a href="#" class="icon-video"><i
                                                                                            class="fa fa-play"></i></a>

                                                                            </div>
                                                                        </a>

                                                                        <h3 class="title">
                                                                            <a href="<?php echo base_url(); ?>video/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">
                                                                                <?php echo html_escape(character_limiter($video->title, 55, '...')); ?>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="post-meta">
                                                                            <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($video->user_slug); ?>"><?php echo html_escape($video->username); ?></a>
                                                                            <span><?php echo helper_date_format($video->created_at); ?></span>
                                                                            <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($video->id); ?></span>
                                                                            <?php if ($settings->show_hits): ?>
                                                                                <span><i class="fa fa-eye"></i><?php echo $video->hit; ?></span>
                                                                            <?php endif; ?>
                                                                        </p>

                                                                    </div>

                                                                <?php endforeach; ?>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php else: ?>
                                <?php if ($page->visibility == 1): ?>
                                    <li class="<?php echo (uri_string() == html_escape($page->slug)) ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>


                    <ul class="nav navbar-nav navbar-right">
                        <li class="li-search">
                            <a class="search-icon"><i class="fa fa-search"></i></a>

                            <div id="search-form">
                                <?php echo form_open('search', ['method' => 'get']); ?>
                                <input type="text" name="q" maxlength="300" pattern=".*\S+.*"
                                       class="form-control form-input"
                                       placeholder="<?php echo trans("placeholder_search"); ?>" required>
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                <?php echo form_close(); ?>
                            </div>

                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="col-sm-12">
        <div class="row">

            <div class="nav-mobile">

                <div class="logo-cnt">
                    <a href="<?php echo base_url(); ?>">
                        <img src="<?php echo get_logo($vsettings); ?>" alt="logo" class="logo">
                    </a>
                </div>

                <span onclick="open_mobile_nav();" class="mobile-menu-icon"><i class="ion-navicon-round"></i> </span>

            </div>


        </div>
    </div>
</header>

<div id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-inner">
        <p class="text-right p-close-menu">
            <a href="javascript:void(0)" class="closebtn" onclick="close_mobile_nav();"><i
                        class="ion-ios-close-empty"></i></a>
        </p>

        <div class="col-sm-12">
            <div class="row">
                <nav class="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("nav_home"); ?></a>
                        </li>

                        <!--Categories-->
                        <?php foreach ($categories as $item): ?>
                            <?php if (is_category_has_subcategory($item->id)): ?>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="true">
                                        <?php echo html_escape($item->name) ?>
                                        <span class="ion-chevron-down mobile-dropdown-arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>/<?php echo html_escape($item->id) ?>"><?php echo trans("all"); ?></a>
                                        </li>
                                        <?php foreach (helper_get_subcategories($item->id) as $sub): ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($sub->name_slug) ?>/<?php echo html_escape($sub->id) ?>">
                                                    <?php echo html_escape($sub->name); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </li>

                            <?php else: ?>

                                <li>
                                    <a href="<?php echo base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>/<?php echo html_escape($item->id) ?>"><?php echo html_escape($item->name) ?></a>
                                </li>

                            <?php endif; ?>
                        <?php endforeach; ?>


                        <?php foreach ($main_menu_pages as $page): ?>
                            <?php if ($page->visibility == 1): ?>
                                <li>
                                    <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($top_menu_pages as $page): ?>
                            <?php if ($page->visibility == 1): ?>
                                <li>
                                    <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($footer_pages as $page) : ?>
                            <?php if ($page->visibility == 1): ?>
                                <li>
                                    <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?> </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if (auth_check()): ?>
                            <?php if (user()->role == "admin" || user()->role == "author") { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin"><?php echo trans("admin_panel"); ?></a>
                                </li>
                            <?php } ?>
                        <?php endif; ?>


                        <!--Check auth-->
                        <?php if (auth_check()): ?>
                            <li class="dropdown profile-dropdown">
                                <a class="dropdown-toggle a-profile" data-toggle="dropdown" href="#"
                                   aria-expanded="false">
                                    <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>">
                                    <?php echo html_escape(user()->username); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if (user()->role == "admin" || user()->role == "author") { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>profile/<?php echo user()->slug; ?>">
                                                <i class="fa fa-bars"></i>
                                                <?php echo trans("my_posts"); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>reading-list">
                                            <i class="fa fa-star"></i>
                                            <?php echo trans("title_reading_list"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>update-profile">
                                            <i class="fa fa-user"></i>
                                            <?php echo trans("update_profile"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>change-password">
                                            <i class="fa fa-lock"></i>
                                            <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>logout">
                                            <i class="fa fa-sign-out"></i>
                                            <?php echo trans("logout"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        <?php else: ?>
                            <li>
                                <a href="<?php echo base_url(); ?>login"
                                   class="close-menu-click"><?php echo trans("login"); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>register"
                                   class="close-menu-click"><?php echo trans("register"); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="mobile-search">
                    <?php echo form_open('search', ['method' => 'get']); ?>
                    <input type="text" name="q" maxlength="300" pattern=".*\S+.*" class="form-control form-input"
                           placeholder="<?php echo trans("placeholder_search"); ?>" required>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="row">
                <ul class="mobile-menu-social">
                    <!--Include social media links-->
                    <?php $this->load->view('partials/_social_media_links'); ?>
                </ul>
            </div>

        </div>


    </div>

</div>

<!--Include modals-->
<?php $this->load->view('partials/_modals'); ?>
