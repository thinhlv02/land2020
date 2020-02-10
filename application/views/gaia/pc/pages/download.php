<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view($this->_template_f . 'header_view') ?>
</head>
<body>
<?php $this->load->view($this->_template_f . 'menu_view') ?>

<div style="margin-top: 60px">
    <?php $this->load->view($this->_template_f . 'home/download') ?>
</div>

<?php $this->load->view($this->_template_f . 'footer_view') ?>
</body>
</html>