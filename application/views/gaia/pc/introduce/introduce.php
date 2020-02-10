<section class="detail">
    <div class="container">
        <div class="col-sm-4 col-md-3">
            <div class="left-menu">
                <div class="left-title">Giới thiệu </div>
                <ul>
                    <?php foreach ($products as $k => $p) { ?>
                        <li class="<?php if ($p->id == $active || ($k == 0 && $active == 0)) echo 'active'; ?>">
                            <a href="<?php echo base_url('gioi-thieu-dich-vu/' . create_slug($p->name) . '-' . $p->id . '.html#' . $p->id) ?>">
                                <?php echo $p->name ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 detail-content">
            <div class="line-height-2 pl-5 card">

                <?php if (isset($product)) { ?>
                    <div style="padding: 10px 0;">
                        <div id="price1" class="priceTitle" style="display: block;">
                            <div style="color: #055699; font-weight: bold;">
                                <div style="width: 350px; float: left; margin: 80px 0 0 60px;">
                                    <div style="width: 80px; float: left; font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                        VỀ
                                    </div>
                                    <div style="width: 65px; float: left; font-size: 80px; line-height: 60px; font-family: Tahoma;">
                                        C
                                    </div>
                                    <div style="width: 200px; float: left;">
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                            HÚNG
                                        </div>
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;color: #1E9FF2;">
                                            TÔI
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left;">
                                    <img style="max-width: 308px;"
                                         src="<?php echo public_url('images/about_us.jpg'); ?>">
                                </div>
                            </div>

                        </div>

                        <div id="price2" style="display: none;" class="priceTitle">
                            <div style="text-align: center; color: #055699; font-size: 18px; margin-top: 20px; margin-bottom: 5px; font-family: 'times new roman'; font-weight: bold;">
                                SẢN PHẨM  - DỊCH VỤ CỦA TÂN BÌNH
                            </div>
                            <div style="text-align: center; margin-bottom: 30px;"></div>
                            <div style="text-align: center">

                            </div>
                        </div>

                        <div class="p-5" style="text-align: justify; clear: both">
                            <h2><?php echo $product->intro ?></h2>
                            <p>
                                <?php echo $product->content ?>
                            </p>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</section>

<script type="text/javascript">
    $(document).ready(function () {
        if (window.location.hash) {
            var hash = window.location.hash.substring(1, 2);
            if ($.isNumeric(hash)) showTitlePrice(hash);
        } else {
            showTitlePrice(1);
        }
    });

    function showTitlePrice(id) {
        $(".priceTitle").each(function () {
            $(this).css("display", "none");
        });

        $("#price" + id).css("display", "block");
    }

</script>