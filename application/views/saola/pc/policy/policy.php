<section class="detail">
    <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="left-menu">
                <div class="left-title">Chính sách và điều khoản</div>
                <ul>
                    <li class="<?php if ($active == 99) echo 'active' ?>"><a
                                href="<?php echo base_url('dieu-khoan-su-dung.html') ?>">Điều khoản sử dụng</a></li>
                    <li class="<?php if ($active == 100) echo 'active' ?>"><a
                                href="<?php echo base_url('chinh-sach-bao-mat.html') ?>">Chính sách bảo mật</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 detail-content">
            <div class="card line-height-2">
                <div class="card-body">
<!--                    --><?php //echo $page_content ?>

                    <div style="padding: 10px 0;">
                        <div id="price1" class="priceTitle" style="display: block;">
                            <div style="color: #055699; font-weight: bold;">
                                <div style="width: 350px; float: left; margin: 80px 0 0 60px;">
                                    <div style="width: 80px; float: left; font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                        ĐIỀU
                                    </div>
                                    <div style="width: 65px; float: left; font-size: 80px; line-height: 60px; font-family: Tahoma;">
                                        K
                                    </div>
                                    <div style="width: 200px; float: left;">
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                            HOẢN
                                        </div>
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;color: #1E9FF2 !important;">
                                            CHÍNH SÁCH
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left;">
                                    <img src="<?php echo public_url('images/policy_page.png'); ?>">
                                </div>
                            </div>

                        </div>

                        <div class="p-5" style="text-align: justify; clear: both">
                            <p>
                                <?php echo $page_content ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>