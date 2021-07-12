<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Training</title>
    <?php $this->view('partail/main_css') ?>
    <style media="screen">
        @media (max-width:576px) {
            .d-sm-none { display:none !important; }
        }
    </style>
</head>

<body class="">
  <div class="wrapper ">
    <?php $this->view('partail/nav-left') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php $this->view('partail/nav-top') ?>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg"></div> -->
      <div class="content">
          <div class="row filter">
              <div class="col-12 mb-3">
                  <button type="button"class="btn float-right align-top m-0 btn-success btn-form-add-video"><i class="nc-icon nc-simple-add"></i>&nbsp; Add training</button>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 input-group float-left">
                  <label class="input-group-text d-sm-none d-md-block" for="inputGroupSelect01">Select Category</label>
                  <select class="custom-select" id="inputGroupSelect01">
                  </select>
              </div>
          </div>
          <div class="row clip"> </div>
      </div>
    </div>
  </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Training</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-user">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12 form-validate">
                                        <div class="form-group">
                                            <label>Insert Link</label>
                                            <input type="text" name="link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 form-validate">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="custom-select" name="department"></select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-add-video">Add</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <?php $this->view('partail/main_js') ?>
    <script type="text/javascript">
        $(document).ready(function(){


            $('#inputGroupSelect01').change(function(){
                let value_cate = $(this).val();
                if (value_cate != 'all') {
                    $(".clip .item .cate").filter(function() {
                        $(this).closest('.item').toggle($(this).text().toLowerCase().indexOf(value_cate) > -1)
                    });
                }else {
                    $('.clip .item').show();
                }
            });


            list_training();
            function list_training(){
                $.ajax({
                    url: '<?php echo $this->base_url('employee/list_training') ?>',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        let html = '';
                        $.each(data,function(key,value){
                            html += '<div class="col-md-4 item">';
                            html += '<div class="card">';
                            html += '<div class="card-body">';
                            html += '<div class="embed-responsive embed-responsive-16by9">';
                            html += '<iframe class="embed-responsive-item" height="315" src="https://www.youtube.com/embed/'+value.link+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                            html += '</div>';
                                html += '<div class="cate" style="display:none">'+value.cate+'</div>'
                            html += ' </div>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $('.clip').html(html);
                    }
                })
            }

            $('.btn-form-add-video').click(function(){
                $('#modal').modal('show');
            });
            $('.btn-add-video').click(function(){
                let link = $(this).closest('.modal').find('input[name=link]').val();
                let department = $(this).closest('.modal').find('select[name=department]').val();

                $.ajax({
                    url: '<?php echo $this->base_url('employee/add_training') ?>',
                    method: 'post',
                    data:{link:link,dpm:department},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data == 'success') {
                            swal({
                                title: 'Add Video Succees',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal').modal('hide');
                            list_training();
                        }else {
                            swal({
                                title: 'Something Wrong',
                                type: 'error',
                                timer: 1500
                            });
                        }
                    }
                });
            });

            list_department();
            function list_department(){
                $.ajax({
                    url: '<?php echo $this->base_url('employee/list_department') ?>',
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        let html = '';
                        $.each(data,function(key,value){
                            html += '<option value="'+value.id+'">'+value.dpm_full_name+'</option>';
                        });
                        $('#modal').find('select').html(html);
                        $('#inputGroupSelect01').html('<option value="all">All</option>'+html)
                    }

                })
            }
        });
    </script>

</body>

</html>
