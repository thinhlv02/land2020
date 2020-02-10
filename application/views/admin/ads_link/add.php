<!--<script language="javascript" src="--><?php //echo base_url('public')?><!--/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/ckeditor/ckeditor.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2>Thêm link theo bài rao bán</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
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
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Link web
                        <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtLinkWeb" class="form-control" style="height: 120px"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtLinkWeb', {height: '300px'}); </script>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Link facebook
                        <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtLinkFacebook" class="form-control" style="height: 120px"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtLinkFacebook', {height: '300px'}); </script>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAddProduct" name="btnAdd" class="btn btn-warning" value="Thêm">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>