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
            <li><a href="<?php echo base_url('ho-tro')?>">Hỗ trợ(2)</a></li>
            <li class="active"><?php echo getTextType($type)?></li>
        </ol>
        <div class="col-sm-4 col-md-3">
            <div class="left-menu">
                <div class="left-title"><?php echo getTextType($type)?></div>
                <ul>
                    <?php foreach ($categories as $p){ ?>
                        <li  class="<?php if ($p->id == $active) echo 'active'; ?>" style="margin: 15px 0">
                            <a href="<?php echo base_url('ho-tro/'.create_slug($p->name).'-'.$p->id)?>">
                                <?php  echo $p->name?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 detail-content">
            <div class="line-height-2 pl-5">
                <ul>
                    <?php $i=0; foreach ($questions as $p){ $i++; ?>
                        <li style="margin: 15px 0; list-style-type: none">
                            <a href="<?php echo base_url('ho-tro/'.create_slug($p->name).'-'.$p->id)?>">
                                <?php echo $i. '. ' . $p->name?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</section>