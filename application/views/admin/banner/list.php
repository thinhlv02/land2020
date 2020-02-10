<div class="x_panel">
    <div class="x_title">
        <h2>Danh sách banner</h2>
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
                <th>ID_ADS</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Người tạo</th>
                <th>Ngày Tạo</th>
                <th>Nổi bật</th>
                <th>Trái</th>
                <th>Phải</th>
                <th>Top</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($devices as $row)
            {
                ?>
                <tr>
                    <td>
                        <button class="btn btn-primary btn-xs"><?php echo $row->id_ads ?></button>
                    </td>
                    <td>
                        <img src="<?php echo base_url('public/images/banner/' . $row->img) ?>" style="max-width: 60px">
                    </td>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo $row->type_name ?></td>
                    <td><?php echo $row->created_by ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>
                    <td>
                        <i id="highlight-<?php echo $row->id ?>"
                           class="text-danger fa fa-2x <?php echo $row->highlight ? 'fa-toggle-on' : 'fa-toggle-off' ?>"
                           onclick="highlight(<?php echo $row->id ?>)"
                        ></i>
                    </td>
                    <td>
                        <i id="ads_left-<?php echo $row->id ?>"
                           class="fa fa-2x <?php echo $row->ads_left ? 'fa-toggle-on' : 'fa-toggle-off' ?> primary"
                           onclick="ads_left(<?php echo $row->id ?>)"
                        ></i>
                    </td>

                    <td>
                        <i id="ads_right-<?php echo $row->id ?>"
                           class="fa fa-2x <?php echo $row->ads_right ? 'fa-toggle-on' : 'fa-toggle-off' ?> secondary"
                           onclick="ads_right(<?php echo $row->id ?>)"
                        ></i>
                    </td>

                    <td>
                        <i id="ads_center-<?php echo $row->id ?>"
                           class="fa fa-2x <?php echo $row->ads_top ? 'fa-toggle-on' : 'fa-toggle-off' ?> success"
                           onclick="ads_top(<?php echo $row->id ?>)"

                        ></i>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-outline-success" href="<?php echo base_url('admin/banner/edit/' . $row->id) ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <a class="btn btn-xs btn-outline-danger" onclick="confirmDel(<?php echo $row->id ?>)"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable-product').dataTable({
            "ordering": false
        });
    });

    function confirmDel(id)
    {
        if (confirm('Bạn có chắc chắn muốn xóa?'))
        {
            window.location.href = '<?php echo base_url('admin/banner/del/')?>' + id;
        }
    }

    function highlight(id)
    {
        $.ajax({
            url: "<?php echo admin_url('banner/highlight')?>",
            type: "post",
            data: {
                id: id
            },
            success: function (msg) {
                msg = JSON.parse(msg);
                console.log(msg);
                if (msg.status)
                {
                    $('#highlight-' + id).removeClass("fa-toggle-off fa-toggle-on").addClass(msg.class);
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }


    function ads_left(id)
    {
        $.ajax({
            url: "<?php echo admin_url('banner/ads_left')?>",
            type: "post",
            data: {
                id: id
            },
            success: function (msg) {
                msg = JSON.parse(msg);
                console.log(msg);
                if (msg.status)
                {
                    $('#ads_left-' + id).removeClass("fa-toggle-off fa-toggle-on").addClass(msg.class);
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    function ads_right(id)
    {
        $.ajax({
            url: "<?php echo admin_url('banner/ads_right')?>",
            type: "post",
            data: {
                id: id
            },
            success: function (msg) {
                msg = JSON.parse(msg);
                console.log(msg);
                if (msg.status)
                {
                    $('#ads_right-' + id).removeClass("fa-toggle-off fa-toggle-on").addClass(msg.class);
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    function ads_top(id)
    {
        $.ajax({
            url: "<?php echo admin_url('banner/ads_top')?>",
            type: "post",
            data: {
                id: id
            },
            success: function (msg) {
                msg = JSON.parse(msg);
                console.log(msg);
                if (msg.status)
                {
                    $('#ads_center-' + id).removeClass("fa-toggle-off fa-toggle-on").addClass(msg.class);
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }
</script>