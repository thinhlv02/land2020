<section class="recruitment">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="title-section"><?php echo $this->lang->line('recruit'); ?></div>
                <div class="wrapper-recruitment">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="title-recruit"><?php echo $this->lang->line('department'); ?></div>
                        <ul class="recruit-menu">
                            <li>
                                <a href="<?php echo base_url('tuyen-dung/ky-thuat.html') ?>"><?php echo $this->lang->line('technical'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('tuyen-dung/van-hanh-kiem-thu.html') ?>"><?php echo $this->lang->line('tester'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('tuyen-dung/kinh-doanh.html') ?>"><?php echo $this->lang->line('business'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-6">
                        <?php $this->load->view($recruit_temp); ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 register-email">
                        <div class="title-recruit"><?php echo $this->lang->line('subscribe'); ?></div>
                        <form id="form-recruit-reg">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtNameReg" name="txtNameReg" required
                                       placeholder="<?php echo $this->lang->line('plhName'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtEmailReg" name="txtEmailReg" required
                                       placeholder="<?php echo $this->lang->line('plhEmail'); ?>">
                            </div>
                            <input type="submit" value="<?php echo $this->lang->line('btnSubscribe'); ?>"
                                   class="btn btn-success btn-sm" id="btnSendReg">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function submitRecruitReg(formData) {
        $.ajax({
            url: "<?php echo base_url('home/regRecruit')?>",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (data, status) {
                console.log(data);
                data = JSON.parse(data);
                if (status === 'success') {
                    if (data.status === 'success') {
                        $('#txtNameReg').val('');
                        $('#txtEmailReg').val('');
                        alert('Cảm ơn bạn đã đăng ký nhận tin tuyển dụng của chúng tôi. Mọi thông tin tuyển dụng mới sẽ được gửi tới email đã đăng ký của bạn!');
                    } else {
                        alert(data.msg);
                    }
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            }
        });
    }
</script>
