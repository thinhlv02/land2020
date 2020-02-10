<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<section class="contact">
    <div class="container">
        <div class="title-section"><h2>Rao vặt</h2></div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="left-title">Nổi bật</div>
            <?php foreach ($highlight as $key => $value) { ?>
                <a href="<?php echo base_url('tin-tuc/' . create_slug($value->title) . '-' . $value->id) ?>">
                    <div class="item-news-1">
                        <div class="img-news-1">
                            <img src="<?php echo public_url('images/ads/' . $value->img) ?>">
                        </div>
                        <div style="padding: 10px">
                            <h2 class="title-news-1"><?php echo $value->title ?></h2>
                            <p class="content-news-1"><?php echo $value->intro ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="left-title">Tin mới</div>
            <?php foreach ($ads as $key => $value) { ?>
                <?php if ($key > 0) { ?>
                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->title) . '-' . $value->id) ?>">
                        <div class="item-news-1">
                            <div class="row">
                                <div class="img-news-1 col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo public_url('images/ads/' . $value->img) ?>">
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
                                <img src="<?php echo public_url('images/ads/' . $value->img) ?>">
                            </div>
                            <div style="padding: 10px">
                                <h2 class="title-news-1"><?php echo $value->title ?></h2>
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


    </div>
</section>