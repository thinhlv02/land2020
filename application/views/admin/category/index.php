

<div class="page-title" style="height: auto">
    <div class="title_left">
        <h3>Quản lý loại nhà đất</h3>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div>
            <ul id="myTab" class="nav nav-tabs bar_tabs">
                <li class="<?php echo $tab == 1 ? 'active' : ''?>">
                    <a href="<?php echo admin_url('category')?>" id="home-tab">Danh sách ads type</a>
                </li>
                <li class="<?php echo $tab == 2 ? 'active' : ''?>">
                    <a href="<?php echo admin_url('category/add')?>" id="profile-tab2">Thêm mới</a>
                </li>
                <?php if($tab == 3){ ?>
                    <li class="active">
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