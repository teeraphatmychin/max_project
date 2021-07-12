<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notifications</title>

    <?php $this->view('partail/main_css') ?>

</head>

<body id="page-top">

    <?php $this->view('partail/nav-left') ?>


    <div class="main-panel">
        <!-- Sidebar -->
        <?php $this->view('partail/nav-top') ?>

        <div class="content">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="card card-user">
                        <div class="card-header text-center">
                            <h5 class="card-title bg-info rounded p-2 text-white">Notifications</h5>
                        </div>
                        <div class="card-body list-noti">

                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->



    <?php $this->view('partail/main_js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            notification();
            function notification(){
                $.ajax({
                    url: '<?php echo $this->base_url('employee/notification') ?>',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if (data[0] == 'success') {
                            let html = '';
                            let check = '';
                            $.each(data[1],function(key,value){
                                if (value.title) {
                                    html += '<div class="row">';
                                    html += '<div class="col-lg-6 col-md-6 col-sm-12"><h5>'+value.posted+'</h5></div>';
                                    html += '<div class="col-lg-8 col-md-8 col-sm-12 text-primary"><h5>'+value.title+'<h5></div>';
                                    html += '<div class="col-4 text-right"><a href="<?php echo $this->base_url('employee/schedule_detail/') ?>'+value.id+'" class="btn btn-primary btn-round">Go to</a></div>';
                                    html += '</div>';
                                    html += '<hr>';
                                }
                            });
                            $('.list-noti').html(html);
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>
