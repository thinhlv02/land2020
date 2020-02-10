<section class="news">
    <div class="container">
        <div class="col-sm-12 col-md-12">
            <div class="title-section"><h2>Các hình thức vay</h2></div>
            <div class="sub-title-section">Chọn hình thức phù hợp với bạn</div>
            <?php foreach ($products as $product){ ?>
                <div>
                <a href="<?php echo base_url('gioi-thieu-dich-vu/'.create_slug($product->name).'-'.$product->id.'.html')?>">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="item-product">
                            <div class="img-news col-xs-12 col-sm-12 col-md-6">
                                <img src="<?php echo public_url('images/products/'.$product->img)?>">
                            </div>
                            <div class="title-product"><?php echo $product->name?></div>
                            <div class="content-product"><?php echo $product->intro?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>