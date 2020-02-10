
<?php function getTextType($type){
    switch ($type){
        case 1: return "Khách hàng";
        case 2: return "Nhân viên thị trường";
        case 3: return "Cộng tác viên kinh doanh";
    }
}?>

<section class="detail">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('ho-tro')?>">Hỗ trợ(3)</a></li>
            <li><a href="<?php echo base_url('ho-tro/'.create_slug(getTextType($type)))?>"><?php echo getTextType($type)?></a></li>
            <li class="active"><?php echo $question->name?></li>
        </ol>
        <div class="col-sm-4 col-md-3">
            <div class="left-menu">
                <div class="left-title">Hỗ trợ</div>
                <ul>
                    <?php foreach ($categories as $p){ ?>
                        <li class="<?php if ($p->id == $active) echo 'active'; ?>" style="margin: 15px 0">
                            <a href="<?php echo base_url('ho-tro/'.create_slug($p->name).'-'.$p->id)?>">
                                <?php echo $p->name?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 detail-content">
            <div class="line-height-2 pl-5">
                <h2><?php echo $question->name?></h2>
                <p><?php echo $question->content?></p>
            </div>
        </div>
    </div>
</section>