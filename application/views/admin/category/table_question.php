

<table id="datatable-question" class="table table-striped table-bordered bulk_action">
    <thead>
    <tr>
        <th style="width: 80px">Mã số</th>
        <th>Tiêu đề</th>
        <th>Routes</th>
        <th style="width: 120px">Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($questions as $row){ ?>
        <tr>
            <td><?php echo $row->id?></td>
            <td><?php echo $row->name?></td>
            <td><?php echo $row->routes?></td>
            <td>
                <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/category/edit/'.$row->id)?>">Sửa</a>
                <a class="btn btn-xs btn-danger" onclick="confirmDelQuestion(<?php echo $row->id?>)">Xóa</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#datatable-question").dataTable({"ordering": false});
    });

    function confirmDelQuestion(id) {
        var c = confirm("Xác nhận xoá type ads ???");
        if(c){
            window.location.href = "<?php echo admin_url('category/del/')?>" + id;
        }
    }
</script>