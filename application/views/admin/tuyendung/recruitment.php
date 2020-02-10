
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
                <th>Bộ phận</th>
                <th>Tiêu đề</th>
                <th>Ngày đăng</th>
                <th>Ngày hết hạn</th>
                <th>Ứng tuyển</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($recruitment as $row){ ?>
                    <tr>
                        <td><?php echo $row->id?></td>
                        <td><?php echo ($row->department == 1) ? 'Lập trình Web, App' : (($row->department == 2) ? 'Lập trình Mobile' : 'Vận hành, kiểm thử')?></td>
                        <td><?php echo $row->title?></td>
                        <td><?php echo date('d/m/Y', $row->created); ?></td>
                        <td>
                            <?php
                                echo date('d/m/Y', $row->expired_date);
                                $now = new DateTime();
                                $now = $now->getTimestamp();
                                if($row->expired_date < $now){
                                    echo ' <span class="label label-warning">Hết hạn</span>';
                                }?>
                        </td>
                        <td>
                            <?php
                                $user_recruit = $this->user_recruit_model->get_total(array('where' => array('id_recruitment'=>$row->id)));
                                echo '<a href="'.base_url('admin/recruitment/user_recruit/'.$row->id).'">'.$user_recruit.' người ứng tuyển</a>';
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-xs btn-success" href="<?php echo base_url('admin/recruitment/edit/'.$row->id)?>">Sửa</a>
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
    function confirmDel(id) {
        if(confirm('Bạn có chắc chắn muốn xóa bài đăng này?')){
//            console.log('delll');
            window.location.href = '<?php echo base_url('admin/recruitment/del/')?>' + id;
        }
    }
</script>