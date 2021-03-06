<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tender Report</title>
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
    <!-- <link href="<?php echo $this->public_url('css/tender.css') ?>" rel="stylesheet" /> -->
    <!-- <style media="screen">
        body,h1,h2,h3,h4,h5,h6{
            font-family: 'Mali', cursive;
        }
    </style> -->
    <style media="screen">
        .tb-tender-list, .tb-tender-list thead tr th {
            font-size: 1em !important;
        }
        .bg-primary{
            background: linear-gradient(60deg, #26c6da, #00acc1);
        }

        .loading-screen[data-v-149f84da] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 300;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .loading-screen {
            z-index: 999999!important;
        }
        .loading-circle[data-v-149f84da] {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            border: 2px solid transparent;
            border-left-color: #ababab;
            /* -webkit-animation: circleanimation-data-v-149f84da .45s linear infinite; */
            animation: circleanimation-data-v-149f84da .45s linear infinite;
        }
        .loading-text[data-v-149f84da] {
            margin-top: 15px;
            color: grey;
            font-size: 12px;
        }
        .wall-opacity{
            position: relative;
            float: left;
            width: 100%;
            height: 100%;
        }
        .wall-opacity div{
            position: absolute;
            padding-bottom: 32%;
            background: #aaa4a447;
            height: 100%;
            top: -70px;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99;
            border-radius: 5px;
        }
        .table.table-bordered>thead>tr>th{
            border-top: 1px solid #cccccc;
        }
        .modal-tender-detail .modal-xl {
            max-width: 1250px !important;
        }
        .table-head{
            background-color: #418d96 !important;
        }
        .bg-secondary-item{
            background-color: #6c757d2e !important;
        }
        /* .product-item:nth-child(1n+1){
            border-top: 1px solid #ccc;
        } */
        .bg-light-warning {
            background-color: #ffeb3b47 !important;
        }
        .bg-light-danger {
            background-color: #f4433647 !important;
        }
        .bg-light-success {
            background-color: #4caf5047 !important;
        }
        .bg-light-info {
            background-color: #00bcd42e !important;
        }
        .bg-light-red{
            background-color:#f4433614 !important;
        }
        .bg-light-orange{
            background-color:#fceada !important;

        }
    </style>
    <style media="screen">
        @media (min-width: 992px){
            .row-add-tender .card-body{
                padding: 5rem !important;
            }
        }
    </style>
    <?php $this->view('partail/main_css') ?>
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
    <div class="modal modal-tender-detail fade bd-example-modal-xl modal-loading-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">?????????????????????????????? tender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-tender p-3"></div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>


  <div class="wrapper max-wrapper">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">?????????????????? tender</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <!-- <div class="collapse navbar-collapse max-top-nav justify-content-end">
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link bg-success btn-modal-add-tender" href="javascript:void(0)">
                            <i class="material-icons text-white">add_circle</i>
                            <p class="text-white d-block">??????????????? tender</p>
                        </a>
                    </li>
            </ul>
          </div> -->
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content pl-0 pr-0">

        <div class="container-fluid">
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">???????????????????????????????????????</p>
                        <h3 class="card-title">49/50
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="navbar">
                <form class="form-search col-md-12">
                    <div class="row justify-content-around d-flex">
                        <!-- <div class="form-group text-center">
                            <label class="text-dark">??????????????? : </label>
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control search-number" name="search-number"  value="">
                            </div>
                        </div> -->
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
                        <!-- <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-cate" name="search-cate"></select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                    <option value="">????????????????????????</option>
                                    <option value="asc">?????????????????? - ?????????????????????</option>
                                    <option value="desc">????????????????????? - ??????????????????</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group wrap-search-year-start">
                            <label class="text-dark">?????????????????????????????? : </label>
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-year-start" name="search-year-start">
                                    <option value="">2564</option>
                                    <option value="">2563</option>
                                    <option value="">2562</option>
                                    <option value="">2561</option>
                                    <option value="">2560</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group wrap-search-year-end">
                            <label class="text-dark">??????????????????????????? : </label>
                            <div class="form-group bmd-form-group pl-1 pr-1">
                                <select class="custom-select search-year-end" name="search-year-end">
                                    <option value="">2564</option>
                                    <option value="">2563</option>
                                    <option value="">2562</option>
                                    <option value="">2561</option>
                                    <option value="">2560</option>
                                </select>
                            </div>
                        </div> -->
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
            <div class="row list-tender">
                <div class="col-lg-12 col-md-12">
                  <div class="card card-equipment-list">
                      <div class="card-header card-header-tabs card-header-info">
                          <div class="nav-tabs-navigation">
                              <div class="nav-tabs-wrapper">
                                  <!-- <span class="nav-tabs-title">Tasks:</span> -->
                                  <ul class="nav nav-tabs" data-tabs="tabs">
                                      <li class="nav-item">
                                          <a class="nav-link active" href="#profile" data-toggle="tab">
                                              <i class="material-icons">analytics</i> ??????????????????????????????
                                              <div class="ripple-container"></div>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="#messages" data-toggle="tab">
                                              <i class="material-icons">code</i> ?????????????????? tender
                                              <div class="ripple-container"></div>
                                          </a>
                                      </li>
                                      <!-- <li class="nav-item">
                                          <a class="nav-link" href="#settings" data-toggle="tab">
                                              <i class="material-icons">cloud</i> Server
                                              <div class="ripple-container"></div>
                                          </a>
                                      </li> -->
                                  </ul>
                              </div>
                          </div>
                      </div>
                    <!-- <div class="card-header row d-flex justify-content-between">
                        <div class="card-header-info max-col-sm-10 col-md-7 col-lg-7">
                            <h4 class="card-title">??????????????????????????????</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-header-info text-center list-number-order" style="width: fit-content !important;">
                            <h4 class="card-title">????????????????????? <b>0</b> ??????????????????</h4>
                        </div>
                    </div> -->
                    <div class="card-body table-responsive" >
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table table-hover table-bordered tb-tender-list">
                                    <thead class="text-info">
                                        <tr>
                                            <th rowspan="2" class="text-center ">???????????? / ?????????</th>
                                            <th colspan="3" class="text-center bg-light-info">????????????????????????</th>
                                            <th rowspan="2" class="text-center bg-light">?????????</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center text-success bg-light-success">??????????????????</th>
                                            <th class="text-center text-danger bg-light-danger">???????????????????????????</th>
                                            <th class="text-center text-warning bg-light-warning">??????</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="messages">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="settings">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
    function sql_server(url='') {
        let link = '<?php echo $this->base_url() ?>'+url;
        link = link.replace("it_support", "sql_server");
        return link;
    }
    function base_url(url='') {
        let link = '<?php echo $this->base_url() ?>'+url;
        return link;
    }
</script>
<script type="text/javascript" src="<?php echo $this->public_url('js/page/tender/report.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        //?????????????????????????????????????????????????????????????????????????????? search ????????????????????????
            //?????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ????????????
        // $('.modal-preview-tender').modal('show');
        // $('.row-add-tender').show(500);

        // setInterval(test, 3000); // ?????? notification paramiter ???????????? (function(),timer)
        btn_to_top()
        material_input()
        // loading_gif($('.form-add-tender .table-q_product  .wrap-list-product'));
        // list_tender();
        // setInterval(list_tender, 15000);

        max_chosen($('.form-add-tender select[name=t_budget_type]'));



        function search_sort(data,check_searchs){
            $('.navbar .form-search').off();
            $('.navbar .form-search')
            .on('click','.btn-reset-search',function(){
                $('.navbar .form-search .search-q_number').val('');
                $('.navbar .form-search .search-date-start').val('');
                $('.navbar .form-search .search-date-end').val('');
                $('.navbar .form-search .search-cate').val('');
                $('.navbar .form-search .search-sort').val('');
                let html = '';
                let check_month = '0';
                let check_line_today = 0;
                $.each(data,function(key,value){
                    let q_date = value.q_date;
                    q_date = q_date.substr(0, 4);
                    q_date = parseInt(q_date)+543;
                    html += '<tr q_id="'+value.q_id+'">';
                        let q_num = value.q_num;
                        q_num = q_num.toString();
                        if (q_num.length < 4) {
                            let add_zero = '';
                            for (var i = q_num.length; i < 4; i++) {
                                add_zero = add_zero+'0';
                            }
                            q_num = add_zero+q_num;
                        }
                        html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                        html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                        let q_status = value.q_status;
                        switch (q_status) {
                            case 'new':
                                q_status = '<span class="text-info">???????????????????????????</span>';
                                break;
                            case 'edit':
                                q_status = '<span class="text-warning">???????????????????????????</span>';
                                break;
                            case 'cancel':
                                q_status = '<span class="text-danger">??????????????????</span>';
                                break;
                            case 'approved':
                                q_status = '<span class="text-success">??????????????????????????????????????????</span>';
                                if (value.q_status_customer != '') {
                                    switch (value.q_status_customer) {
                                        case 'reject':
                                            q_status += ',<span class="text-danger">????????????????????????????????????</span>';
                                        break;
                                        case 'approved':
                                        q_status += ',<span class="text-success">???????????????????????????????????????</span>';
                                        break;
                                        default:
                                    }
                                }
                                break;
                            default:
                        }
                        html += '<td>'+q_status+'</td>';
                        html += '<td>';
                        html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ?????????????????????</button>';
                        html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> ??????????????????</button>';
                        html += '</td>';
                        html += '</tr>';
                });
                let num_order = data.length;
                $('.content .list-tender .card-title b').html(num_order);
                $('.content .list-tender tbody').html(html);
            })
            .on('change keyup','.search-q_number,.search-date-start,.search-date-end,.search-sort,.search-cate,.search-year-start,.search-year-end',function(){
                let q_number = $('.navbar .form-search .search-q_number').val();
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate = $('.navbar .form-search .search-cate').val();
                let cate_text = $('.navbar .form-search .search-cate option:selected').html();
                let year_start = $('.navbar .form-search .search-year-start').val();
                let year_end = $('.navbar .form-search .search-year-end').val();
                let data_search = [];
                let key_data_search = 0;

                if (date_start != '' || date_end != '') {
                    if (date_end < date_start) {
                        let data_swap = date_start;
                        date_start = date_end;
                        date_end = data_swap;
                    }
                    let date_start_split = date_start.split('-');

                    for (var i = 0; i < data.length; i++) {
                        let date = data[i].q_date;
                        date = date.split(' ');
                        date = date[0];
                        if (date_start != '' && date_end != '') {
                            if (date >= date_start && date <= date_end) {
                                data_search[key_data_search++] = data[i];
                            }
                        }else if (date_start != '' && date_end == '') {
                            if (date >= date_start) {
                                data_search[key_data_search++] = data[i];
                            }
                        }else if (date_end != '' && date_start == '') {
                            if (date >= date_end) {
                                data_search[key_data_search++] = data[i];
                            }
                            date_start = date_end; //????????? assign ?????????????????????????????????????????? search ??????????????????
                            date_end = '';
                        }
                    }
                }else {
                    data_search = data;
                }

                if (data_search.length > 0 && sort != '') {
                    switch (sort) {
                        case 'asc':
                            //????????????????????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????
                            break;
                        case 'desc':
                            let new_data_search = [];
                            let j = 0;
                            for (var i = (data_search.length - 1); i > -1; i--) {
                                new_data_search[j++] = data_search[i];
                            }
                            data_search = new_data_search;
                            break;
                        default:
                    }
                }

                if (cate != '') {
                    if (cate.indexOf('customer_') > -1) {
                        cate = cate.split('customer_');
                        cate = cate[1];
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].q_status_customer == cate) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }
                    }else {
                        var data_search_cate = [];
                        let data_key_cate = 0;
                        for (var i = 0; i < data_search.length; i++) {
                            if (data_search[i].q_status == cate) {
                                data_search_cate[data_key_cate++] = data_search[i];
                            }
                        }

                    }
                    data_search = data_search_cate;
                }
                if (q_number != '') {
                    q_number = q_number.toUpperCase();
                    let data_search_q_number = [];
                    let data_key_q_number = 0;
                    for (var i = 0; i < data_search.length; i++) {
                        let data_q_number = data_search[i].q_number;
                        if (data_q_number.indexOf(q_number) > -1 ) {
                            data_search_q_number[data_key_q_number++] = data_search[i];
                        }
                    }
                    data_search = data_search_q_number;
                }
                    //event select year
                    let tag_year = $(this).attr('name');
                    if (tag_year.indexOf('search-year') > -1) {
                        setTimeout(function(){
                            if (year_start != '' || year_end != '') {
                                if (year_end < year_start) {
                                    let year_swap = year_start;
                                    year_start = year_end;
                                    year_end = year_swap;
                                }
                                if (year_end == '') {
                                    let this_year = new Date();
                                    year_end = this_year.getFullYear();
                                }
                                $.ajax({
                                    url: '<?php echo $this->base_url('tender/list') ?>',
                                    method: 'post',
                                    data: {year_start:year_start,year_end:year_end,status:'get'},
                                    dataType: 'json',
                                    success: function(respond){
                                        if (respond[0] == 'success') {
                                            let data_year_array = [];
                                            let data_year_key = 0;
                                            $.each(respond[1],function(respond_key,respond_value){
                                                data_year_array[data_year_key] = respond_value;
                                                data_year_key++;
                                            });
                                            data_search = data_year_array;
                                            search_sort(data_search);
                                        }
                                    }
                                });
                            }
                        },100);
                    }
                    setTimeout(function(){
                        let html = '';
                        let check_month = '0';
                        if (data_search.length < 1) {
                            let text = '?????????????????????????????????????????????????????? ';
                            let date_start_split = '';
                            if (cate != '') {
                                text += '<span class="text-'+cate+'">'+cate_text+'</span><br>';
                            }
                            if (date_start != '') {
                                date_start_split = date_start.split('-');
                                text += '????????????????????????????????????????????? <br>?????????????????? <b>'+date_start_split[2]+'/'+date_start_split[1]+'/'+(parseInt(date_start_split[0])+543)+'</b>';
                            }
                            if (date_end != '') {
                                let date_end_split = date_end.split('-');
                                // text = '???????????????????????????????????????????????????????????????????????? <br>'+text;
                                text += '<br> ????????? <b>'+date_end_split[2]+'/'+date_end_split[1]+'/'+(parseInt(date_end_split[0])+543)+'</b>';
                            }
                            html += '<tr><td class="text-center" colspan="4">???????????????????????????????????????????????????????????????</td></tr>';
                            let number_order = 0;
                            $('.content .list-tender .card-title b').html(number_order);
                            $('.content .list-tender tbody').html(html);
                        }else {
                            let check_line_today = 0;
                            $.each(data_search,function(key,value){
                                let q_date = value.q_date;
                                q_date = q_date.substr(0, 4);
                                q_date = parseInt(q_date)+543;
                                html += '<tr q_id="'+value.q_id+'">';
                                    let q_num = value.q_num;
                                    q_num = q_num.toString();
                                    if (q_num.length < 4) {
                                        let add_zero = '';
                                        for (var i = q_num.length; i < 4; i++) {
                                            add_zero = add_zero+'0';
                                        }
                                        q_num = add_zero+q_num;
                                    }
                                    html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                                    html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                                    let q_status = value.q_status;
                                    switch (q_status) {
                                        case 'new':
                                            q_status = '<span class="text-info">???????????????????????????</span>';
                                            break;
                                        case 'edit':
                                            q_status = '<span class="text-warning">???????????????????????????</span>';
                                            break;
                                        case 'cancel':
                                            q_status = '<span class="text-danger">??????????????????</span>';
                                            break;
                                        case 'approved':
                                            q_status = '<span class="text-success">??????????????????????????????????????????</span>';
                                            if (value.q_status_customer != '') {
                                                switch (value.q_status_customer) {
                                                    case 'reject':
                                                    q_status += ',<span class="text-danger">????????????????????????????????????</span>';
                                                    break;
                                                    case 'approved':
                                                    q_status += ',<span class="text-success">???????????????????????????????????????</span>';
                                                    break;
                                                    default:
                                                }
                                            }
                                            break;
                                        default:
                                    }
                                    html += '<td>'+q_status+'</td>';
                                    html += '<td>';
                                    html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ?????????????????????</button>';
                                    html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> ??????????????????</button>';
                                    html += '</td>';
                                    html += '</tr>';
                                });
                                let number_order = data_search.length;
                                $('.content .list-tender .card-title b').html(number_order);
                                $('.content .list-tender tbody').html(html);
                            }
                    },150);


            });
        }



        var check_call_function = true;
        function list_tender(){
            $('.content .list-tender tbody').html('<tr><td colspan="4" style="padding-bottom: 160px;"></td></tr>');
            loader($('.content .list-tender tbody tr td'));
            let full_year = new Date();
            var this_year = full_year.getFullYear();
            let status_year = false;
            let year_start = $('.navbar select.search-year-start').val();
            let year_end = $('.navbar select.search-year-end').val();
            if ($('.navbar select.search-year-start').val() != '' || $('.navbar select.search-year-end').val() != '') {
                if (year_end < year_start) {
                    let year_swap = year_start;
                    year_start = year_end;
                    year_end = year_swap;
                }
            }
            $.ajax({
                url: '<?php echo $this->base_url('tender/list') ?>',
                method: 'post',
                data: {year_start:year_start,year_end:year_end,status:'get'},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let html = '';
                    var select_search = '<option value="">??????????????????</option>';
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        $.each(data[1],function(key,value){
                            if (value.q_status != 'cancel') {
                                let q_date = value.q_date;
                                q_date = q_date.substr(0, 4);

                                q_date = parseInt(q_date)+543;
                                html += '<tr q_id="'+value.q_id+'">';
                                let q_num = value.q_num;
                                q_num = q_num.toString();
                                if (q_num.length < 4) {
                                    let add_zero = '';
                                    for (var i = q_num.length; i < 4; i++) {
                                        add_zero = add_zero+'0';
                                    }
                                    q_num = add_zero+q_num;
                                }


                                html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                                html += '<td class="customer-name">'+value.q_customer_name+'</td>';
                                let q_status = value.q_status;
                                switch (q_status) {
                                    case 'new':
                                    q_status = '<span class="text-info">???????????????????????????</span>';
                                    break;
                                    case 'edit':
                                    q_status = '<span class="text-warning">???????????????????????????</span>';
                                    break;
                                    case 'cancel':
                                    q_status = '<span class="text-danger">??????????????????</span>';
                                    break;
                                    case 'approved':
                                    q_status = '<span class="text-success">??????????????????????????????????????????</span>';
                                    if (value.q_status_customer != ''){
                                        switch (value.q_status_customer) {
                                            case 'created':
                                            q_status += ',<span class="text-danger">???????????????????????????????????????</span>';
                                            break;
                                            case 'reject':
                                            q_status += ',<span class="text-danger">????????????????????????????????????</span>';
                                            break;
                                            case 'approved':
                                            q_status += ',<span class="text-success">???????????????????????????????????????</span>';
                                            break;
                                            default:
                                        }
                                    }
                                    break;
                                    default:
                                }
                                html += '<td>'+q_status+'</td>';
                                html += '<td>';
                                    html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ?????????????????????</button>';
                                    html += '<button class="btn btn-warning btn-option" option-type="duplicate"><i class="material-icons">file_copy</i> ??????????????????</button>';
                                    html += '</td>';
                                    html += '</tr>';
                            }
                        });
                            switch (data[2]) {
                                case 'admin':
                                    select_search += '<option value="new">???????????????????????????</option>';
                                    select_search += '<option value="edit">???????????????????????????</option>';
                                    select_search += '<option value="approved">??????????????????????????????????????????</option>';
                                    break;
                                case 'service':
                                    select_search += '<option value="approved">??????????????????????????????????????????</option>';
                                    select_search += '<option value="customer_approved">???????????????????????????????????????</option>';
                                    break;
                                case 'sale':
                                    select_search += '<option value="new">???????????????????????????</option>';
                                    select_search += '<option value="edit">???????????????????????????</option>';
                                    select_search += '<option value="approved">??????????????????????????????????????????</option>';
                                    select_search += '<option value="customer_approved">???????????????????????????????????????</option>';
                                    select_search += '<option value="customer_reject">????????????????????????????????????</option>';
                                    break;
                                case 'supervisor':
                                    select_search += '<option value="new">???????????????????????????</option>';
                                    select_search += '<option value="edit">???????????????????????????</option>';
                                    select_search += '<option value="cancel">??????????????????</option>';
                                    select_search += '<option value="approved">??????????????????????????????????????????</option>';
                                    select_search += '<option value="customer_approved">???????????????????????????????????????</option>';
                                    select_search += '<option value="customer_reject">????????????????????????????????????</option>';
                                    break;
                                case 'it':
                                    select_search += '<option value="new">???????????????????????????</option>';
                                    select_search += '<option value="edit">???????????????????????????</option>';
                                    select_search += '<option value="cancel">??????????????????</option>';
                                    select_search += '<option value="approved">??????????????????????????????????????????</option>';
                                    select_search += '<option value="customer_approved">???????????????????????????????????????</option>';
                                    select_search += '<option value="customer_reject">????????????????????????????????????</option>';
                                    break;
                                default:
                            }
                            //get year for search
                            if (!year_start) {
                                year_start = parseInt(this_year+543);
                            }
                            if (!year_end) {
                                year_end = parseInt(this_year+543);
                            }
                            let option_year = '';
                                $.each(data[3],function(year_key,year_value){
                                    let year_th = parseInt(year_value.q_date);
                                    year_th = parseInt(year_th + 543);
                                    option_year += '<option value="'+year_th+'">'+year_th+'</option>';
                                });
                                $('.navbar select.search-year-start').html(option_year);
                                $('.navbar select.search-year-start').val(year_start);
                                $('.navbar select.search-year-end').html(option_year);
                                $('.navbar select.search-year-end').val(year_end);
                                $('.navbar select.search-cate').html(select_search);
                            let num_order = data[1].length;
                            $('.content .list-tender .card-title b').html(num_order);
                            $('.content .list-tender tbody').html(html);
                    }else if(data[0] == 'empty'){
                        if (!year_start) {
                            year_start = parseInt(this_year+543);
                        }
                        if (!year_end) {
                            year_end = parseInt(this_year+543);
                        }
                        let option_year = '<option value="'+year_start+'">'+year_start+'</option>';
                        $('.navbar select.search-year-start').html(option_year);
                        $('.navbar select.search-year-start').val(year_start);
                        $('.navbar select.search-year-end').html(option_year);
                        $('.navbar select.search-year-end').val(year_end);
                        html += '<tr><td class="text-center" colspan="4">???????????????????????????????????????????????????????????????</td></tr>';
                        $('.content .list-tender tbody').html(html);
                        $('.navbar select.search-cate').html(select_search);
                    }
                    // if (check_call_function) {
                        search_sort(data[1],true);
                        // window.search_sort=function(){return false;};
                        // check_call_function = false;
                    // }
                }
            });
        }

        /*valiedate form add tender*/
        //???????????????????????????
            //??????????????? ???????????????????????????????????? ????????????????????????????????????????????????
        function validate(){
            $('.row-add-tender *[name*=q_]').each(function(key,value){
                $(this).closest('.form-group').find('.help-block').remove();
                if ($(this).attr('name') != 'q_discount' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_ro_number' && $(this).attr('name') != 'q_set_price[]' && $(this).attr('name') != 'q_set_delivery[]' && $(this).attr('name') != 'q_warranty[]' && $(this).attr('name') != 'q_job_number' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_discount[]' && $(this).attr('name') != 'q_customer_department' && $(this).attr('name') != 'q_a_note'&& $(this).attr('name') != 'q_num_manual') {
                    if ($(this).val() == '') {
                        if ($(this).prop('tagName') == 'SELECT') {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>????????????????????????????????????????????????</li></span>');
                        }else {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>?????????????????????????????????????????????</li></span>');
                        }
                    }
                    if ($(this).attr('name') == 'q_note_list[]') {
                        if ($(this).closest('.row-add-tender').find('.modal-note').prop('checked') != true) {
                            $(this).closest('.form-group').find('.help-block').remove();
                        }
                    }
                    if ($(this).attr('name') == 'q_quanity[]') {
                        if((($(this).val() < 0 ) && $(this).val() != '') || $(this).val() == '0'){
                            $(this).closest('.form-group').append('<span style="width:fit-content !important" class="help-block left-align"><li>?????????????????????????????????????????????????????? 1 ??????????????????</li></span>');
                        }
                    }
                    if ($(this).attr('name') == 'q_product_name[]') {
                        if ($(this).is(":visible") == true) {
                            if((($(this).val() < 0 ) && $(this).val() != '') || $(this).val() == '0'){
                                $(this).closest('.form-group').append('<span style="width:fit-content !important" class="help-block left-align"><li>?????????????????????????????????????????????</li></span>');
                            }
                        }else {
                            $(this).closest('.form-group').find('.help-block').remove();
                        }
                    }
                }
            });
            $('.row-add-tender').on('change keyup','*[name*=q_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>????????????????????????????????????????????????</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-tender .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }
            // $('.row-add-tender .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }


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


        // function ellipsizeTextBox(id) {
        //     var el = document.getElementById(id);
        //     var wordArray = el.innerHTML.split(' ');
        //     while(el.scrollHeight > el.offsetHeight) {
        //         wordArray.pop();
        //         el.innerHTML = wordArray.join(' ') + '...';
        //      }
        // }
        // ellipsizeTextBox(???block-with-text);

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
