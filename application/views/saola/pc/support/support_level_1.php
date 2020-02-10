
<section class="detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="left-menu">
                    <div class="left-title">Hỗ trợ(1)</div>
                    <ul>
                        <li class="<?php if (!in_array($type, array('2','3'))) echo 'active' ?>"><a href="<?php echo base_url('ho-tro')?>">Khách hàng</a></li>
                        <li class="<?php if($type == 2) echo 'active' ?>"><a href="<?php echo base_url('ho-tro/ky-thuat-vien')?>">Nhân viên thị trường</a></li>
                        <li class="<?php if($type == 3) echo 'active' ?>"><a href="<?php echo base_url('ho-tro/cong-tac-vien')?>">Cộng tác viên kinh doanh</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 detail-content">
            <div class="line-height-2">
                <ul>
                    <?php $i=0; foreach ($categories as $p){ $i++; ?>
                        <li style="margin: 15px ;list-style-type: none;">
                            <a href="<?php echo base_url('ho-tro/'.create_slug($p->name).'-'.$p->id)?>">
                                <?php echo $i. '. ' . $p->name?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        </div>
    </div>
</section>