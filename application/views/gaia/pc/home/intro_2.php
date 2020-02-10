<section class="news">
    <div class="container">
        <div class="col-sm-12 col-md-12">
<!--            <div class="title-section"><h2>Dịch vụ</h2></div>-->
            <div class="box-module">
                <div class="bg-modul"><i class="glyphicon glyphicon-th"></i>Dịch vụ</div>
            </div>
            <div class="sub-title-section">Dịch vụ đa dạng, mọi lúc mọi nơi</div>
            <div class="row">
                <?php foreach ($products as $product){ ?>
                    <div>
                        <a href="<?php echo base_url('gioi-thieu-dich-vu/'.create_slug($product->name).'-'.$product->id.'.html')?>">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="item-product">
                                    <div class="img-product">
                                        <img src="<?php echo public_url('images/products/'.$product->img)?>">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>