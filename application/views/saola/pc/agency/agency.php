<div class="container">
    <div class="title-section"><h2><?php echo 'Các đại lý ủy quyền hợp tác với chúng tôi!' ?></h2></div>
    <div class="row mt-5">
        <div class="card">
            <div class="card-body">
                <?php foreach ($agencies as $key => $value) { ?>
                    <div class="item-agency" id="<?php echo create_slug($value->name) ?>">
                        <div style="font-weight: bold"><?php echo $value->name ?></div>
                        <div style="color: #666"><i class="fa fa-building" aria-hidden="true"></i>
                            <span><i class="mdi mdi-map-marker"></i> <?php echo $value->address ?></span></div>
                        <div style="color: #666"><i class="fa fa-phone" aria-hidden="true"></i>
                            <span><i class="mdi mdi-cellphone-android"></i> <?php echo $value->phone ?></span></div>
                        <!--                <div>-->
                        <!--                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">-->
                        <!--                </div>-->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        if (window.location.href.includes("div-panel")) {
            $(document).scrollTop(450);
        }
    });
</script>

<style>
    /*.avatar {*/
    /*    vertical-align: middle;*/
    /*    width: 50px;*/
    /*    height: 50px;*/
    /*    border-radius: 50%;*/
    /*}*/
</style>