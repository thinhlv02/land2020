
<?php if (isset($message)){$this->load->view('admin/message',$this->data); }?>


<div class="x_panel">
    <div class="x_title">
        <h2>Ảnh banner</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh cũ <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <img src="<?php echo public_url('images/'.$banner)?>" style="width: 100%">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh mới (1600x450)<span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="file" class="form-control" name="img" id="img">
                </div>
            </div>
            <div class="form-group" style="margin-top: 30px">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                    <input type="submit" id="btnUpdateBanner" name="btnUpdateBanner" required="required" class="btn btn-warning" value="Cập nhật">
                </div>
            </div>
        </form>
    </div>
</div>