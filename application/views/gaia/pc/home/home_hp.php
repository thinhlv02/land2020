<section class="news pt-0">

    <div class="container">
        <div class="col-sm-12 col-md-12">
            <div class="row two_cols">

                <div class="col-xs-9">

                    <div class="left_box top2_box">
                        <p class="title_box"><strong>TIN GIÁ HẤP DẪN</strong></p>

                        <div class="body_top2_box">

                            <?php foreach ($ads_center as $key => $value) { ?>
                                <div class="col-xs-6 top2 top2_up">
                                    <div class="_pt_vip_hot border-danger p-2">
                                        <div class="col-xs-5 ltop2">
                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                                        src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                        alt="<?php echo $value->title ?>"></a>
                                            <div class="code_row">PT-<?php echo $value->id . substr($value->code, 0, 3) ?></div>
                                        </div>

                                        <div class="col-xs-7 rtop2">
                                            <h3>
                                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                    <?php echo $value->title ?> </a>
                                                <span></span>
                                            </h3>
                                            <div><?php echo $value->intro ?>
                                            </div>
                                            <p>
                                                <strong>DTMB:</strong> <?php echo $value->acreage ?> m2 -
                                                <strong>Giá:</strong>
                                                <span><?php echo $value->price ?> VND </span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt_icon_viphot" style="">
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
                    <!--End two_cols-->
                </div>

                <div class="col-xs-3 right">
                    <!--Begin slide top-->
                    <div class="right_box vip_box">
                        <p class="title_box"><a href=""><strong>TIN VIP</strong></a></p>
                        <div>
                            <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
                                <ul class="pt_slider"
                                    style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, -2520px, 0px);">
                                    <?php foreach ($layer_right as $key => $value) { ?>
                                        <li style="float: none; list-style: none; position: relative; width: 298px;"
                                            class="bx-clone">
                                            <dl class=" _vip _hot">
                                                <dt>
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                                                src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                                alt="<?php echo $value->title ?>"></a>
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
                                                </dt>
                                                <dd>
                                                    <h3>
                                                        <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                            <?php echo $value->title ?></a></h3>
                                                    <p class="mt-0 mb-0">
                                                        <strong>Diện tích:</strong> <?php echo $value->acreage ?> m2</p>
                                                    <p class="mt-0 mb-0"><strong>Giá:</strong>
                                                        <span><?php echo $value->price ?> tỷ</span></p>
                                                    <p class="mt-0 mb-0"><strong>Hướng:</strong> KXD</p>
                                                </dd>
                                            </dl>
                                        </li>

                                    <?php } ?>

                                </ul>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--Begin slider top-->

                </div>
            </div>

        </div>
    </div>

</section>

<script type="text/javascript">
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
</script>