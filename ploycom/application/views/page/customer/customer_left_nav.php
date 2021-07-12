<a href="" class="bar-item theme-d5 center" style="cursor:default">เมนู</a>
<a href="#" class="bar-item button theme-l4 hover-theme-d2 active">ข้อมูลูกค้า</a>
<a href="#" class="bar-item button theme-l4 hover-theme-d2">รายการคำสั่งซื้อ</a>
<a href="#" class="bar-item button theme-l4 hover-theme-d2 ">แจ้งชำระเงิน</a>
<form action="<?php echo $this->base_url('login/logout') ?>" method="post">
    <button type="submit" class="bar-item button theme-l4 hover-theme-d2">ออกจากระบบ</button>
</form>

<?php $this->view('partail/main_js') ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.customer').on('click','.customer-left-nav .button',function(){
            $(this).closest('.customer-left-nav').find('.button').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
