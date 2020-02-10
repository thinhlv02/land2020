<select class="select2_group form-control" name="street" id="selectStreet">
    <!--                            --><?php //pre($type_status) ?>
    <option value="0">-- Không có --</option>
    <?php foreach ($lstdata as $key => $value) { ?>
        <option value="<?php echo $value['id'] ?>">
            <?php echo $value['_name'] ?>
        </option>
    <?php } ?>

</select>
