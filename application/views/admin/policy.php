
<script language="javascript" src="<?php echo public_url('ckeditor/ckeditor.js')?>" type="text/javascript"></script>

<?php if (isset($message)){$this->load->view('admin/message',$this->data); }?>

<div class="x_panel">
    <div class="x_title">
        <h2>Điều khoản và chính sách</h2>
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
        <div class="row" style="margin-top: 10px">
            <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Điều khoản sử dụng <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtPolicy" class="form-control" style="height: 120px"><?php echo $contact->policy?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtPolicy',{height: '300px'}); </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Chính sách bảo mật <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtPrivacy" class="form-control" style="height: 120px"><?php echo $contact->privacy?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtPrivacy',{height: '300px'}); </script>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnUpdate" name="btnUpdate" required="required" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
