<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
        .item{
            margin-bottom:10%;
        }
        .panel{
            position: relative;
        }
        .panel-body{
            display:none;
        }
        .panel .panel-head .button{
            padding: 0px;
        }
        @media (max-width: 601px) {
            .wrap-item{
                width:48%;
            }
            .wrap-item:nth-child(2n+2){
                margin-left: 4%;
            }
        }
        @media (min-width:601px){
            .wrap-item:nth-child(4n+1){
                margin-left: 0%;
            }
            .wrap-item{
                margin-left: 2%;
                width:23.5%;
            }
        }
        </style>
    </head>
    <body class="light-grey content" style="max-width:1600px">
        <!-- Sidebar/menu -->
        <?php $this->set_page('admin/left_nav') ?>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <a href="#"><img src="<?php echo $this->public_url('file/images/system/logo/ploycom_logo.png') ?>" style="width:65px;" class="circle right margin hide-large hover-opacity"></a>
                <span class="button hide-large xxlarge hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>แก้ไขโปรไฟล์</b></h1>
                    <div class="section bottombar padding-16">

                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <form name="update_order" class="" action="<?php echo $this->base_url('admin/edit_profile/update') ?>" method="post">
            <div class="row-padding container">
                <div class="col l2 m6 s12">
                    <label><b>รหัสแอดมิน</b></label>
                    <input class="input border margin-bottom round center" type="text" name="admin_id" value="<?php echo $admin->admin_id ?> " required>
                </div>
                <div class="col l5 m6 s12 ">
                    <label><b>ชื่อ</b></label>
                    <input class="input border margin-bottom round " type="text"  name="first_name" value="<?php echo $first_name ?>" required>
                </div>
                <div class="col l5 m6 s12 ">
                    <label><b>นามสกุล</b></label>
                    <input class="input border margin-bottom round " type="text"  name="last_name" value="<?php echo $last_name ?>" required>
                </div>
                <div class="col l2 m6 s12">
                    <label><b>Username</b></label>
                    <input class="input border round center margin-bottom" type="text"  name="admin_user" value="<?php echo $admin->admin_user?>" required>
                </div>
                <div class="col l3 m6 s12">
                    <label class="col s12"><b>Password</b></label>
                    <input class="input border margin-bottom round center" type="text"  name="admin_pass" value="<?php echo $admin->admin_pass ?>" required>
                </div>

                <div class="col l12 m6 s12" style="padding-top:23px;">
                    <button type="submit" class="green button round"><i class="fa fa-save"></i> บันทึก</button>
                </div>
                </form>
            </div>

            <!-- <div class="black center padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="hover-opacity">w3.css</a></div> -->
            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
            $(document).ready(function(){

                let this_order_status = "<?php echo $order[0]->order_status ?>";
                let order_status = ['รอการชำระเงิน','รอตรวจสอบการชำระเงิน','ชำระเงินแล้ว','กำลังส่งของ','ยกเลิก'];
                let status_html = '';
                $.each(order_status,function(key,value){
                    if (key == this_order_status) {
                        status_html += '<option value="'+key+'" selected>'+value+'</option>';
                    }else {
                        status_html += '<option value="'+key+'">'+value+'</option>';
                    }
                });
                $('select[name=order_status]').html(status_html);



                $('.panel').on('click','.panel-head .button',function(){
                    let target = $(this).attr('target');
                    if ($(this).closest('.panel').find('.panel-body.'+target).is(':visible')) {
                        $(this).closest('.panel').find('.panel-body.'+target).hide(500);
                    }else {
                        $(this).closest('.panel').find('.panel-body').hide(500);
                        $(this).closest('.panel').find('.panel-body.'+target).show(500);

                    }
                });



                let filter = "<?php echo $url = isset($filter[2]) ? $filter[2] : null ?>";
                if (filter != '') {
                    $('.section .button').each(function(key,value){
                        if($(this).attr('href').indexOf(filter) > -1){
                            $(this).addClass('theme-d4');
                        }else {
                            $(this).removeClass('theme-d4');
                        }
                    });
                }
            });
        </script>
    </body>

</html>
