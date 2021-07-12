<nav class="sidebar collapse white animate-left sidebar-admin" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="container">
        <a href="#" onclick="w3_close()" class="hide-large right jumbo padding hover-grey" title="close menu">
            <i class="fa fa-remove"></i>
        </a>
        <img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" style="width:45%;" class="round"><br><br>
        <h4><b>PLOYCOM</b></h4>
    </div>
    <div class="bar-block padding">
        <a href="<?php echo $this->base_url('admin/stock') ?>" onclick="w3_close()" class="bar-item button padding hover-theme round"><i class="fa fa-cubes fa-fw margin-right"></i>คลังสินค้า</a>
        <a href="<?php echo $this->base_url('admin/member_manage') ?>" onclick="w3_close()" class="bar-item button padding hover-theme round"><i class="fa fa-user fa-fw margin-right"></i>จัดการสมาชิก</a>
        <a href="<?php echo $this->base_url('admin/purchase_report') ?>" onclick="w3_close()" class="bar-item button padding hover-theme round"><i class="fa fa-money fa-fw margin-right"></i>จัดการการสั่งซื้อ</a>
        <a href="<?php echo $this->base_url('admin/sale_report') ?>" onclick="w3_close()" class="bar-item button padding hover-theme round"><i class="fa fa-bar-chart fa-fw margin-right"></i>รายงานการขาย</a>
        <a href="<?php echo $this->base_url('admin/edit_profile') ?>" onclick="w3_close()" class="bar-item button padding hover-theme round"><i class="fa fa-edit fa-fw margin-right"></i>แก้ไขข้อมูลส่วนตัว</a>
        <a href="<?php echo $this->base_url('admin/logout') ?>" onclick="w3_close()" class="bar-item button padding hover-red round card red"><i class="fa fa-sign-out fa-fw margin-right"></i>ออกจากระบบ</a>
    </div>
</nav>
<?php $this->view('partail/main_js') ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.sidebar-admin .bar-block .bar-item').each(function(key,value){
            if ($(this).attr('href').indexOf('<?php echo $_GET['url'] ?>') > -1) {
                $(this).addClass('text-theme card');
            }else {
                $(this).removeClass('text-theme card');
            }
        });
    });
</script>
