<div class="title-recruit"><?php echo $this->lang->line('opening'); ?></div>
<?php foreach ($recruitment as $row) { ?>
    <div class="item-recruit">
        <div>
            <?php switch ($row->department) {
                case 1:
                    echo '<span class="label label-info">PHP</span>';
                    break;
                case 2:
                    echo '<span class="label label-info">.NET</span>';
                    break;
                case 3:
                    echo '<span class="label label-info">Javascript</span>';
                    break;
                case 4:
                    echo '<span class="label label-primary">Mobile</span>';
                    break;
                case 5:
                    echo '<span class="label label-primary">iOS</span>';
                    break;
                case 6:
                    echo '<span class="label label-primary">Android</span>';
                    break;
                case 7:
                    echo '<span class="label label-warning">' . $this->lang->line('tester') . '</span>';
                    break;
                case 8:
                    echo '<span class="label label-warning">' . $this->lang->line('tester') . '</span>';
                    break;
                case 9:
                    echo '<span class="label label-success">' . $this->lang->line('business') . '</span>';
                    break;
            } ?>

            <span class="item-date"><?php echo date('d/m/y', $row->created) ?></span>
        </div>
        <div class="title-item-recruit"><?php echo $language == 'vn' ? $row->title : $row->title_en ?></div>
        <div class="des-item-recruit"><?php echo substr(strip_tags($language == 'vn' ? $row->content : $row->content_en), 0, 150) . '...' ?></div>
        <div class="item-recruit-hover">
            <div class="group-btn-recruit">
                <a class="btn btn-success btn-sm btnRecruit"
                   href="<?php echo base_url('tuyen-dung/' . create_slug($row->title) . '-' . $row->id . '.html') ?>">
                    <?php echo $this->lang->line('detail'); ?>
                </a>
                <a class="btn btn-default btn-sm btnRecruit"
                   data-toggle="modal"
                   data-target="#recruitModal"
                   data-id="<?php echo $row->id ?>"
                   data-title="<?php echo $language == 'vn' ? 'Ứng tuyển vào: ' . $row->title : 'Apply for: ' . $row->title_en ?>"
                ><?php echo $this->lang->line('apply'); ?></a>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="recruitModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal-title-recruit">Ứng tuyển vào vị trí tuyển dụng: </h4>
                <div id="test"></div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-recruit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-3"><?php echo $this->lang->line('fullname'); ?>:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtNameRecruit" id="txtNameRecruit" required
                                   placeholder="<?php echo $this->lang->line('plhName'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtEmailRecruit" id="txtEmailRecruit" required
                                   placeholder="<?php echo $this->lang->line('plhEmail'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3"><?php echo $this->lang->line('phone'); ?>:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtPhoneRecruit" id="txtPhoneRecruit" required
                                   placeholder="<?php echo $this->lang->line('plhPhone'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3"><?php echo $this->lang->line('birthday'); ?>:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtBirthdayRecruit" id="txtBirthdayRecruit"
                                   required readonly placeholder="<?php echo $this->lang->line('plhBirthday'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3"><?php echo $this->lang->line('sex'); ?>:</label>
                        <div class="col-sm-9">
                            <select class="form-control" required name="slSex" id="slSex">
                                <option value="1"><?php echo $this->lang->line('male'); ?></option>
                                <option value="2"><?php echo $this->lang->line('female'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">File CV:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="file_cv" id="file_cv">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="hidden" value="" id="idRecruit" name="idRecruit">
                            <input type="submit" value="<?php echo $this->lang->line('apply'); ?>"
                                   class="btn btn-primary" id="btnRecruitSubmit">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $("#txtBirthdayRecruit").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });

    function submitRecruit(formData) {
        $.ajax({
            url: "<?php echo base_url('home/submitRecruit')?>",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (data, status) {
//                console.log(data);
                data = JSON.parse(data);
                if (status === 'success') {
                    if (data.status === 'success')
                        alert('Chúng tôi đã ghi nhận phần ứng tuyển của bạn và sẽ liên hệ lại với bạn trong thời gian sớm nhất, xin cảm ơn!');
                    else {
                        alert(data.msg);
                    }
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            }
        });
    }
</script>