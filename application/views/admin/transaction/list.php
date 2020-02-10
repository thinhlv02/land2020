<!--form-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br/>
                <form id="formAddProduct" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-2 col-xl-2">
                            <input type="text" id="txtDate" name="daterange" value="<?php echo date('d/m/Y', strtotime($firstday)); ?> - <?php echo date('d/m/Y', strtotime($lastday)); ?>" class="form-control col-md-7 col-xs-12 text-center"/>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <select class="select2_group form-control" name="make_money_by">
                                <option value="99">-- Nhân sự --</option>
                                <?php foreach ($lstEmps as $key => $value) { ?>
                                    <option value="<?= $value->id ?>" <?php if (isset($_POST['make_money_by']) && $_POST['make_money_by'] == $value->id) echo 'selected' ?>>
                                        <?php echo $value->name ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <select class="select2_group form-control" name="check_money">
                                <option value="-1" <?php if (isset($_POST['check_money']) && $_POST['check_money'] == -1) echo 'selected' ?>>-- Trạng thái --</option>
                                <option value="1" <?php if (isset($_POST['check_money']) && $_POST['check_money'] == 1) echo 'selected' ?>>Nạp tiền</option>
                                <option value="0" <?php if (isset($_POST['check_money']) && $_POST['check_money'] == 0) echo 'selected' ?>>Trống</option>
                            </select>
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
        <h2>Danh sách(<?php echo isset($ads) ? count($ads) : '0'; ?>)</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a></li>
                    <li><a href="#">Settings 2</a></li>
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
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th>Số tiền</th>
                <th>Tạo bởi</th>
                <th>TG trả</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($ads) && !empty($ads))
            {
                $sum = 0;
                foreach ($ads as $row)
                {
                    $sum += $row->service_money;
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td>
                            <img src="<?php echo base_url('public/images/ads/' . $row->img) ?>" alt="<?php echo $row->img ?>" style="max-width: 80px">
                        </td>
                        <td>
                            <a href="<?php echo base_url('rao-vat/' . create_slug($row->title) . '-' . $row->id) ?>" target="_blank">
                                <?php echo $row->title ?></a>
                        </td>

                        <td><?php echo $row->area ?></td>
                        <td class="text-nowrap"><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>
                        <td><?php echo $row->service_money > 0 ? number_format($row->service_money) : '' ?></td>
                        <td><?php echo $row->name_emp ?></td>
                        <td class="text-nowrap"><?php echo $row->pay_time; ?></td>
                        <td>
                            <a class="btn btn-xs btn-outline-success" href="<?php echo base_url('admin/transaction/edit/' . $row->id) ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>

                <?php }
            } ?>
            </tbody>

            <?php if (isset($ads) && !empty($ads)) { ?>
                <tfoot>
                <tr class="bg-primary">
                    <td colspan="5">Tổng tiền</td>
                    <td><?php echo($sum > 0 ? number_format($sum) : 0) ?></td>
                    <td><?php echo($sum > 0 ? number_format($sum * 0.15) : 0) ?></td>
                    <td colspan="2"></td>
                </tr>
                </tfoot>
            <?php } ?>

        </table>
    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>