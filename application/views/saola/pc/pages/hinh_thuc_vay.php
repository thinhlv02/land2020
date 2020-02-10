
<ol class="breadcrumb">
    <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
    <li class="active"><?php echo $product->name ?></li>
</ol>

<div class="detail-body">
    <?php echo $product->content?>
</div>
<div class="detail-contact">
    <p>
        <strong>Thông tin liên hệ: </strong><?php echo $contact->phone ?><br>
        <strong>Địa chỉ:</strong>  <?php echo $contact->address?>
    </p>
</div>
<a href="<?php echo base_url('dang-ky-vay-von.html')?>" class="btn btn-success" style="margin: 20px 0px; padding: 12px" >ĐĂNG KÝ NGAY</a>

<div class="comments">
    <p style="font-size: 18px">Bình luận</p>
    <div class="wrap-form-comment">
        <div class="title-form"><?php echo $product->name?></div>
        <div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Họ tên</label>
                    <input type="text" class="form-control" id="txtName" placeholder="Nhập họ tên">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtPhone">Số điện thoại</label>
                    <input type="text" class="form-control" id="txtPhone" placeholder="Nhập số điện thoại">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="txtContent">Nội dung</label>
                <textarea type="text" class="form-control" id="txtContent" placeholder="Nhập nội dung" rows="5"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Gửi bình luận" id="btnSendComment"/>
        </div>
    </div>
    <div id="wrap-user-comment">
        <?php foreach ($comments as $comment){ ?>
            <div class="user-comment">
                <div><strong><?php echo $comment->name?></strong> -
                    <?php echo substr($comment->created, 0, 10)?>
                </div>
                <div><?php echo $comment->content ?></div>
            </div>
        <?php }?>
    </div>
    <?php if(sizeof($comments) > 0){ ?>
        <div id="load-more" style="margin-top: 20px; cursor: pointer">
            <a>Tải thêm</a>
        </div>
    <?php }?>
</div>

<script>
    $(document).ready(function () {
        $('#btnSendComment').click(function () {
            var name = $('#txtName').val();
            var phone = $('#txtPhone').val();
            var content = $('#txtContent').val();
            if(name.length <= 0){
                alert('Bạn chưa nhập họ tên');
            }
            else if(phone.length <= 0){
                alert('Bạn chưa nhập số điện thoại');
            }
            else if(!/^0[1-9][0-9]{8,9}/.test(phone)){
                alert('Số điện thoại không đúng!');
            }
            else if(content.length <= 0){
                alert('Bạn chưa nhập nội dung');
            }
            else{
                $.ajax({
                    url : "<?php echo base_url('home/gui_binh_luan')?>",
                    type : "POST",
                    dataType:"text",
                    data : {
                        name: name,
                        phone: phone,
                        content: content
                    },
                    success : function (result){
                        result = JSON.parse(result);
                        if(result.status){
                            $('#wrap-user-comment').prepend(
                                '<div class="user-comment">' +
                                '<div><strong>' + name + '</strong> - ' + result.created.slice(0, 10) + '</div>' +
                                '<div>' + content + '</div>' +
                                '</div>'
                            ).fadeIn('slow');
                            $('#txtName').val('');
                            $('#txtPhone').val('');
                            $('#txtContent').val('');
                            setTimeout(function () {
                                alert('Đã gửi bình luận của bạn');
                            }, 100);
                        }
                    }
                });
            }
        });

        $('#load-more').click(function () {
            $.ajax({
                url : "<?php echo base_url('home/load_more')?>",
                type : "POST",
                dataType:"text",
                success : function (result){
                    result = JSON.parse(result);
                    console.log(result);
                    result.comments.forEach(function(comment){
                        $('#wrap-user-comment').append(
                        '<div class="user-comment">' +
                        '<div><strong>' + comment.name + '</strong> - ' + comment.created.slice(0, 10) + '</div>' +
                        '<div>' + comment.content + '</div>' +
                        '</div>'
                    ).fadeIn('slow');
                    })
                    if(result.status){
                        $('#load-more').hide();
                    }
                }
            });
        })
    });
</script>

