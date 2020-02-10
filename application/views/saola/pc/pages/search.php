<section class="contact">
    <div class="container">
        <!--        <div class="title-section"><h2>Kết quả tìm kiếm</h2></div>-->

        <div class="col-md-3 col-sm-12 col-xs-12 d-none">
            <div class="left-title">Nổi bật</div>
            <?php foreach ($highlight as $key => $value) { ?>
                <a href="<?php echo base_url('tin-tuc/' . create_slug($value->title) . '-' . $value->id) ?>">
                    <div class="item-news-1">
                        <div class="img-news-1">
                            <img src="<?php echo public_url('images/news/' . $value->img) ?>">
                        </div>
                        <div style="padding: 10px">
                            <h4 class="title-news-1"><?php echo $value->title ?></h4>
                            <p class="content-news-1"><?php echo $value->intro ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>

        <div class="col-md-9 col-sm-12 col-xs-12 d-none">
            <div class="left-title">Tin mới</div>
            <?php foreach ($news as $key => $value) { ?>
                <?php if ($key > 0) { ?>
                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->title) . '-' . $value->id) ?>">
                        <div class="item-news-1">
                            <div class="row">
                                <div class="img-news-1 col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo public_url('images/news/' . $value->img) ?>">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div style="margin: 10px">
                                        <h2 class="title-news-1"><?php echo $value->title ?></h2>
                                        <p class="content-news-1"><?php echo $value->intro ?></p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->title) . '-' . $value->id) ?>">
                        <div class="item-news-1">
                            <div class="img-news-1">
                                <img src="<?php echo public_url('images/news/' . $value->img) ?>">
                            </div>
                            <div style="padding: 10px">
                                <h4 class="title-news-1"><?php echo $value->title ?></h4>
                                <p class="content-news-1"><?php echo $value->intro ?></p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>
            <div class="navigation" style="margin-top: 20px">
                <?php echo $lstPaging; ?>
            </div>
        </div>

        <?php $this->load->view($this->_template_f . 'home/form_search') ?>

        <div class="col-xs-10  left catland_page">

            <!--Begin land_box-->
            <div class="_box">
                <p class="title_box"><strong>Tìm kiếm nhà đất</strong></p>

                <div class="listland_box pt_hotLand_home row12">

                    <?php foreach ($lstSearch as $key => $value) { ?>

                    <div class="col-xs-4 item pl-5 pr-5 ">
                        <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><img
                                    src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                    alt="<?php echo $value->title ?>"></a>
                        <div class="pt_icon_viphot" style="position: absolute;top: 1px;left: 4px;">
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
                        <h3>
                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                <?php echo $value->title ?></a></h3>

                        <p><?php echo $value->intro ?></p>

                        <div class="row area gia-title">
                            <div class="col-xs-6 larea">DTMB: <strong><?php echo $value->acreage ?> m<sup>2</sup></strong></div>
                            <div class="col-xs-6 larea">DTSD: <strong><?php echo $value->useacreage != '' ? $value->useacreage: 0 ?> m<sup>2</sup></strong></div>
                        </div>

                        <div class="price">
                            <div class="col-xs-6 btn btn-sm btn-outline-warning"><i class="fa fa-map-marker"></i> <?php echo $value->province_name ?></div>
                            <div class="col-xs-6 btn btn-sm btn-primary">Giá:
                                <?php echo $value->price ?> VND
                            </div>
                        </div>

                    </div>

                    <?php } ?>

                    <div class="clearfix"></div>

                </div>
            </div>
            <!--End detail_land-->


        </div>


    </div>
</section>

<style>
    .code_row {
        background: rgba(255, 255, 255, .8);
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 11px;
        line-height: 18px;
        padding: 0 5px;
        font-weight: 600;
    }

    .pt_hotLand_home .item > a {
        display: block;
        height: 170px;
        background: #ddd;
    }

    .pt_hotLand_home .item > a img {
        width: 100%;
        height: 100%;
    }

    .pt_hotLand_home .item h3 {
        height: 40px;
        overflow: hidden;
        margin: 10px 0;
    }

    .pt_hotLand_home .item h3 a {
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
        line-height: 20px;
        color: #000;
    }

    .pt_hotLand_home .item > p {
        line-height: 18px;
        height: 72px;
        overflow: hidden;
    }

    .pt_hotLand_home .item .area {
        font-weight: 600;
        font-size: 12px;
        margin: 10px 0;
    }

    .pt_hotLand_home .item {
        /*width: 19%;*/
        /*margin-right: 1.25%;*/
        margin-bottom: 20px;
        position: relative;
        border: 2px solid #eee;
        padding: 5px;
    }
</style>