<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo $url[2]?></title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">

        </style>
    </head>

    <body class="light-grey" onafterprint="afterprint()">
        <button type="button" class="btn-print hide" onclick="window.print()"></button>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div id="loading" class="" style="position:fixed;background-color:#fff;z-index:10;top:0;right:0;left:0;bottom:0;opacity:0.9">
            <img src="<?php echo $this->public_url('file/load/loading.gif')?>" style="position:fixed;left:42%;right:41%;top:34%;bottom:50%" alt="">
        </div>
        <!-- !PAGE CONTENT! -->
        <div class="main" style="display:none;">
            <!-- Header -->
            <header id="portfolio">
                <div class="container center">
                    <h3><b>ใบเสร็จเงินเดือน</b></h3>
                </div>
            </header>

            <div class="container padding-64 row bill">

            </div>

            <!-- End page content -->
        </div>
        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">

        $(document).ready(function(){
            // $('*').css('font-family','Niramit');
            // $('*').addClass('test');
            let staff_user = $('title').html();
            $.ajax({
                url: '<?php echo $this->base_url('admin/data_print') ?>',
                method: 'post',
                data: {staff_user:staff_user},
                async:false,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let conclude = data[1].conclude;
                    let work = data[1].work;
                    let staff = data[1].staff[0];
                    let today = data[1].today;
                    let period = data[1].period;
                    let html = '';
                    if (data[0] == 'success') {

                        html += '<div class="col s12 margin-bottom">';
                            html += '<div class="col s6">';
                                html += '<div class="col s6 right-align">งวดการจ่าย<span class="margin-left right">:</span></div>';
                                html += '<div class="col s6">'+period+'</div>';
                            html += '</div>';
                            html += '<div class="col s6 right">';
                                html += '<div class="col s6 right-align">วันที่จ่าย<span class="margin-left right">:</span></div>';
                                html += '<div class="col s6">'+today+'</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col s12 margin-bottom">';
                            html += '<div class="col s4 row">';
                                html += '<div class="col s6 right-align">รหัสพนักงาน<span class="margin-left right">:</span></div>';
                                html += '<div class="col s6">'+staff.staff_user+'</div>';
                            html += '</div>';
                            html += '<div class="col s3 row">';
                                html += '<div class="col s3 right-align">ชื่อ<span class="margin-left right">:</span></div>';
                                html += '<div class="col s9">'+staff.staff_name+'</div>';
                            html += '</div>';
                            html += '<div class="col s4 row">';
                                html += '<div class="col s4 right-align">ตำแหน่ง<span class="margin-left right">:</span> </div>';
                                html += '<div class="col s8">'+staff.staff_department+'</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="col s12">';
                            html += '<table class="table" border=1>';
                                html += '<thead>';
                                    html += '<tr>';
                                        html += '<th>รายได้</th>';
                                        html += '<th>จำนวน</th>';
                                        html += '<th>จำนวนเงิน</th>';
                                        html += '<th>รายการหัก</th>';
                                        html += '<th>จำนวน</th>';
                                        html += '<th>จำนวนเงิน</th>';
                                        html += '<td colspan="2"></td>';
                                    html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                    html += '<tr>';
                                        html += '<td>จำนวนวันทำงานปกติ</td>';
                                        html += '<td>'+conclude.work_date+'</td>';
                                        html += '<td>'+conclude.work_date_money+'</td>';
                                        html += '<td rowspan="2">เข้างานสาย</td>';
                                        html += '<td rowspan="2">'+conclude.work_late+'</td>';
                                        html += '<td rowspan="2">'+conclude.deduct_money+'</td>';
                                        html += '<td rowspan="3" colspan="2"></td>';
                                    html += '</tr>';
                                    html += '<tr>';
                                        html += '<td>ค่าลวงเวลา</td>';
                                        html += '<td>'+conclude.work_date_ot+'</td>';
                                        html += '<td>'+conclude.ot_money+'</td>';
                                    html += '</tr>';
                                html += '</tbody>';
                                html += '<tfoot>';
                                    html += '<tr>';
                                        html += '<td colspan="2">รายได้</td>';
                                        html += '<td>'+conclude.sum_money+'</td>';
                                        html += '<td colspan="2">รายการหัก</td>';
                                        html += '<td>'+conclude.deduct_money+'</td>';
                                        html += '<td>รับสุทธิ</td>';
                                        html += '<td>'+conclude.total_money+'</td>';
                                    html += '</tr>';
                                html += '</tfoot>';

                            html += '</table>';
                            html += '<div class="ready-for-print"></div>'

                            $('.main .bill').html(html);
                            if($('.main .bill').find('.ready-for-print').length > 0){
                                // $('.btn-print').trigger('click');
                                // $('.main').show();
                                // $('#loading').hide();
                                // $('.btn-print').trigger('click');
                                setTimeout(function(){
                                    $('#loading').hide();
                                    $('.main').show();
                                    $('.btn-print').trigger('click');
                                },1000);
                            }

                    }else {
                        swal({
                            type: 'error',
                            title: 'มีบางอย่างผิดพลาด',
                            timer: 1500
                        });
                    }
                }
            });

        });
        function afterprint() {
            window.location.href = "<?php echo $this->base_url('admin/manage_staff') ?>";
        }
        </script>
    </body>
</html>
