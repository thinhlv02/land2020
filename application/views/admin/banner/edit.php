<!--<script language="javascript" src="--><?php //echo base_url('public')?><!--/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/ckeditor/ckeditor.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2>Chỉnh sửa</h2>
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
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tên ADS <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <select name="txtAds" class="form-control col-md-12 col-xs-12">

                            <?php foreach ($lstAds as $key => $value) { ?>
                                <option value="<?= $value->id; ?>" <?php if ($devices->id_ads == $value->id) echo 'selected' ?>>
                                    <?php echo $value->id. ' | '. $value->title; ?>
                                </option>
                            <?php } ?>

                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="file" class="form-control" name="img_news" id="img_news">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Loại <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <select name="bsizeid" class="form-control col-md-12 col-xs-12">

                            <?php foreach ($lstSizeBanner as $key => $value) { ?>
                                <option value="<?php echo  $value->id ?>" <?php if ($devices->bsizeid == $value->id) echo 'selected' ?>>
                                    <?php echo $value->bsize_name; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAddProduct" name="btnEdit" required="required" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>