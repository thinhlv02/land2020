<section class="contact">
    <div class="container">
        <div class="row subpage">

            <!--Begin left-->
            <div class="col-xs-9 left land_page">

                <!--Begin land_box-->
                <div class="_box">
                    <p class="title_box" style="color: #055699"><strong>Cần bán
                            <i class="fa fa-angle-right"></i> <?php echo $ads->title ?></strong>
                    </p>
                    <div class="land_box p-1">

                        <!--Begin imgs_land_box-->
                        <div class="content-news-1 col-md-10 col-sm-12">

                            <div class="demo">
                                <ul id="lightSlider">
                                    <?php
                                    $lightSlider_str = $ads->lightSlider != '' ? $ads->img . '#' . $ads->lightSlider : $ads->img;
                                    //                                $lightSlider_str = $ads->lightSlider != '' ? $ads->lightSlider : $ads->img;
                                    $tags = explode('#', $lightSlider_str);
                                    foreach ($tags as $k => $val) { ?>
                                        <!--                                <li style="width: 450px; height: 338px"-->
                                        <li style="max-height: 703px !important;"
                                            data-thumb="<?php echo public_url('images/ads/' . $val) ?>">
                                            <!--                                    <img style="width: 450px; height: 338px" alt="-->
                                            <? //= $val ?><!--"-->
                                            <img style="max-height: 703px !important;" alt="<?= $val ?>"
                                                 src="<?php echo public_url('images/ads/' . $val) ?>"/>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>

                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="title_land_box">Ảnh đại diện(click để phóng to):</div>
                            <img id="myImg" alt="<?php echo $ads->title; ?>" src="<?php echo public_url('images/ads/' . $ads->img) ?>" style="width:100%;">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close" onclick="closeImgModal()">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>
                        </div>
                        <!--End imgs_land_box-->

                        <div class="clearfix"></div>

                        <h2><?php echo $ads->title ?></h2>

                        <!--Begin brief_land_box-->
                        <div class="brief_land_box row12">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-xs-6 ibrief"><strong>- Mã số tin:</strong>
                                        PT-<?php echo $ads->id . substr($ads->code, 0, 3) ?></div>
                                    <div class="col-xs-6 ibrief"><strong>- Ngày cập nhật:</strong>
                                        <?php echo date('d-m-Y', strtotime($ads->created_at)) ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 ibrief"><strong>- Lượt xem:</strong> <?php echo $ads->view ?>
                                    </div>
                                    <div class="col-xs-6 ibrief" style="display: none"><strong>- Ngày hết hạn:</strong>
                                        <span class="danger">
                                            <?php echo date('d-m-Y', strtotime('+30 days', strtotime($ads->created_at))) . PHP_EOL; ?></span>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-6 ibrief"><strong>- DTMB:</strong> <?php echo $ads->acreage ?>
                                        m<sup>2</sup></div>
                                    <div class="col-xs-6 ibrief"><strong>- DTSD:</strong> <?php echo $ads->useacreage ?>
                                        m<sup>2</sup></div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 ibrief"><strong>- Danh mục:</strong>
                                        <a href="javascript:void(0)">Cần bán</a></div>
                                    <div class="col-xs-6 ibrief"><strong>- Loại BĐS:</strong>
                                        <a href="javascript:void(0)">
                                            <?php echo $ads->productcat != '' ? $ads->productcat : 'KXD' ?></a></div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 ibrief">
                                        <strong>- Địa chỉ:</strong> <?php echo $ads->area ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-12 ibrief text_right price_ibrief">
                                        <strong>Giá:</strong> <?php echo $ads->price ?> VND <p>(Có thương lượng)</p>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--End brief_land_box-->
                        <div style="clear: both;"></div>

                        <div class="title_land_box">Mô tả chi tiết:</div>

                        <div class="pack_land_box">
                            <div class="row12">
                                <div class="col-xs-4 pland"><strong>Chiều rộng:</strong>
                                    <?php echo $ads->width != '' ? $ads->width : 0 ?>m
                                </div>
                                <div class="col-xs-4 pland"><strong>Chiều dài:</strong>
                                    <?php echo $ads->landwidth != '' ? $ads->landwidth : 0 ?>m
                                </div>
                                <div class="col-xs-4 pland"><strong>Giấy tờ:</strong> Sổ đỏ Chính Chủ</div>
                            </div>

                            <div class="row12">
                                <div class="col-xs-4 pland"><strong>Diện tích MB:</strong> <?php echo $ads->acreage ?> m<sup>2</sup>
                                </div>
                                <div class="col-xs-4 pland">
                                    <strong>Diện tích SD:</strong> <?php echo $ads->useacreage ?> m<sup>2</sup>
                                </div>
                                <div class="col-xs-4 pland"><strong>Hướng:</strong>
                                    <?php echo $ads->homedirection != '' ? $ads->homedirection : 'KXD' ?></div>
                            </div>

                            <div class="row12">
                                <div class="col-xs-12 pland">
                                    <strong>Tên dự án:</strong>
                                    <?php echo $ads->project != '' ? $ads->project : 'KXD' ?>
                                </div>
                            </div>

                            <div class="row12">
                                <div class="col-xs-12 pland">
                                    <h3 class="title_detail_pland">Thông tin chi tiết:</h3>
                                    <div class="body_detail_pland line-height-2">
                                        <?php echo $ads->content ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="title_land_box">Thông tin liên hệ:</div>
                        <div class="pack_land_box">
                            <div class="row12">
                                <div class="col-xs-12 pland"><strong>Tên liên lạc :</strong>
                                    <?php echo $ads->contact_name != '' ? $ads->contact_name : 'Qua điện thoại' ?>
                                </div>
                            </div>
                            <div class="row12">
                                <div class="col-xs-12 pland">
                                    <strong>Địa chỉ :</strong> <?php echo $ads->area ?>
                                </div>
                            </div>
                            <div class="row12">
                                <div class="col-xs-12 pland"><strong>Điện thoại :</strong>
                                    <a href="tel:<?php echo $ads->phone ?>"><?php echo $ads->phone ?></a></div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="title_land_box">Bản đồ vị trí:</div>
                        <div class="pack_land_box" style="border: 0;">
                            <div class="row">
                                <div class="col-xs-12 pland" style="border: 0;">
                                </div>
                            </div>
                        </div>

                        <!--                        <div style="clear: both;"></div>-->

                        <div class="title1_land_box"><strong>Thông tin người đăng</strong></div>
                        <!--Begin brief_land_box-->
                        <div class="row pack_land_box poster_land_box" style="border: 0;padding-left:10px;">
                            <div class="col-xs-3 pic_poster_land_box" style="padding-right: 30px !important;">
                                <p style="padding: 4px;"><img src="<?php echo public_url('/images/ads/default.png') ?>"
                                                              alt="Bất động sản Phúc Thịnh">
                                </p>
                            </div>

                            <div class="col-xs-9 detail_poster_land_box">
                                <p><strong>Công ty/cá nhân</strong>: Bất động sản Phúc Thịnh</p>
                                <p><strong>Địa chỉ email</strong>: <?php echo $contact->email ?></p>
                                <p><strong>Số điện thoại</strong>: <?php echo $contact->phone ?></p>
                                <p>
                                    <strong>Địa chỉ liên lạc</strong>: Trụ sở: <?php echo $contact->address ?>
                                </p>
                                <p><strong>Website</strong>:
                                    <a href="<?php echo base_url() ?>" target="_blank"><?php echo base_url() ?></a></p>
                            </div>
                        </div>
                        <!--End brief_land_box-->
                    </div>
                </div>
                <!--End detail_land-->


                <!--Begin two_cols-->

                <div class="left_box top3_box">
                    <p class="title_box1"><strong>CÁC TIN CÙNG TIÊU CHÍ TÌM KIẾM</strong></p>
                    <div>
                        <div class="body_top2_box">
                            <?php foreach ($highlight as $key => $value) {
                                if ($ads->id != $value->id) { ?>
                                    <div class="col-xs-6 top2 top2_up">
                                        <div class="row _pt_vip_hot">
                                            <div class="col-xs-5 ltop2">
                                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                                            src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                            alt="<?php echo $value->title ?>"></a>
                                                <div class="code_row">PT-<?php echo $value->id . substr($value->code, 0, 3) ?></div>
                                            </div>

                                            <div class="col-xs-7 rtop2">
                                                <h3>
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                        <?php echo $value->title ?>
                                                    </a>
                                                    <span></span>
                                                </h3>
                                                <div><?php echo $value->intro ?>
                                                </div>
                                                <p>
                                                    <strong>DTMB:</strong> <?php echo $value->acreage ?> m2 -
                                                    <strong>Giá:</strong>
                                                    <span>
												<?php echo $value->price ?>												</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="pt_icon_viphot">
                                            <?php if ($value->icon_new == 1) { ?>
                                                <img src="<?php echo public_url('images/icon_new.gif') ?>"
                                                     alt="<?php echo $value->title ?>">
                                            <?php } ?>

                                            <?php if ($value->icon_vip == 1) { ?>
                                                <img src="<?php echo public_url('images/icon_vip.gif') ?>"
                                                     alt="<?php echo $value->title ?>">
                                            <?php } ?>

                                            <?php if ($value->icon_hot == 1) { ?>
                                                <img src="<?php echo public_url('images/icon_hot.gif') ?>"
                                                     alt="<?php echo $value->title ?>">
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php }
                            } ?>

                        </div>

                    </div>
                </div>
                <!--End two_cols-->
                <!--Begin two_cols-->
                <div class="clearfix"></div>
                <div class="left_box top3_box">
                    <p class="title_box1"><strong>CÁC TIN LIÊN QUAN</strong></p>
                    <div>
                        <div class="body_top2_box">
                            <?php foreach ($ads_left as $key => $value) { ?>
                                <div class="col-xs-6 top2 top2_up">
                                    <div class="row">
                                        <div class="col-xs-5 ltop2">
                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                                        src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                        alt="<?php echo $value->title ?>"></a>
                                            <div class="code_row">PT-<?php echo $value->id . substr($value->code, 0, 3) ?></div>
                                        </div>

                                        <div class="col-xs-7 rtop2">
                                            <h3>
                                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                    <?php echo $value->title ?>
                                                </a>
                                                <span></span>
                                            </h3>
                                            <div><?php echo $value->intro ?>
                                            </div>
                                            <p>
                                                <strong>DTMB:</strong> <?php echo $value->acreage ?> m2 -
                                                <strong>Giá:</strong>
                                                <span>
												<?php echo $value->price ?> VND												</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt_icon_viphot">
                                        <?php if ($value->icon_new == 1) { ?>
                                            <img src="<?php echo public_url('images/icon_new.gif') ?>"
                                                 alt="<?php echo $value->title ?>">
                                        <?php } ?>

                                        <?php if ($value->icon_vip == 1) { ?>
                                            <img src="<?php echo public_url('images/icon_vip.gif') ?>"
                                                 alt="<?php echo $value->title ?>">
                                        <?php } ?>

                                        <?php if ($value->icon_hot == 1) { ?>
                                            <img src="<?php echo public_url('images/icon_hot.gif') ?>"
                                                 alt="<?php echo $value->title ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <!--End two_cols-->

            </div>
            <!--End left-->

            <!--Begin right-->
            <div class="col-xs-3 right">
                <!--Begin two_cols-->
                <div class="right_box vip_box">
                    <p class="title_box"><a href="javascript:void(0)"><strong>TIN VIP</strong></a></p>
                    <div>
                        <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">

                            <ul class="pt_slider"
                                style="width: auto; position: relative; transition-duration: 0.5s; transform: translate3d(0px, -3402px, 0px);">
                                <?php foreach ($ads_center as $key => $value) { ?>
                                    <li style="float: none; list-style: none; position: relative; width: 298px;"
                                        class="bx-clone">
                                        <dl class=" _vip _hot">
                                            <dt>
                                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                                            src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                            alt="<?php echo $value->title ?>"></a>
                                                <div class="pt_icon_viphot" style="margin-top: 4px!important;text-align: center!important;position: unset; ">
                                                    <?php if ($value->icon_new == 1) { ?>
                                                        <img src="<?php echo public_url('images/icon_new.gif') ?>"
                                                             alt="<?php echo $value->title ?>">
                                                    <?php } ?>

                                                    <?php if ($value->icon_vip == 1) { ?>
                                                        <img src="<?php echo public_url('images/icon_vip.gif') ?>"
                                                             alt="<?php echo $value->title ?>">
                                                    <?php } ?>

                                                    <?php if ($value->icon_hot == 1) { ?>
                                                        <img src="<?php echo public_url('images/icon_hot.gif') ?>"
                                                             alt="<?php echo $value->title ?>">
                                                    <?php } ?>
                                                </div>
                                            </dt>
                                            <dd>
                                                <h3>
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">

                                                        <?php echo $value->title ?>
                                                    </a>
                                                </h3>
                                                <p><strong>Diện tích:</strong> <?php echo $value->acreage ?> m2</p>
                                                <p><strong>Giá:</strong>
                                                    <span class="danger font-weight-600"><?php echo $value->price ?></span>
                                                </p>
                                                <p>
                                                    <strong>Hướng:</strong> <?php echo $ads->homedirection != '' ? $ads->homedirection : 'KXD' ?>
                                                </p>
                                            </dd>
                                        </dl>
                                    </li>
                                <?php } ?>

                            </ul>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--Begin two_cols-->
                <div class="adv_box">
                </div>
            </div>
            <!--End right-->

        </div>
    </div>
</section>

<script>
    $('#lightSlider').lightSlider({
        gallery: true,
        auto: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9
    });

    $(document).ready(function () {
        $('.pt_slider').bxSlider({
            mode: 'vertical',
            auto: true,
            minSlides: 30,
            maxSlides: 30,
            moveSlides: 1,
            pager: false
        });
    });

    // show modal Img
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    };

    //close img modal
    function closeImgModal() {
        modal.style.display = "none";
    }

</script>

<style>
    /*old slider*/
    ul {
        list-style: none outside none;
        padding-left: 0;
        margin-bottom: 0;
    }

    li {
        /*display: block;*/
        display: list-item;
        /*float: left;*/
        margin-right: 6px;
        cursor: pointer;
    }

    img {
        display: block;
        /*height: 703px;*/
        height: auto;
        /*max-height: 920px;*/
        max-width: 100%;
    }

    /*old slider*/

    .brief_land_box .ibrief {
        line-height: 24px;
    }

    .land_page .title_land_box {
        background: #f8f8f8;
        color: #e40b00;
        font-size: 17px;
        font-weight: 600;
        padding: 10px;
        margin: 15px 0 5px 0;
    }

    .land_page .pack_land_box .pland {
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        color: #333;
    }

    .land_page .pack_land_box .pland .title_detail_pland {
        font-weight: 600;
        font-size: 18px;
        padding: 10px 10px 0 10px;
    }

    .land_page .pack_land_box .pland .body_detail_pland {
        padding: 5px 10px 10px 10px;
    }

    .land_page .pack_land_box {
        border-top: 1px solid #e0e0e0;
        border-right: 1px solid #e0e0e0;
    }

    .land_page .pack_land_box .pland > strong {
        line-height: 32px;
        font-weight: 600;
        display: inline-block;
        padding-left: 10px;
        width: 110px;
    }

    .land_page .poster_land_box .pic_poster_land_box {
        padding-right: 30px;
    }

    .land_page .poster_land_box .detail_poster_land_box p:first-child {
        border-top: 0;
    }

    .land_page .poster_land_box .detail_poster_land_box p {
        padding: 5px 0;
        border-top: 1px dotted #ddd;
    }

    .land_page .title1_land_box strong {
        background: #fff;
        display: inline-block;
        position: relative;
        margin-bottom: -10px;
        font-weight: 600;
        line-height: 20px;
        font-size: 16px;
    }

    .land_page .title1_land_box {
        border-bottom: 1px solid #ddd;
        margin: 10px 0 20px 0;
    }

    p.title_box1 strong {
        display: inline-block;
        font-size: 16px;
        line-height: 50px;
        font-weight: 600;
        padding-left: 10px;
        border-left: 5px solid #4dbb6d;
    }

    .body_top2_box {
        padding: 15px;
        border: 1px solid #ddd;
        border-top: 0;
    }

    .land_page .land_box h1, .land_page .land_box h2 {
        color: #e40b00;
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .land_page .poster_land_box .pic_poster_land_box p {
        border: 1px solid #ddd;
        padding: 4px;
        margin-top: 5px;
    }

    p.title_box1 {
        background: #efefef;
        border-bottom: 1px solid #ddd;
    }

    .land_page .price_ibrief {
        font-size: 20px;
        color: #e40b00;
    }
</style>

<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        /*width: 80%;*/
        width: 100%;
        /*max-width: 700px;*/
        max-width: 1170px;
        max-height: 703px !important;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }
        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }
        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 45px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        opacity: inherit;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }
</style>
