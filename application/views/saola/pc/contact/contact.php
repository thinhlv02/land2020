<section class="contact">
    <div class="container">
        <div class="title-section"><h2><?php echo 'Thông tin liên hệ' ?></h2></div>
        <div class="row">
            <div class="col-sm-12 col-md-12" style="margin-top: 20px">
                <iframe id="mapweb"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.189275883698!2d105.792728657928!3d21.017533996501108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDAxJzAzLjEiTiAxMDXCsDQ3JzM3LjgiRQ!5e0!3m2!1svi!2s!4v1557460619156!5m2!1svi!2s"
                        width="600" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6" style="margin-top: 10px">
                <div class="card">
                    <div class="card-body">
                        <div class="company-phone">
                            <i class="mdi mdi-phone text-danger" aria-hidden="true"></i> <span><strong
                                        style="color: #1B60A8"><?php echo $contact->phone ?></strong></span>
                        </div>
                        <div class="company-phone">
                            <i class="mdi mdi-email text-danger" aria-hidden="true"></i> <span><strong
                                        style="color: #1B60A8"><?php echo $contact->email ?></strong></span>
                        </div>
                        <div class="company-address">
                            <i class="mdi mdi-marker text-danger" aria-hidden="true"></i> <span><strong
                                        style="color: #1B60A8"><?php echo $contact->address ?></strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6" style="margin-top: 10px">
                <!--                <div class="title-section title-section-footer text-primary mb-5">-->
                <?php //echo $this->lang->line('feedback'); ?><!--</div>-->
                <div class="">
                    <input type="text" class="form-control" id="txtName" required
                           placeholder="<?php echo $this->lang->line('plhName'); ?>">
                    <input type="text" class="form-control" id="txtEmail" required
                           placeholder="<?php echo $this->lang->line('plhEmail'); ?>">
                    <textarea type="text" class="form-control" id="txtMessage" required rows="5"
                              placeholder="<?php echo $this->lang->line('plhMessage'); ?>"></textarea>
                    <input type="submit" value="<?php echo $this->lang->line('btnSend'); ?>"
                           class="btn btn-success btn-sm mt-3" id="btnSend">
                </div>
            </div>

        </div>
    </div>

    <div id="result_test"></div>


</section>

<script>
    $(document).ready(function () {
        $('#btnSend').click(function () {
            var name = $('#txtName').val();
            var email = $('#txtEmail').val();
            var message = $('#txtMessage').val();
            if (name.length <= 0) {
                alert('Bạn chưa nhập tên');
            } else if (email.length <= 0) {
                alert('Bạn chưa nhập email');
            } else if (message.length <= 0) {
                alert('Bạn chưa nhập nội dung tin nhắn');
            } else {
                $.ajax({
                    url: "<?php echo base_url('home/feedback')?>",
                    type: "POST",
                    dataType: "text",
                    data: {
                        name: name,
                        email: email,
                        message: message
                    },
                    success: function (result) {
                        console.log(result);
                        $('#result_test').html(result);
                        if (result == true) {
                            alert('Chúng tôi đã ghi nhận tin nhắn của bạn và sẽ liên hệ lại với bạn trong thời gian sớm nhất, xin cảm ơn!');
                        } else {
                            alert('Có lỗi xảy ra, vui lòng thử lại!');
                        }
                    }
                });
            }
        });
    });

</script>

<style>
    #mapweb {
        width: 100% !important;
    }
</style>