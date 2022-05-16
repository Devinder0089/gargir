<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1 class="title-index"><?php echo html_escape($page->title); ?></h1>

<!--Include featured section-->
<?php $this->load->view('partials/_featured_posts', $featured_posts); ?>


<div id="wrapper" class="index-wrapper m-t-0">
    <div class="container">
        <div class="row">

            <!--Include news ticker-->
            <?php $this->load->view('partials/_news_ticker', $news_ticker_posts); ?>


            <!--Include banner-->
            <?php $this->load->view('partials/_ad_spaces', ['ad' => "header_mobile"]); ?>


            <div id="content" class="col-sm-8 col-xs-12">

                <?php
                $x = 0;
                foreach ($categories as $category): ?>

                    <?php if ($category->block_type == "block-1"): ?>
                        <!--Include Block 1-->
                        <?php $this->load->view('partials/_category_block_type_1', ['category' => $category]); ?>

                    <?php endif; ?>

                    <?php if ($category->block_type == "block-2"): ?>
                        <!--Include Block 2-->
                        <?php $this->load->view('partials/_category_block_type_2', ['category' => $category]); ?>
                    <?php endif; ?>

                    <?php if ($category->block_type == "block-3"): ?>
                        <!--Include Block 3-->
                        <?php $this->load->view('partials/_category_block_type_3', ['category' => $category]); ?>
                    <?php endif; ?>

                    <?php if ($category->block_type == "block-4"): ?>
                        <!--Include Block 4-->
                        <?php $this->load->view('partials/_category_block_type_4', ['category' => $category]); ?>
                    <?php endif; ?>

                    <?php if ($x == 0): ?>

                        <!--Include banner-->
                        <?php $this->load->view('partials/_ad_spaces', ['ad' => "index_top"]); ?>

                        <?php
                    endif;
                    $x++;
                endforeach;
                ?>

                <!--Index Videos-->
                <?php $this->load->view('partials/_index_videos', ['index_last_videos' => $index_last_videos]); ?>

                <!--Include banner-->
                <?php $this->load->view('partials/_ad_spaces', ['ad' => "index_bottom"]); ?>


                <!--Index Latest Posts-->
                <?php $this->load->view('partials/_index_latest_posts'); ?>
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                <!--include sidebar -->
                <?php $this->load->view('partials/_sidebar'); ?>

            </div>
        </div>
    </div>


</div>