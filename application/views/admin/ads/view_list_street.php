<select class="select2_group form-control" name="street" id="selectStreet" onchange="getStreetName(this)">
    <option value="0">-- Không có --</option>
    <?php foreach ($lstdata as $key => $value) { ?>
        <option value="<?php echo $value['id'] ?>">
            <?php echo $value['_prefix'] . ' ' . $value['_name'] ?>
        </option>
    <?php } ?>

</select>
