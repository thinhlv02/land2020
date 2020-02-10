<section class="news">
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12">
<!--            <div class="title-section"><h2>Tin rao nổi bật</h2></div>-->
<!--            test-->
<!--            <div class="box-module">-->
<!--                <div class="bg-modul"><i class="glyphicon glyphicon-th"></i> Tin rao nổi bật</div>-->
<!--            </div>-->
<!--            test-->
<!--            <div class="sub-title-section">Khám phá tại đây</div>-->
            <div class="row">
                <?php foreach ($ads as $key => $value) { ?>
                    <?php if ($key > 0) { ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                <div class="item-news">
                                    <div class="img-ads" style="background-image: url(<?php echo public_url('images/ads/' . $value->img) ?>)">
                                        <div class="content-news">
                                            <div><strong style="color: #fff"><?php echo $value->title ?></strong></div>
              s                              <p style="color: #fff"><?php echo $value->intro ?></p>
                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>" class="btn btn-primary mt-5">Đọc thêm</a>
                                        </div>
                                        <div class="title-news">
                                            <span style="font-size: 13px"><?php echo date('d/m/Y', strtotime($value->created_at)) ?></span><br>
                                            <strong><?php echo $value->title ?></strong>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                <div class="item-news">
                                    <div class="img-ads" style="background-image: url(<?php echo public_url('images/ads/' . $value->img) ?>)">
                                        <div class="content-news">
                                            <div><strong><?php echo $value->title ?></strong></div>
                                            <p><?php echo $value->intro ?></p>
                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>" class="btn btn-primary mt-5">Đọc thêm</a>
                                        </div>
                                        <div class="title-news">
                                            <span style="font-size: 13px"><?php echo date('d/m/Y', strtotime($value->created_at)) ?></span><br>
                                            <strong><?php echo $value->title ?></strong>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div style="text-align: center">
                <a href="<?php echo base_url('rao-vat.html') ?>" class="btn btn-primary" style="margin-top: 20px">Đọc thêm</a>
            </div>
        </div>
    </div>
</section>