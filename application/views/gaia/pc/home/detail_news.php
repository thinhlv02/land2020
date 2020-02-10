<section class="news">
    <div class="container">
        <div class="col-sm-12 col-md-8">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('home'); ?></a></li>
                <li class="active"><?php echo $language == 'vn' ? $detail->title : $detail->title_en?></li>
            </ol>
            <div><?php echo date('d/m/y', $detail->created)?></div>
            <div>
                <?php echo $language == 'vn' ? $detail->content : $detail->content_en ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="title-section"><h2><?php echo $this->lang->line('news'); ?></h2></div>
            <div>
                <?php foreach ($news as $row){ ?>
                    <a href="<?php echo base_url('tin-tuc/'.create_slug($row->title).'-'.$row->id.'.html')?>">
                        <div class="row col-xs-12 col-sm-12 col-md-12 item-news">
                            <div class="img-news col-xs-6 col-sm-6 col-md-6"><img src="<?php echo base_url('public/images/news/'.$row->img)?>"></div>
                            <div class="title-news-detail"><?php echo $language == 'vn' ? $row->title : $row->title_en?></div>
                            <div class="content-news"><?php echo substr( strip_tags($language == 'vn' ? $row->content : $row->content_en),  0, 150 ).'...'?></div>
                        </div>
                    </a>
                <?php }?>
            </div>
        </div>
    </div>
</section>