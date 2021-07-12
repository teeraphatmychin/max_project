<link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $this->public_url('css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?php echo $this->public_url('libs/material/assets/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?php echo $this->public_url('libs/material/assets/css/paper-dashboard.css?v=2.0.0') ?>">
<link rel="stylesheet" href="<?php echo $this->public_url('libs/material/assets/demo/demo.css') ?>">
<link href="<?php echo $this->public_url('libs/sweetalert2/dist/sweetalert2.min.css');?>" rel="stylesheet">
<style media="screen">
    body,h1,h2,h3,h4,h5,h6{
        font-family: 'Mali', cursive;
    }
    .form-control,.is-focused .form-control {
        background-image: linear-gradient(to top, #00bcd4 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
    }
    .is-focused [class^='bmd-label'],
    .is-focused [class*=' bmd-label'] {
        color: #00bcd4;
    }
    .to_top{
        position: fixed;
        bottom: -5.6rem;
        right: .4rem;
        width: 2.2rem;
        height: 2.1rem;
        overflow: hidden;
        -webkit-border-radius: 8;
        -moz-border-radius: 8;
        border-radius: .2rem;
        color: #ffffff;
        background: #00000082;
        padding: .45rem 0.5em 0 .3rem;
        text-decoration: none;
        cursor: pointer;
        transition: .5s;
        /* transform: translateY(540%); */
    }

    @media (max-width: 414px){ /*small media*/
        .wrap-btn-reset-search{
            width: 100%;
            text-align: center;
        }
        .d-sm-none{
            display: none !important;
        }
        .col-sm {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }
        .col-sm-auto {
            flex: 0 0 auto;
            width: auto;
            max-width: none;
        }
        .col-sm-1 {
            flex: 0 0 8.333333%;
            max-width: 8.333333%;
        }
        .col-sm-2 {
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }
        .col-sm-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
        .col-sm-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
        .col-sm-5 {
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }
        .col-sm-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-sm-7 {
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
        }
        .col-sm-8 {
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }
        .col-sm-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
        .col-sm-10 {
            flex: 0 0 83.333333%;
            max-width: 83.333333%;
        }
        .col-sm-11 {
            flex: 0 0 91.666667%;
            max-width: 91.666667%;
        }
        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    @media (min-width: 768px) {
        .modal-dialog{
            max-width: 930px;
        }
    }
    .dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus, .dropdown-menu a:hover, .dropdown-menu a:focus, .dropdown-menu a:active{
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4);
        background-color: #00bcd4;
        color: #FFFFFF
    }

    @media (min-width: 1200px){
        .modal-xl {
            max-width: 1000px;
        }
    }

    .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary:hover{
        color: #fff;
        background-color: #00aec5;
        border-color: #008697;
        box-shadow: 0 2px 2px 0 rgba(0, 188, 212, 0.14), 0 3px 1px -2px rgba(0, 188, 212, 0.2), 0 1px 5px 0 rgba(0, 188, 212, 0.12);
    }
    .btn .material-icons, .btn:not(.btn-just-icon):not(.btn-fab) .fa{
        top: -2px;
    }
    input[type="password"] {
        font-family: none !important; /*for default text security*/
    }

    .help-block {
        width: 170px;
        background-color: #f44336;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        z-index: 10;
        bottom: 90%;
        left: 64%;
        margin-left: -60px;
        font-size: 12px;
    }

     .help-block::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #f44336  transparent transparent transparent;
    }

    .sidebar::before{
        background-color: unset;
    }
    .sidebar .logo,.sidebar .sidebar-wrapper{
        background-color: #fff;
    }
    select {
      text-align: center;
      text-align-last: center;
      /* webkit*/
    }
    option {
      text-align: left;
      /* reset to left*/
    }
    .bmd-form-group .form-control, .bmd-form-group label, .bmd-form-group input::placeholder{
        line-height: 3.1;
    }
    .wrap-input{
        padding-top: 5px;
        padding-bottom: 5px;
    }
    /*check box*/
    .form-check .form-check-input:checked+.form-check-sign .check {
        background: #04afc4;
    }
    .max-top-nav .nav li a, .max-top-nav .nav li .dropdown-menu a {
        margin: 10px 15px 0;
        border-radius: 3px;
        color: #3C4858;
        padding-left: 10px;
        padding-right: 10px;
        text-transform: capitalize;
        font-size: 13px;
        padding: 10px 15px;
        float: left;
    }
    .max-top-nav .nav i {
        font-size: 24px;
        float: left;
        margin-right: 15px;
        line-height: 30px;
        width: 30px;
        text-align: center;
        color: #a9afbb;
    }
    .max-top-nav .nav p {
        margin: 0;
        line-height: 30px;
        font-size: 14px;
        position: relative;
        display: block;
        height: auto;
        white-space: nowrap;
        float: left;
    }
</style>
