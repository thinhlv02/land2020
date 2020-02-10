
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
        <table id="datatable-news" class="table table-striped table-bordered bulk_action">
            <thead>
            <tr>
                <th>Mã số</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Ngày Tạo</th>
                <th>Nổi bật</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($news as $row){ ?>
                <tr>
                    <td><?php echo $row->id?></td>
                    <td><img src="<?php echo base_url('public/images/news/'.$row->img)?>" style="max-width: 150px"> </td>
                    <td><?php echo $row->name?></td>
                    <td><?php echo $row->intro?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>
                    <td>
                        <i id="highlight-<?php echo $row->id?>"
                           class="fa fa-2x <?php echo $row->highlight ? 'fa-toggle-on' : 'fa-toggle-off'?>"
                           onclick="highlight(<?php echo $row->id?>)"
                           style="color: green"
                        ></i></td>
                    <td>
                        <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/news/edit/'.$row->id)?>">Sửa</a>
                        <a class="btn btn-xs btn-danger" onclick="confirmDel(<?php echo $row->id?>)">Xóa</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
    </div>
</div>
<script>
    // $(document).ready(function () {
    //     $('#datatable-news').dataTable({
    //         "ordering": false
    //     });
    // });

    function confirmDel(id) {
        if(confirm('Bạn có chắc chắn muốn xóa?')){
//            console.log('delll');
            window.location.href = '<?php echo base_url('admin/news/del/')?>' + id;
        }
    }

    function highlight(id) {
        $.ajax({
            url: "<?php echo admin_url('news/highlight')?>",
            type: "post",
            data: {
                id: id
            },
            success: function (msg) {
                msg = JSON.parse(msg);
                console.log(msg);
                if(msg.status){
                    $('#highlight-' + id).removeClass("fa-toggle-off fa-toggle-on").addClass(msg.class);
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }
</script>