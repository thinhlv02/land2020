<section class="contact">
    <div class="container">
        <!--        <div class="title-section"><h2>Tin tức</h2></div>-->
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('tin-tuc') ?>">Tin tức</a></li>
                    <li class="active"><?php echo $news->name ?></li>
                </ol>
                <div class="item-news-1" style="padding: 10px">
                    <span><?php echo date('d/m/Y', strtotime($news->created_at)) ?></span>
                    <h4 class="title-news-1"><?php echo $news->name ?></h4>
                    <p class="content-news-1"><?php echo $news->intro ?></p>
                    <div class="img-news-1">
                        <img src="<?php echo public_url('images/news/' . $news->img) ?>">
                    </div>
                    <div class="content-news-1" style="margin-top: 20px">
                        <?php echo $news->content ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12" style="margin-top: 20px">
                <div class="left-title">Nổi bật</div>
                <?php foreach ($highlight as $key => $value) { ?>
                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>">
                        <div class="item-news-1">
                            <div class="img-news-1">
                                <img src="<?php echo public_url('images/news/' . $value->img) ?>">
                            </div>
                            <div style="padding: 10px">
                                <h4 class="title-news-1"><?php echo $value->name ?></h4>
                                <p class="content-news-1"><?php echo $value->intro ?></p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>