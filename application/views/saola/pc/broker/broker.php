<section class="contact">
    <div class="container">
        <div class="row subpage">

            <!--Begin left-->
            <div class="col-xs-12 left land_page">

                <!--Begin land_box-->
                <div class="_box">
                    <p class="title_box" style="color: #055699"><strong>Chuyên viên tư vấn
                            <i class="mdi mdi-chevron-right"></i> Danh sách</strong>
                    </p>

                    <div class="">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Cá nhân</a></li>
                            <li><a data-toggle="tab" href="#menu1">Công ty</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <div class="land_box">

                                    <div class="pack_land_box">

                                        <div class="row">

                                            <?php foreach ($lstData as $k => $v) { ?>

                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="font-weight-600"><?php echo $v->name; ?></h4>
                                                            <p class="broker-area mb-0">
                                                                <i class="mdi mdi-map-marker"></i> <?php echo $v->area; ?>
                                                            </p>
                                                            <p class="mb-0">
                                                                <i class="mdi mdi-phone text-danger12"></i> <?php echo $v->phone; ?>
                                                            </p>
                                                            <p class="">
                                                                <i class="mdi mdi-email-outline"></i> <?php echo $v->email; ?>
                                                            </p>
                                                            <p>
                                                                <button class="btn btn-primary btn-xs font-weight-600">
                                                                    <i class="mdi mdi-more"></i> Đọc Thêm
                                                                </button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div id="menu1" class="tab-pane fade">

                            </div>

                        </div>

                    </div>

                </div>
                <!--End detail_land-->
            </div>

        </div>
    </div>
</section>

<style>
    /*//css tab active*/
    li.active a {
        border-right: 6px solid #D3D6DA !important;
        font-weight: bold;
    }
</style>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .broker-area {
        height: 40px;
        overflow: hidden;
    }
</style>

