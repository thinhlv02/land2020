<style>
    .icon-style{
        font-size: 40px;
        height: 80px;
        width: 80px;
        margin: 10px;
        line-height: 80px;
        /* background-color: #4dbb6d; */
        /* color: #fff; */
        color: #4dbb6d;
        border: 1px solid #4dbb6d;
        text-align: center;
        border-radius: 50%;
    }
</style>
<div class="x_panel">
    <div class="x_title">
        <h2>Phong cách SGC</h2>
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
        <table id="datatable-service" class="table table-striped table-bordered bulk_action">
            <thead>
            <tr>
                <th>Icon</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($styles as $row){ ?>
                <tr>
                    <td><i class="fa <?php echo $row->icon?> icon-style" aria-hidden="true"></i></td>
                    <td><?php echo $row->title?></td>
                    <td><?php echo $row->content?></td>
                    <td>
                        <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/content/edit_service/'.$row->id)?>">Sửa</a>

                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
    </div>
</div>
<script>
    function confirmDel(id) {
        if(confirm('Bạn có chắc chắn muốn xóa game này?')){
//            console.log('delll');
            window.location.href = '<?php echo base_url('admin/content/del/')?>' + id;
        }
    }
</script>