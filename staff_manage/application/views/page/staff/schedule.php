<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>ตารางงาน</title>
        <?php $this->view('partail/main_css') ?>
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.min.css') ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/docsupport/prism.css') ?>">
        <link rel="stylesheet" href="<?php echo $this->public_url('libs/chosen/chosen.css') ?>">
        <style media="screen">
            .fc td, .fc th{
                background-color: white;
            }
            .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right{
                float: unset;
                display: inline-block;
            }
            .fc-toolbar.fc-header-toolbar .fc-center{
                float: unset;
                display: inline-block;
            }
            .help-block {
                bottom: 58%;
            }
            @media (min-width:601px){
                .fc-toolbar.fc-header-toolbar .fc-left{
                    float:left;
                }
                .fc-toolbar.fc-header-toolbar .fc-right{
                    float:right;
                }
                .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right,.fc-toolbar.fc-header-toolbar .fc-center{
                    width: unset;
                }
                .help-block {
                    bottom: 64%;
                }
            }
            @media (min-width:993px){
                .fc-toolbar.fc-header-toolbar .fc-left,.fc-toolbar.fc-header-toolbar .fc-right,.fc-toolbar.fc-header-toolbar .fc-center{
                    width: unset;
                }
                .help-block {
                    bottom: 70%;
                }
            }

        </style>
    </head>
    <body class="light-grey">
        <?php $this->view('partail/nav_staff') ?>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">
            <header>
                <a href="#"><img src="<?php echo $this->public_url('file/images/employee/pexels-photo-925786.jpeg'); ?>" style="width:65px;" class="circle right margin hide-large hover-opacity"></a>
                <span class="button hide-large xxlarge hover-text-grey open_nav"><i class="fa fa-bars"></i></span>
                <div class="container">
                    <h1><b>ตารางงาน</b></h1>
                    <div class="section bottombar"></div>
                </div>
            </header>

                <div class="row container margin-bottom" id="calendar" style="padding-bottom:64px;"></div>


        </div>
        <div id="id01" class="modal" style="z-index:5;">
            <div class="modal-content card-4 animate-zoom padding round row">
                <header class="container white col s12 border-bottom margin-bottom" style="padding:0.01em 0 0.01em 16px">
                    <div class="display-container">
                        <span  class="button xxlarge display-topright" style="font-size:2em!important" onclick="$(this).closest('.modal').hide()">&times;</span>
                    </div>
                    <h2>รายละเอียดงาน</h2>
                </header>

                <div class="col s12 padding container row large">
                    <div class="col l7 m7 s12 margin-bottom  padding">
                        <div class="col s2 border-right">วันที่</div>
                        <div class="col s8 start-date margin-left"></div>
                    </div>
                    <div class="col l5 m5 s12 holiday center padding" style="display:none">
                        <div class="col s12 text-red">วันหยุด</div>
                    </div>
                    <div class="col s12 margin-bottom  padding">
                        <div class="col l2 m2 s4 border-right">หัวข้องาน</div>
                        <div class="col s6 title margin-left"></div>
                    </div>
                    <div class="col s12 margin-bottom  padding">
                        <div class="col l2 m2 s4 border-right">รายละเอียด</div>
                        <div class="col s9 detail margin-left"></div>
                    </div>
                </div>

                <div class="container border-top padding col s12 center">
                    <button class="button red round border" onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-close"></i> ปิด</button>
                </div>
            </div>
        </div>

</div>


        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/lib/moment.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/fullcalendar.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/calendar/fullcalendar-3.6.2/locale/th.js') ?>"></script>

        <!-- <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/jquery-3.2.1.min.js') ?>"></script> -->
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/chosen.jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/prism.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->public_url('libs/chosen/docsupport/init.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){


                calendar();


                function calendar(){
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',  //  prevYear nextYea
                            center: 'title',
                            // right: 'month,agendaWeek,agendaDay',
                            right: 'month',
                        },
                        buttonIcons:{
                            prev: 'left-single-arrow',
                            next: 'right-single-arrow',
                            prevYear: 'left-double-arrow',
                            nextYear: 'right-double-arrow'
                        },
                        events: {
                            url: '<?php echo $this->base_url('staff/data_schedule') ?>',
                            error: function() {

                            }
                        },
                        eventLimit:true,
                        lang: 'th',
                        dayClick: function() {
                        },
                        eventClick: function(calEvent, jsEvent, view) {
                            let id = calEvent.id;
                            // let start = moment(calEvent.start).format('YYYY-MM-DD');
                            // let end = moment(calEvent.end).format('YYYY-MM-DD');
                            // let title = calEvent.title;

                            $.ajax({
                                url: '<?php echo $this->base_url('staff/data_schedule') ?>',
                                method: 'post',
                                data:{id:id},
                                dataType: 'json',
                                success: function(data){
                                    console.log(data);
                                    let modal = $('#id01');
                                    let dat = data[0];
                                    var start_date = dat.start_date;
                                    if (dat.status != 0) {
                                        modal.find('.holiday').show();
                                    }else {
                                        modal.find('.holiday').hide();
                                    }

                                    modal.show();
                                    modal.find('.start-date').html(start_date);
                                    modal.find('.title').html(dat.title);
                                    modal.find('.detail').html(dat.detail);
                                }
                            })


                        }
                    });


                }



                // $('#calendar').on('click','.fc-day.fc-widget-content',function(){
                //     let modal = $('#id01');
                //     modal.show();
                //
                //
                //
                //
                // });


            });
        </script>
    </body>
</html>
