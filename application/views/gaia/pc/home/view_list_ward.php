<!--<select class="select2_group form-control" name="ward" id="selectWard" onchange="get_street(this)">-->
<select class="select2_group form-control" name="ward" id="selectWard">
    <!--                            --><?php //pre($type_status) ?>
    <option value="0">Xã/phường</option>
    <?php foreach ($lstdata as $key => $value) { ?>
        <option value="<?php echo $value['id'] ?>">
            <?php echo $value['_name'] ?>
        </option>
    <?php } ?>

</select>
