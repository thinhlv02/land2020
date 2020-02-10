<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view($this->_template_f . 'layout/head')?>
</head>
<body>
<?php $this->load->view($this->_template_f . 'layout/menu')?>
<?php $this->load->view($this->_template_f . 'layout/banner')?>
<section class="detail">
    <div class="container">
        <div class="col-sm-4 col-md-4">
            <div class="left-menu">
                <div class="left-title">Hình thức vay</div>
                <ul>
                    <?php foreach ($products as $product){ ?>
                        <li>
                            <a href="<?php echo base_url('hinh-thuc-vay/'.create_slug($product->name).'-'.$product->id.'.html')?>">
                                <?php echo $product->name?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>

        </div>
        <div class="col-sm-8 col-md-8 detail-content">
            <?php $this->load->view($temp)?>
        </div>
    </div>
</section>
<?php $this->load->view($this->_template_f . 'layout/footer')?>
<!--</div>-->
</body>
</html>