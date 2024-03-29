<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?= $title ?></h3>
                    <br>
                    <small>You can <?= $title ?> from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/pages" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                       <?= trans('view_pages')  ?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('page/add_page_post'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>


                <div class="form-group">
                    <label class="control-label"> <?= trans('title')  ?></label>
                    <input type="text" class="form-control" name="title" placeholder="Page Title"
                           value="<?php echo old('title'); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label"> <?= trans('page_slug')  ?>
                        <small>(<?= trans('generated_automatically')  ?>.)</small>
                    </label>
                    <input type="text" class="form-control" name="slug" placeholder="Page Slug"
                           value="<?php echo old('slug'); ?>">
                </div>
                <div class="form-group" style="margin-top: 60px;">
                <label><?= trans('page_content') ?></label>
                <textarea id="ckEditor" class="form-control" name="page_content"
                placeholder="Content"><?php echo old('page_content'); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label"><?= trans('page_content') ?></label>
                    <input type="text" class="form-control" name="description"
                           placeholder="Page Description (Meta Tag)" value="<?php echo old('description'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label"><?= trans('page_keywords') ?></label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Page Keywords (Meta Tag)" value="<?php echo old('keywords'); ?>">
                </div>
             <!--    <div class="form-group">
                    <label class="control-label">Main Image</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-sm bg-purple">
                                Select image
                                <input type="file" id="Multifileupload" name="file" size="40" class="uploadFile" accept=".png, .jpg, .jpeg, .gif">
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div id="MultidvPreview">
                            </div>
                        </div>
                    </div>

                </div> -->

               

              <!--   <div class="form-group">
                    <label>Page Order</label>
                    <input type="number" class="form-control" name="page_order" placeholder="Page Order"
                           value="< ?php echo old('page_order'); ?>" min="1" max="99999"
                           style="width: 300px;max-width: 100%;">
                </div> -->


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?= trans('page_location') ?></label>
                        </div>
                     <!--    <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="location" value="top" id="menu_top"
                                   class="square-purple" < ?php echo (old("location") == "top" || old("location") == "") ? 'checked' : ''; ?>>
                            <label for="menu_top" class="option-label">Top Menu</label>
                        </div> -->
                        <div class="col-md-3 col-sm-3  col-lang">
                            <input type="radio" name="location" value="main" id="manu_main"
                                   class="square-purple" <?php echo (old("location") == "main") ? 'checked' : ''; ?>>
                            <label for="manu_main" class="option-label"><?= trans('main_menu') ?></label>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lang">
                            <input type="radio" name="location" value="footer" id="menu_footer"
                                   class="square-purple" <?php echo (old("location") == "footer") ? 'checked' : ''; ?>>
                            <label for="menu_footer" class="option-label"><?= trans('footer') ?></label>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lang">
                            <input type="radio" name="location" value="none" id="menu_none"
                                   class="square-purple" <?php echo (old("location") == "none") ? 'checked' : 'checked'; ?>>
                            <label for="menu_none" class="option-label"><?= trans('dont_add_to_main') ?></label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?= trans('visibility') ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="visibility" value="1" id="page_enabled"
                                   class="square-purple" <?php echo (old("visibility") == 1 || old("visibility") == "") ? 'checked' : ''; ?>>
                            <label for="page_enabled" class="option-label"><?= trans('show') ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="visibility" value="0" id="page_disabled"
                                   class="square-purple" <?php echo (old("visibility") == 0 && old("visibility") != "") ? 'checked' : ''; ?>>
                            <label for="page_disabled" class="option-label"><?= trans('hide') ?></label>
                        </div>
                    </div>
                </div>

               <!--  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label>Show Page Only to Registered Users</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="need_auth" value="1" id="need_auth_enabled"
                                   class="square-purple" < ?php echo (old("need_auth") == 1) ? 'checked' : ''; ?>>
                            <label for="need_auth_enabled" class="option-label">Yes</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="need_auth" value="0" id="need_auth_disabled"
                                   class="square-purple" < ?php echo (old("need_auth") == 0 || old("need_auth") == "") ? 'checked' : ''; ?>>
                            <label for="need_auth_disabled" class="option-label">No</label>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label>Page Title Visibility</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="title_active" value="1" id="title_enabled"
                                   class="square-purple" < ?php echo (old("title_active") == 1 || old("title_active") == "") ? 'checked' : ''; ?>>
                            <label for="title_enabled" class="option-label">Show</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="title_active" value="0" id="title_disabled"
                                   class="square-purple" < ?php echo (old("title_active") == 0 && old("title_active") != "") ? 'checked' : ''; ?>>
                            <label for="title_disabled" class="option-label">Hide</label>
                        </div>
                    </div>
                </div>
 -->
                <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label>Page Breadcrumb Visibility</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="breadcrumb_active" value="1" id="breadcrumb_enabled"
                                   class="square-purple" < ?php echo (old("breadcrumb_active") == 1 || old("breadcrumb_active") == "") ? 'checked' : ''; ?>>
                            <label for="breadcrumb_enabled" class="option-label">Show</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="breadcrumb_active" value="0" id="breadcrumb_disabled"
                                   class="square-purple" < ?php echo (old("breadcrumb_active") == 0 && old("breadcrumb_active") != "") ? 'checked' : ''; ?>>
                            <label for="breadcrumb_disabled" class="option-label">Hide</label>
                        </div>
                    </div>
                </div> -->

               <!--  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label>Right Column Visibility</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="right_column_active" value="1" id="right_column_enabled"
                                   class="square-purple" < ?php echo (old("right_column_active") == 1 || old("right_column_active") == "") ? 'checked' : ''; ?>>
                            <label for="right_column_enabled" class="option-label">Show</label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="right_column_active" value="0" id="right_column_disabled"
                                   class="square-purple" < ?php echo (old("right_column_active") == 0 && old("right_column_active") != "") ? 'checked' : ''; ?>>
                            <label for="right_column_disabled" class="option-label">Hide</label>
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block pull-right"><?= trans('add') ?></button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>

