<script language="javascript" src="<?php echo base_url('public')?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="x_panel">
    <div class="x_title">
        <h2>Sửa thông tin loại nhà đất</h2>
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
        <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" id="txtName" name="txtName" value="<?php echo $question->name?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Routes <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" id="" name="txtRoutes" value="<?php echo $question->routes?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                    <input type="submit" id="btnEditLevel1" name="btnEditLevel1" required="required" class="btn btn-warning" value="Cập nhật">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#datatable-question").dataTable();
    });

    function confirmDel(id) {
        var c = confirm("Xác nhận xoá câu hỏi này");
        if(c){
            window.location.href = "<?php echo admin_url('question/del/')?>" + id;
        }
    }
</script>