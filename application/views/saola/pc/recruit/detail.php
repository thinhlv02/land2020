<div class="title-recruit"><?php echo $this->lang->line('opening'); ?></div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a
                    href="<?php echo base_url('tuyen-dung.html') ?>"><?php echo $this->lang->line('recruit'); ?></a>
        </li>
        <li class="breadcrumb-item active"
            aria-current="page"><?php echo $language == 'vn' ? $detail->title : $detail->title_en ?></li>
    </ol>
</nav>
<div class=""><?php echo $language == 'vn' ? $detail->content : $detail->content_en ?></div>