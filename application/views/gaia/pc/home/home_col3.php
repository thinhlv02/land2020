<section class="news pt-0">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-md-4">

                <div id="">

                    <div id="raovat-nb">
                        <div class="box-module mt-2">
                            <div class="bg-modul"><i class="glyphicon glyphicon-th"></i> Cập nhật
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="pt-0">

                                    <div class="clearfix" id="box-home-svip">

                                        <?php foreach ($layer_left as $key => $value) { ?>

                                            <div class="item-re-list clearfix pt-5" onclick="updateView('<?php echo $value->id; ?>');">
                                                <div class="box-img-thumb">
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                        <img src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                             alt="<?php echo $value->title ?>" style="max-height: 200px;
    width: 100%;">
                                                    </a>
                                                </div>
                                                <div class="box-info-list" style="display: none">
                                                    <div class="clearfix box-title-item">
                                                        <label class="label label-danger">NỔI BẬT</label>
                                                        <h3 class="sieu-vip-title">
                                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                                <?php echo $value->title ?> </a>
                                                        </h3>
                                                    </div>

                                                    <div class="price-list">
                                                        <span>Diện tích</span>:
                                                        <strong><?php echo $value->acreage . ' m2' ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Giá</span>: <strong><?php echo $value->price ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Khu vực</span>:
                                                        <strong> <?php echo $value->area ?> </strong>
                                                        <span class="pull-right time">
                                             <i class="glyphicon glyphicon-time"></i>
                                            <?php echo date('Y-m-d', strtotime($value->created_at)) ?>
                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        <?php } ?>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-sm-4 col-md-4">

                <div id="">

                    <div id="raovat-nb">
                        <div class="box-module mt-2">
                            <div class="bg-modul"><i class="glyphicon glyphicon-th"></i> Tin rao vip dành cho bạn
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body pt-0">

                                    <div class="clearfix" id="box-home-svip">

                                        <?php foreach ($layer_vip as $key => $value) { ?>

                                            <div class="item-re-list clearfix pt-5" onclick="updateView('<?php echo $value->id; ?>');">

                                                <div class="clearfix box-title-item">
                                                    <h3 class="sieu-vip-title">
                                                        <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                            <?php echo $value->title ?> </a>
                                                    </h3>
                                                </div>

                                                <div class="box-img-thumb" style="width: 30%">
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                        <img src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                             alt="<?php echo $value->title ?>">
                                                    </a>
                                                </div>
                                                <div class="box-info-list" style="width: 65%">

                                                    <div class="price-list">
                                                        <span>Diện tích</span>:
                                                        <strong><?php echo $value->acreage . ' m2' ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Giá</span>: <strong><?php echo $value->price ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Khu vực</span>:
                                                        <strong> <?php echo $value->area ?> </strong>
                                                        <span class="pull-right time">
                                             <i class="glyphicon glyphicon-time"></i>
                                            <?php echo date('Y-m-d', strtotime($value->created_at)) ?>
                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        <?php } ?>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-sm-3 col-md-3" style="display: none">
                <div class="box-module mt-2">
                    <div class="bg-modul"><i class="glyphicon glyphicon-link"></i> Liên kết</div>
                </div>

                <div id="right">

                    <div>

                        <ul class="list-group">
                            <?php foreach ($news as $key => $value) { ?>

                                <?php if ($key == 0) { ?>
                                    <li class="first list-group-item">
                                        <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>" rel="nofollow">
                                            <img src="<?php echo public_url('images/news/' . $value->img) ?>" class="img-responsive center-block" alt="<?php echo $value->name ?>">
                                            Nghe thầy chọn ngày động thổ, gia đình tôi phải ở nhà dột 3 năm
                                        </a></li>
                                <?php } ?>


                                <li class="list-group-item">

                                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>">
                                        <?php echo $value->name ?>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="box-links-right">
                        <p><span style="font-size:12px"><span
                                ><strong>KHU VỰC MIỀN BẮC</strong></span></span>
                        </p>
                        <ul>

                            <?php foreach ($news_mb as $key => $value) { ?>

                                <li class="list-group-item">

                                    <a href="<?php echo base_url('tin-tuc/' . create_slug($value->name) . '-' . $value->id) ?>">
                                        <?php echo $value->name ?>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>

                    </div>

                </div>


            </div>

            <div class="col-sm-4 col-md-4">

                <div id="">

                    <div id="raovat-nb">
                        <div class="box-module mt-2">
                            <div class="bg-modul"><i class="glyphicon glyphicon-th"></i> tin rao dành cho bạn
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="pt-0">

                                    <div class="clearfix" id="box-home-svip">

                                        <?php foreach ($layer_right as $key => $value) { ?>

                                            <div class="item-re-list clearfix pt-5" onclick="updateView('<?php echo $value->id; ?>');">
                                                <div class="box-img-thumb" style="max-height: 175px">
                                                    <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                        <img src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                                             alt="<?php echo $value->title ?>">
                                                    </a>
                                                </div>
                                                <div class="box-info-list" style="display: none">
                                                    <div class="clearfix box-title-item">
                                                        <label class="label label-danger">NỔI BẬT</label>
                                                        <h3 class="sieu-vip-title">
                                                            <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                                                <?php echo $value->title ?> </a>
                                                        </h3>
                                                    </div>

                                                    <div class="price-list">
                                                        <span>Diện tích</span>:
                                                        <strong><?php echo $value->acreage . ' m2' ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Giá</span>: <strong><?php echo $value->price ?></strong>
                                                    </div>
                                                    <div class="price-list">
                                                        <span>Khu vực</span>:
                                                        <strong> <?php echo $value->area ?> </strong>
                                                        <span class="pull-right time">
                                             <i class="glyphicon glyphicon-time"></i>
                                            <?php echo date('Y-m-d', strtotime($value->created_at)) ?>
                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        <?php } ?>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="row" style="display: none">
            <div class="box-module mt-2">
                <div class="bg-modul"><h1>
                        <i class="glyphicon glyphicon-th"></i> Tin rao mới cập nhật</h1></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?php foreach ($ads_new as $key => $value) { ?>
                            <div class="item-re-list clearfix">
                                <div class="box-img-thumb">
                                    <a
                                            href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                        <img src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                             alt="<?php echo $value->title ?>">
                                    </a></div>
                                <div class="box-info-list">
                                    <h3><a class="color-60"
                                           href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                            <?php echo $value->title ?>
                                        </a>
                                    </h3>

                                    <div class="price-list"><span>Diện tích</span>:
                                        <strong><?php echo $value->acreage ?> m2</strong></div>
                                    <div class="price-list"><span>Giá</span>:
                                        <strong><?php echo $value->price ?></strong></div>
                                    <div class="price-list"><span>Khu vực</span>:
                                        <strong> <?php echo $value->area ?> </strong>
                                        <span class="pull-right time"> <i
                                                    class="glyphicon glyphicon-time"></i> <?php echo date('Y-m-d', strtotime($value->created_at)) ?> </span>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<style>
    .item-re-list {
        border-bottom: 1px #b0aeae solid;
        margin-top: 2px;
        width: 100%;
        /*padding: 10px;*/
    }

    .box-info-list {
        float: left;
        /*width: 538px;*/
        width: 82%;
    }

    .box-title-item label {
        float: left;
        /* margin-top: 5px; */
        margin-right: 15px;
        /* width: 55px; */
        text-transform: uppercase;
    }

    .item-re-list h3 {
        margin: 0 0 10px;
        padding: 0;
        font-size: 13px;
        font-weight: 700;
    }

    .item-re-list img {
        float: left;
        /*width: 150px;*/
        /*height: 90px;*/
        margin-right: 10px;
        border: 1px #eee solid;
    }

    img {
        vertical-align: middle;
    }

    h3.sieu-vip-title a {
        color: #055699;
        text-transform: uppercase;
    }

    .bg-modul h2, .bg-modul h1 {
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0;
        padding: 0;
        line-height: 18px;
    }

    .price-list span.time {
        font-weight: 400;
        width: inherit;
    }

    .price-list span {
        display: inline-block;
    }

    .time {
        font-size: 11px;
        white-space: nowrap;
    }
</style>