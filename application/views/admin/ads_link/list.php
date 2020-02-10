<?php
$id_ads = $this->uri->segment(4);
?>
<div class="x_panel">
    <div class="x_title">
        <h2>Quản lý mã tin rao : <span class="" style="color: red!important;"><?php echo $id_ads; ?></span></h2>
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
                <th>ID</th>
                <th>Ngày</th>
                <th>Link web</th>
                <th>Link facebook</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($ads as $row)
            { ?>
                <tr title="" class="">
                    <td class="text-center">
                        <button class="btn btn-default btn-xs"><?php echo $row->id ?></button>
                        <a class="btn btn-xs btn-outline-success" href="<?php echo base_url('admin/ads/edit_link/' . $row->id . '/' . $id_ads) ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <a class="btn btn-xs btn-outline-danger" onclick="confirmDel(<?php echo $row->id ?>, <?php echo $id_ads; ?>)"><i class="fa fa-trash-o"></i></a>
                    </td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($row->created_at)); ?></td>
                    <td><?php echo $row->link_web ?></td>
                    <td><?php echo $row->link_facebook ?></td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDel(id, id_ads)
    {
        if (confirm('Bạn có chắc chắn muốn xóa?'))
        {
            window.location.href = '<?php echo base_url('admin/ads/del_link/')?>' + id + '/' + id_ads;
        }
    }
</script>