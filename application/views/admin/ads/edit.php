<!--<script language="javascript" src="--><?php //echo base_url('public') ?><!--/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/ckeditor/ckeditor.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2>Chỉnh sửa rao vặt: <span class="text-danger" style="color: red !important;"><?php echo $ads->code ?></span>
            Mã màu chữ:
            <span class="text-primary " style="color: #ff9900">#eb5c66; font-size: 36pt, font-family: tahoma, stroke: 3pt, lineheight: 48pt</span>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        <div class="row">
            <form id="formAddCatalog" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" id="txtName" name="txtName" value="<?php echo $ads->title ?>" class="form-control col-md-7 col-xs-12" placeholder="Tên bài viết">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Phân loại<span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <select class="form-control" id="slType" name="slType">
                            <?php foreach ($ads_type as $k => $v) { ?>
                                <option value="<?php echo $k ?>" <?php echo $k==$ads->ads_type ? 'selected=selected' : ''; ?>> <?php echo $v; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giới thiệu ngắn<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtIntro" rows="3" class="form-control"><?php echo str_replace('<br />', '&#13;', $ads->intro) ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="file" class="form-control" name="img_news" id="img_news">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh Slide<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="file" class="form-control" name="files[]" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nội dung<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="txtContent" class="form-control" style="height: 120px"><?php echo $ads->content ?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('txtContent', {height: '500px'}); </script>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giá tiền
                        <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="price" value="<?php echo $ads->price ?>" class="form-control col-md-7 col-xs-12" placeholder="ví dụ : 1,2 tỷ / nền">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Diện tích MB<span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" name="acreage" value="<?php echo $ads->acreage ?>" class="form-control col-md-12 col-xs-12" placeholder="ví dụ: 90">
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Diện tích SD<span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" name="useacreage" value="<?php echo $ads->useacreage ?>" class="form-control col-md-12 col-xs-12" placeholder="ví dụ: 90">
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Mặt tiền<span class="required">*</span></label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" name="width" value="<?php echo $ads->width ?>" class="form-control col-md-7 col-xs-12" placeholder="ví dụ: 10">
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Đường vào<span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" name="landwidth" value="<?php echo $ads->landwidth ?>" class="form-control col-md-12 col-xs-12" placeholder="ví dụ: 20">
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="area" readonly value="<?php echo $ads->area ?>" id="txtAddress" class="form-control col-md-7 col-xs-12" placeholder="Địa chỉ tin rao vặt">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tên liên lạc<span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" name="txtContactName" value="<?php echo $ads->contact_name; ?>" class="form-control col-md-5 col-xs-12" placeholder="tên liên hệ">
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">SĐT liên hệ<span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" name="phone" value="<?php echo $ads->phone ?>" class="form-control col-md-5 col-xs-12" placeholder="sđt liên hệ">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tỉnh/thành phố<span class="required">*</span></label>
                    <input type="hidden" id="hddtxtProvince" value="<?php echo $ads->province_name; ?>">
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <select class="select2_group form-control" name="province" id="txtProvince" onchange="get_district(this)">
                            <option value="0">-- Tỉnh/thành phố --</option>

                            <?php foreach ($lstProvince as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?php if (isset($province_id) && $province_id == $value->id) echo 'selected' ?>>
                                    <?php echo $value->_name ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Quận/huyện<span class="required">*</span></label>
                    <input type="hidden" id="hddtxtDistrict" value="<?php echo $ads->district_name; ?>">

                    <div class="col-md-2 col-sm-2 col-xs-12" id="divDistrict">
                        <select class="select2_group form-control" name="district" id="selectDistrict" onchange="get_ward(this)">

                            <option value="0">Quận/huyện</option>
                            <?php if (isset($district_arr) && !empty($district_arr))
                            {
                                foreach ($district_arr as $k => $val)
                                { ?>
                                    <option value="<?php echo $val->id ?>" <?php if (isset($district_id) && $district_id == $val->id) echo 'selected' ?>>
                                        <?php echo $val->_name ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>

                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12 " for="first-name">Xã/phường<span class="required">*</span></label>
                    <input type="hidden" id="hddtxtWard" value="<?php echo $ads->ward_name; ?>">

                    <div class="col-md-2 col-sm-2 col-xs-12" id="divWard">
                        <select class="select2_group form-control" name="ward" id="selectWard" onchange="get_street(this)">

                            <option value="0">Xã/phường</option>
                            <?php if (isset($ward_arr) && !empty($ward_arr))
                            {
                                foreach ($ward_arr as $k => $val)
                                {
                                    $first = explode('|', $val['id']);
//                                    echo $first[0]. '<br/>';
                                    ?>
                                    <option value="<?php echo $val['id'] ?>" <?php if (isset($ward_id) && $ward_id == $first[0]) echo 'selected' ?>>
                                        <?php echo $val['_name'] ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 " for="first-name">Đường/phố<span class="required">*</span></label>
                    <input type="hidden" id="hddtxtStreet" value="<?php echo $ads->street_name; ?>">

                    <div class="col-md-2 col-sm-2 col-xs-12" id="divStreet">
                        <select class="select2_group form-control" name="street">
                            <option value="0">-- Không có --</option>

                            <?php
                            if (isset($street_arr) && !empty($street_arr))
                            {
                                foreach ($street_arr as $k => $val)
                                { ?>
                                    <option value="<?php echo $val->id ?>" <?php if (isset($street_id) && $street_id == $val->id) echo 'selected' ?>>
                                        <?php echo $val->_name ?>
                                    </option>
                                <?php }
                            } ?>

                        </select>
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Lượt xem<span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="number" name="view" value="<?php echo $ads->view ?>" class="form-control col-md-7 col-xs-12" placeholder="nhập lượt xem">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Linh bài viết<span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="ads_link" readonly value="<?php echo $ads->ads_link; ?>" class="form-control col-md-7 col-xs-12" placeholder="nhập link bài viết">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2" style="width: 70px">
                        <input type="submit" id="btnAddProduct" name="btnEdit" class="btn btn-warning" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function get_district(sel)
    {
        var id = sel.value;
        console.log(id);
        if (id == 0)
        {
            $('#selectDistrict').empty();
            $('#selectWard').empty();
            $('#selectStreet').empty();
        }
        else
        {
            var _txtProvince = $.trim($("#txtProvince option:selected").text());

            $('#txtAddress').val(_txtProvince);
            $('#hddtxtProvince').val(_txtProvince);
            // ajax
            var params = {
                'id': id
            };

            var _onSuccess = function (data) {
                if (data == 'NOT_LOGIN')
                {
                    window.location.reload(true);
                }
                else if (data === 'false')
                {

                }
                else
                {
                    $("#divDistrict").html(data);
                }
            };//

            getAjax('<?php echo admin_url('ads/ajax_get_list_district'); ?>', params, '', 'GET', '', false, _onSuccess);
        }
    }

    function get_ward(sel)
    {
        var id = sel.value;
        console.log(id);
        if (id == 0)
        {
            $('#selectWard').empty();
            $('#selectStreet').empty();
        }
        else
        {
            var params = {
                'id': id
            };

            var _txtDistrict = $.trim($("#selectDistrict option:selected").text());
            $('#hddtxtDistrict').val(_txtDistrict);

            $('#txtAddress').val($('#hddtxtDistrict').val() + ', ' + $('#hddtxtProvince').val());


            var _onSuccess = function (data) {
                if (data == 'NOT_LOGIN')
                {

                }
                else if (data === 'false')
                {

                }
                else
                {
                    $("#divWard").html(data);
                }
            };

            getAjax('<?php echo admin_url('ads/ajax_get_list_ward'); ?>', params, '', 'GET', '', false, _onSuccess);
        }
    }

    function get_street(sel)
    {
        var id = sel.value;
        if (id == 0)
        {
            $('#selectStreet').empty();
        }
        else
        {
            // ajax
            var params = {
                'id': id
            };

            var _txtWard = $.trim($("#selectWard option:selected").text());
            $('#hddtxtWard').val(_txtWard);

            $('#txtAddress').val($('#hddtxtWard').val() + ', ' + $('#hddtxtDistrict').val() + ', ' + $('#hddtxtProvince').val());

            var _onSuccess = function (data) {
                if (data == 'NOT_LOGIN')
                {

                }
                else if (data === 'false')
                {

                }
                else
                {
                    $("#divStreet").html(data);
                }
            };

            getAjax('<?php echo admin_url('ads/ajax_get_list_street'); ?>', params, '', 'GET', '', false, _onSuccess);
        }
    }

    function getStreetName(sel)
    {
        var id = sel.value;
        if (id == 0)
        {
            $('#hddtxtStreet').val('');
            $('#txtAddress').val($('#hddtxtWard').val() + ', ' + $('#hddtxtDistrict').val() + ', ' + $('#hddtxtProvince').val());
        }
        else
        {
            var _txtStreet = $.trim($("#selectStreet option:selected").text());
            $('#hddtxtStreet').val(_txtStreet);

            $('#txtAddress').val($('#hddtxtStreet').val() + ', ' + $('#hddtxtWard').val() + ', ' + $('#hddtxtDistrict').val() + ', ' + $('#hddtxtProvince').val());
        }
    }

</script>