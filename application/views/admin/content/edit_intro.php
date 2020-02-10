<script language="javascript" src="<?php echo base_url('public')?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="x_panel">
    <div class="x_title">
        <h2>Chỉnh sửa mục giới thiệu</h2>
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
            <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtName" name="txtName" value="<?php echo $intro->title?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tiêu đề tiếng việt">
                        <input type="text" id="txtNameEn" name="txtNameEn" value="<?php echo $intro->title_en?>" required="required" class="form-control col-md-7 col-xs-12" style="margin-top: 5px" placeholder="Tiêu đề tiếng anh">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ưu tiên <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="number" id="txtPrioriti" name="txtPrioriti" value="<?php echo $intro->prioriti?>" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nội dung <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div style="margin: 10px 0px">Tiếng việt</div>
                        <textarea name="txtContent" class="form-control" style="height: 120px"><?php echo $intro->content?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContent',{height: '150px'}); </script>
                        <div style="margin: 10px 0px">Tiếng anh</div>
                        <textarea name="txtContentEn" class="form-control" style="height: 120px"><?php echo $intro->content_en?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContentEn',{height: '150px'}); </script>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnEdit" name="btnEdit" required="required" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>