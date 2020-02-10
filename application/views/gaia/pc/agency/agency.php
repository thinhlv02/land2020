
<div class="container">
    <div class="title-section"><h2><?php echo 'Danh sách đại lý'?></h2></div>
    <div class="row" style="margin-top: 30px">
        <?php foreach ($agencies as $key=>$value){ ?>
            <div class="item-agency" id="<?php echo create_slug($value->name)?>">
                <div style="font-weight: bold"><?php echo $value->name?></div>
                <div style="color: #666"><i class="fa fa-building" aria-hidden="true"></i> <span><?php echo $value->address?></span></div>
                <div style="color: #666"><i class="fa fa-phone" aria-hidden="true"></i> <span><?php echo $value->phone?></span></div>
            </div>
        <?php }?>
    </div>
</div>

<script>
    $(document).ready(function () {
        if(window.location.href.includes("div-panel"))
        {
            $(document).scrollTop(450);
        }
    });
</script>