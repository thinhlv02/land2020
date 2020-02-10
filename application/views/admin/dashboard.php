<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">2500</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
        <div class="count green">2,500</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
        <div class="count">4,567</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
</div>

<div class="row">
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin ngân hàng chuyển tiền

                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                    <div class="row">
                        <div class="col-sm-12">
                                <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ngân hàng</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số tài khoản</th>
                                    <th>Chi nhánh</th>
                                </tr>
                                </thead>


                                <tbody>

<!--                                <tr role="row" class="odd">-->
<!--                                    <td class="sorting_1">1</td>-->
<!--                                    <td class="">VPbank</td>-->
<!--                                    <td>LUU VAN THINH</td>-->
<!--                                    <td>168271255</td>-->
<!--                                </tr>-->

<!--                                <tr role="row" class="odd">-->
<!--                                    <td class="">2</td>-->
<!--                                    <td class="">TECHCOMBANK</td>-->
<!--                                    <td>LUU VAN THINH</td>-->
<!--                                    <td>19029512206017</td>-->
<!--                                </tr>-->

                                <?php
                                $i =0;
                                foreach ($lstBank as $k => $val) {
                                    $i++;
                                    ?>
                                    <tr role="row" class="odd">
                                        <td class=""><?php echo $i; ?></td>
                                        <td class=""><?php echo $val->bank_name ?></td>
                                        <td><?php echo $val->account_name != '' ? $val->account_name : '<span class="text-danger">Đang cập nhật</span>' ?></td>
                                        <td><?php echo $val->account_number != '' ? $val->account_number : '<span class="text-danger">Đang cập nhật</span>' ?></td>
                                        <td><?php echo $val->branch ?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin tài khoản facebook cho cskh</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài khoản đăng nhập</th>
                        <th>Mật khẩu</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($lstData as $row){ ?>
                    <tr>
                        <td class="sorting_1"><?php echo $row->id?></td>
                        <td><?php echo $row->nick?></td>
                        <td><?php echo $row->psw?></td>
                    </tr>
                    <?php }?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>


</div>