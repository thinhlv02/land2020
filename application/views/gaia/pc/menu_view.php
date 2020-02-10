<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="sub-nav">
    <div class="logo">
        <a href="<?php echo base_url() ?>"><img src="<?php echo public_url('images/logo.png')?>"></a>
<!--        <a href="--><?php //echo base_url()?><!--">Trao tiện ích, nhận tin yêu</a>-->
    </div>
<!--    switch language -->
    <div id="language">
        <a href="<?php echo $language == 'vietnamese' ? base_url('en/' .getLastUri()) : base_url('vn/'.getLastUri()) ?>">
            <img src="<?php echo $language == 'vietnamese' ? public_url('images/flag_us.png') : public_url('images/flag_vn.png') ?>"/>
            <?php echo $language == 'vietnamese' ? 'English' : 'Vietnamese' ; ?>
        </a>
    </div>

    <ul class="ul-large">
        <li class="<?php echo !empty($li_1) ? 'menu-active' : ''?>" title="<?php echo $common_lang['home']; ?>"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> <?php echo $common_lang['home']; ?></a></li>
        <li class="<?php echo !empty($li_2) ? 'menu-active' : ''?>" title="<?php echo $common_lang['lmenu_intro']; ?>"><a href="<?php echo base_url('gioi-thieu-dich-vu')?>"> <?php echo $common_lang['lmenu_intro']; ?></a></li>
        <li class="<?php echo !empty($li_7) ? 'menu-active' : ''?>" title="<?php echo $common_lang['lmenu_price']; ?>"><a href="<?php echo base_url('bao-gia')?>"> <?php echo $common_lang['lmenu_price']; ?></a></li>
<!--        <li class="--><?php //echo !empty($li_3) ? 'menu-active' : ''?><!--" title="--><?php //echo $common_lang['lmenu_support']; ?><!--"><a href="--><?php //echo base_url('ho-tro')?><!--"> --><?php //echo $common_lang['lmenu_support']; ?><!--</a></li>-->
<!--        <li class="--><?php //echo !empty($li_6) ? 'menu-active' : ''?><!--" title="--><?php //echo $common_lang['lmenu_news']; ?><!--"><a href="--><?php //echo base_url('tin-tuc')?><!--"> --><?php //echo $common_lang['lmenu_news']; ?><!--</a></li>-->
        <li class="<?php echo !empty($li_4) ? 'menu-active' : ''?>" title="<?php echo $common_lang['lmenu_policy']; ?>"><a href="<?php echo base_url('dieu-khoan-su-dung')?>"> <?php echo $common_lang['lmenu_policy']; ?></a></li>
        <li class="<?php echo !empty($li_5) ? 'menu-active' : ''?>" title="<?php echo $common_lang['lmenu_contact']; ?>"><a href="<?php echo base_url('lien-he')?>"> <?php echo $common_lang['lmenu_contact']; ?></a></li>
<!--        register - login-->
        <?php
        if (empty($user_login)) { ?>

            <li class="user_style pr-0 text-bold-600" id="myBtnRegister" title="<?php echo $this->lang->line('register'); ?>" >
                <a href="javascript:void(0)" class="text-uppercase">
                    <i class="fa fa-user-plus text-danger" aria-hidden="true"></i>
                    <?php echo $this->lang->line('register'); ?>
                </a>
            </li>

            <li class="user_style p-0 text-bold-600" id="myBtnLogin" title="<?php echo $this->lang->line('login'); ?>">
                <a href="javascript:void(0)" class="menu_login text-uppercase">
                    <i class="fa fa-sign-in-alt text-danger" aria-hidden="true"></i>
                    <?php echo $this->lang->line('login'); ?>
                </a>
            </li>

        <?php }
        ?>

        <li>
            <?php
            if (!empty($user_login)) { ?>
                <li class="user_style text-bold-600">
                    <a href="<?php echo base_url('trang-ca-nhan'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_login->fullname; ?></a>
                </li>

                 <li class="user_style text-bold-600"><a href="javascript:void(0)" onclick="confirm_logout()"><i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                         <?php echo $login_lang['logout'] ?> </a></li>
            <?php }
        ?>
        </li>
    </ul>

    <nav role='navigation' class="nav-small">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <a href="<?php echo base_url()?>"><li><?php echo $common_lang['home']; ?></li></a>
                <a href="<?php echo base_url('gioi-thieu-dich-vu')?>"><li><?php echo $common_lang['lmenu_intro']; ?></li></a>
<!--                <a href="--><?php //echo base_url('ho-tro')?><!--"><li>--><?php //echo $common_lang['lmenu_support']; ?><!--</li></a>-->
<!--                <a href="--><?php //echo base_url('tin-tuc')?><!--"><li>--><?php //echo $common_lang['lmenu_news']; ?><!--</li></a>-->
                <a href="<?php echo base_url('dieu-khoan-su-dung')?>"><li><?php echo $common_lang['lmenu_policy']; ?></li></a>
                <a href="<?php echo base_url('lien-he')?>"><li><?php echo $common_lang['lmenu_contact']; ?></li></a>
            </ul>
        </div>
    </nav>

</div>

<!--modal register-->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModalRegister" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-success text-center text-uppercase">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-user"></span> <?php echo $login_lang['register_title']; ?></h4>
                </div>
                <div class="modal-body">
                    <form12 role="form">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-phone"></span> <?php echo $login_lang['phone']; ?></label>
                            <p class="text-danger mb-0" id="errPhone" style="display: none;"><span class="glyphicon glyphicon-alert"></span> <?php echo $login_lang['error_phone']; ?></p>
                            <input type="text" class="form-control" id="txtPhone" placeholder="<?php echo $login_lang['phone']; ?>" onchange="banItemChange('#txtPhone', '#errPhone')">
                        </div>

                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> <?php echo $login_lang['password']; ?></label>
                            <p class="text-danger mb-0" id="errPassWordRe" style="display: none;"><span class="glyphicon glyphicon-alert"></span> <?php echo $login_lang['error_password']; ?></p>

                            <input type="password" class="form-control" id="txtPassWordRe" placeholder="<?php echo $login_lang['password']; ?>" onchange="banItemChange('#txtPassWordRe', '#errPassWordRe')">
                        </div>

                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> <?php echo $login_lang['fullname']; ?></label>
                            <p class="text-danger mb-0" id="errFullNameRe" style="display: none;"><span class="glyphicon glyphicon-alert"></span> <?php echo $login_lang['error_fullname']; ?></p>
                            <input type="text" class="form-control" id="txtFullNameRe" placeholder="<?php echo $login_lang['fullname']; ?>" onchange="banItemChange('#txtFullNameRe', '#errFullNameRe')">
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked><?php echo $login_lang['remember']; ?></label>
                        </div>
                        <p><?php echo $login_lang['policies1']; ?> <a href="#" style="color:dodgerblue"><?php echo $login_lang['policies2']; ?></a>.</p>
                        <button type="submit" class="btn btn-success btn-block" onclick="chkFormRegister()"><span class="glyphicon glyphicon-off"></span>
                            <?php echo $login_lang['btn_register']; ?></button>
                    </form12>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?php echo $login_lang['btn_cancel']; ?></button>

                </div>
            </div>

        </div>
    </div>
</div>
<!--Modal end register-->

<!--modal login-->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModalLogin" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-success text-center text-uppercase">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-log-in"></span> <?php echo $login_lang['login_title'] ?></h4>
                </div>
                <div class="modal-body">
                    <form12 role="form">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-phone"></span> <?php echo $login_lang['phone']; ?></label>
                            <p class="text-danger mb-0" id="errUserName" style="display: none;"><span class="glyphicon glyphicon-alert"></span> <?php echo $login_lang['error_username']; ?></p>
                            <input type="text" class="form-control" id="txtUserName" placeholder="<?php echo $login_lang['phone']; ?>" onchange="banItemChange('#txtUserName', '#errUserName')">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> <?php echo $login_lang['password']; ?></label>
                            <p class="text-danger mb-0" id="errPassWord" style="display: none;"><span class="glyphicon glyphicon-alert"></span> <?php echo $login_lang['error_password']; ?></p>

                            <input type="password" class="form-control" id="txtPassWord" placeholder="<?php echo $login_lang['password']; ?>" onchange="banItemChange('#txtPassWord', '#errPassWord')">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked><?php echo $login_lang['remember']; ?></label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" onclick="chkFormLogin()"><span class="glyphicon glyphicon-off"></span> <?php echo $login_lang['btn_login']; ?></button>
                    </form12>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?php echo $login_lang['btn_cancel']; ?></button>
                    <p><?php echo $login_lang['not_member']; ?> <a href="#"><?php echo $login_lang['btn_register']; ?></a></p>
                    <p><?php echo $login_lang['forgot']; ?> <a href="#"><?php echo $login_lang['password']; ?>?</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!--modal end login-->

<script>
    $(document).ready(function(){
        $('.menu-active').each(function() {
            $(this).prepend('<span></span>');
        });

        //login
        $("#myBtnLogin").click(function(){
            $("#myModalLogin").modal();
        });

        //register
        $("#myBtnRegister").click(function(){
            $("#myModalRegister").modal();
        });
    });

    function show_alert() {
        swal({
            title: "<?php echo $this->lang->line('oops'); ?>",
            text: "<?php echo $this->lang->line('warning'); ?>",
            icon: "warning",
            buttons: {},
            timer: 1500
        });
        $(".swal-text").addClass("font-weight-bold");
    }

    //process login
    function banItemChange(id, errId)
    {
        var val = $(id).val().trim();
        var isShow = val == '' ? true : false;
        showErrBanItem(errId, isShow);
    }

    function showErrBanItem(errId, isShow)
    {
        if(isShow)
        {
            $(errId).show();
        }
        else
        {
            $(errId).hide();
        }
    }

    function chkFormLogin() {
        // check banner name
        var chkUserName = false;
        var userName = $('#txtUserName').val().trim();

        if(userName == '')
        {
            chkUserName = false;
            $('#errUserName').show();
        }
        else
        {
            chkUserName = true;
            $('#errUserName').hide();
        }

        //check psw
        var chkPassWord = false;
        var passWord = $('#txtPassWord').val().trim();

        if(passWord == '')
        {
            chkPassWord = false;
            $('#errPassWord').show();
        }
        else
        {
            chkPassWord = true;
            $('#errPassWord').hide();
        }

        if(chkUserName && chkPassWord)
        {
            swal({
                text: "<?php echo $login_lang['lbl_msg_form_confirm_login']; ?>",
                icon: "warning",
                buttons: {
                    confirm : {text:'<?php echo $common_lang['confirm_yes']; ?>',className:'bg-primary'},
                    cancel_: {text: '<?php echo $common_lang['confirm_no']; ?>', className: 'btn-danger'}
                },
            }).then((will)=>{

                if(will === true)
                {
                    var _onSuccess = function (data) {
                        var check = $.trim(data);
                        if ( check === 'ok')
                        {
                            window.location.reload(true);
                            window.location.href = '<?php echo base_url('trang-ca-nhan')?>';
                        }
                        else {
                            swal({
                                title: "<?php echo $common_lang['oops']; ?>",
                                text: "<?php echo $login_lang['error_mess']; ?>",
                                icon: "warning",
                                buttons: {},
                                timer: 1500
                            });
                            $(".swal-text").addClass("font-weight-bold");
                        }
                    };

                    var params = {
                       'username': userName,
                       'password': passWord,
                    };
                    getAjax('<?php echo base_url('home/user_login'); ?>', params, '', 'GET', '', false, _onSuccess);

                }
            });
            $(".swal-text").addClass("font-weight-bold");

        }
        else
        {
            swal({
                title: "<?php echo $common_lang['oops']; ?>",
                text: "<?php echo $login_lang['lbl_msg_form_error_add']; ?>",
                icon: "warning",
                buttons: {},
                timer: 1500
            });
            $(".swal-text").addClass("font-weight-bold");
        }
    }

    //check form register
    function chkFormRegister() {
        // check phone
        var chkPhone = false;
        var userPhone = $('#txtPhone').val().trim();

        if(userPhone == '')
        {
            chkPhone = false;
            $('#errPhone').show();
        }
        else
        {
            chkPhone = true;
            $('#errPhone').hide();
        }

        //check psw
        var chkPassWord = false;
        var passWord = $('#txtPassWordRe').val().trim();

        if(passWord == '')
        {
            chkPassWord = false;
            $('#errPassWordRe').show();
        }
        else
        {
            chkPassWord = true;
            $('#errPassWordRe').hide();
        }

        // check full name
        var chkFullName = false;
        var fullName = $('#txtFullNameRe').val().trim();

        if(fullName == '')
        {
            chkFullName = false;
            $('#errFullNameRe').show();
        }
        else
        {
            chkFullName = true;
            $('#errFullNameRe').hide();
        }

        if(chkFullName && chkPhone && chkPassWord)
        {
            swal({
                text: "<?php echo $login_lang['lbl_msg_form_confirm_register']; ?>",
                icon: "warning",
                buttons: {
                    confirm : {text:'<?php echo $common_lang['confirm_yes']; ?>',className:'bg-primary'},
                    cancel_: {text: '<?php echo $common_lang['confirm_no']; ?>', className: 'btn-danger'}
                },
            }).then((will)=>{

                if(will === true)
                {
                    var _onSuccess = function (data) {
                        var obj = jQuery.parseJSON(data);

                        if (obj.err_phone == 'true')
                        {
                            alert("<?php echo $login_lang['invalid_phone']; ?>");
                        }

                        if (obj.exits_phone == 'true')
                        {
                            alert("<?php echo $login_lang['exits_phone']; ?>");
                        }

                        if ( obj.ok == 'ok')
                        {
                            window.location.reload(true);
                        }
                        if ( obj.failed == 'failed') {
                            swal({
                                title: "<?php echo $common_lang['oops']; ?>",
                                text: "<?php echo $login_lang['error_mess']; ?>",
                                icon: "warning",
                                buttons: {},
                                timer: 1500
                            });
                            $(".swal-text").addClass("font-weight-bold");
                        }
                    };

                    var params = {
                        'phone': userPhone,
                        'password': passWord,
                        'fullname': fullName,
                    };
                    console.log(params);
                    getAjax('<?php echo base_url('home/user_register'); ?>', params, '', 'GET', '', false, _onSuccess);

                }
            });
            $(".swal-text").addClass("font-weight-bold");

        }
        else
        {
            swal({
                title: "<?php echo $common_lang['oops']; ?>",
                text: "<?php echo $login_lang['lbl_msg_form_error_add']; ?>",
                icon: "warning",
                buttons: {},
                timer: 1500
            });
            $(".swal-text").addClass("font-weight-bold");
        }
    }

    //confirm logut
    function confirm_logout() {
        swal({
            title: "<?php echo $common_lang['oops']; ?>",
            text: "<?php echo $login_lang['lbl_msg_form_confirm_logout']; ?>",
            icon: "warning",
            buttons: {
                confirm : {text:'<?php echo $common_lang['confirm_yes']; ?>',className:'bg-primary'},
                cancel_: {text: '<?php echo $common_lang['confirm_no']; ?>', className: 'btn-danger'}
            },
        }).then((will)=>{

            if(will === true)
            {
                window.location.href = '<?php echo base_url('home/logout')?>';
            }
        });
        $(".swal-text").addClass("font-weight-bold");
    }

</script>