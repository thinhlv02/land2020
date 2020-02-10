<!--<script language="javascript" src="--><?php //echo base_url('public')?><!--/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/ckeditor/ckeditor.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2>Thêm tin tức mới</h2>
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
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtName" name="txtName" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tiêu đề">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giới thiệu ngắn <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="txtIntro" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="file" class="form-control" name="img_news" id="img_news">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nội dung <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="txtContent" class="form-control" style="height: 120px"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContent',{height: '300px'}); </script>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tỉnh/thành phố<span
                                class="required">*</span></label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <select class="select2_group form-control" name="province">
                            <?php foreach ($lstProvince as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?php if (isset($_POST['type']) && $_POST['type'] == $key) echo 'selected' ?>>
                                    <?php echo $value->_name ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                </div>

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề tab web <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtDocumentTitle" name="txtDocumentTitle" required="required" class="form-control col-md-7 col-xs-12" placeholder="Document Title">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Description <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtMetaDescription" name="txtMetaDescription" required="required" class="form-control col-md-7 col-xs-12" placeholder="Meta Description">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Keywords <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtMetaKeywords" name="txtMetaKeywords" required="required" class="form-control col-md-7 col-xs-12" placeholder="Meta Keywords">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Canonical URL <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <input type="text" id="txtCanonicalUrl" name="txtCanonicalUrl" required="required" class="form-control col-md-7 col-xs-12" placeholder="Canonical URL">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Robots meta setting <span class="required">*</span></label>-->
<!--                    <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="noindex" > Apply noindex to this page</label><br>-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="nofollow" > Apply nofollow to this page</label><br>-->
<!--                        <label class="radio-inline"><input type="checkbox" name="robots_meta[]" value="noarchive" > Apply noarchive to this page</label>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAddProduct" name="btnAdd" required="required" class="btn btn-warning" value="Thêm">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>