<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo admin_url('dashboard') ?>" class="site_title"><i class="fa fa-paw"></i><span> Trang chủ</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo public_url() ?>images/favicon.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Xin chào,</span>
                <h2><?php echo $admin->fullname ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-thumb-tack"></i>Bài viết<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo admin_url('ads') ?>">Tin quảng cáo</a></li>
                        </ul>
                    </li>

                    <!--                    //only admin view-->
                    <?php if ($admin->id == 1) { ?>
                        <li><a><i class="fa fa-book"></i>Quản lý chung<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo admin_url('news') ?>">Tin Tức </a></li>
                                <li><a href="<?php echo admin_url('devices') ?>">Thiết bị sử dụng</a></li>
                                <li><a href="<?php echo admin_url('customers') ?>">Khách hàng việc làm</a></li>
                                <li><a href="<?php echo admin_url('user') ?>">Khách hàng đăng ký website</a></li>
                                <li><a href="<?php echo admin_url('transaction') ?>">Giao dịch</a></li>
                                <li><a href="<?php echo admin_url('money') ?>">Tiền tiêu hao</a></li>
                                <!--                                <li><a href="--><?php //echo admin_url('Upload_Files') ?><!--">Upload_Files</a></li>-->

                                <li><a href="<?php echo admin_url('product') ?>">Dịch vụ</a></li>
                                <li><a href="<?php echo admin_url('price') ?>">Báo giá quảng cáo</a></li>
                                <li><a href="<?php echo admin_url('policy') ?>">Điều khoản, chính sách</a></li>
                                <li><a href="<?php echo admin_url('question') ?>">Hỗ trợ</a></li>
                                <li><a href="<?php echo admin_url('contact') ?>">Liên hệ</a></li>
                                <li><a href="<?php echo admin_url('content') ?>">Nội dung</a></li>
                                <li><a href="<?php echo admin_url('agency') ?>">Đại lý</a></li>
                                <li><a href="<?php echo admin_url('broker') ?>">Chuyên viên tư vấn</a></li>
                                <li><a href="<?php echo admin_url('banner') ?>">Quản lý banner web</a></li>
                                <li><a href="<?php echo admin_url('category') ?>">Quản lý loại nhà đất</a></li>
                                <li><a href="<?php echo admin_url('feedback') ?>">Hòm thư</a></li>
                                <li><a href="<?php echo admin_url('recruitment') ?>">Tuyển dụng</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!--                    //only admin view-->
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>