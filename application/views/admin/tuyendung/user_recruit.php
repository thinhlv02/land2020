<ol class="breadcrumb" style="display: -webkit-box;background-color: #ddd;">
    <li><a href="<?php echo base_url('admin/recruitment')?>">Tuyển dụng</a></li>
    <li class="active"><?php echo $name_recruit ?></li>
</ol>
<div class="x_panel">
    <div class="x_title">
        <h2>Danh sách ứng viên</h2>
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
        <table id="datatable-product" class="table table-striped table-bordered bulk_action">
            <thead>
            <tr>
                <th>Mã số</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>CV</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user_recruit as $row){ ?>
                <tr>
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->email ?></td>
                    <td><?php echo $row->phone ?></td>
                    <td><?php echo $row->birthday ?></td>
                    <td><?php echo ($row->sex === '1') ? 'Nam' : 'Nữ' ?></td>
                    <td><a href="<?php echo base_url('admin/recruitment/download/'.$row->cv)?>" ><i class="fa fa-download" aria-hidden="true"></i> <?php echo $row->cv ?></a></td>
                    <td>
                        <a class="btn btn-xs btn-danger" onclick="confirmDel(<?php echo $row->id?>, <?php echo $id_recruit?>)">Xóa</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
    </div>
</div>
<script>
    function confirmDel(id, id_recruit) {
        if(confirm('Bạn có chắc chắn muốn xóa cv này?')){
            window.location.href = '<?php echo base_url('admin/recruitment/del_user_recruit/')?>' + id_recruit + '/' + id;
        }
    }
</script>