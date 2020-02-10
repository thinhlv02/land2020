<!--<nav class="navbar navbar-default">-->
<nav class="container nav_fix">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="<?php echo activate_menu('introduce'); ?>" title="<?php echo $common_lang['lmenu_intro']; ?>"><a href="<?php echo base_url('gioi-thieu-dich-vu')?>"> <?php echo $common_lang['lmenu_intro']; ?></a></li>
            <li class="<?php echo activate_menu('support'); ?>" title="<?php echo $common_lang['lmenu_support']; ?>"><a href="<?php echo base_url('ho-tro')?>"> <?php echo $common_lang['lmenu_support']; ?></a></li>
            <li class="<?php echo activate_menu('price'); ?>" title="<?php echo $common_lang['lmenu_price']; ?>"><a href="<?php echo base_url('bao-gia')?>"> <?php echo $common_lang['lmenu_price']; ?></a></li>
            <li class="<?php echo activate_menu('policy'); ?>" title="<?php echo $common_lang['lmenu_policy']; ?>"><a href="<?php echo base_url('dieu-khoan-su-dung')?>"> <?php echo $common_lang['lmenu_policy']; ?></a></li>
            <li class="<?php echo activate_menu('faq'); ?>" title="<?php echo $common_lang['lmenu_faq']; ?>"><a href="<?php echo base_url('nhung-cau-hoi-thuong-gap')?>"> <?php echo $common_lang['lmenu_faq']; ?></a></li>
        </ul>
    </div>
</nav>

<style>
    .nav_fix {
        border-top: 1px solid #ccc !important;
        border-bottom: 1px solid #ccc !important;
        background-color: #ddd !important;
    }
</style>