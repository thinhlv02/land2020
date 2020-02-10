<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 col-md-3">
            <div class="left-menu">
                <div class="left-title">Thông tin tài khoản</div>

                <div id="column-left-user" class="card">
                    <div id="usercp" class="card-body">
                        <div class="white-background-new">
                            <div class="box-arround">
                                <div class="useravatar text-center">
                                    <p>
                                        <i class="fas fa-user-circle fa-10x text-success"></i>
                                    </p>
                                    <br/>
                                    <span class="userfullname text-uppercase"><?php echo $user_login->fullname; ?></span>

                                    <div class="userpoint_menu">

                                        <div><label style="padding-left:0px;">Tài khoản: Thường</label></div>
                                        <div>
                                            <label style="font-size:16px; font-weight:bold;">
                                                45</label>
                                            <span style="font-size:14px; font-weight:normal;">&nbsp;điểm&nbsp;</span>

                                        </div>

                                    </div>
                                    <div class="userbalance">
                                        Tài khoản tin rao:
                                        <span>99.267</span><br>
                                        Tài khoản ngoài tin rao:
                                        <span>0</span><br>
                                        Tài khoản KM1:
                                        <span>0</span><br>
                                        Tài khoản KM2:
                                        <span>3.733</span><br>
                                    </div>

                                    <a class="bluebotton"
                                       href="javascript:void(0)">Nạp tiền</a>
                                </div>
                                <div class="title">Quản lý thông tin cá nhân</div>
                                <ul class="item">
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Thay đổi thông tin cá nhân">
                                            <i class="fas fa-caret-right"></i> Thay đổi thông tin cá nhân</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Thay đổi mật khẩu">
                                            <i class="fas fa-caret-right"></i> Thay đổi mật khẩu</a>
                                    </li>

                                </ul>
                                <div class="title">Quản lý tin rao</div>
                                <ul class="item">
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Quản lý tin rao bán/cho thuê"
                                           class="selected">
                                            <i class="fas fa-caret-right"></i> Quản lý tin rao bán/cho thuê</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Đăng tin rao bán/cho thuê">
                                            <i class="fas fa-caret-right"></i> Đăng tin rao bán/cho thuê</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)"
                                           title="Quản lý tin rao cần mua/cần thuê"><i class="fas fa-caret-right"></i> Quản lý tin cần mua/cần thuê</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Đăng tin rao cần mua/cần thuê"><i class="fas fa-caret-right"></i> Đăng
                                            tin cần mua/cần thuê</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Quản lý tin nháp">
                                            <i class="fas fa-caret-right"></i> Quản lý tin nháp</a>
                                    </li>
                                </ul>
                                <div>
                                    <div class="title">Quản lý tài chính</div>
                                    <ul class="item">
                                        <li class="row-content">
                                            <a href="javascript:void(0)"><i class="fas fa-caret-right"></i> Thông tin số dư</a>
                                            <i class="fas fa-search-dollar fa-lg green6"></i>
                                        </li>
                                        <li class="row-content">
                                            <a href="javascript:void(0)" title="Lịch sử giao dịch">
                                                <i class="fas fa-caret-right"></i> Lịch sử giao dịch</a>
                                        </li>
                                        <li class="row-content">
                                            <a href="javascript:void(0)" title="Nhóm khuyến mãi">
                                                <i class="fas fa-caret-right"></i> Nhóm khuyến mãi</a>
                                        </li>

                                        <li class="row-content">
                                            <a href="javascript:void(0)"
                                               title="Quản lý tài khoản Doanh nghiệp">
                                                <i class="fas fa-caret-right"></i> Quản lý tài khoản Doanh nghiệp</a>
                                            <i class="fas fa-chart-bar fa-lg green6"></i>
                                        </li>
                                        <li class="row-content">
                                            <a href="javascript:void(0)"
                                               title="Nạp tiền vào tài khoản">
                                                <i class="fas fa-caret-right"></i> Nạp tiền vào tài khoản</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="title">Tiện ích</div>
                                <ul class="item">

                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Thông báo">
                                            <i class="fas fa-caret-right"></i> Thông báo</a>
                                        <i class="far fa-bell fa-lg green6"></i>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Quản lý đăng kí nhận email">
                                            <i class="fas fa-caret-right"></i> Quản lý đăng kí nhận email</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Hộp tin nhắn">
                                            <i class="fas fa-caret-right"></i> Hộp tin nhắn</a>
                                    </li>

                                    <li class="row-content">
                                        <a href="javascript:void(0)" title="Quản lý điểm tích lũy"><i class="fas fa-caret-right"></i> Quản lý
                                            điểm tích lũy</a>
                                        <i class="fas fa-map-marker-alt fa-lg green6"></i>
                                    </li>

                                    <li class="row-content">
                                        <a href="javascript:void(0)"
                                           title="Yêu cầu khóa tài khoản"><i class="fas fa-caret-right"></i> Yêu cầu khóa tài khoản</a>
                                    </li>
                                </ul>
                                <div class="title">Hướng dẫn &amp; báo giá</div>
                                <ul class="item">
                                    <li class="row-content">
                                        <a href="javascript:void(0)"><i class="fas fa-caret-right"></i> Hướng dẫn sử dụng</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)"><i class="fas fa-caret-right"></i> Hướng dẫn thanh toán</a>
                                    </li>
                                    <li class="row-content">
                                        <a href="javascript:void(0)"><i class="fas fa-caret-right"></i> Báo giá</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="col-sm-8 col-md-9 detail-content">
            <div class="line-height-2">

                <div id="column-no-right-user" class="card">
                    <div class="left-title">Quản lý tin rao bán, cho thuê</div>

                    <div class="card-body">

                        <?php if (empty($lstData)) { ?>

                            <div class="alert alert-danger">
                                <strong><?php echo $user_page_lang['empty_data']; ?> </strong>
                            </div>

                        <?php } else { ?>

                            <table id="datatable-news"
                                   class="table table-striped table-bordered bulk_action dataTable no-footer" role="grid"
                                   aria-describedby="datatable-news_info">
                                <!--            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">-->
                                <thead>
                                <tr role="row">
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 42px;">Mã tin</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 79px;">SĐT</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 79px;">Ảnh
                                    </th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 86px;">Tiêu đề</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 258px;">Giá / Diện
                                        tích
                                    </th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 30px;">Lượt xem</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 65px;">Ngày Tạo</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 65px;">Chi tiết
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($lstData as $k => $row) {
                                    ?>
                                    <tr title="" class="odd" role="row">
                                        <td class="text-center">
                                            <button class="btn btn-default btn-xs">PT-<?php echo $row->id . substr($row->code, 0, 3) ?></button>
                                        </td>

                                        <td> <?php echo $row->phone; ?></td>
                                        <td><img src="<?php echo public_url('images/ads/' . $row->img); ?>"
                                                 style="max-width: 80px"></td>
                                        <td>
                                            <a href="<?php echo base_url('rao-vat/' . create_slug($row->title) . '-' . $row->id) ?>"
                                               target="_blank">
                                                <?php echo $row->title; ?></a></td>

                                        <td>
                                            <p class="btn btn-outline-danger btn-xs"><?php echo $row->price ?> </p><br>
                                            <p class="btn btn-outline-cyan btx-xs"><?php echo $row->acreage ?> m<sup>2</sup>
                                            </p>

                                        </td>

                                        <td><?php echo $row->view; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row->created_at)); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('trang-ca-nhan/' . create_slug($row->title) . '-' . $row->id) ?>">
                                                <i class="fas fa-file"></i> Xem</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>

                        <?php } ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<style>
    #column-left-user > #usercp {
        border: 1px solid #ccc;
    }

    .white-background-new .box-arround .title {
        color: #666;
        font-size: 12px;
        font-weight: bold;
        padding: 10px;
        background-color: #e8e8e8;
    }
</style>