<!--form-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br/>
                <form id="formAddProduct" data-parsley-validate class="form-horizontal form-label-left" method="post"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-2 col-xl-2">
                            <input type="text" id="txtDate" name="daterange" value="<?php echo date('d/m/Y', strtotime($firstday)); ?> - <?php echo date('d/m/Y', strtotime($lastday)); ?>" class="form-control col-md-7 col-xs-12 text-center"/>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0" style="width: 70px">
                            <input type="submit" id="btnAddEvent" name="btnAddSearch" class="btn btn-warning" value="Tìm">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--end form-->

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
                <th>ID</th>
                <th>Tên thiết bị</th>
                <th>Mô tả</th>
                <th>Tiền</th>
                <th>Người tạo</th>
                <th>Ngày Tạo</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($money_lost))
            {
                $sum = 0;
                foreach ($money_lost as $row)
                {
                    $sum += $row->price;
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->description ?></td>
                        <td><?php echo $row->price ? number_format($row->price) : ''; ?></td>
                        <td>
                            <?php
                            echo isset($lstAdmin[$row->created_by]) ? $lstAdmin[$row->created_by]->name : 'N/A';
                            ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>

                        <td>
                            <a class="btn btn-xs btn-outline-success" href="<?php echo base_url('admin/money/edit/' . $row->id) ?>"><i class="fa fa-pencil-square-o"></i></a>
                            <a class="btn btn-xs btn-outline-danger" onclick="confirmDel(<?php echo $row->id ?>)"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php }
            } ?>
            </tbody>
            <?php if (!empty($money_lost)) { ?>

                <tfoot>
                <tr class="bg-primary">
                    <td colspan="3">Tổng tiền</td>
                    <td><?php echo($sum > 0 ? number_format($sum) : '') ?></td>
                    <td colspan="3"></td>
                </tr>
                </tfoot>

            <?php } ?>
        </table>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
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
            window.location.href = '<?php echo base_url('admin/money/del/')?>' + id;
        }
    }

</script>