
<div class="row col-md-3 col-sm-6 col-xs-12">
    <select class="form-control" id="slType">
        <option value="1">Khách hàng</option>
        <option value="2">Kỹ thuật viên</option>
        <option value="3">Cộng tác viên</option>
    </select>
</div>

<div class="x_panel" style="margin-top: 20px">
    <div class="x_title">
        <h2>Danh sách</h2>
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
        <div class="table-reponsive" id="table-question">
            <?php $this->load->view('admin/question/table_question')?>
        </div>
        <!-- <a href="#" class="btn btn-danger">Xóa đã chọn </a> -->
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#slType').on("change", function () {
            console.log($(this).val());
            var type = $(this).val();
            $.ajax({
                url: "<?php echo admin_url('question/get_list_by_type')?>",
                type: 'post',
                data: {
                    type: type
                },
                success: function (msg) {
                    $('#table-question').html(msg);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        })
    });

    function confirmDel(id) {
        if(confirm('Bạn có chắc chắn muốn xóa?')){
//            console.log('delll');
            window.location.href = '<?php echo base_url('admin/ads/del/')?>' + id;
        }
    }
</script>