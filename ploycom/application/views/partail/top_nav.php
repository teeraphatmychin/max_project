<style media="screen">
    .sub-top-menu .col.l2{
        width:16.66666666666667% !important;
    }
</style>
<div class="print-hide" style="position:relative">
    <div class="top" style="z-index:5;background-color:#f7f7f7;color:rgba(0,0,0,.5) !important;">
        <div class="hide-small hide-medium">
            <div class="xlarge row container border-bottom">
                <div class="button center padding-small left col l3 m3 s3 hover-none">
                    <a href="<?php echo $this->base_url('product') ?>">
                        <img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" alt="ploycom" width="65px">
                    </a>
                </div>
                <!-- <div class="button center padding-small left col l3 m3 s3 hover-none" id="open-sidebar">☰</div> -->
                <div class="col l6 m4 s3 padding-small">
                    <form class="d-flex round form-search" action="<?php echo $this->base_url('product/search/')?>" method="get" style="position:relative">
                        <?php if (isset($search) && !empty($search)): $value_search = $search; else: $value_search = ''; endif; ?>
                            <input type="search" name="keyword" class="input round border medium" value="<?php echo $value_search ?>" placeholder="ค้นหาสินค้า" required style="outline:none;position:relative;">
                            <button type="submit" class="button large btn-search hover-text-theme border-left bg-none"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col l3 m5 s3 padding-small right-align">
                    <a href="<?php echo $this->base_url('cart/') ?>" class="button hover-text-theme xxlarge link-cart left margin-left bg-none" style="margin-top: -9px;padding:0px 0px;position:relative">
                        <i class="fa fa-shopping-cart"></i><div class='bg-none amount-cart center'></div>
                    </a>
                    <?php if (isset($_SESSION['member']) && !empty($_SESSION['member'])): ?>
                    <div class="dropdown-click left  hover-text-theme">
                        <a href="javascript:void(0)" class="button large bg-none" style="padding:0px 44.64%">
                            <i class="fa fa-user-circle large"></i> ข้อมูลส่วนตัว <i class="fa fa-caret-down medium"></i>
                        </a>
                        <div class="dropdown-content bar-block medium card round padding-small" style="z-index:3">
                            <a href="<?php echo $this->base_url('customer') ?>" class="bar-item">ข้อมูลส่วนตัว</a>
                            <a href="<?php echo $this->base_url('customer/order') ?>" class="bar-item">รายการคำสั่งซื้อ</a>
                            <a href="<?php echo $this->base_url('customer/order/payment') ?>" class="bar-item">แจ้งชำระเงิน</a>
                            <form action="<?php echo $this->base_url('login/logout') ?>" method="post">
                                <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                                <button type="submit" class="bar-item bg-none">ออกจากระบบ</button>
                            </form>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="dropdown-click left  hover-text-theme">
                        <a href="javascript:void(0)" class="button large bg-none" style="padding:0px 44.64%">
                            <i class="fa fa-user-circle large"></i> เข้าสู่ระบบ <i class="fa fa-caret-down medium"></i>
                        </a>
                        <div class="dropdown-content bar-block medium card round padding-small" style="z-index:3">
                            <a href="<?php echo $this->base_url('login') ?>" class="bar-item">เข้าสู่ระบบ</a>
                            <a href="<?php echo $this->base_url('login/registation') ?>" class="bar-item">สมัครสมาชิก</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
                <!--sub top menu-->
                <div class="xlarge row container row sub-top-menu">
                    <a href="<?php echo $this->base_url('product') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        สินค้า
                    </a>
                    <a href="<?php echo $this->base_url('product/best_seller') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        สินค้าขายดี
                    </a>
                    <a href="<?php echo $this->base_url('specification') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        จัดสเปค
                    </a>
                    <a href="<?php echo $this->base_url('customer/order/confirm') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        แจ้งชำระเงิน
                    </a>
                    <a href="<?php echo $this->base_url('login') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        เช็คสถานะการสั่งซื้อ
                    </a>
                    <a href="<?php echo $this->base_url('product') ?>" class="button center col l2 m2 s2 hover-text-black large bg-none">
                        ติดต่อเรา
                    </a>
                </div>
            </div>
            <div class="hide-large">
                <div class="xlarge row container border-bottom">
                    <div class="button center padding-small left col l3 m1 s2 hover-none" id="open-sidebar">☰</div>
                    <div class="center padding-small left col l6 m9 s6 hover-none">
                        <a href="<?php echo $this->base_url() ?>">
                            <img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" alt="ploycom" width="65px">
                        </a>
                    </div>
                    <div class="col l3 m1 s2 padding-small right-align">
                        <a href="<?php echo $this->base_url('cart/') ?>" class="button hover-text-theme xxlarge link-cart left margin-left" style="margin-top: -9px;padding:0px 0px;position:relative">
                            <i class="fa fa-shopping-cart"></i><div class='small bg-none amount-cart center'>0</div>
                        </a>
                    </div>
                    <div class="col l3 m1 s2 padding-small right-align">
                        <a href="<?php echo $this->base_url('login') ?>">
                            <i class="fa fa-user xxlarge"></i>
                        </a>
                    </div>
                </div>
            </div>

    </div>
</div>
<div class="overlay hide-large" onclick="" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="overlay hide bg-none" onclick="" style="cursor:pointer" title="close side menu" id="Overlay"></div>
<?php
    if(isset($_GET['url']) && !empty($_GET['url'])):
        if (strpos($_GET['url'],'product') === false && !empty($_GET['url'])):
            $data['show'] = "hide";
            $this->view('partail/left_nav',$data);
        endif;
    endif;
?>
<div id="loading" class="" style="display:none;position:fixed;background-color:#fff;z-index:10;top:0;right:0;left:0;bottom:0;opacity:0.9">
    <img src="<?php echo $this->public_url('file/images/system/load/loading.gif')?>" style="position:fixed;left:42%;right:41%;top:34%;bottom:50%" alt="">
</div>
<script type="text/javascript" src="<?php echo $this->base_url('public/js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        amount_cart();

        var check_dropdown_click = false;
        dropdown_click();

        function dropdown_click(){
            $('.dropdown-click').on('click',function(event){
                $(this).find('.dropdown-content').toggleClass('show');
                check_dropdown_click = true;
                event.stopPropagation();

            });
            $(window).click(function(){
                if (check_dropdown_click) {
                    $('.dropdown-click').find('.dropdown-content').removeClass('show');
                    check_dropdown_click = false;
                }
            });
        }
        function amount_cart(){
            $.ajax({
                url: "<?php echo $this->base_url('cart/amount_cart') ?>",
                success: function(data){
                    $('.link-cart .amount-cart').html('');
                    $('.link-cart .amount-cart').html(data);
                }
            });
        }

    });
</script>
