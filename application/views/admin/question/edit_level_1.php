<script language="javascript" src="<?php echo base_url('public')?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="x_panel">
    <div class="x_title">
        <h2>Sửa thông tin</h2>
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
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                    <input type="submit" id="btnEditLevel1" name="btnEditLevel1" required="required" class="btn btn-warning" value="Cập nhật">
                </div>
            </div>
        </form>
    </div>
</div>


<div class="x_panel" style="margin-top: 20px">
    <div class="x_title">
        <h2>Danh sách câu hỏi</h2>
        <div class="pull-right">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm câu hỏi mới</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="table-responsive">
            <table id="datatable-question" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th style="width: 80px">Mã số</th>
                    <th>Tiêu đề</th>
                    <th style="width: 120px">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questions as $row){ ?>
                    <tr>
                        <td><?php echo $row->id?></td>
                        <td><?php echo $row->name?></td>
                        <td>
                            <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/question/edit/'.$row->id)?>">Sửa</a>
                            <a class="btn btn-xs btn-danger" onclick="confirmDel(<?php echo $row->id?>)">Xóa</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modal-add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm câu hỏi mới</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Câu hỏi <span class="required">*</span></label>
                            <div class="col-md-10 col-sm-8 col-xs-12">
                                <input type="text" name="txtNameAdd" id="txtNameAdd" required="required" class="form-control col-md-6 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-4 col-xs-12">Nội dung<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-8 col-xs-12">
                                <textarea name="txtContentAdd" id="txtContentAdd" class="form-control" style="height: 120px" required></textarea>
                                <script type="text/javascript">CKEDITOR.replace('txtContentAdd',{height: '300px'}); </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Thêm" class="btn btn-primary" name="btnAdd"/>
                    <a class="btn btn-default" data-dismiss="modal">Đóng</a>
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