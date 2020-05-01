<section class="news pt-0">
    <div class="container">
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="box-module">
                    <div class="bg-modul"><i class="glyphicon glyphicon-star"></i> Bất động sản nổi bật </div>
                </div>

                <?php foreach ($ads_center as $key => $value) { ?>

                    <div class="col-md-4 col-sm-6 col-xs-12 top2 item_ads _hot p-1" onclick="updateView('<?php echo $value->id; ?>');">
                        <div class="card mb-0">
                            <div class="card-body border-primary p-1">

                                <a target="_blank" href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                    <img style="width: 100%;height: 210px"
                                         src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                         alt="<?php echo $value->title ?>"></a>

                                <div class="code_row">TV-<?php echo $value->id . substr($value->code, 0, 2) ?></div>

<!--                                <h3 style="height: 44px;font-size: 13px;overflow: hidden;border-bottom: 1px solid #ddd;">-->
                                <h3 style="height: 44px;font-size: 13px;overflow: hidden;" class="mt-1">
                                    <a target="_blank" href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>"><?php echo $value->title ?></a>
                                </h3>

<!--                                <p style="height: 72px !important;overflow: hidden;">--><?php //echo $value->intro ?><!--</p>-->
                                <div class="row area gia-title">
<!--                                    <div class="col-xs-12 larea">DTMB:-->
                                    <div class="col-xs-12 larea">Diện Tích:
                                        <strong><?php echo $value->acreage ?> m<sup>2</sup></strong></div>
<!--                                    <div class="col-xs-12 larea">DTSD:-->
<!--                                        <strong>--><?php //echo $value->useacreage != '' ? $value->useacreage : 0 ?><!-- m<sup>2</sup></strong>-->
<!--                                    </div>-->
                                </div>
                                <div class="">
                                    <div class="col-xs-6 btn btn-sm" style="background: #eeeeee;">
                                        <i class="mdi mdi-map-marker" style="color: #e40b00"></i>
                                        <?php echo $value->province_name != '' ? $value->province_name : 'update...'; ?>
                                    </div>
                                    <div class="col-xs-6 btn-sm btn btn-info font-weight-600" style="overflow: hidden!important;">
                                        <?php echo $value->price ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>
</section>