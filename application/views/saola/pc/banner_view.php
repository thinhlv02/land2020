
<section class="pb-0">
    <div class="container banner" style="background-image: url(<?php echo public_url('images/' . $content->banner) ?>);background-size: 100%;">
        <div class="" style="position: absolute;top: 20px;left: 2px;color: #ffffff;">
            <marquee><?php
                echo $language == 'vietnamese' ? $contact->slogan: $contact->slogan_en; ?></marquee>
        </div>
        <div class="banner-left">
<!--            <p style="display: none" class="caption-banner animated slideInLeft">Đơn giản hoá việc bán hàng<br>vì chúng tôi luôn bên bạn-->
            <p class="caption-banner animated slideInLeft d-none">Đơn giản hoá việc bán hàng<br>vì chúng tôi luôn bên bạn
<!--            <p class="caption-banner animated slideInLeft">Đơn giản hoá việc bán hàng , vì chúng tôi luôn bên bạn-->
            </p>
            <!--        <a href="--><?php //echo base_url('gioi-thieu-dich-vu.html')?><!--"-->
            <!--           class="btn btn-primary animated bounceIn delay-1s" style="margin: 2px 0px;padding: 3px;" >TÌM HIỂU THÊM</a>-->
        </div>

        <!--        load banner top view-->
        <?php $this->load->view($this->_template_f . 'banner/banner_top') ?>

    </div>
</section>