<section class="news pt-0">
    <div class="container">

        <div class="col-sm-12 col-md-12">

            <div class="row" style="border: 1px solid #dddddd">
                <div class="box-module">
                    <div class="bg-modul"><i class="glyphicon glyphicon-tag"></i> Bất động sản nổi bật</div>
                </div>

                <?php foreach ($ads_center as $key => $value) { ?>

                    <div class="col-md-2 col-sm-6 col-xs-12 item_ads _hot" onclick="updateView('<?php echo $value->id; ?>');">
                        <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                            <img style="width: 100%;height: 150px"
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

                        <div class="code_row">PT-<?php echo $value->id.substr($value->code,0,3) ?></div>

                        <h3 style="height: 44px;font-size: 13px; ">
                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><?php echo $value->title ?></a>
                        </h3>

                        <p><?php echo $value->intro ?></p>
                        <div class="row area gia-title">
                            <div class="col-xs-12 larea">Diện Tích: <strong><?php echo $value->acreage ?> m<sup>2</sup></strong></div>
                        </div>
                        <div class="price">
                            <div class="col-xs-6">
                                <i class="fa fa-map-marker"></i>
                            <?php echo $value->province_name != '' ? $value->province_name : 'update...'; ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo $value->price ?>
                            </div>
                        </div>

                    </div>

                <?php } ?>

                <?php foreach ($ads_center as $key => $value) { ?>

                    <div class="col-md-2 col-sm-6 col-xs-12 card12 d-none"
                         onclick="updateView('<?php echo $value->id; ?>');">
                        <div class="mb-2">
                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                <div class="item-news">
                                    <div class="img-news"
                                         style="background-image: url(<?php echo public_url('images/ads/' . $value->img) ?>)">
                                        <div class="content-news">
                                            <div>
                                                <h6 style="color: red" class="shadow20"><?php echo $value->title ?></h6>
                                            </div>
                                            <!--                                            <p style="color: #fff">-->
                                            <?php //echo $value->intro ?><!--</p>-->
                                            <!--                                            <a href="-->
                                            <?php //echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?><!--" class="btn btn-primary mt-5">Đọc thêm</a>-->
                                        </div>
                                        <div class="title-news shadow20">
                                            <!--                                            <span style="font-size: 13px">-->
                                            <?php //echo date('d/m/Y', strtotime($value->created_at)) ?><!--</span><br>-->
                                            <p class="mb-0 "><?php echo substr($value->title, 0, 60) ?></p>
                                        </div>

                                    </div>
                                </div>
                            </a>

                            <div class="pt_icon_viphot">
                                <?php if ($value->icon_new == 1) { ?>
                                    <img src="<?php echo public_url('images/icon_new.gif') ?>"
                                         alt="">

                                <?php } ?>

                                <?php if ($value->icon_vip == 1) { ?>
                                    <img src="<?php echo public_url('images/icon_vip.gif') ?>"
                                         alt="">

                                <?php } ?>

                                <?php if ($value->icon_hot == 1) { ?>

                                    <img src="<?php echo public_url('images/icon_hot.gif') ?>"
                                         alt="">
                                <?php } ?>
                            </div>


                        </div>
                    </div>

                <?php } ?>
            </div>
            <!--            <div style="text-align: center">-->
            <!--                <a href="-->
            <?php //echo base_url('rao-vat.html') ?><!--" class="btn btn-primary" style="margin-top: 2px">Đọc thêm</a>-->
            <!--            </div>-->
        </div>
    </div>
</section>