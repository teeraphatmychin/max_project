<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title><?php echo $staff[0]->staff_user ?></title>
        <?php $this->view('partail/main_css') ?>
        <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
        <style media="screen">
        </style>
    </head>


    <body class="light-grey" onafterprint="afterprint()" >
        <button type="button" class="btn-print hide" onclick="window.print()"></button>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div id="loading" class="" style="position:fixed;background-color:#fff;z-index:10;top:0;right:0;left:0;bottom:0;opacity:0.9">
            <img src="<?php echo $this->public_url('file/load/loading.gif')?>" style="position:fixed;left:42%;right:41%;top:34%;bottom:50%" alt="">
        </div>
        <!-- !PAGE CONTENT! -->
        <div class="main" style="display:none">
            <!-- Header -->
            <header id="portfolio">
                <div class="container center">
                    <h3><b>ใบเสร็จเงินเดือน</b></h3>
                </div>
            </header>

            <div class="container padding-64 row">

                <div class="col s12 margin-bottom">
                    <div class="col s6">
                        <div class="col s6 right-align">งวดการจ่าย<span class="margin-left right">:</span></div>
                        <div class="col s6"><?php echo $this->month_th_mini(date('m')).' '.intval((date('Y') + 543)-2500) ?></div>
                    </div>
                    <div class="col s6 right">
                        <div class="col s6 right-align">วันที่จ่าย<span class="margin-left right">:</span></div>
                        <div class="col s6"><?php echo $this->date_th(date('Y-m-d'),2) ?></div>
                    </div>
                </div>
                <div class="col s12 margin-bottom">
                    <div class="col s4 row">
                        <div class="col s6 right-align">รหัสพนักงาน<span class="margin-left right">:</span></div>
                        <div class="col s6"><?php echo $staff[0]->staff_user ?></div>
                    </div>
                    <div class="col s3 row">
                        <div class="col s3 right-align">ชื่อ<span class="margin-left right">:</span></div>
                        <div class="col s9"><?php echo $staff[0]->staff_name ?></div>
                    </div>
                    <div class="col s4 row">
                        <div class="col s4 right-align">ตำแหน่ง<span class="margin-left right">:</span> </div>
                        <div class="col s8"><?php echo $staff[0]->staff_department ?></div>
                    </div>
                </div>
                <div class="col s12">
                    <table class="table" border=1>
                        <thead>
                            <tr>
                                <th>รายได้</th>
                                <th>จำนวน</th>
                                <th>จำนวนเงิน</th>
                                <th>รายการหัก</th>
                                <th>จำนวน</th>
                                <th>จำนวนเงิน</th>
                                <td colspan="2"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>จำนวนวันทำงานปกติ</td>
                                <td><?php echo $conclude['work_date'] ?></td>
                                <td><?php echo $conclude['work_date_money'] ?></td>
                                <td rowspan="2">เข้างานสาย</td>
                                <td rowspan="2"><?php echo $conclude['work_late'] ?></td>
                                <td rowspan="2"><?php echo $conclude['deduct_money'] ?></td>
                                <td rowspan="3" colspan="2"></td>
                            </tr>
                            <tr>
                                <td>ค่าลวงเวลา</td>
                                <td><?php echo $conclude['work_date_ot'] ?></td>
                                <td><?php echo $conclude['ot_money'] ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">รายได้</td>
                                <td><?php echo $conclude['sum_money'] ?></td>
                                <td colspan="2">รายการหัก</td>
                                <td><?php echo $conclude['deduct_money'] ?></td>
                                <td>รับสุทธิ</td>
                                <td><?php echo $conclude['total_money'] ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">

            $(document).ready(function(){
                // $('*').css('font-family','Niramit');
                setTimeout(function(){
                    $('#loading').hide();
                    $('.main').show();
                    $('.btn-print').trigger('click');
                },1000);
                $.ajax({
                    url: '<?php echo $this->base_url('admin/data_print') ?>',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                    }
                });

            });
            function afterprint() {
                window.location.href = "<?php echo $this->base_url('staff/profile') ?>";
            }
        </script>
    </body>
</html>
