<script language="javascript" src="<?php echo base_url('public')?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="x_panel">
    <div class="x_title">
        <h2>Chỉnh sửa bài đăng</h2>
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


        <div class="row" style="margin-top: 40px">
            <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ngày hết hạn <span class="required">*</span></label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input id="txtExpired" name="txtExpired" class="date-picker form-control col-md-6" required type="text" value="<?php echo isset($recruitment->expired_date) ? date('d-m-Y', $recruitment->expired_date) : date("d-m-Y")?>">
                        <!--                        <input type="text" id="txtExpired" name="txtExpired" value="" required="required" class="form-control col-md-7 col-xs-12">-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Bộ phận <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select name="slDepartment1" id="slDepartment1" class="form-control col-md-7 col-xs-12">
                            <option value="0">Tất cả</option>
                            <option value="1">Kỹ thuật</option>
                            <option value="2">Vận hành, kiểm thử</option>
                            <option value="3">Kinh doanh</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select name="slDepartment" id="slDepartment" class="form-control col-md-7 col-xs-12">
                            <option value="1" <?php echo ($recruitment->department == 1) ? 'selected' : ''?> >Lập trình PHP</option>
                            <option value="2" <?php echo ($recruitment->department == 2) ? 'selected' : ''?> >Lập trình .NET</option>
                            <option value="3" <?php echo ($recruitment->department == 3) ? 'selected' : ''?> >Lập trình Javascript</option>
                            <option value="4" <?php echo ($recruitment->department == 4) ? 'selected' : ''?> >Lập trình Mobile</option>
                            <option value="5" <?php echo ($recruitment->department == 5) ? 'selected' : ''?> >Lập trình iOS</option>
                            <option value="6" <?php echo ($recruitment->department == 6) ? 'selected' : ''?> >Lập trình Android</option>
                            <option value="7" <?php echo ($recruitment->department == 7) ? 'selected' : ''?> >Vận hành</option>
                            <option value="8" <?php echo ($recruitment->department == 8) ? 'selected' : ''?> >Kiểm thử</option>
                            <option value="9" <?php echo ($recruitment->department == 9) ? 'selected' : ''?> >Kinh doanh</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="txtTitle" name="txtTitle" value="<?php echo $recruitment->title?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tiêu đều tiếng Việt">
                        <input type="text" id="txtTitleEn" name="txtTitleEn" value="<?php echo $recruitment->title_en?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tiêu đều tiếng Anh" style="margin-top: 5px">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nội dung <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div style="margin: 10px 0px">Tiếng Việt</div>
                        <textarea name="txtContent" class="form-control" style="height: 120px"><?php echo $recruitment->content?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContent',{height: '300px'}); </script>
                        <div style="margin: 10px 0px">Tiếng Anh</div>
                        <textarea name="txtContentEn" class="form-control" style="height: 120px"><?php echo $recruitment->content_en?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContentEn',{height: '300px'}); </script>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnUpdateRecruitment" name="btnUpdateRecruitment" required="required" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script>
    $(document).ready(function() {
        $('#txtExpired').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#slDepartment1').on('change', function(){
            console.log(this.value === "1");
            if(this.value === "1"){
                $('#slDepartment').html(
                    '<option value="1">Lập trình PHP</option>' +
                    '<option value="2">Lập trình .NET</option>' +
                    '<option value="3">Lập trình Javascript</option>' +
                    '<option value="4">Lập trình Mobile</option>' +
                    '<option value="5">Lập trình iOS</option>' +
                    '<option value="6">Lập trình Android</option>');
            }
            else if(this.value === "2"){
                $('#slDepartment').html(
                    '<option value="7">Vận hành</option>' +
                    '<option value="8">Kiểm thử</option>');
            }
            else if(this.value === "3"){
                $('#slDepartment').html('<option value="9">Kinh doanh</option>');
            }
            else{
                $('#slDepartment').html(
                    '<option value="1">Lập trình PHP</option>' +
                    '<option value="2">Lập trình .NET</option>' +
                    '<option value="3">Lập trình Javascript</option>' +
                    '<option value="4">Lập trình Mobile</option>' +
                    '<option value="5">Lập trình iOS</option>' +
                    '<option value="6">Lập trình Android</option>' +
                    '<option value="7">Vận hành</option>' +
                    '<option value="8">Kiểm thử</option>' +
                    '<option value="9">Kinh doanh</option>');
            }
        });
    });
</script>