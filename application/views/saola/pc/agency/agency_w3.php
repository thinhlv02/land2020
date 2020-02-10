<div class="container">
    <div class="title-section"><h2><?php echo 'Danh sách các Chuyên viên tư vấn đã hợp tác với chúng tôi !' ?></h2></div>
    <div class="row mt-5">
        <div class="card">
            <div class="card-body">
                <?php foreach ($agencies as $key => $value) { ?>
                    <div class="col-sm-4 col-md-4">
                        <div class="card">
<!--                            <img src="https://w3schools.com/w3images/team1.jpg" alt="Jane" style="width:100%">-->
                            <div class="card-body">
                                <h2><?php echo $value->name ?></h2>
                                <p class="title"><?php echo $value->phone ?></p>
                                <p><?php echo $value->address ?></p>
                                <p><?php echo $value->name ?></p>
                                <p>
                                    <button class="button">Contact</button>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        if (window.location.href.includes("div-panel")) {
            $(document).scrollTop(450);
        }
    });
</script>

<style>
    /*.avatar {*/
    /*    vertical-align: middle;*/
    /*    width: 50px;*/
    /*    height: 50px;*/
    /*    border-radius: 50%;*/
    /*}*/
</style>