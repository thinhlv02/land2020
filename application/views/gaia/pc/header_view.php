<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) && $title ? $title : 'Đơn giản hóa việc bán hàng, vì chúng tôi luôn bên cạnh bạn. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất' ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo public_url('images/favicon.png') ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo isset($description) && $description ? $description : 'Bất động sản phúc thịnh - Kênh thông tin số 1 về bất động sản tại Việt Nam. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất' ?>">
    <meta name="apple-itunes-app" content="app-id=1455427957">
    <?php echo isset($robots) && $robots ? '<meta name="robots" content="' . $robots . '">' : '' ?>
    <?php echo isset($keywords) && $keywords ? '<meta name="keywords" content="' . $keywords . '"/>' : '' ?>
    <?php echo isset($canonical) && $canonical ? '<link rel="canonical" href="' . $canonical . '"/>' : '' ?>

    <meta property="og:title" content="<?php echo isset($title) && $title ? $title : 'Bất động sản phúc thịnh - Kênh thông tin số 1 về bất động sản tại Việt Nam. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất' ?>"/>
    <meta property="og:description" content="<?php echo isset($description) && $description ? $description : 'Bất động sản phúc thịnh - Kênh thông tin số 1 về bất động sản tại Việt Nam. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất' ?>"/>
    <meta property="og:url" content="<?php echo isset($page_url) ? $page_url : base_url(); ?>"/>
    <meta property="og:site_name" content="Bất động sản phúc thịnh - Kênh thông tin số 1 về bất động sản tại Việt Nam. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất"/>
    <meta property="og:image" content="<?php echo isset($image) ? $image : public_url('images/og_image.png') ?>"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="200"/>
    <meta property="og:type" content="website"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'style.css'; ?>">
    <link href="<?php echo base_url() . 'public/css/' . $template_f . 'responsive.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!--thinhlv add css-->
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'vendors.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'base.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'sweetalert.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'bootstrap.min.bs4.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'custom.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'lightslider.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'bxslider/css/jquery.bxslider.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'public/css/' . $template_f . 'hp.css'; ?>">
    <!--End thinhlv add css-->

    <!--<script src="--><?php //echo public_url('js/jquery.min.js')?><!--"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="<?php echo public_url() . 'js/' . $template_f . 'bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'public/js/' . $template_f . 'common.js'; ?>"></script>
    <script src="<?php echo base_url() . 'public/js/' . $template_f . 'lightslider.js'; ?>"></script>
    <script src="<?php echo base_url() . 'public/js/' . $template_f . 'bxslider/jquery.bxslider.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'public/js/' . $template_f . 'bxslider/jquery.flexisel.js'; ?>"></script>
    <script src="<?php echo base_url() . 'public/js/' . $template_f . 'sweetalert.min.js'; ?>"></script>
</head>
<body>
<?php $this->load->view($this->_template_f . 'menu_view') ?>
<?php $this->load->view($this->_template_f . 'banner_view') ?>
