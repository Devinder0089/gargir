<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!-- Small boxes (Stat box) -->


    <?php if (is_admin()){ ?>

    <div class="row rownaviationtop">
        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url('cooperation'); ?>" class="small-box-footer">
                <div class="icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="handshake" class="svginlinefa fa-handshake fa-w-20 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M434.7 64h-85.9c-8 0-15.7 3-21.6 8.4l-98.3 90c-.1.1-.2.3-.3.4-16.6 15.6-16.3 40.5-2.1 56 12.7 13.9 39.4 17.6 56.1 2.7.1-.1.3-.1.4-.2l79.9-73.2c6.5-5.9 16.7-5.5 22.6 1 6 6.5 5.5 16.6-1 22.6l-26.1 23.9L504 313.8c2.9 2.4 5.5 5 7.9 7.7V128l-54.6-54.6c-5.9-6-14.1-9.4-22.6-9.4zM544 128.2v223.9c0 17.7 14.3 32 32 32h64V128.2h-96zm48 223.9c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16zM0 384h64c17.7 0 32-14.3 32-32V128.2H0V384zm48-63.9c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16c0-8.9 7.2-16 16-16zm435.9 18.6L334.6 217.5l-30 27.5c-29.7 27.1-75.2 24.5-101.7-4.4-26.9-29.4-24.8-74.9 4.4-101.7L289.1 64h-83.8c-8.5 0-16.6 3.4-22.6 9.4L128 128v223.9h18.3l90.5 81.9c27.4 22.3 67.7 18.1 90-9.3l.2-.2 17.9 15.5c15.9 13 39.4 10.5 52.3-5.4l31.4-38.6 5.4 4.4c13.7 11.1 33.9 9.1 45-4.7l9.5-11.7c11.2-13.8 9.1-33.9-4.6-45.1z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Cooperation</p>
                    <p>agreement between</p>
                    <p>intermediaries</p>
                </div>
               </a>
            </div>
        </div><!-- ./col -->


<div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url('stamping-property'); ?>" class="small-box-footer">
                <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="stamp" class="svginlinefa fa-stamp fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 512h448v-64H32v64zm384-256h-66.56c-16.26 0-29.44-13.18-29.44-29.44v-9.46c0-27.37 8.88-53.41 21.46-77.72 9.11-17.61 12.9-38.39 9.05-60.42-6.77-38.78-38.47-70.7-77.26-77.45C212.62-9.04 160 37.33 160 96c0 14.16 3.12 27.54 8.69 39.58C182.02 164.43 192 194.7 192 226.49v.07c0 16.26-13.18 29.44-29.44 29.44H96c-53.02 0-96 42.98-96 96v32c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-32c0-53.02-42.98-96-96-96z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Stamping a property</p>
                    <p>owner</p>
                </div>
               </a>
            </div>
        </div><!-- ./col -->

  <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url('stamping-interested'); ?>" class="small-box-footer">
                <div class="icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-contract" class="svginlinefa fa-file-contract fa-w-12 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm192.81 248H304c8.84 0 16 7.16 16 16s-7.16 16-16 16h-47.19c-16.45 0-31.27-9.14-38.64-23.86-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34a15.986 15.986 0 0 1-14.31 8.84c-.38 0-.75-.02-1.14-.05-6.45-.45-12-4.75-14.03-10.89L144 354.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.77-16.19 54.05-9.7 66 14.16 2.02 4.06 5.96 6.5 10.16 6.5zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Stamping is interested</p>
                </div>
               </a>
            </div>
        </div><!-- ./col -->

            <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
            <a href="<?php echo base_url('admin/users'); ?>" class="small-box-footer">
            <div class="icon">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svginlinefa fa-user fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
            </div>
            <div class="inner">
            <h3><?php echo html_escape($user_count); ?></h3>
            <p>Users</p>
            </div>
            </a>
            </div>
            </div><!-- ./col -->

         <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
            <a href="<?php echo base_url('property'); ?>" class="small-box-footer">
            <div class="icon">
           <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="building" class="svginlinefa fa-building fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path></svg>
            </div>
            <div class="inner">
            <h3><?php echo html_escape($post_count); ?></h3>
            <p>Property</p>
            </div>
            </a>
            </div>
            </div><!-- ./col -->

         <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
            <a href="<?php echo base_url('agreements'); ?>" class="small-box-footer">
            <div class="icon">
           <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ring" class="svginlinefa fa-ring fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 64C110.06 64 0 125.91 0 208v98.13C0 384.48 114.62 448 256 448s256-63.52 256-141.87V208c0-82.09-110.06-144-256-144zm0 64c106.04 0 192 35.82 192 80 0 9.26-3.97 18.12-10.91 26.39C392.15 208.21 328.23 192 256 192s-136.15 16.21-181.09 42.39C67.97 226.12 64 217.26 64 208c0-44.18 85.96-80 192-80zM120.43 264.64C155.04 249.93 201.64 240 256 240s100.96 9.93 135.57 24.64C356.84 279.07 308.93 288 256 288s-100.84-8.93-135.57-23.36z"></path></svg>
            </div>
            <div class="inner">
            <h3><?php echo html_escape($post_count); ?></h3>
            <p>Binder of agreements</p>
            </div>
            </a>
            </div>
            </div><!-- ./col -->
    </div><!-- /.row -->

  <div class="row sendrowadmin rownaviationtop">
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo html_escape($pending_post_count); ?></h3>
                    <p>Pending Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo html_escape($pending_video_count); ?></h3>
                    <p>Pending Videos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-videos" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo html_escape($user_count); ?></h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/users" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

  </div><!-- /.row -->

<?php } ?>


 <div class="row rownaviationtop">

<?php if(is_worker()): ?>

        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                <div class="icon">
                      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-contract" class="svginlinefa fa-file-contract fa-w-12 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm192.81 248H304c8.84 0 16 7.16 16 16s-7.16 16-16 16h-47.19c-16.45 0-31.27-9.14-38.64-23.86-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34a15.986 15.986 0 0 1-14.31 8.84c-.38 0-.75-.02-1.14-.05-6.45-.45-12-4.75-14.03-10.89L144 354.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.77-16.19 54.05-9.7 66 14.16 2.02 4.06 5.96 6.5 10.16 6.5zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($project_count); ?></h3>
                    <p>Projects</p>
                </div>
               </a>
            </div>
        </div><!-- ./col -->

<div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url(); ?>admin/project-money" class="small-box-footer">
                <div class="icon">
                 <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-contract" class="svginlinefa fa-file-contract fa-w-12 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm192.81 248H304c8.84 0 16 7.16 16 16s-7.16 16-16 16h-47.19c-16.45 0-31.27-9.14-38.64-23.86-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34a15.986 15.986 0 0 1-14.31 8.84c-.38 0-.75-.02-1.14-.05-6.45-.45-12-4.75-14.03-10.89L144 354.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.77-16.19 54.05-9.7 66 14.16 2.02 4.06 5.96 6.5 10.16 6.5zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($project_money_count); ?></h3>
                    <p>Projects Money</p>
                </div>
               </a>
            </div>
     </div><!-- ./col -->

        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url(); ?>admin/calendar-management" class="small-box-footer">
                <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="stamp" class="svginlinefa fa-stamp fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 512h448v-64H32v64zm384-256h-66.56c-16.26 0-29.44-13.18-29.44-29.44v-9.46c0-27.37 8.88-53.41 21.46-77.72 9.11-17.61 12.9-38.39 9.05-60.42-6.77-38.78-38.47-70.7-77.26-77.45C212.62-9.04 160 37.33 160 96c0 14.16 3.12 27.54 8.69 39.58C182.02 164.43 192 194.7 192 226.49v.07c0 16.26-13.18 29.44-29.44 29.44H96c-53.02 0-96 42.98-96 96v32c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-32c0-53.02-42.98-96-96-96z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($calendar_management_count); ?></h3>
                    <p>Calendar Management</p>
                </div>
               </a>
            </div>
        </div><!-- ./col -->

 

        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box">
                <a href="<?php echo base_url(); ?>admin/apartments" class="small-box-footer">
                <div class="icon">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="building" class="svginlinefa fa-building fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path></svg>
                </div>
                  <div class="inner">
                    <h3><?php echo html_escape($apartments_count); ?></h3>
                    <p>Apartments</p>
                </div>
               </a>
            </div>
     </div><!-- ./col -->



<?php endif; ?>


    </div><!-- /.row -->

  <div class="row sendrowadmin rownaviationtop">
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo html_escape($pending_post_count); ?></h3>
                    <p>Pending Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo html_escape($pending_video_count); ?></h3>
                    <p>Pending Videos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-videos" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo html_escape($user_count); ?></h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/users" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

  </div><!-- /.row -->


<?php if (is_admin()): ?>
    <div class="row resultrowsec">
        <div class="col-sm-12 no-padding">

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Last Comments</h3>
                        <br>
                        <small>You can see last comments here</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body index-table">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th style="width: 60%">Comment</th>
                                    <th style="min-width: 13%">Date</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>

                    <div class="box-footer clearfix">
                        <a href="<?php echo base_url(); ?>admin/comments"
                           class="btn btn-sm btn-default btn-flat pull-right">View All Comments</a>
                    </div>
                </div>
            </div>

           

        </div>


    </div>
    <!-- /.row -->

    <div class="row nodispay">

        <div class="col-sm-12 no-padding margin-bottom-20">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Users</h3>
                        <br>
                        <small>You can see last registered users here</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            <?php foreach ($last_users as $item) : ?>
                                <li>
                                    <a>
                                        <img src="<?php echo get_user_avatar($item); ?>" alt="user" class="img-responsive">
                                    </a>
                                    <a class="users-list-name"><?php echo html_escape($item->username); ?></a>
                                    <span class="users-list-date"><?php echo nice_date($item->created_at, 'd.m.Y'); ?></span>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="<?php echo base_url(); ?>admin/users" class="btn btn-sm btn-default btn-flat pull-right">View All Users</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
        </div>
    </div>
    <!-- /.row -->
<?php endif; ?>