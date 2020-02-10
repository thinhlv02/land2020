<div class="x_panel">
    <div class="x_title">
        <h2>Danh sách đại lý</h2>
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
        <div class="table-responsive">
            <table id="datatable-agency" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>Mã số</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($agencies as $row) { ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->phone ?></td>
                        <td><?php echo $row->address ?></td>
                        <td>
                            <a class="btn btn-xs btn-outline-success" href="<?php echo base_url('admin/agency/edit/' . $row->id) ?>"><i class="fa fa-pencil-square-o"></i></a>
                            <a class="btn btn-xs btn-outline-danger" onclick="confirmDel(<?php echo $row->id ?>)"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable-agency').dataTable({"pageLength": 100});
    });

    function confirmDel(id)
    {
        if (confirm('Bạn có chắc chắn muốn xóa?'))
        {
            window.location.href = '<?php echo base_url('admin/agency/del/')?>' + id;
        }
    }
</script>