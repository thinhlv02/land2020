<select class="select2_group form-control" name="district" id="selectDistrict" onchange="get_ward(this)">
    <option value="0">Quận/huyện</option>
    <?php foreach ($lstdata as $key => $value) { ?>

        <option value="<?php echo $value['id'] ?>">
            <?php echo $value['_prefix'] . ' ' . $value['_name'] ?>
        </option>
    <?php } ?>

</select>
