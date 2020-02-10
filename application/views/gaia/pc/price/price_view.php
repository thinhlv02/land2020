<section class="detail">
    <div class="container">
        <div class="col-sm-4 col-md-3">
            <div class="left-menu">
                <div class="left-title">Báo giá quảng cáo</div>
                <ul>
                    <?php foreach ($prices as $k => $p) { ?>
                        <li class="<?php if ($p->id == $active || ($k == 0 && $active == 0)) echo 'active'; ?>" onclick="showTitlePrice('<?php echo $p->id; ?>')">
                            <a href="<?php echo base_url('bao-gia/' . create_slug($p->name) . '-' . $p->id . '.html#' . $p->id) ?>">
                                <?php echo $p->name ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 detail-content" style="padding-left: 10px !important;">
            <div class="line-height-2 pl-5 card">

                <?php if (isset($price)) { ?>
                    <div style="padding: 10px 0;">
                        <div id="price1" class="priceTitle" style="display: block;">
                            <div style="color: #055699; font-weight: bold;">
                                <div style="width: 350px; float: left; margin: 80px 0 0 60px;">
                                    <div style="width: 80px; float: left; font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                        HIỆU
                                    </div>
                                    <div style="width: 65px; float: left; font-size: 80px; line-height: 60px; font-family: Tahoma;">
                                        Q
                                    </div>
                                    <div style="width: 200px; float: left;">
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                            UẢ
                                        </div>
                                        <div style="font-size: 30px; line-height: 35px; font-family: Tahoma;">
                                            UẢNG CÁO
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left;">
                                    <img src="<?php echo public_url('images/price1.jpg'); ?>">
                                </div>
                            </div>

                        </div>
                        <div id="price2" style="display: none;" class="priceTitle">
                            <div style="text-align: center; color: #055699; font-size: 18px; margin-top: 20px; margin-bottom: 5px; font-family: 'times new roman'; font-weight: bold;">
                                PHƯƠNG THỨC ĐĂNG TIN BĐS
                            </div>
                            <div style="text-align: center; margin-bottom: 30px;">(Áp dụng từ 01/04/2019)</div>
                            <div style="text-align: center">

                            </div>
                        </div>

                        <div id="price3" style="display: none;" class="priceTitle">
                            <div style="text-align: center; color: #055699; font-size: 18px; margin-top: 20px; margin-bottom: 5px; font-family: 'times new roman'; font-weight: bold;">
                                BÁO GIÁ BANNER PHIÊN BẢN DESKTOP && PC
                            </div>
                            <div style="text-align: center; margin-bottom: 30px;"></div>
                            <div style="text-align: center">

                            </div>
                        </div>

                        <div id="price4" style="display: none;" class="priceTitle">
                            <h2 style="text-align: center; color: #055699; padding: 20px 0 7px 0;">
                                <span style="font-size: 50px; font-family: Tahoma; text-transform: uppercase;">Báo giá</span>
                                <span style="font-size: 25px; font-family: Tahoma; text-transform: uppercase;">tin rao theo từng gói</span>
                            </h2>
                            <div style="text-align: center; padding: 0 0 20px 0;">(Áp dụng kể từ ngày 01/04/2019 - Giá đã bao gồm VAT)</div>
                            <div style="text-align: center;">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Loại tin</th>
                                        <th class="text-center">Phí 1 Tháng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <!--                                    <tr>-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="success">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="danger">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="info">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <tr class="warning">
                                        <td>Vip ưu đãi</td>
                                        <td>500k</td>
                                    </tr>
                                    <tr class="active">
                                        <td>Tin thường</td>
                                        <td>300K</td>
                                    </tr>

                                    </tbody>
                                </table>

                                <h2>Mô tả các gói</h2>
                                <p class="mb-0">Các gói khác nhau sẽ ở các vị trí khác nhau , và màu chữ tiêu đề... sẽ khác nhau.</p>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Loại tin</th>
                                        <th class="text-center">Mô tả</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <!--                                    <tr>-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="success">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="danger">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <!--                                    <tr class="info">-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                    </tr>-->
                                    <tr class="warning">
                                        <td>Vip ưu đãi</td>
                                        <td></td>
                                    </tr>
                                    <tr class="active">
                                        <td>Tin thường</td>
                                        <td></td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>

                        <div class="p-5" style="text-align: justify; clear: both">
                            <p>
                                <?php echo $price->content ?>
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
        if (window.location.hash)
        {
            var hash = window.location.hash.substring(1, 2);
            if ($.isNumeric(hash)) showTitlePrice(hash);
        }
        else
        {
            showTitlePrice(1);
        }
    });

    function showTitlePrice(id)
    {
        $(".priceTitle").each(function () {
            $(this).css("display", "none");
        });

        $("#price" + id).css("display", "block");
    }

</script>