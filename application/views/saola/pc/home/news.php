<section class="news">
    <div class="container">
        <div class="row">
            <div class="box-module">
                <div class="bg-modul"><i class="glyphicon glyphicon-th"></i> Tin tức</div>
            </div>
            <div class="col-sm-12 col-md-12">

                <div class="card">
                    <div class="card-body">

                        <!--            <div class="title-section"><h2>Tin tức</h2></div>-->

                        <!--            <div class="sub-title-section">Khám phá tại đây</div>-->
                        <div class="row">
                            <?php foreach ($news as $key => $value) { ?>
                                <?php if ($key > 0) { ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>">
                                            <div class="item-news">
                                                <div class="img-news" style="background-image: url(<?php echo public_url('images/news/' . $value->img) ?>)">
                                                    <div class="content-news">
                                                        <div>
                                                            <strong style="color: #fff"><?php echo $value->name ?></strong>
                                                        </div>
                                                        <p style="color: #fff"><?php echo $value->intro ?></p>
                                                        <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>" class="btn btn-primary mt-5">Đọc thêm</a>
                                                    </div>
                                                    <div class="title-news">
                                                        <span style="font-size: 13px" class="shadow5"><?php echo date('d/m/Y', strtotime($value->created_at)) ?></span><br>
                                                        <strong class="shadow20"><?php echo $value->name ?></strong>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>">
                                            <div class="item-news">
                                                <div class="img-news" style="background-image: url(<?php echo public_url('images/news/' . $value->img) ?>)">
                                                    <div class="content-news">
                                                        <div><strong><?php echo $value->name ?></strong></div>
                                                        <p><?php echo $value->intro ?></p>
                                                        <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>" class="btn btn-primary mt-5">Đọc thêm</a>
                                                    </div>
                                                    <div class="title-news">
                                                        <span style="font-size: 13px" class="shadow5"><?php echo date('d/m/Y', strtotime($value->created_at)) ?></span><br>
                                                        <strong class="shadow20"><?php echo $value->name ?></strong>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo base_url('tin-tuc.html') ?>" class="btn btn-info mt-2">
                                Đọc thêm <i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>