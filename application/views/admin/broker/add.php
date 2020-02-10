

<div class="x_panel">
    <div class="x_title">
        <h2>Thêm mới đại lý</h2>
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
                        <input type="text" id="txtName" name="txtName" value="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập tên đại lý">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Số điện thoại <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtPhone" name="txtPhone" value="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập số điện thoại">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Email <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtEmail" name="txtEmail" value="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập txtEmail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Khu vực hoạt động <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="" name="txtArea" value="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Địa chỉ <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtAddress" name="txtAddress" value="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập địa chỉ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giới thiệu <span
                                class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtIntro" class="form-control" style="height: 120px"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtIntro', {height: '300px'}); </script>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAdd" name="btnAdd" required="required" class="btn btn-warning" value="Thêm">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>