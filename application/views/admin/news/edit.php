<!--<script language="javascript" src="--><?php //echo base_url('public')?><!--/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/ckeditor/ckeditor.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2>Chỉnh sửa tin tức</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">


        <div class="row">
            <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tên <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtName" name="txtName" value="<?php echo $news->name?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tên bài viết">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giới thiệu ngắn <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="txtIntro" rows="3" class="form-control" ><?php echo str_replace('<br />', '&#13;', $news->intro)?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh (900x450)<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="file" class="form-control" name="img_news" id="img_news">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nội dung <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="txtContent" class="form-control" style="height: 120px"><?php echo $news->content?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContent',{height: '300px'}); </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tỉnh/thành phố<span
                                class="required">*</span></label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <select class="select2_group form-control" name="province">
                            <?php foreach ($lstProvince as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?php if ($news->province_id == $value->id) echo 'selected' ?>>
                                    <?php echo $value->_name ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                </div>

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Document Title <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtDocumentTitle" name="txtDocumentTitle" value="--><?php //echo $news->document_title?><!--" required="required" class="form-control col-md-7 col-xs-12" placeholder="Document Title">-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Description <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtMetaDescription" name="txtMetaDescription" value="--><?php //echo $news->meta_description?><!--" required="required" class="form-control col-md-7 col-xs-12" placeholder="Meta Description">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Keywords <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtMetaKeywords" name="txtMetaKeywords" value="--><?php //echo $news->meta_keywords?><!--" required="required" class="form-control col-md-7 col-xs-12" placeholder="Meta Keywords">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Canonical URL <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtCanonicalUrl" name="txtCanonicalUrl" value="--><?php //echo $news->canonical_url?><!--" required="required" class="form-control col-md-7 col-xs-12" placeholder="Canonical URL">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Robots meta setting <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="noindex" --><?php //echo $news->robots_meta && strpos($news->robots_meta, 'noindex') > -1 ? 'checked' : '' ?><!-- > Apply noindex to this page</label><br>-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="nofollow" --><?php //echo $news->robots_meta && strpos($news->robots_meta, 'nofollow') > -1 ? 'checked' : '' ?><!-- > Apply nofollow to this page</label><br>-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="noarchive" --><?php //echo $news->robots_meta && strpos($news->robots_meta, 'noarchive') > -1 ? 'checked' : '' ?><!-- > Apply noarchive to this page</label>-->
<!--                    </div>-->
<!--                </div>-->



                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAddProduct" name="btnEdit" required="required" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>