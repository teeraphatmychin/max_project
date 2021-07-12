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
                    <h1><b>รายการออเดอร์</b></h1>
                    <div class="section bottombar padding-16">
                        <span class="margin-right">Filter:</span>
                        <button class="button black">สินค้าที่รอจัดส่ง</button>
                        <button class="button white"><i class="fa fa-diamond margin-right"></i>สินค้าที่จัดส่งไปแล้ว</button>
                        <button class="button white hide-small"><i class="fa fa-photo margin-right"></i>สินค้าตีกลับ</button>
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <div class="row container">
                <?php foreach ($order as $key => $value): ?>
                    <div class="col round wrap-item page" style="cursor:pointer;">
                        <div class="card round display-container item" style="overflow:hidden">
                        <div class="container white round-large">
                            <!-- <img class="" src="<?php echo $this->public_url().'file/10.jpg' ?>"  style="width:100%"> -->
                            <p class="medium text-overflow"><b>เลขที่ไใบสั่งซื้อ <?php echo $value->invoice ?></b></p>
                            <p class="small text-overflow"><b>สั่งซื้อเมื่อ <?php echo $value->date_th ?> น.</b></p>
                            <div data="" class="col l12 button card round theme-d2 medium margin-bottom" style="padding:5px">ตรวจสอบ <i class="fa fa-angle-double-right"></i></div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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

            });
        </script>
    </body>

</html>
