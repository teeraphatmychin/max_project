<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Job Option</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo $this->public_url('css/media.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="<?php echo $this->public_url('css/loading.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('libs/maxchosen/maxchosen.css') ?>" rel="stylesheet" />
    <link href="<?php echo $this->public_url('css/page/job_option/list.css') ?>" rel="stylesheet" />
</head>

<body class="">
    <div data-v-149f84da="" class="loading-screen" style="background-color: rgba(255, 255, 255, 0.7); display: none;">
        <div data-v-149f84da="">
            <div class="wrap-loader max-loader">
                <div class="loader">
                    <div class="circle one"></div>
                    <div class="circle two"></div>
                    <div class="circle three"></div>
                </div>
            </div>
            <!-- <img class="max-loader-gif col-md-12" src="<?php echo $this->public_url('file/images/system/Loading_2.gif') ?>"> -->
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl modal-loading-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">???????????????????????????</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-job p-3">
                </div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl modal-review-job" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">???????????????????????????</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-job p-3" style="font-size: 14px;">
                    <div class="row">
                        <div class="col-md-12 text-center">??????????????????????????? ???????????? CCU</div>
                        <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2 " style="font-size:0.8rem">
                            <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                <div class="row m-0 border rounded">
                                    <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>???????????????????????????????????????</strong></div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>???????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">XO.105/99</div>
                                    <div class="col-sm-7 col-md-4 border-right border-bottom"><strong>?????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-5 col-md-8 border-bottom">0006197763</div>
                                    <div class="col-sm-7 col-md-4 border-right"><strong>E-mail :</strong></div>
                                    <div class="col-sm-5 col-md-8 ">0006197763</div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">
                            <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                <div class="row m-0 border rounded col-12 p-0">
                                    <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>?????????????????? IT</strong></div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>???????????????????????????????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>????????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>????????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem">
                            <div class="col-sm-12 col-md-12 col-lg-12 row m-0">
                                <div class="col-12 row m-0 border rounded p-0">
                                    <div class="col-md-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>???????????????????????????????????????????????????</strong></div>
                                    <div class="col-sm-12 col-md-5 border-bottom border-right"><strong>????????????????????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X</div>
                                    <div class="col-sm-12 col-md-5 border-bottom border-right"><strong>???????????????????????????????????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X</div>
                                    <div class="col-sm-12 col-md-5 border-bottom border-right"><strong>????????????????????????????????????????????????????????? :</strong></div>
                                    <div class="col-sm-12 col-md-7 border-bottom" style="overflow-wrap: break-word;">0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X0U2X</div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 col-sm-12 col-md-6 mt-2 mb-2" style="font-size:0.8rem;height: fit-content;">
                            <div class="col-md-12 row m-0">
                                <div class="row m-0 border rounded col-12 p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center text-white bg-primary" style="border-radius: 6px 6px 0px 0px"><strong>??????????????????????????????????????????</strong></div>
                                    <div class="col-12 border-bottom text-center"><strong>????????????????????????</strong>???</div>
                                    <div class="col-12 border-bottom border-right bg-primary text-white text-center"><strong>??????????????????????????????????????????????????????</strong></div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>?????????????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                    <div class="col-sm-4 col-md-4 border-bottom border-right"><strong>???????????????????????? :</strong></div>
                                    <div class="col-sm-8 col-md-8 border-bottom">??????????????? ???????????????</div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between row" style="border-top:0px;padding-left: 2rem;padding-right: 2rem;"></div>
            </div>
        </div>
    </div>


  <div class="wrapper max-wrapper">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
          <div class="container-fluid">
              <div class="navbar-wrapper">
                  <a class="navbar-brand" href="#pablo">?????????????????????????????????????????????</a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse max-top-nav justify-content-end">
                  <ul class="nav justify-content-end">
                      <li class="nav-item">
                          <a class="nav-link bg-success btn-modal-add-job" href="javascript:void(0)">
                              <i class="material-icons text-white">add_circle</i>
                              <p class="text-white d-block">??????????????????????????????????????????</p>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
          <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content pl-0 pr-0">
        <div class="col-md-12 col- d-lg-none d-md-block d-sm-block p-3 text-right">
            <button class="btn max-col-sm-12 col-md-3 bg-success btn-modal-add-job" >
                    <i class="material-icons text-white">add_circle</i>&nbsp;&nbsp;??????????????????????????????????????????
            </button>
        </div>
        <div class="container-fluid">
            <div class="row row-add-job" style="display:none">
                <div class="col-md-12 wrap-card-job">
                    <div class="card">
                        <div class="card-header card-header-info header-add-job">
                            <h4 class="card-title">??????????????????????????????????????????</h4>
                        </div>
                        <div class="row justify-content-between pl-4 pr-4 header-edit-job" style="display:none">
                            <div class="col-md-8 card-header card-header-info">
                                <h4 class="card-title">??????????????????????????????????????????</h4>
                            </div>
                            <div class="col-md-3 card-header card-header-info text-center">
                                <p class="card-category text-white q_date">?????????????????? <?php echo $this->date_th(date('Y-m-d'),2); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-add-job">
                                <input type="hidden" name="type" value="add">
                                <div class="row">
                                    <!-- <div class="col-9">
                                    </div> -->
                                    <!-- <div class="col-md-12 p-2 mb-1 rounded customer-detail-head text-center bg-info text-white shadow-sm"><h4><b>???????????????????????????????????????</b></h4></div> -->
                                    <div class="col-lg-3 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating text-muted"><strong>???????????????????????????</strong></label>
                                            <input type="text" disabled class="form-control" name="jo_date" value="<?php echo $this->date_th(date('Y-m-d'),2) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating text-muted"><strong>?????????????????????????????????</strong></label>
                                            <input type="text" disabled class="form-control" name="jo_name" value="<?php echo $_SESSION['user']->first_name.' '.$_SESSION['user']->last_name ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating text-muted"><strong>?????????</strong></label>
                                            <input type="text" disabled class="form-control text-center" name="jo_zone" value="<?php echo $_SESSION['user']->zone ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group is-filled">
                                            <label class="bmd-label-floating"><strong>????????????????????????</strong></label>
                                            <input type="text" class="form-control" name="jo_tel" value="<?php echo $_SESSION['user']->tel ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group is-filled">
                                            <label class="bmd-label-floating"><strong>E-mail</strong></label>
                                            <input type="text" class="form-control" name="jo_mail" value="<?php echo $_SESSION['user']->email ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group is-filled">
                                            <label class="bmd-label-floating"><strong>Order Form No.</strong></label>
                                            <input type="text" class="form-control" name="jo_order_form" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-12 p-2 mb-1 rounded customer-detail-head text-center bg-info text-white shadow-sm"><h4><b>??????????????????????????????????????????</b></h4></div> -->
                                    <div class="col-lg-6 col-md-8 wrap-input">
                                        <div class="form-group bmd-form-group">
                                            <select class="form-control form-control-chosen list-customer" name="jo_customer_id" ></select>
                                        </div>
                                        <div class="form-group bmd-form-group" style="display:none">
                                            <label class="bmd-label-floating"><strong>????????????????????????????????????????????????????????????</strong></label>
                                            <input type="text" class="form-control input-customer-name" name="" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 wrap-input pt-0">
                                        <table>
                                            <tr>
                                                <td class="add-customer pl-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input add-customer" name="add_customer" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="add-customer" style="padding-top: 25px;">?????????????????????????????????????????????</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-lg-3 col-md-12 wrap-input">
                                        <div class="form-group bmd-form-group is-filled">
                                            <label class="bmd-label-floating"><strong>????????????</strong></label>
                                            <input type="text" class="form-control" name="jo_customer_department" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 wrap-input">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-dark"><strong>?????????????????????????????????????????????????????????</strong></label>
                                            <div class="form-group bmd-form-group">
                                                <textarea class="form-control" name="jo_note_product_detail" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 wrap-input">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-dark"><strong>????????????????????????????????????????????????????????????????????????????????????</strong></label>
                                            <div class="form-group bmd-form-group">
                                                <textarea class="form-control" name="jo_note_additional_option" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 wrap-input">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-dark"><strong>????????????????????????????????????????????????????????????</strong></label>
                                            <div class="form-group bmd-form-group">
                                                <textarea class="form-control" name="jo_note_help" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="card-footer text-center justify-content-between">
                            <a class="btn btn-danger btn-cancel-job" href="javascript:void(0)"><h4><i class="material-icons mr-3">cancel</i>??????????????????</h4></a>
                            <a class="btn btn-success btn-add-job" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>??????????????????</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <div class="form-group text-center">
                            <label class="text-dark">??????????????? : </label>
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control search-job" name="search"  value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">?????????????????????????????????????????? : </label>
                            <div class="form-group bmd-form-group">
                                <input type="date" class="form-control search-date-start" name="search-date-start"  value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">??????????????????????????????????????? : </label>
                            <div class="form-group bmd-form-group">
                                <input type="date" class="form-control search-date-end" name="search-date-end" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-cate" name="search-cate">
                                    <option value="">???????????????</option>
                                    <option value="new">???????????????????????????</option>
                                    <option value="accept">???????????????????????????????????????</option>
                                    <option value="success">??????????????????????????????????????????????????????</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                    <option value="">????????????????????????</option>
                                    <option value="asc">?????????????????? - ?????????????????????</option>
                                    <option value="desc">????????????????????? - ??????????????????</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group wrap-btn-reset-search">
                            <div class="form-group">
                                <button type="reset" class="btn btn-round btn-warning text-white btn-reset-search">
                                    <i class="material-icons">autorenew</i> ?????????????????????
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row list-job">
                <div class="col-lg-12 col-md-12">
                  <div class="card card-equipment-list">
                    <div class="card-header row d-flex justify-content-between">
                        <div class="card-header-info max-col-sm-10 col-md-7 col-lg-7">
                            <h4 class="card-title">???????????????????????????????????????</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-header-info text-center list-number-order" style="width: fit-content !important;">
                            <h4 class="card-title">????????????????????? <b>0</b> ??????????????????</h4>
                        </div>
                    </div>
                    <div class="card-body table-responsive" >
                        <table class="table table-hover tb-job-list">
                            <thead class="text-info">
                                <tr>
                                    <th class="customer-name">???????????????????????????????????????</th>
                                    <th>Order Form</th>
                                    <th>??????????????????????????????</th>
                                    <th>???????????????</th>
                                    <th>????????????????????????</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- <div class="close-layer visible"></div> -->
    </div>
  </div>
  <div class="fixed-plugin"></div>
  <!--   Core JS Files   -->
  <!-- <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script> -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>
 <!-- <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script> -->
 <script src="<?php echo $this->public_url('libs/maxchosen/maxchosen.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->
  <script type="text/javascript">
      // $(document).ready(function(){
          function base_url(url=''){
              let link = '<?php echo $this->base_url() ?>'+url;
              return link;
          }
      // });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
        btn_to_top();
        material_input();


        // validate_form_add_job();
        // function validate_form_add_job(){
        //     $('.form-add-job *[name*=jo_]').each(function(key,value){
        //         console.log($(this));
        //         if ($(this).val() == '') {
        //             $(this).closest('.form-group').append('<span class="help-block left-align"><li>?????????????????????????????????????????????</li></span>');
        //         }
        //     });
        // }


        /*materail input*/
        function material_input(){
            $('input.form-control').each(function(){
                if ($(this).val() != '') {
                    $(this).closest('.bmd-form-group').addClass('is-filled');
                }
            });
            $('.bmd-form-group').on('focusout','input.form-control',function(){
                if ($(this).val() == '') {
                    $(this).closest('.bmd-form-group').removeClass('is-filled');
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }else {
                    $(this).closest('.bmd-form-group').removeClass('is-focused');
                }
            });
            $('.bmd-form-group').on('focusin','input.form-control',function(){
                if ($(this).closest('.bmd-form-group').hasClass('is-focused') == false) {
                    $(this).closest('.bmd-form-group').addClass('is-focused');
                }
            });
            $('.bmd-form-group').on('keyup change','input.form-control',function(){
                if ($(this).val() != '') {
                    $(this).closest('.bmd-form-group').addClass('is-filled');
                }
            });
        }


        //button for mobile | click for go to top page
        function btn_to_top(){
            let btn = '<div class="btn to_top"><i class="material-icons">&#xe316;</i></div>';
                $('body').append(btn);
                var win = $(window);
                win.scroll(function() {
                    if (win.scrollTop() >= 100) {
                        $('.to_top').css({
                            'bottom': '.2rem'
                        });
                    }else {
                        $('.to_top').css({
                            'bottom': '-5.6rem'
                        });
                    }
                });
                $('body .to_top').click(function(){
                    $('html, body').animate({scrollTop:0}, 'slow');
                });
        }


        function loader(inner,status=''){
            switch (status) {
                case 'remove':
                    inner.find('.max-loader').remove();
                    break;
                default:
                    let $html_loader = '<div class="col-12 row justify-content-center">';
                        $html_loader += '<div class="wrap-loader max-loader"><div class="loader"><div class="circle one"></div><div class="circle two"></div><div class="circle three"></div></div></div>';
                        $html_loader += '</div>';
                    inner.html($html_loader);
            }
        }
        function loading_gif(inner,status='',width=1){
            let $html_loader = '<img class="max-loader-gif col-md-'+width+'" src="<?php echo $this->public_url('file/images/system/Loading_2.gif') ?>">';
            switch (status) {
                case 'remove':
                    inner.find('.max-loader-gif').remove();
                    break;
                case 'insert':
                    inner.append($html_loader);
                    break;
                default:
                    inner.html($html_loader);
            }

        }

        // functoin ???????????? sidebar ????????? ?????????????????????????????? template
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          }else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script src="<?php echo $this->public_url('js/page/job_option/list.js') ?>"></script>
<!-- toggle menu when mobile mode -->
  <script type="text/javascript">
      var mobile_menu_visible = 0;
      $(document).on('click', '.navbar-toggler', function() {
          $toggle = $(this);

          if (mobile_menu_visible == 1) {
              $('html').removeClass('nav-open');

              $('.close-layer').remove();
              setTimeout(function() {
                  $toggle.removeClass('toggled');
              }, 400);

              mobile_menu_visible = 0;
          } else {
              setTimeout(function() {
                  $toggle.addClass('toggled');
              }, 430);

              var $layer = $('<div class="close-layer"></div>');

              if ($('body').find('.main-panel').length != 0) {
                  $layer.appendTo(".main-panel");

              } else if (($('body').hasClass('off-canvas-sidebar'))) {
                  $layer.appendTo(".wrapper-full-page");
              }

              setTimeout(function() {
                  $layer.addClass('visible');
              }, 100);

              $layer.click(function() {
                  $('html').removeClass('nav-open');
                  mobile_menu_visible = 0;

                  $layer.removeClass('visible');

                  setTimeout(function() {
                      $layer.remove();
                      $toggle.removeClass('toggled');

                  }, 400);
              });

              $('html').addClass('nav-open');
              mobile_menu_visible = 1;

          }
      });
  </script>
</body>

</html>
