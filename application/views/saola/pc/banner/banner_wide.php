<?php if (isset($banner_left) && !empty($banner_left)) { ?>
    <div id='SiteLeft' onclick="updateView('<?php echo $banner_left[0]->id; ?>');">
        <div id="ban_wide_left" class="ban_wide_scroll">
            <a href='<?php echo base_url('rao-vat/' . create_slug($banner_left[0]->title) . '-' . $banner_left[0]->id_ads) ?>' target='_blank'><img border='0' height='600' src='<?php echo public_url('images/banner/') . $banner_left[0]->img ?>' width='160'/></a>
        </div>
    </div>
<?php } ?>


<?php if (isset($banner_right) && !empty($banner_right)) { ?>
    <div id='SiteRight' onclick="updateView('<?php echo $banner_right[0]->id; ?>');">
        <div id="ban_wide_right" class="ban_wide_scroll">
            <a href='<?php echo base_url('rao-vat/' . create_slug($banner_right[0]->title) . '-' . $banner_right[0]->id_ads) ?>' target='_blank'><img border='0' height='600' src='<?php echo public_url('images/banner/') . $banner_right[0]->img ?>' width='160'/></a>
        </div>
    </div>
<?php } ?>

<style>
    .ban_wide_scroll {
        margin: 0 0 5px 0;
        padding: 0;
        width: 160px;
        position: fixed;
        top: 45px;
        display: none
    }
</style>
