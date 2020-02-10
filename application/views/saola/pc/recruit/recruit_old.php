<section class="recruitment">
    <div class="container">
        <div class="col-sm-12 col-md-12">
            <div class="title-section">Tuyển dụng</div>
            <!--<div class="icons">-->
            <!--<i class="fa fa-desktop" aria-hidden="true"></i>-->
            <!--<i class="fa fa-mobile" aria-hidden="true"></i>-->
            <!--<i class="fa fa-apple" aria-hidden="true"></i>-->
            <!--<i class="fa fa-android" aria-hidden="true"></i>-->
            <!--<i class="fa fa-windows" aria-hidden="true"></i>-->
            <!--</div>-->
            <div class="wrapper-recruitment">
                <div class="col-sm-12 col-md-4">
                    <div class="icons">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <div class="title-recruitment">Lập trình Web, App</div>
                    <div class="wrapper-post">
                        <div id="recruit-web"></div>
                        <?php
                            $sizeWeb = sizeof($recruitmentWeb);
                            if($sizeWeb > 3){ ?>
                            <ul class="pagination" id="pagination-web">
                                <?php for ($i = 1; $i <= ceil($sizeWeb/3); $i++){ ?>
                                    <li value="<?php echo $i?>"><a><?php echo $i?></a></li>
                                <?php }?>
                            </ul>
                        <?php }?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="icons">
                        <i class="fa fa-apple" aria-hidden="true"></i>
                        <i class="fa fa-android" aria-hidden="true"></i>
                        <i class="fa fa-windows" aria-hidden="true"></i>
                    </div>
                    <div class="title-recruitment">Lập trình Mobile</div>
                    <div class="wrapper-post">
                        <div id="recruit-mobile"></div>
                        <?php
                        $sizeMobile = sizeof($recruitmentMobile);
                        if($sizeMobile > 3){ ?>
                            <ul class="pagination" id="pagination-mobile">
                                <?php for ($i = 1; $i <= $sizeMobile/3; $i++){ ?>
                                    <li value="<?php echo $i?>"><a><?php echo $i?></a></li>
                                <?php }?>
                            </ul>
                        <?php }?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="icons">
                        <i class="fa fa-male" aria-hidden="true"></i>
                        <i class="fa fa-female" aria-hidden="true"></i>
                    </div>
                    <div class="title-recruitment">Vận hành, kiểm thử</div>
                    <div class="wrapper-post">
                        <div id="recruit-test"></div>
                        <?php
                        $sizeTest = sizeof($recruitmentTest);
                        if($sizeTest > 3){ ?>
                            <ul class="pagination" id="pagination-test">
                                <?php for ($i = 1; $i <= $sizeTest/3; $i++){ ?>
                                    <li value="<?php echo $i?>"><a><?php echo $i?></a></li>
                                <?php }?>
                            </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php foreach ($recruitment as $row){ ?>
    <div class="modal fade" role="dialog" id="modal-recruit-<?php echo $row->id?>">
        <div class="modal-content">
            <div class="close-modal btn btn-success" data-dismiss="modal">Đóng</div>
            <div class="container">
                <div class="recruit-content"><?php echo $row->content?></div>
                <div class="close-footer btn-lg btn btn-success" data-dismiss="modal">Đóng</div>
            </div>
        </div>
    </div>
<?php }?>
<script>
    showPageRecruit(1, 1);
    showPageRecruit(2, 1);
    showPageRecruit(3, 1);

    $('#pagination-web li:first-child').addClass('active');
    $('#pagination-mobile li:first-child').addClass('active');
    $('#pagination-test li:first-child').addClass('active');

    $('#pagination-web li').click(function () {
        var page = $(this).val();
        $('#pagination-web li').removeClass('active');
        $(this).addClass('active');
        showPageRecruit(1, page);
    });

    $('#pagination-mobile li').click(function () {
        var page = $(this).val();
        showPageRecruit(2, page);
    });

    $('#pagination-test li').click(function () {
        var page = $(this).val();
        showPageRecruit(3, page);
    });

    function showPageRecruit(type, page) {
        var perPage = 3;
        var data;
        var id;
        if(type === 1){
            data = <?php echo json_encode($recruitmentWeb)?>;
            id = '#recruit-web';
        }
        else if(type === 2){
            data = <?php echo json_encode($recruitmentMobile)?>;
            id = '#recruit-mobile';
        }
        else{
            data = <?php echo json_encode($recruitmentTest)?>;
            id = '#recruit-test';
        }
        $(id).empty();
        for(var i = (page-1)*perPage; i < page*perPage; i++){
            if(data[i]){
                $(id).append('<a data-toggle="modal" data-target="#modal-recruit-'+data[i]['id']+'">'+data[i]['title']+'</a>');
            }
        }
    }
</script>