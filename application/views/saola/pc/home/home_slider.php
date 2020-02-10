<section class="news pt-0 ">
    <div class="container">

        <div class="row">

            <?php $this->load->view($this->_template_f . 'home/form_search') ?>

            <div class="col-sm-6 col-md-6">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php foreach ($ads_left as $key => $value) {
                            ?>
                            <div class="item <?php if ($key == 0) echo 'active'; ?>"
                                 onclick="updateView('<?php echo $value->id; ?>');">

                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                    <img src="<?php echo public_url('images/ads/' . $value->img) ?>"
                                         alt="<?php echo $value->img ?>" style="width:100%; height: 320px">
                                </a>

                            </div>
                        <?php } ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control mt-0" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>

            <div class="col-sm-4 col-md-4">

                <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php foreach ($ads_right as $key => $value) {
                            ?>
                            <div class="item <?php if ($key == 0) echo 'active'; ?>"
                                 onclick="updateView('<?php echo $value->id; ?>');">

                                <a href="<?php echo base_url('rao-vat/' . create_slug($value->title) . '-' . $value->id) ?>">
                                    <img src="<?php echo public_url('images/ads/' . $value->img) ?>" alt="$value->img"
                                         style="width: 100%; height: 320px ">
                                </a>

                            </div>
                        <?php } ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control mt-0" href="#myCarouse2" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarouse2" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>