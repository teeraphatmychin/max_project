<nav class="sidebar collapse white animate-left padding-24" style="z-index:5;width:300px;" id="mySidebar"><br>
    <div class="container display-container">
        <a href="#" class="hide-large right large padding hover-grey display-topright open_nav" title="close menu">
            <i class="fa fa-remove"></i>
        </a>
        <!-- <div class="wrap-img col s7 super-center display-container" style="padding-bottom:30%">
            <img src="<?php echo $this->public_url('file/images/employee/pexels-photo-925786.jpeg'); ?>" class="circle img">
            <a href="javascript:void(0)" title="edit profile" class="button display-bottomright text-teal" style="right:-20px;bottom:-35px;"><i class="fa fa-edit"></i></a>
        </div> -->
        <!-- <div class="col s12 center"><h2><b>Menu</b></h2></div> -->
    </div>
    <div class="padding container bar-block">
        <a href="<?php echo $this->base_url('staff/schedule') ?>" class="bar-item button hover-shadow padding round"><i class="fa fa-calendar fa-fw margin-right text-theme"></i>ตารางงาน</a>
        <a href="<?php echo $this->base_url('staff/profile') ?>" class="bar-item button hover-shadow padding round"><i class="fa fa-edit fa-fw margin-right text-theme"></i>ข้อมูลส่วนตัว</a>
        <a href="<?php echo $this->base_url('staff/logout') ?>" class="bar-item button hover-shadow padding round red card margin-top"><i class="fa fa-sign-out fa-fw margin-right"></i>ออกจากระบบ</a>
    </div>
</nav>
<script type="text/javascript" src="<?php echo $this->base_url('public/js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var url = "<?php echo $url = isset($_GET['url'])&&!empty($_GET['url'])? $_GET['url']:''; ?>";
        var sub_url = url.split('/');
        $('.sidebar .bar-block .bar-item').each(function(key,value){
            if ($(this).attr('href').indexOf(sub_url[1]) > -1) {
                $(this).addClass('theme card');
                $(this).find('i').removeClass('text-theme');
                $(this).find('i').addClass('text-white');
            }else {
                if ($(this).attr('href').indexOf('logout') > -1) {

                }else {
                    $(this).removeClass('theme card');
                    $(this).find('i').addClass('text-theme');
                }
                $(this).find('i').removeClass('text-white');
            }
        });
        $('.open_nav').click(function(){
            // alert(1);
            $('#mySidebar').toggle();
        });

        // $('.sidebar').on('click','.bar-block .bar-item',function(){
        //
        // });
    });

</script>
