
<div class="page-title" style="height: auto">
    <div class="title_left">
        <h3>Dịch vụ</h3>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div>
            <ul id="myTab" class="nav nav-tabs bar_tabs">
                <li class="<?php echo $tab == 1 ? 'active' : ''?>">
                    <a href="<?php echo admin_url('product')?>" id="home-tab">Danh sách</a>
                </li>
                <li class="<?php echo $tab == 2 ? 'active' : ''?>">
                    <a href="<?php echo admin_url('product/add')?>" id="profile-tab2">Thêm mới</a>
                </li>
                <?php if($tab == 3){ ?>
                    <li class="<?php echo $tab == 3 ? 'active' : ''?>">
                        <a href="#" id="profile-tab2">Cập nhật</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<?php if (isset($message)) {$this->load->view('admin/message', $this->data);} ?>

<?php $this->load->view($view)?>


<style type="text/css">
    td{
        vertical-align: middle !important;
    }
    .action a{
        font-size: 22px;
        display: block;
        cursor: pointer;
    }
</style>