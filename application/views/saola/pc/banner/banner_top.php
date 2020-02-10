<?php
if (isset($banner_top) && !empty($banner_top))
{
    ?>
    <div id='SiteTop'>
        <div id="TopBanner" style="position: absolute;top: 1px;right: 0px;">
            <a href="<?php echo base_url('rao-vat/' . create_slug($banner_top[0]->title) . '-' . $banner_top[0]->id_ads) ?>" target="_blank" title="" rel="nofollow"><img src="<?php echo public_url('images/banner/') . $banner_top[0]->img ?>" style="max-width: 100%; height:auto;"></a>
        </div>
    </div>
    <?php
}
?>