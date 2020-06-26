<div class="col-sm-2 col-md-2">
    <div class="box-module mt-2">
        <div class="bg-modul w-100 text-center">
            <h7>
                <i class="glyphicon glyphicon-search"></i> <?php echo $common_lang['search_title']; ?></h7>
        </div>
    </div>
    <div class="card12" style="border: 1px solid #cacfe7;">
        <div class="card-body pt-0 p-1" style="height: 385px;">

            <form id="formSearchLand" data-parsley-validate class="" method="post"
                  action=""
                  enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <!--                    <label for="email">Mã tin:</label>-->
                    <input type="text" class="form-control" placeholder="<?php echo 'Mã tin'; ?>" name="code">
                </div>
                <div class="form-group mt-3">
                    <!--                    <label for="email">Mã tin:</label>-->
                    <input type="text" class="form-control" placeholder="<?php echo $common_lang['search_phone']; ?>" name="phone">
                </div>
                <div class="form-group">
                    <!--                                <label for="email">Tỉnh thành</label>-->
                    <select class="form-control" name="province" onchange="get_district(this)">
                        <option value=""> <?php echo $common_lang['choose_province']; ?> </option>
<!--                        --><?php //echo $_GET['province'] ?>
                        <?php foreach ($lstProvince as $key => $value) { ?>
                            <option value="<?= $value->id ?>" <?php if (isset($_GET['province']) && $_GET['province'] == $value->id) echo 'selected' ?>>
                                <?php echo $value->_name ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <!--                                <label for="email">Quận Huyện</label>-->
                    <div class="" id="divDistrict">
                        <select class="form-control" name="district">
                            <option value="0"> <?php echo $common_lang['choose_district']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <!--                                <label for="email">Xã/phường</label>-->
                    <div class="" id="divWard">
                        <select class="form-control" name="ward">
                            <option value="0"> <?php echo $common_lang['choose_ward']; ?></option>
                        </select>
                    </div>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="email">Loại</label>-->
<!--                    <select class="form-control">-->
<!--                        <option value=""> -- --><?php //echo $common_lang['choose_type']; ?><!-- --</option>-->
<!--                        <option value="1"> --><?php //echo $common_lang['for_sale']; ?><!--</option>-->
<!--                        <option value="2"> --><?php //echo $common_lang['need_to_buy']; ?><!--</option>-->
<!--                    </select>-->
<!--                </div>-->
                <div class="text-center">
                    <button type="submit" class="btn btn-default btn-search w-100 white"><i class="glyphicon glyphicon-search"></i> <?php echo $common_lang['btn_search']; ?>
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script>
    $("#formSearchLand").submit(function (e) {
        // var userid = 12;
        // var server = 1;
        //prevent Default functionality
        e.preventDefault();
        // console.log('formAddProduct_gold111111111 =>>>>>> ' + userid);
        // var data = $("#formSearchLand").serialize() + '&userid=' + userid + '&server=' + server;
        var data = $("#formSearchLand").serialize();

        console.log('data =>>> gold => ' + data);

        var _onSuccess_gold = function (data) {
            console.log(data);
            // $("#question").html('');
            if (data == 'NOT_LOGIN')
            {
                window.location.reload(true);
            }
            else if (data === 'false')
            {
                alert('Danh mục "' + cat_name + '" không tồn tại!');
            }
            else
            {
                console.log(data);
                $("#result_search").html(data);
            }
        };


        getAjax('<?php echo base_url('home/ajax_search') ?>', data, 'POST', _onSuccess_gold);

    });
</script>