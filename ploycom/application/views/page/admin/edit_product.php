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
        .btn-edit{
            margin-right: 2%;
        }
        .btn-edit,.btn-detail{
            width: 49%;
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
        /* .wrap-image{
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .image{
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        } */
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
                    <h1><b>แก้ไขข้อมูลสินค้า</b></h1>
                    <div class="section bottombar padding-16 row">
                        <div class="col s6 margin-bottom">

                            <a href="<?php echo $this->base_url('admin/stock') ?>" class="button red round"><i class="fa fa-close"></i> ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- First Photo Grid-->
            <div class="row container" style="margin-bottom:60px">
                <form class="add_product" action="<?php echo $this->base_url('admin/edit_product_form') ?>" method="post" enctype="multipart/form-data">
                    <div class="col s12 row-padding">
                        <input type="hidden" name="url" value="<?php echo $_GET['url'] ?>">
                        <div class="col l2 m6 s12">
                            <label><b>รหัสสินค้า</b></label>
                            <input class="input border round" type="text" placeholder="" name="product_id" value="<?php echo $product[0]->product_id ?>">
                        </div>
                        <div class="col l4 m6 s12">
                            <label><b>ประเภท</b></label>
                            <select class="input border round" name="category_id" required>
                                <option value="<?php echo $product[0]->category_id ?>"><?php echo $product[0]->category_th_name ?></option>
                                <?php foreach ($category as $key_cate => $value_cate): ?>
                                    <option value="<?php echo $value_cate->category_id ?>"><?php echo $value_cate->category_th_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col l4 m6 s12">
                            <label class="col s12"><b>แบร์น</b></label>
                            <input class="input border margin-bottom round self_brand hide" type="text" placeholder="" name="product_brand">
                            <select class="input border round" name="product_brand">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col l2 m6 s12" style="padding-top:25px;">
                            <!-- <label class="col s"></label> -->
                            <div class="col s1">
                                <input type="checkbox" class="" name="self_brand" value="" id="self_brand">
                            </div>
                            <label for="self_brand"><div class="col s11">&nbsp;กรอกแบร์นเอง</div></label>
                        </div>
                        <div class="col l6 m6 s12">
                            <label><b>ชื่อสินค้า</b></label>
                            <input class="input border margin-bottom round" type="text" name="product_name" value="<?php echo $product[0]->product_name ?>" required>
                        </div>
                        <div class="col l3 m6 s12">
                            <label><b>ราคา</b></label>
                            <input class="input border margin-bottom round" type="text" placeholder="" name="product_price" value="<?php echo $product[0]->product_price ?>" required>
                        </div>
                        <div class="col l3 m6 s12">
                            <label><b>จำนวน/ชิ้น</b></label>
                            <input class="input border margin-bottom round" type="text" placeholder="" name="product_amount" value="<?php echo $product[0]->product_amount ?>" required>
                        </div>
                        <div class="col l3 m6 s12">
                            <label><b>สถานะ</b></label>
                            <?php
                                $product_status = array('เปิดใช้งาน','ปิดใช้งาน');
                             ?>
                            <select class="input border margin-bottom round" name="product_status">
                                <option value="<?php echo $product[0]->product_status ?>"><?php echo $product_status[$product[0]->product_status] ?></option>
                                <?php foreach ($product_status as $key_pro_status => $value_pro_status): ?>
                                    <?php if ($product[0]->product_status != $key_pro_status): ?>
                                        <option value="<?php echo $key_pro_status ?>"><?php echo $value_pro_status ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col l10 m6 s12 margin-bottom">
                            <div class="btn-select-image col s3">
                                <img src="<?php echo $this->public_url('file/images/products/').$product[0]->product_image ?>" alt=""  width="100%">
                                <label for="image" ><div class="button card round green"><i class="fa fa-plus"></i> เลือกรูปภาพ</div></label>
                                <input id="image" type="file" name="product_image" accept="image/*" class="image hide">
                            </div>
                            <div class="show-image hide row">
                                <div class="col s2">
                                    <img src="" alt="" id="blah" width="100%">
                                </div>
                                <div class="col s12">
                                    <div class="button red btn-cancel-image round margin-left margin-top">ลบรูปภาพ</div>
                                </div>
                            </div>
                        </div>
                        <div class="col l12 m6 s12 product-detail white round">
                            <?php if (!empty($detail)): ?>
                                <table class="table">
                                    <?php foreach ($detail as $key => $value): ?>
                                        <?php
                                             $more_detail = explode('=>',$value);
                                             $pro_detail = explode('|',$more_detail[1]);
                                             $count = count($pro_detail);
                                             $border = '';
                                        ?>
                                        <tr>
                                            <th><?php echo $more_detail[0] ?></th>
                                        </tr>
                                        <?php foreach ($pro_detail as $key_more => $value_more): ?>
                                            <?php
                                                $sub_detail = explode(':',$value_more);
                                                if($key_more == $count - 1):
                                                    $border = 'border-bottom';
                                                endif;
                                            ?>
                                            <tr class="">
                                                <td class="border-top border-left <?php echo $border ?>" style="background-color:#f5f5f5">
                                                    <?php echo $sub_detail[0] ?>
                                                </td>
                                                <td class="border-top border-left border-right <?php echo $border ?>">
                                                    <input type="text" class="input border round" name="<?php echo 'detail['.$more_detail[0].']['.$sub_detail[0].']' ?>" value="<?php echo $sub_detail[1] ?>">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                        <div class="col s12 wrap-btn margin-top">
                            <button type="submit" class="button card green round" ><i class="fa fa-save"></i> บันทึก</button>
                        </div>
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

                get_brand();

                function get_brand(){
                    let value =  $('select[name=category_id]').val();
                    $.ajax({
                        url:'<?php echo $this->base_url('admin/ajax_list_brand') ?>',
                        method:'post',
                        data:{cate_id:value},
                        dataType:'json',
                        success: function(data){
                            if (data != 'fail') {
                                html = '<option value="<?php echo $product[0]->product_brand ?>"><?php echo $product[0]->product_brand ?></option>';
                                $.each(data,function(key,value){
                                    html += '<option value="'+value.product_brand+'">'+value.product_brand+'</option>';
                                });
                                $('select[name=product_brand]').html('');
                                $('select[name=product_brand]').html(html);
                            }
                        }
                    });
                }


                let add_product = "<?php echo $add = isset($_SESSION['add_product']) && !empty($_SESSION['add_product'])? $_SESSION['add_product'] : null; ?>";

                if (add_product == 1) {
                    <?php unset($_SESSION['add_product']) ?>
                    swal({
                        title:'เพิ่มสินค้าสำเร็จ',
                        type:'success'
                    })
                }


                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#blah').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#image").change(function() {
                    $('.btn-select-image').hide();
                    $('.show-image').removeClass('hide');
                    readURL(this);
                });
                $('.btn-cancel-image').click(function(){
                    $('.show-image').addClass('hide');
                    $('.btn-select-image').show();
                });


                $('select[name=category_id]').change(function(){
                    let value =  $(this).val();
                    $.ajax({
                        url:'<?php echo $this->base_url('admin/ajax_list_brand') ?>',
                        method:'post',
                        data:{cate_id:value},
                        dataType:'json',
                        success: function(data){
                            if (data != 'fail') {
                                html = '';
                                $.each(data,function(key,value){
                                    html += '<option value="'+value.product_brand+'">'+value.product_brand+'</option>';
                                });
                                $('select[name=product_brand]').html('');
                                $('select[name=product_brand]').html(html);

                                let detail = data[0].product_detail.split('#');
                                let html_detail = '<table class="table">';
                                $.each(detail,function(key_detail,value_detail){
                                    let more_detail = value_detail.split('=>');
                                    let pro_detail = more_detail[1].split('|');
                                    var count = pro_detail.length;
                                    html_detail += '<tr>';
                                    html_detail += '<th colspan="2">';
                                    html_detail += more_detail[0];
                                    html_detail += '</th>';
                                    html_detail += '</tr>';
                                    $.each(pro_detail,function(key_pro_detail,value_pro_detail){
                                        let sub_detail = value_pro_detail.split(':');
                                        var border = '';
                                        // var name = {more_detail[0]:{sub_detail[0]}};

                                        if(key_pro_detail == (count - 1)){
                                            border = 'border-bottom';
                                        }
                                        html_detail += '<tr>';
                                        html_detail += '<td class="border-top border-left '+border+'">';
                                        html_detail += sub_detail[0];
                                        html_detail += '</td>';
                                        html_detail += '<td class="border-top border-left border-right '+border+'">';
                                        html_detail += '<input class="input border round" name="detail['+more_detail[0]+']['+sub_detail[0]+']" value="">';
                                        // html_detail += sub_detail[1];
                                        html_detail += '</td>';
                                        html_detail += '';
                                        html_detail += '</tr>';
                                    });
                                });
                                html_detail += '</table>';
                                $('.product-detail').html(html_detail);
                            }else {
                                $('select[name=product_brand]').html('');
                            }
                        }

                    })
                });

                $('input[type=checkbox][name=self_brand]').click(function(){
                    if ($(this).prop('checked') == true) {
                        $('select[name=product_brand]').hide();
                        $('input[name=product_brand]').removeClass('hide');
                    }else {
                        $('select[name=product_brand]').show();
                        $('input[name=product_brand]').addClass('hide');
                    }
                });




            });
        </script>
    </body>

</html>
