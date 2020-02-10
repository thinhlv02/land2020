
<ol class="breadcrumb">
    <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
    <li class="active">Tuyển dụng</li>
</ol>

<div>
    <?php echo isset($recruitment) ? $recruitment->content : 'Không có thông tin tuyển dụng'?>
</div>