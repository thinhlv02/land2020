<div class="x_panel">
    <div class="x_title">
        <h2>Danh sách bài đăng</h2>
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
                <th>Tên KH</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Ngày Tạo</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $sum = 0;
            foreach ($customers as $row) {
                ?>
                <tr>
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->phone ?></td>
                    <td><?php echo $row->address ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>

                    <td>
                        <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/customers/edit/' . $row->id) ?>">Sửa</a>
                        <a class="btn btn-xs btn-danger" onclick="confirmDel(<?php echo $row->id ?>)">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable-news').dataTable({
            "ordering": false
        });
    });

    function confirmDel(id) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            window.location.href = '<?php echo base_url('admin/customers/del/')?>' + id;
        }
    }


</script>