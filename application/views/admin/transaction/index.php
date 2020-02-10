<div class="page-title" style="height: auto">
    <div class="title_left">
        <h3>Giao dịch</h3>
    </div>
    <div class="clearfix"></div>

</div>

<?php if (isset($message))
{
    $this->load->view('admin/message', $this->data);
} ?>

<?php $this->load->view($view) ?>

<style type="text/css">
    td {
        vertical-align: middle !important;
    }

    .action a {
        font-size: 22px;
        display: block;
        cursor: pointer;
    }
</style>