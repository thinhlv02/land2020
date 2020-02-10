<?php $this->load->view($this->_template_f . 'menu_footer') ?>

<section class="footer">
    <div class="container">
        <div style="min-height: 200px">
            <div class="row">
                <div class="card mb-1" style="border: none !important;">
                    <div class="card-body line-height-2" style="background-color: #EDEDED">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="footer-bottom-end-row12" style="padding-bottom: 10px; color: #000;">
                                <strong style="font-size: 1.2em;"><?php echo $contact->company ?></strong>
                            </div>

                            <div class="footer-bottom-end-row12" style="color: #616161">
                                <strong>Tổng đài CSKH: <?php echo $contact->phone ?></strong>
                            </div>

                            <div class="footer-bottom-end-row12" style="color: #616161">
                                Copyright © 2015 - 2019 Batdongsanphucthinh.vn
                            </div>

                            <div class="footer-bottom-end-row12" style="color: #616161">
                                Email: <?php echo $contact->email ?>

                            </div>
                            <div class="footer-bottom-end-row12" style="color: #616161">
                                Giấy ĐKKD số: 0107708941 Do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp lần đầu ngày
                                14/11/2015
                                <br>Chịu trách nhiệm nội dung: Bà Nguyễn Hạ Vy - ® Ghi rõ nguồn
                                "Batdongsanphucthinh.vn" khi phát hành lại thông tin từ website này.
                                <br>Toàn bộ quy chế, quy định giao dịch chung được đăng tải trên website áp dụng từ ngày
                                14/11/2015.
                            </div>
                            <div class="footer-bottom-end-row12" style="color: #616161; position: relative;">
                                Phát triển bởi PhucthinhCorp
                                <a style="color: #616161" href="javascript:void(0)" target="_blank">http:batdongsanphucthinh.vn</a>

                            </div>
                            <div class="footer-bottom-end-row12">
                                <img src="<?php echo public_url('images/line-footer12.png') ?>" alt="" noloaderror="true">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12 text-center">

                            <a href="<?php echo base_url() ?>">
                                <img src="<?php echo public_url('images/logo.png') ?>" style="margin-top: 30px">
                            </a>

                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mt-2">
                            <div class="footer-title"><strong>THÔNG TIN LIÊN HỆ</strong></div>
                            <div>
                                <i class="mdi mdi-map-marker text-danger12"></i>
                                <span><?php echo $contact->address ?></span>
                            </div>
                            <div style="">
                                <span><i class="mdi mdi-phone text-danger12"></i> <?php echo $contact->phone ?></span>
                            </div>
                            <div style="">
                                <span><i class="mdi mdi-email-outline text-danger12"></i> <?php echo $contact->email ?></span>
                            </div>
                        </div>
                        <div class="col-md-2  col-sm-12 col-xs-12 mt-2">
                            <div class="footer-title"><strong>LIÊN KẾT</strong></div>
                            <ul>
                                <li><a href="<?php echo base_url('gioi-thieu-dich-vu') ?>"><i
                                                class="mdi mdi-information-outline text-danger12"></i> Giới thiệu</a>
                                </li>
                                <li><a href="<?php echo base_url('ho-tro') ?>"><i
                                                class="mdi mdi-key-outline text-danger12"></i> Hỗ trợ</a></li>
                                <li><a href="<?php echo base_url('dieu-khoan-su-dung') ?>"><i
                                                class="mdi mdi-settings-outline text-danger12"></i> Chính sách và điều
                                        khoản</a></li>
                                <li><a href="<?php echo base_url('bao-gia') ?>"><i
                                                class="mdi mdi-cash-usd text-danger12"></i> Báo Giá</a></li>
                                <li><a href="<?php echo base_url('lien-he') ?>"><i
                                                class="mdi mdi-contacts text-danger12"></i> Liên hệ</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 mt-2 text-center">

                            <!--                            <a href="--><?php //echo base_url() ?><!--">-->
                            <!--                                <img src=" -->
                            <?php //echo public_url('images/ads/default.png') ?><!--">-->
                            <!--                            </a>-->

                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbatdongsanphucthinhvn-1535407536595838%2F%3Fmodal%3Dadmin_todo_tour&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=166934463979079"
                                    width="340" height="214" style="border:none;overflow:hidden;width: 100%;"
                                    scrolling="no"
                                    frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body line-height-2 pt-0 p-1" style="background-color: #EDEDED">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2 class="icon-title mb-2" id="">
                                <strong class="bg">
                                    <i class="mdi mdi-monitor-multiple"></i>
                                </strong>
                                <span class="font-weight-600" style="font-size: 14px !important;">CÁC ĐẠI LÝ ỦY QUYỀN HỢP TÁC VỚI CHÚNG TÔI!</span>
                            </h2>

                        </div>

                        <?php foreach ($agencies as $key => $value) { ?>
                            <div class="col-md-4 col-sm-12 col-xs-12 mt-1">
                                <div class="footer-title pl-1">
                                    <strong><a href="<?php echo base_url('dai-ly#' . create_slug($value->name)) ?>"><?php echo $value->name ?></a></strong>
                                </div>
                                <div>
                                    <i class="mdi mdi-map-marker text-danger12"></i>
                                    <span><?php echo $value->address ?></span>
                                </div>
                                <div>
                                    <span><i class="mdi mdi-phone text-danger12"></i> <?php echo $value->phone ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<button onclick="topFunction()" id="myPageup" title="Go to top">
    <i class="mdi mdi-arrow-up-bold-circle-outline text-primary12 mdi-24px"></i>
</button>

<script>
    function updateView(id)
    {
        var _onSuccess = function (data) {

        };
        getAjax('<?php echo base_url('home/update_view'); ?>', 'id=' + UrlEncode.encode(id), '', 'GET', '', false, _onSuccess);
    }

    //page up top
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction()
    {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
        {
            document.getElementById("myPageup").style.display = "block";
        }
        else
        {
            document.getElementById("myPageup").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction()
    {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function get_district(sel)
    {
        var id = sel.value;

        if (id == 0)
        {
            $('#selectDistrict').empty();
            $('#selectWard').empty();
            $('#selectStreet').empty();
        }
        else
        {
            // ajax
            var params = {
                'id': id
            };

            var _onSuccess = function (data) {

                if (data == 'NOT_LOGIN')
                {
                    window.location.reload(true);
                }
                else if (data === 'false')
                {

                }
                else
                {

                    $("#divDistrict").html(data);
                }
            };//

            getAjax('<?php echo base_url('home/ajax_get_list_district'); ?>', params, '', 'GET', '', false, _onSuccess);
        }
    }

    function get_ward(sel)
    {
        var id = sel.value;

        if (id == 0)
        {
            $('#selectWard').empty();
            $('#selectStreet').empty();
        }
        else
        {
            var params = {
                'id': id
            };

            var _onSuccess = function (data) {

                if (data == 'NOT_LOGIN')
                {

                }
                else if (data === 'false')
                {

                }
                else
                {
                    $("#divWard").html(data);
                }
            };

            getAjax('<?php echo base_url('home/ajax_get_list_ward'); ?>', params, '', 'GET', '', false, _onSuccess);
        }
    }

    //add class span to menu-active when clicked
    $(document).ready(function () {
        $('.menu-active').each(function () {
            $(this).prepend('<span class="menu-active-span"></span>');
        });

        //process banner left, right, top on web
        var _widthWindow = $(window).width();
        var _widthContainer = $('.container').width() + 30;

        var _end = (_widthWindow - _widthContainer - 320);
        var _end = _end / 2 + 'px';

        $("#ban_wide_left").css({
            'left': _end,
        });

        $("#ban_wide_right").css({
            'right': _end,
        });
        $("#ban_wide_left").show();
        $("#ban_wide_right").show();

    });

</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5d0f3b4453d10a56bd7b6c63/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>

</html>