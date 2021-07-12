<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Quotation Report</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
  <link href="<?php echo $this->public_url('css/loading.css') ?>" rel="stylesheet" />
  <link href="<?php echo $this->public_url('libs/chosen/css/component-chosen.min.css') ?>" rel="stylesheet" />
  <style media="screen">
      body,h1,h2,h3,h4,h5,h6{
          font-family: 'Mali', cursive;
      }
      .form-control,.is-focused .form-control {
          background-image: linear-gradient(to top, #00bcd4 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
      }
      .btn.btn-primary{
          background-color: #00bcd4;
          border-color: #2196f3;
          border-top-color: rgb(33, 150, 243);
          border-right-color: rgb(33, 150, 243);
          border-bottom-color: rgb(33, 150, 243);
          border-left-color: rgb(33, 150, 243);
      }
      .is-focused [class^='bmd-label'],
      .is-focused [class*=' bmd-label'] {
          color: #00bcd4;
      }
      li.max-btn-add-issue > a{
          background-color: #4caf50 !important;
          box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);
      }
      .sidebar .nav li.max-btn-add-issue>a:hover{
          background-color: #4caf50;
          outline: inherit;
      }
      .nav-open .sidebar {
          -webkit-transform: translate3d(0, 0, 0);
          -moz-transform: translate3d(0, 0, 0);
          -o-transform: translate3d(0, 0, 0);
          -ms-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
      .nav-open .sidebar {
          box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
      }
      .sidebar, .off-canvas-sidebar nav .navbar-collapse {
          position: fixed;
          display: block;
          top: 0;
          height: 100vh;
          width: 260px;
          right: 0;
          left: auto;
          z-index: 1032;
          visibility: visible;
          background-color: #9A9A9A;
          overflow-y: visible;
          border-top: none;
          text-align: left;
          padding-right: 0px;
          padding-left: 0;
          -webkit-transform: translate3d(260px, 0, 0);
          -moz-transform: translate3d(260px, 0, 0);
          -o-transform: translate3d(260px, 0, 0);
          -ms-transform: translate3d(260px, 0, 0);
          transform: translate3d(260px, 0, 0);
          -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
      }
      .nav-open .main-panel, .nav-open .wrapper-full-page, .nav-open .navbar .container .navbar-toggler, .nav-open .navbar .container .navbar-wrapper, .nav-open .navbar .container {
          left: 0;
          -webkit-transform: translate3d(-260px, 0, 0);
          -moz-transform: translate3d(-260px, 0, 0);
          -o-transform: translate3d(-260px, 0, 0);
          -ms-transform: translate3d(-260px, 0, 0);
          transform: translate3d(-260px, 0, 0);
      }
      .main-panel, .navbar-collapse {
          -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
      }
      .main-panel {
          width: 100%;
      }
      .close-layer.visible {
          opacity: 1;
      }
      .close-layer {
          height: 100%;
          width: 100%;
          position: absolute;
          opacity: 0;
          top: 0;
          left: auto;
          background: rgba(0, 0, 0, 0.35);
          content: "";
          z-index: 9999;
          overflow-x: hidden;
          -webkit-transition: all 370ms ease-in;
          -moz-transition: all 370ms ease-in;
          -o-transition: all 370ms ease-in;
          -ms-transition: all 370ms ease-in;
          transition: all 370ms ease-in;
      }
      .nav-open .menu-on-left .main-panel {
          position: initial;
      }
      .nav-open .menu-on-left .main-panel,
      .nav-open .menu-on-left .wrapper-full-page,
      .nav-open .menu-on-left .navbar-fixed>div {
          -webkit-transform: translate3d(260px, 0, 0);
          -moz-transform: translate3d(260px, 0, 0);
          -o-transform: translate3d(260px, 0, 0);
          -ms-transform: translate3d(260px, 0, 0);
          transform: translate3d(260px, 0, 0);
      }
      .menu-on-left .sidebar,
      .menu-on-left .off-canvas-sidebar {
          left: 0;
          right: auto;
          -webkit-transform: translate3d(-260px, 0, 0);
          -moz-transform: translate3d(-260px, 0, 0);
          -o-transform: translate3d(-260px, 0, 0);
          -ms-transform: translate3d(-260px, 0, 0);
          transform: translate3d(-260px, 0, 0);
      }
      .menu-on-left .close-layer {
          left: auto;
          right: 0;
      }
      .nav-mobile-menu .dropdown .dropdown-menu {
          display: none;
          position: static !important;
          background-color: transparent;
          width: auto;
          float: none;
          box-shadow: none;
      }
      .nav-mobile-menu .dropdown .dropdown-menu.showing {
          animation: initial;
          animation-duration: 0s;
      }
      .nav-mobile-menu .dropdown .dropdown-menu.hiding {
          transform: none;
          opacity: 1;
      }
      .nav-mobile-menu .dropdown.show .dropdown-menu {
          display: block;
      }
      .nav-mobile-menu li.active>a {
          background-color: rgba(255, 255, 255, 0.1);
      }
      .navbar-minimize {
          display: none;
      }
      .nav-open .main-panel,
      .nav-open .wrapper-full-page,
      .nav-open .navbar .container .navbar-toggler,
      .nav-open .navbar .container .navbar-wrapper,
      .nav-open .navbar .container {
          left: 0;
          -webkit-transform: translate3d(-260px, 0, 0);
          -moz-transform: translate3d(-260px, 0, 0);
          -o-transform: translate3d(-260px, 0, 0);
          -ms-transform: translate3d(-260px, 0, 0);
          transform: translate3d(-260px, 0, 0);
      }
      .nav-open .sidebar {
          box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
      }
      .nav-open .off-canvas-sidebar .navbar-collapse,
      .nav-open .sidebar {
          -webkit-transform: translate3d(0, 0, 0);
          -moz-transform: translate3d(0, 0, 0);
          -o-transform: translate3d(0, 0, 0);
          -ms-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
      .wrapper-full-page,
      .navbar .container .navbar-toggler,
      .navbar .container .navbar-wrapper,
      .navbar .container {
          -webkit-transform: translate3d(0px, 0, 0);
          -moz-transform: translate3d(0px, 0, 0);
          -o-transform: translate3d(0px, 0, 0);
          -ms-transform: translate3d(0px, 0, 0);
          transform: translate3d(0px, 0, 0);
          -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          left: 0;
      }
      .off-canvas-sidebar .navbar .container {
          transform: none;
      }
      .main-panel,
      .navbar-collapse {
          -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
      }
      .navbar .navbar-collapse.collapse,
      .navbar .navbar-collapse.collapse.in,
      .navbar .navbar-collapse.collapsing {
          display: none !important;
      }
      .off-canvas-sidebar .navbar .navbar-collapse.collapse,
      .off-canvas-sidebar .navbar .navbar-collapse.collapse.in,
      .off-canvas-sidebar .navbar .navbar-collapse.collapsing {
          display: block !important;
      }
      .navbar-nav>li {
          float: none;
          position: relative;
          display: block;
      }
      .off-canvas-sidebar nav .navbar-collapse {
          margin: 0;
      }
      .off-canvas-sidebar nav .navbar-collapse>ul {
          margin-top: 19px;
      }
      .sidebar,
      .off-canvas-sidebar nav .navbar-collapse {
          position: fixed;
          display: block;
          top: 0;
          height: 100vh;
          width: 260px;
          right: 0;
          left: auto;
          z-index: 1032;
          visibility: visible;
          background-color: #9A9A9A;
          overflow-y: visible;
          border-top: none;
          text-align: left;
          padding-right: 0px;
          padding-left: 0;
          -webkit-transform: translate3d(260px, 0, 0);
          -moz-transform: translate3d(260px, 0, 0);
          -o-transform: translate3d(260px, 0, 0);
          -ms-transform: translate3d(260px, 0, 0);
          transform: translate3d(260px, 0, 0);
          -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
          transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
      }
      .sidebar>ul,
      .off-canvas-sidebar nav .navbar-collapse>ul {
          position: relative;
          z-index: 4;
          width: 100%;
      }
      .sidebar::before,
      .off-canvas-sidebar nav .navbar-collapse::before {
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          position: absolute;
          background-color: #282828;
          display: block;
          content: "";
          z-index: 1;
      }
      .sidebar .logo,
      .off-canvas-sidebar nav .navbar-collapse .logo {
          position: relative;
          z-index: 4;
      }
      .sidebar .navbar-form,
      .off-canvas-sidebar nav .navbar-collapse .navbar-form {
          margin: 10px 0px;
          float: none !important;
          padding-top: 1px;
          padding-bottom: 1px;
          position: relative;
      }
      .sidebar .table-responsive,
      .off-canvas-sidebar nav .navbar-collapse .table-responsive {
          width: 100%;
          margin-bottom: 15px;
          overflow-x: scroll;
          overflow-y: hidden;
          -ms-overflow-style: -ms-autohiding-scrollbar;
          -webkit-overflow-scrolling: touch;
      }
      .form-group.form-search .form-control {
          font-size: 1.7em;
          height: 37px;
          width: 78%;
      }
      .navbar-form .btn {
          position: absolute;
          top: -5px;
          right: -50px;
      }
      .close-layer {
          height: 100%;
          width: 100%;
          position: absolute;
          opacity: 0;
          top: 0;
          left: auto;
          background: rgba(0, 0, 0, 0.35);
          content: "";
          z-index: 9999;
          overflow-x: hidden;
          -webkit-transition: all 370ms ease-in;
          -moz-transition: all 370ms ease-in;
          -o-transition: all 370ms ease-in;
          -ms-transition: all 370ms ease-in;
          transition: all 370ms ease-in;
      }
      .close-layer.visible {
          opacity: 1;
      }
      .navbar-toggler .icon-bar {
          display: block;
          position: relative;
          background: #555 !important;
          width: 24px;
          height: 2px;
          border-radius: 1px;
          margin: 0 auto;
      }
      .navbar-header .navbar-toggler {
          padding: 15px;
          margin-top: 4px;
          width: 40px;
          height: 40px;
      }
      .bar1,.bar2,.bar3 {
          outline: 1px solid transparent;
      }
      @keyframes topbar-x {
          0% {
              top: 0px;
              transform: rotate(0deg);
          }
          45% {
              top: 6px;
              transform: rotate(145deg);
          }
          75% {
              transform: rotate(130deg);
          }
          100% {
              transform: rotate(135deg);
          }
      }
      @-webkit-keyframes topbar-x {
          0% {
              top: 0px;
              -webkit-transform: rotate(0deg);
          }
          45% {
              top: 6px;
              -webkit-transform: rotate(145deg);
          }
          75% {
              -webkit-transform: rotate(130deg);
          }
          100% {
              -webkit-transform: rotate(135deg);
          }
      }
      @-moz-keyframes topbar-x {
          0% {
              top: 0px;
              -moz-transform: rotate(0deg);
          }
          45% {
              top: 6px;
              -moz-transform: rotate(145deg);
          }
          75% {
              -moz-transform: rotate(130deg);
          }
          100% {
              -moz-transform: rotate(135deg);
          }
      }
      @keyframes topbar-back {
          0% {
              top: 6px;
              transform: rotate(135deg);
          }
          45% {
              transform: rotate(-10deg);
          }
          75% {
              transform: rotate(5deg);
          }
          100% {
              top: 0px;
              transform: rotate(0);
          }
      }
      @-webkit-keyframes topbar-back {
          0% {
              top: 6px;
              -webkit-transform: rotate(135deg);
          }
          45% {
              -webkit-transform: rotate(-10deg);
          }
          75% {
              -webkit-transform: rotate(5deg);
          }
          100% {
              top: 0px;
              -webkit-transform: rotate(0);
          }
      }
      @-moz-keyframes topbar-back {
          0% {
              top: 6px;
              -moz-transform: rotate(135deg);
          }
          45% {
              -moz-transform: rotate(-10deg);
          }
          75% {
              -moz-transform: rotate(5deg);
          }
          100% {
              top: 0px;
              -moz-transform: rotate(0);
          }
      }
      @keyframes bottombar-x {
          0% {
              bottom: 0px;
              transform: rotate(0deg);
          }
          45% {
              bottom: 6px;
              transform: rotate(-145deg);
          }
          75% {
              transform: rotate(-130deg);
          }
          100% {
              transform: rotate(-135deg);
          }
      }
      @-webkit-keyframes bottombar-x {
          0% {
              bottom: 0px;
              -webkit-transform: rotate(0deg);
          }
          45% {
              bottom: 6px;
              -webkit-transform: rotate(-145deg);
          }
          75% {
              -webkit-transform: rotate(-130deg);
          }
          100% {
              -webkit-transform: rotate(-135deg);
          }
      }
      @-moz-keyframes bottombar-x {
          0% {
              bottom: 0px;
              -moz-transform: rotate(0deg);
          }
          45% {
              bottom: 6px;
              -moz-transform: rotate(-145deg);
          }
          75% {
              -moz-transform: rotate(-130deg);
          }
          100% {
              -moz-transform: rotate(-135deg);
          }
      }
      @keyframes bottombar-back {
          0% {
              bottom: 6px;
              transform: rotate(-135deg);
          }
          45% {
              transform: rotate(10deg);
          }
          75% {
              transform: rotate(-5deg);
          }
          100% {
              bottom: 0px;
              transform: rotate(0);
          }
      }
      @-webkit-keyframes bottombar-back {
          0% {
              bottom: 6px;
              -webkit-transform: rotate(-135deg);
          }
          45% {
              -webkit-transform: rotate(10deg);
          }
          75% {
              -webkit-transform: rotate(-5deg);
          }
          100% {
              bottom: 0px;
              -webkit-transform: rotate(0);
          }
      }
      @-moz-keyframes bottombar-back {
          0% {
              bottom: 6px;
              -moz-transform: rotate(-135deg);
          }
          45% {
              -moz-transform: rotate(10deg);
          }
          75% {
              -moz-transform: rotate(-5deg);
          }
          100% {
              bottom: 0px;
              -moz-transform: rotate(0);
          }
      }
      .navbar-toggler .icon-bar:nth-child(2) {
          top: 0px;
          -webkit-animation: topbar-back 500ms linear 0s;
          -moz-animation: topbar-back 500ms linear 0s;
          animation: topbar-back 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler .icon-bar:nth-child(3) {
          opacity: 1;
      }
      .navbar-toggler .icon-bar:nth-child(4) {
          bottom: 0px;
          -webkit-animation: bottombar-back 500ms linear 0s;
          -moz-animation: bottombar-back 500ms linear 0s;
          animation: bottombar-back 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(2) {
          top: 6px;
          -webkit-animation: topbar-x 500ms linear 0s;
          -moz-animation: topbar-x 500ms linear 0s;
          animation: topbar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(3) {
          opacity: 0;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(4) {
          bottom: 6px;
          -webkit-animation: bottombar-x 500ms linear 0s;
          -moz-animation: bottombar-x 500ms linear 0s;
          animation: bottombar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      @-webkit-keyframes fadeIn {
          0% {
              opacity: 0;
          }
          100% {
              opacity: 1;
          }
      }
      @-moz-keyframes fadeIn {
          0% {
              opacity: 0;
          }
          100% {
              opacity: 1;
          }
      }
      @keyframes fadeIn {
          0% {
              opacity: 0;
          }
          100% {
              opacity: 1;
          }
      }
      .dropdown-menu .divider {
          background-color: rgba(229, 229, 229, 0.15);
      }
      .navbar-nav {
          margin: 1px 0;
      }
      .navbar-nav .open .dropdown-menu>li>a {
          padding: 15px 15px 5px 50px;
      }
      .navbar-nav .open .dropdown-menu>li:first-child>a {
          padding: 5px 15px 5px 50px;
      }
      .navbar-nav .open .dropdown-menu>li:last-child>a {
          padding: 15px 15px 25px 50px;
      }
      [class*="navbar-"] .navbar-nav>li>a,
      [class*="navbar-"] .navbar-nav>li>a:hover,
      [class*="navbar-"] .navbar-nav>li>a:focus,
      [class*="navbar-"] .navbar-nav .active>a,
      [class*="navbar-"] .navbar-nav .active>a:hover,
      [class*="navbar-"] .navbar-nav .active>a:focus,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:hover,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:focus,
      [class*="navbar-"] .navbar-nav .navbar-nav .open .dropdown-menu>li>a:active {
          color: white;
      }
      [class*="navbar-"] .navbar-nav>li>a,
      [class*="navbar-"] .navbar-nav>li>a:hover,
      [class*="navbar-"] .navbar-nav>li>a:focus,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:hover,
      [class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:focus {
          opacity: .7;
          background: transparent;
      }
      [class*="navbar-"] .navbar-nav.navbar-nav .open .dropdown-menu>li>a:active {
          opacity: 1;
      }
      [class*="navbar-"] .navbar-nav .dropdown>a:hover .caret {
          border-bottom-color: #777;
          border-top-color: #777;
      }
      [class*="navbar-"] .navbar-nav .dropdown>a:active .caret {
          border-bottom-color: white;
          border-top-color: white;
      }
      .dropdown-menu {
          display: none;
      }
      .navbar-fixed-top {
          -webkit-backface-visibility: hidden;
      }
      .social-line .btn {
          margin: 0 0 10px 0;
      }
      .subscribe-line .form-control {
          margin: 0 0 10px 0;
      }
      .social-line.pull-right {
          float: none;
      }
      .footer:not(.footer-big) nav>ul li {
          float: none;
      }
      .social-area.pull-right {
          float: none !important;
      }
      .form-control+.form-control-feedback {
          margin-top: -8px;
      }
      .navbar-toggle:hover,
      .navbar-toggle:focus {
          background-color: transparent !important;
      }
      .media-post .author {
          width: 20%;
          float: none !important;
          display: block;
          margin: 0 auto 10px;
      }
      .media-post .media-body {
          width: 100%;
      }
      .navbar-collapse.collapse {
          height: 100% !important;
      }
      .navbar-collapse.collapse.in {
          display: block;
      }
      .navbar-header .collapse,
      .navbar-toggle {
          display: block !important;
      }
      .navbar-header {
          float: none;
      }
      .navbar-collapse .nav p {
          font-size: 1rem;
          margin: 0;
      }
      /* .navbar-toggler .icon-bar {
          display: block;
          position: relative;
          background: #555 !important;
          width: 24px;
          height: 2px;
          border-radius: 1px;
          margin: 0 auto;
      }
      .navbar-toggler .icon-bar:nth-child(4) {
          bottom: 0px;
          -webkit-animation: bottombar-back 500ms linear 0s;
          -moz-animation: bottombar-back 500ms linear 0s;
          animation: bottombar-back 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(2) {
          top: 6px;
          -webkit-animation: topbar-x 500ms linear 0s;
          -moz-animation: topbar-x 500ms linear 0s;
          animation: topbar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(2) {
          top: 6px;
          -webkit-animation: topbar-x 500ms linear 0s;
          -moz-animation: topbar-x 500ms linear 0s;
          animation: topbar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(3) {
          opacity: 0;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(4) {
          bottom: 6px;
          -webkit-animation: bottombar-x 500ms linear 0s;
          -moz-animation: bottombar-x 500ms linear 0s;
          animation: bottombar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(2) {
          top: 6px;
          -webkit-animation: topbar-x 500ms linear 0s;
          -moz-animation: topbar-x 500ms linear 0s;
          animation: topbar-x 500ms 0s;
          -webkit-animation-fill-mode: forwards;
          -moz-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
      }
      .navbar-toggler.toggled .icon-bar:nth-child(3) {
          opacity: 0;
      }
      .navbar .navbar-toggler .navbar-toggler-icon+.navbar-toggler-icon {
          margin-top: 4px;
      } */
      .content .issue-content-clicked{
          display: block !important;
      }
      .content .issue-content{
          /* display: -webkit-box;
          text-indent: 1.5em;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden; */
      }
      .max-card-width{
          transition: 0.2s;
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-card-content-open{
          z-index: 999;
          position: absolute;
          right: 0px;
          left: 10px;
      }
      .max-card-content-close{
          z-index: inherit;
          position: relative;
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


      @media (max-width: 414px){
          .d-sm-none{
              display: none !important;
          }
          .max-iframe-summernote,.wrap-iframe-summernote{
              height: 390px !important;
          }
          .note-editor > .note-editable{
              height: 250px !important;
          }
      }
      @media (min-width: 992px){

          .max-input.d-lg-block {
              display: flex !important;
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
      .issue-content > b   {
          font-weight: bold;
      }

      .max-image-loading{
          animation-name: spin;
          animation-duration: 1500ms;
          animation-iteration-count: infinite;
          animation-timing-function: linear;
      }

      @keyframes spin {
          from {
              transform:rotate(0deg);
          }
          to {
              transform:rotate(360deg);
          }
      }
      b, strong {
          font-weight: bold !important;
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
          z-index: 1;
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
      .max-col{
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-display > .max-col:first-child{
          width: 10%;
      }
      .max-display > .max-col:last-child{
          width: 90%;
      }
      .max-btn{
          padding: 0.46875rem 1rem;
          display: none;
      }

      .btn-modal-edit-issue{
          padding-top: 0.95em !important;
          /* margin-right: 0px !important; */
          margin-left: 0px !important;
      }
      .max-card-content-open > .card > .card-header > .max-card-text{
          flex: 0 0 83.333333%;
          max-width: 83.333333%;
      }
      .max-card-text{
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
      }
      .max-card-icon{
          display: none;
          position: relative;
          width: 100px;
          min-height: 1px;
          padding-right: 15px;
          padding-left: 15px;
          /* flex: 0 0 8.333333%;
          max-width: 8.333333%; */
          cursor: pointer;
      }
      .max-card-icon > i{
          position: absolute;
          top: 33px;
          left: 38px;

      }

      /**/
      .sidebar::before{
          background-color: unset;
      }
      .sidebar .logo,.sidebar .sidebar-wrapper{
          background-color: #fff;
      }

      /*my top nav*/
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
      select {
        text-align: center;
        text-align-last: center;
        /* webkit*/
      }
      option {
        text-align: left;
        /* reset to left*/
      }

      /*table*/
      .wrap-card-quotation .table .row{
          padding: 0px !important;
      }
      .wrap-card-quotation .table.table-bordered{
          border: 0px !important;
      }
      .wrap-card-quotation .table-bordered th,
      .wrap-card-quotation .table-bordered td {
        border: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table th{
          border-right: 0px !important;
          border-bottom: 0px !important;
      }
      .wrap-card-quotation .table th:last-child{
          border-right: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table tr > td{
          border-right: 0px !important;
      }
      .wrap-card-quotation .table tr.list-q_product:last-child > td{
          border-bottom: 0px !important;
      }
      .wrap-card-quotation .table tr > td:last-child{
          border-right: 1px solid #736a6a !important;
      }
      .wrap-card-quotation .table tr:not(:first-child) > td{
          border-top: 0px !important;
      }
      /*form add question*/
      .form-add-quotation .row{
          padding-top: 5px;
          padding-bottom: 5px;
      }
      .bmd-form-group:not(.has-success):not(.has-danger) [class^='bmd-label'].bmd-label-floating, .bmd-form-group:not(.has-success):not(.has-danger) [class*=' bmd-label'].bmd-label-floating{
          color: #000000;
      }
      .wrap-input{
          padding-top: 5px;
          padding-bottom: 5px;
      }
      /*check box*/
      .form-check .form-check-input:checked+.form-check-sign .check {
          background: #04afc4;
      }

      /*preview quotation*/
      .wrap-data-quotation .q_to,.wrap-data-quotation .q_to_detail{
          padding: 10px 0px;
      }
      .wrap-data-quotation .table.q_product th{
          border-top:1px solid #ccc;
          border-left:1px solid #ccc;
          border-bottom: 4px double #000 !important;
      }
      .wrap-data-quotation .table.q_product th:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-quotation .table.q_product td{
          border-left:1px solid #ccc;
          /* text-align: center; */
      }
      .wrap-data-quotation .table.q_product td:last-child{
          border-right:1px solid #ccc;
      }
      .wrap-data-quotation .table.q_product tr:last-child td{
          border-bottom:1px solid #ccc;
      }
      .list-quotation .table thead tr th{
          font-size: 12px !important;
      }
      .list-quotation .card .table tr td{
          font-size: 12px !important;
      }
      /* table quotation*/
      .list-quotation .table thead tr th{
          border-top: 1px solid #ccc;
          text-align: center;
      }
      .navbar .form-search .bmd-form-group {
          display: inline-block;
          padding-top: 0;
      }
      .sum-all{
          font-size: 18px !important;
      }
      /*table report*/
      .bg-test:nth-child(2n+1){
          /* background: red; */
      }
      .bg-light-primary{
          background-color: #2196f32e !important;
      }
      .bg-light-info{
          background-color: #00bcd42e !important;
      }
      .bg-light-success{
          background-color: #4caf5047 !important;
      }
      .bg-light-danger{
          background-color: #f4433647 !important;
      }
      .bg-light-warning{
          background-color: #ffeb3b47 !important;
      }
      .font-weight-bold{
          font-weight: 700 !important;
      }
  </style>
</head>

<body class="">
    <div class="modal fade bd-example-modal-xl modal-loading-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบเสนอราคา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-quotation p-3"></div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl modal-preview-quotation" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">ใบเสนอราคา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body wrap-data-quotation p-3"></div>
                <div class="modal-footer d-flex justify-content-between"></div>
            </div>
        </div>
    </div>


  <div class="wrapper max-wrapper">
      <?php $this->view('partail/left_nav') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid d-flex justify-content-between">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">รายงานใบเสนอราคา</a>
          </div>
          <button class="navbar-toggler d-inline-block" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <!-- <div class="collapse navbar-collapse max-top-nav justify-content-end">
            <ul class="nav justify-content-end"></ul>
          </div> -->
        </div>
        <hr>
      </nav>
      <!-- End Navbar -->
      <div class="content">

        <div class="container-fluid">
            <div class="row justify-content-between ">
                <div class="col-lg-4 col-md-12 list-status">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">เลือกวันที่สั่งพิมพ์</h4>
                            <!-- <p class="card-category">New employees on 15th September, 2016</p> -->
                        </div>
                        <div class="card-body table-responsive">
                            <form class="form-default-report" action="<?php echo $this->base_url('quotation/report/print') ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating"><strong>วันที่เริ่มต้น</strong></label>
                                            <input type="date" class="form-control" name="date_start" value="<?php echo date('Y') ?>-01-01">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating"><strong>วันทสิ้นสุด</strong></label>
                                            <input type="date" class="form-control" name="date_end" value="<?php echo date('Y') ?>-12-31">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 justify-content-end d-flex">
                                        <!-- <button type="button" class="btn btn-warning btn-default-report"><i class="material-icons">search</i>&nbsp;&nbsp;&nbsp;ค้นหา</button> -->
                                        <button type="submit" class="btn btn-success btn-print-report"><i class="material-icons">print</i>&nbsp;&nbsp;&nbsp;พิมพ์</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 list-status">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">สรุปรายงาน</h4>
                            <!-- <p class="card-category">New employees on 15th September, 2016</p> -->
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-info">
                                    <tr>
                                        <th>สถานะ</th>
                                        <th>รายการ</th>
                                        <th>จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row list-quotation">
                <div class="col-lg-12 col-md-12">
              <div class="card card-equipment-list">
                <div class="card-header row d-flex justify-content-between">
                    <div class="card-header-info col-8">
                        <h4 class="card-title">รายการใบเสนอราคา</h4>
                        <p class="card-category"></p>
                    </div>
                    <!-- <div class="card-header-info text-center" style="width: fit-content !important">
                        <h4 class="card-title">ทั้งหมด <b>0</b> รายการ</h4>
                    </div> -->
                </div>
                <div class="card-body table-responsive">
                    <div class="navbar">
                        <div class="form-search col-md-12">
                            <div class="row justify-content-around d-flex">
                                <!-- <div class="form-group">
                                    <label class="text-dark">เลขที่ใบเสนอราคา : </label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control search-q_number" name="search-number"  value="">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="text-dark">วันที่เริ่มต้น : </label>
                                    <div class="form-group bmd-form-group">
                                        <input type="date" class="form-control search-date-start" name="search-date-start"  value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">วันที่สิ้นสุด : </label>
                                    <div class="form-group bmd-form-group">
                                        <input type="date" class="form-control search-date-end" name="search-date-end" value="">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="form-group bmd-form-group pl-1 pr-1">
                                        <select class="custom-select search-cate" name="search-cate">
                                            <option value="">ประเภท</option>
                                            <option value="new">สร้างใหม่</option>
                                            <option value="edit">ต้องแก้ไข</option>
                                            <option value="approved">หัวหน้าอนุมัติ</option>
                                            <option value="customer_created">สั่งพิมพ์แล้ว</option>
                                            <option value="customer_approved">ลูกค้าอนุมัติ</option>
                                            <option value="customer_reject">ลูกค้ายกเลิก</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group bmd-form-group pl-1 pr-1">
                                        <select class="custom-select search-sort" name="search-sort" aria-label="Example select with button addon">
                                            <option value="">จัดเรียง</option>
                                            <option value="desc">ล่าสุด - เก่าสุด</option>
                                            <option value="asc">เก่าสุด - ล่าสุด</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-round btn-warning text-white btn-reset-search">
                                            <i class="material-icons">autorenew</i> ล้างค่า
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered tb-quotation-list">
                        <thead class="text-info">
                            <tr>
                                <th rowspan="2">หัวหน้าเขต</th>
                                <th rowspan="2">ช่างเขต</th>
                                <th  colspan="2">ยอดเสนอราคา</th>
                                <th  colspan="2">ยอดอนุมัติ</th>
                                <th  colspan="2">ยกเลิกเสนอราคา</th>
                                <th  colspan="2">รออนุมัติ</th>
                                <!-- <th class="p-0">
                                    <div class="row col-md-12 m-0 p-0">
                                        <div class="col-md-12 border-bottom">ยอดเสนอราคา</div>
                                        <div class="col-md-6 border-right">จำนวนใบเสนอราคา</div>
                                        <div class="col-md-6">จำนวนเงินเสนอราคา</div>
                                    </div>
                                </th>
                                <th class="p-0">
                                    <div class="row col-md-12 m-0 p-0">
                                        <div class="col-md-12 border-bottom">ยอดอนุมัติ</div>
                                        <div class="col-md-4">จำนวนใบเสนอราคา</div>
                                        <div class="col-md-8">จำนวนเงินเสนอราคา</div>
                                    </div>
                                </th>
                                <th class="p-0">
                                    <div class="row col-md-12 m-0 p-0">
                                        <div class="col-md-12 border-bottom">ยกเลิกเสนอราคา</div>
                                        <div class="col-md-4">จำนวนใบเสนอราคา</div>
                                        <div class="col-md-8">จำนวนเงินเสนอราคา</div>
                                    </div>
                                </th>
                                <th class="p-0">
                                    <div class="row col-md-12 m-0 p-0">
                                        <div class="col-md-12 border-bottom">รออนุมัติ</div>
                                        <div class="col-md-4">จำนวนใบเสนอราคา</div>
                                        <div class="col-md-8">จำนวนเงินเสนอราคา</div>
                                    </div>
                                </th> -->
                            </tr>
                            <tr>
                                <th>จำนวนใบเสนอราคา</th>
                                <th>จำนวนเงินเสนอราคา</th>
                                <th>จำนวนใบเสนอราคา</th>
                                <th>จำนวนเงินเสนอราคา</th>
                                <th>จำนวนใบเสนอราคา</th>
                                <th>จำนวนเงินเสนอราคา</th>
                                <th>จำนวนใบเสนอราคา</th>
                                <th>จำนวนเงินเสนอราคา</th>
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
 <script src="<?php echo $this->public_url('libs/chosen/js/chosen.jquery.min.js') ?>"></script>
 <script src="<?php echo $this->public_url('libs/autocomplete/js/jquery.autocomplete.js') ?>"></script>
  <!-- <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script> -->


  <script type="text/javascript">

    $(document).ready(function() {
        //ต้องมีด้วยว่าคนไหนมีสิทธิ์ search อะไรบ้าง
            //น่าจะตามสิทธิ์ที่เห็นได้ว่าเห็นอะไรได้ บ้าง
        // $('.modal-preview-quotation').modal('show');
        // $('.row-add-quotation').show(500);

        // setInterval(test, 3000); // ทำ notification paramiter เป็น (function(),timer)
        btn_to_top();
        material_input();
        list_customer();
        list_product();
        loading_gif($('.form-add-quotation .table-q_product  .wrap-list-product'));
        get_number_quotation();
        list_service_name();
        list_quotation();
        list_brand();


        /*form default*/
        $('.form-default-report').on('click','.btn-default-report',function(key,value){
            let date_start = $('.form-default-report input[name=date_start]').val();
            let date_end = $('.form-default-report input[name=date_end]').val();
            $.ajax({
                url: '<?php echo $this->base_url("quotation/report") ?>',
                method: 'post',
                data: {date_start:date_start,date_end:date_end},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let html = '';
                    var select_search = '<option value="">ประเภท</option>';
                    if (data[0] == 'success') {
                        let btn = []
                        let count_btn = 0;
                        $.each(data[1],function(key,value){
                            let q_date = value.q_date;
                            q_date = q_date.substr(0, 4);
                            q_date = parseInt(q_date)+543;
                            html += '<tr  q_id="'+value.q_id+'">';
                            let q_num = value.q_num;
                            q_num = q_num.toString();
                            if (q_num.length < 3) {
                                let add_zero = '';
                                for (var i = q_num.length; i < 3; i++) {
                                    add_zero = add_zero+'0';
                                }
                                q_num = add_zero+q_num;
                            }
                            html += '<td>'+value.q_type +'.'+ q_num+'/'+q_date+'</td>';
                            html += '<td>'+value.q_create_date_th+'</td>';
                            html += '<td>'+value.q_ro+'</td>';
                            html += '<td>'+value.q_service_name+'</td>';
                            html += '<td>'+value.q_head_service_name+'</td>';
                            // html += '<td>'+value.q_type+'</td>';
                            html += '<td>'+value.q_brand+'</td>';
                            html += '<td>'+value.q_sn+'</td>';
                            html += '<td>'+value.q_customer_name+'</td>';
                            html += '<td>'+value.q_customer_department+'</td>';
                            html += '<td>'+value.q_model+'</td>';
                            html += '<td>'+'-</td>';
                            html += '<td>'+'-</td>';
                            html += '<td>'+value.total_price+'</td>';
                            html += '<td>'+value.q_discount+'</td>';
                            html += '<td>'+value.sum_total+'</td>';
                            html += '<td>'+value.q_po+'</td>';
                            html += '<td>'+value.q_po_date+'</td>';
                            // html += '<td>'+'-</td>';
                            // html += '<td>'+'-</td>';
                            html += '<td>'+value.q_remark_customer+'</td>';
                            // html += '<td>'+value.q_customer_name+'</td>';
                            let q_status = value.q_status;
                            switch (q_status) {
                                case 'new':
                                    q_status = '<span class="text-info">สร้างใหม่</span>';
                                    break;
                                case 'edit':
                                    q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                    break;
                                case 'cancel':
                                    q_status = '<span class="text-danger">ยกเลิก</span>';
                                    break;
                                case 'approved':
                                    q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                    if (value.q_status_customer != ''){
                                        switch (value.q_status_customer) {
                                            case 'created':
                                                q_status += ',<span class="text-danger">สั่งพิมพ์แล้ว</span>';
                                                break;
                                            case 'reject':
                                                q_status += ',<span class="text-danger">ลูกค้ายกเลิก</span>';
                                                break;
                                            case 'approved':
                                                q_status += ',<span class="text-success">ลูกค้าอนุมัติ</span>';
                                                break;
                                            default:
                                        }
                                    }
                                    break;
                                default:
                            }
                            html += '<td>'+q_status+'</td>';
                            // html += '<td>';
                            // html += '<button class="btn btn-info btn-option" option-type="check"><i class="material-icons">visibility</i> ตรวจสอบ</button>';
                            // html += '</td>';
                            // html += '<td>'+value.+'</td>';
                            html += '</tr>';
                        });
                        // $('.navbar select.search-cate').html(select_search);
                        let html_status = '';
                        $.each(data[2].status,function(key,value){
                            let q_status = key;
                            switch (q_status) {
                                case 'new':
                                    q_status = '<span class="text-info">สร้างใหม่</span>';
                                    break;
                                case 'edit':
                                    q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                    break;
                                case 'cancel':
                                    q_status = '<span class="text-danger">ยกเลิก</span>';
                                    break;
                                case 'approved':
                                    q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                    break;
                                case 'cuscreated':
                                    q_status = '<span class="text-danger">สั่งพิมพ์แล้ว</span>';
                                    break;
                                case 'cusreject':
                                    q_status = '<span class="text-danger">ลูกค้ายกเลิก</span>';
                                    break;
                                case 'cusapproved':
                                    q_status = '<span class="text-success">ลูกค้าอนุมัติ</span>';
                                    break;
                                default:
                            }
                            html_status += '<tr status="'+key+'">';
                            html_status += '<td>'+q_status+'</td>';
                            html_status += '<td>'+value+'</td>';
                            html_status += '</tr>';
                        });
                        html_status += '<tr class="sum-all">';
                        html_status += '<td>รวมทั้งหมด</td>';
                        html_status += '<td class="justify-content-center d-flex"><span class="text-info">'+data[2].sum_all+'</span> <span>&nbsp;&nbsp;&nbsp;บาท</span></td>';
                        html_status += '</tr>';
                        let num_order = data[1].length;
                        $('.content .list-quotation .card-title b').html(num_order);
                        $('.content .list-quotation tbody').html(html);
                        $('.content .list-status tbody').html(html_status);
                        // $('.content .list-status .sum-all').html('<span class="text-info">'+data[2].sum_all+'</span> บาท');
                    }else if(data[0] == 'empty'){
                        let colspan = $('.list-quotation .tb-quotation-list thead tr th').length;
                        html += '<tr><td class="text-center" colspan="'+colspan+'">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-quotation tbody').html(html);
                        html = '<tr><td class="text-center" colspan="2">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-status tbody').html(html);
                        $('.content .list-quotation .card-title b').html('0');
                        // $('.navbar select.search-cate').html(select_search);
                    }
                    if (check_call_function) {
                        search_sort(data[1]);
                        check_call_function = false;
                    }
                }
            });
        });

        function search_sort(data){
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
                let last_month = '';
                $.each(data,function(key,value){
                    $.each(value,function(key_month,value_month){
                        html += '<thead class="text-info">';
                        html += '<tr>';
                        html += '<th colspan="10" class="text-center bg-light-info">'+month_th(key_month)+' '+(parseInt(key)+543)+'</th>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<th rowspan="2" style="min-width:80px">หัวหน้าเขต</th>';
                        html += '<th rowspan="2" style="min-width:80px">ช่างเขต</th>';
                        html += '<th colspan="2" class="bg-light-primary">ยอดเสนอราคา</th>';
                        html += '<th colspan="2" class="text-success bg-light-success">ยอดอนุมัติ</th>';
                        html += '<th colspan="2" class="text-danger bg-light-danger">ยกเลิกเสนอราคา</th>';
                        html += '<th colspan="2" class="text-warning bg-light-warning">รออนุมัติ</th>';
                        html += '</tr>';
                        html += '<tr class="text-dark">';
                        html += '<th class="bg-light">จำนวนใบเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                        html += '<th class="bg-light" style="padding-leftf: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                        html += '</tr>';
                        html += '</thead>';
                        last_month = key+'-'+key_month;
                        $.each(value_month,function(key_sup,value_sup){
                            let check_service = 0;
                            let count_service = 0;
                            for(var key_count in value_sup) if(value_sup.hasOwnProperty(key_count)) count_service++; //count for rowspan of head
                            $.each(value_sup,function(key_service,value_service){
                                if (key_service != 'total' && key_service != 'count') {
                                    html += '<tr>';
                                    if (check_service == 0) {
                                        html += '<td rowspan="'+(count_service - 1)+'" class="text-center">'+key_sup+'</td>';
                                    }
                                    html += '<td >'+key_service+'</td>';
                                    html += '<td class="text-right">'+value_service.all.num_text+'</td>';
                                    html += '<td class="text-right">'+value_service.all.sum_text+'</td>';
                                    html += '<td class="text-right">'+value_service.approved.num_text+'</td>';
                                    html += '<td class="text-right">'+value_service.approved.sum_text+'</td>';
                                    html += '<td class="text-right">'+value_service.reject.num_text+'</td>';
                                    html += '<td class="text-right">'+value_service.reject.sum_text+'</td>';
                                    html += '<td class="text-right" style="background-color:#fceada">'+value_service.wait.num_text+'</td>';
                                    html += '<td class="text-right" style="background-color:#eaf0de">'+value_service.wait.sum_text+'</td>';
                                    html += '</tr>';
                                    check_service++;
                                }
                                if (check_service == (count_service - 1)) {
                                    html += '<tr class="text-danger font-weight-bold" style="background-color:#f4433614">';
                                    html += '<td class="text-center" colspan="2">สรุปยอดรวม</td>';
                                    html += '<td class="text-right">'+value_sup['total'].all.num_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].all.sum_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].approved.num_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].approved.sum_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].reject.num_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].reject.sum_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].wait.num_text+'</td>';
                                    html += '<td class="text-right">'+value_sup['total'].wait.sum_text+'</td>';
                                    html += '</tr>';
                                }
                            });
                        });
                    });
                });

                $('.content .list-quotation table').html(html);
                $('.content .list-quotation table').attr('last_month',last_month);
            })
            .on('change keyup','.search-q_number,.search-date-start,.search-date-end,.search-sort,.search-cate',function(e){
                let q_number = $('.navbar .form-search .search-q_number').val();
                let date_start = $('.navbar .form-search .search-date-start').val();
                let date_end = $('.navbar .form-search .search-date-end').val();
                let sort = $('.navbar .form-search .search-sort').val();
                let cate = $('.navbar .form-search .search-cate').val();
                let cate_text = $('.navbar .form-search .search-cate option:selected').html();
                let data_search = [];
                let key_data_search = 0;
                if (date_start != '' || date_end != '') {
                    if ((date_start != '' && date_end != '') && (date_end < date_start)) {
                        let data_swap = date_start;
                        date_start = date_end;
                        date_end = data_swap;
                    }
                    $.ajax({
                        url: '<?php echo $this->base_url('quotation/report') ?>',
                        method: 'post',
                        data: {date_start:date_start,date_end:date_end},
                        async: false,
                        dataType: 'json',
                        success: function(respond){
                            if (respond[0] == 'success') {
                                data_search = respond[1];
                            }
                        }
                    })
                    // for (var i = 0; i < data.length; i++) {
                    //     let date = data[i].q_date;
                    //     date = date.split(' ');
                    //     date = date[0];
                    //     if (date_start != '' && date_end != '') {
                    //         if (date >= date_start && date <= date_end) {
                    //             data_search[key_data_search++] = data[i];
                    //         }
                    //     }else if (date_start != '' && date_end == '') {
                    //         if (date >= date_start) {
                    //             data_search[key_data_search++] = data[i];
                    //         }
                    //     }else if (date_end != '' && date_start == '') {
                    //         if (date >= date_end) {
                    //             data_search[key_data_search++] = data[i];
                    //         }
                    //         date_start = date_end; //ใช้ assign ค่าใว้ใช้เมื่อ search ไม่เจอ
                    //         date_end = '';
                    //     }
                    //
                    // }
                }else {
                    data_search = data;
                }

                if (data_search.length > 0 && sort != '') {
                    switch (sort) {
                        case 'asc':
                            //ยังไม่มีคำสั่งภายในนี้เพราะ ข้อมูลได้ทำการเรียงจาก ล่าสุดไปเก่าสุดอยู่แล้ว
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

                // if (cate != '') {
                //     if (cate.indexOf('customer_') > -1) {
                //         cate = cate.split('customer_');
                //         cate = cate[1];
                //         var data_search_cate = [];
                //         let data_key_cate = 0;
                //         for (var i = 0; i < data_search.length; i++) {
                //             if (data_search[i].q_status_customer == cate) {
                //                 data_search_cate[data_key_cate++] = data_search[i];
                //             }
                //         }
                //     }else {
                //         var data_search_cate = [];
                //         let data_key_cate = 0;
                //         for (var i = 0; i < data_search.length; i++) {
                //             if (data_search[i].q_status == cate) {
                //                 data_search_cate[data_key_cate++] = data_search[i];
                //             }
                //         }
                //
                //     }
                //     data_search = data_search_cate;
                // }
                // if (q_number != '') {
                //     q_number = q_number.toUpperCase();
                //     let data_search_q_number = [];
                //     let data_key_q_number = 0;
                //     for (var i = 0; i < data_search.length; i++) {
                //         let data_q_number = data_search[i].q_number
                //         if (data_q_number.indexOf(q_number) > -1 ) {
                //             data_search_q_number[data_key_q_number++] = data_search[i];
                //         }
                //     }
                //     data_search = data_search_q_number;
                // }
                let html = '';
                let check_month = '0';
                if (data_search.length < 1) {
                    let text = 'ไม่มีใบเสนอราคาที่ ';
                    let date_start_split = '';
                    if (cate != '') {
                        text += '<span class="text-'+cate+'">'+cate_text+'</span><br>';
                    }
                    if (date_start != '') {
                        date_start_split = date_start.split('-');
                        text += 'เริ่มต้นตั้งแต่ <br>วันที่ <b>'+date_start_split[2]+'/'+date_start_split[1]+'/'+(parseInt(date_start_split[0])+543)+'</b>';
                    }
                    if (date_end != '') {
                        let date_end_split = date_end.split('-');
                        // text = 'ไม่มีการแจ้งปัญหาระหว่าง <br>'+text;
                        text += '<br> ถึง <b>'+date_end_split[2]+'/'+date_end_split[1]+'/'+(parseInt(date_end_split[0])+543)+'</b>';
                    }
                    let colspan = $('.list-quotation .tb-quotation-list thead tr th').length;
                    html += '<tr><td colspan="'+colspan+'" class="text-center" colspan="4">ไม่มีรายการใบเสนอราคาตามที่ค้นหา</td></tr>';
                    let number_order = 0;
                    $('.content .list-quotation .card-title b').html(number_order);
                    $('.content .list-quotation tbody').html(html);
                }else {
                    let check_line_today = 0;
                    let last_month = '';
                    $.each(data_search,function(key,value){
                        $.each(value,function(key_month,value_month){
                            html += '<thead class="text-info">';
                            html += '<tr>';
                            html += '<th colspan="10" class="text-center bg-light-info">'+month_th(key_month)+' '+(parseInt(key)+543)+'</th>';
                            html += '</tr>';
                            html += '<tr>';
                            html += '<th rowspan="2" style="min-width:80px">หัวหน้าเขต</th>';
                            html += '<th rowspan="2" style="min-width:80px">ช่างเขต</th>';
                            html += '<th colspan="2" class="bg-light-primary">ยอดเสนอราคา</th>';
                            html += '<th colspan="2" class="text-success bg-light-success">ยอดอนุมัติ</th>';
                            html += '<th colspan="2" class="text-danger bg-light-danger">ยกเลิกเสนอราคา</th>';
                            html += '<th colspan="2" class="text-warning bg-light-warning">รออนุมัติ</th>';
                            html += '</tr>';
                            html += '<tr class="text-dark">';
                            html += '<th class="bg-light">จำนวนใบเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                            html += '<th class="bg-light" style="padding-leftf: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                            html += '</tr>';
                            html += '</thead>';
                            last_month = key+'-'+key_month;
                            $.each(value_month,function(key_sup,value_sup){
                                let check_service = 0;
                                let count_service = 0;
                                for(var key_count in value_sup) if(value_sup.hasOwnProperty(key_count)) count_service++; //count for rowspan of head
                                $.each(value_sup,function(key_service,value_service){
                                    if (key_service != 'total' && key_service != 'count') {
                                        html += '<tr>';
                                        if (check_service == 0) {
                                            html += '<td rowspan="'+(count_service - 1)+'" class="text-center">'+key_sup+'</td>';
                                        }
                                        html += '<td >'+key_service+'</td>';
                                        html += '<td class="text-right">'+value_service.all.num_text+'</td>';
                                        html += '<td class="text-right">'+value_service.all.sum_text+'</td>';
                                        html += '<td class="text-right">'+value_service.approved.num_text+'</td>';
                                        html += '<td class="text-right">'+value_service.approved.sum_text+'</td>';
                                        html += '<td class="text-right">'+value_service.reject.num_text+'</td>';
                                        html += '<td class="text-right">'+value_service.reject.sum_text+'</td>';
                                        html += '<td class="text-right" style="background-color:#fceada">'+value_service.wait.num_text+'</td>';
                                        html += '<td class="text-right" style="background-color:#eaf0de">'+value_service.wait.sum_text+'</td>';
                                        html += '</tr>';
                                        check_service++;
                                    }
                                    if (check_service == (count_service - 1)) {
                                        html += '<tr class="text-danger font-weight-bold" style="background-color:#f4433614">';
                                        html += '<td class="text-center" colspan="2">สรุปยอดรวม</td>';
                                        html += '<td class="text-right">'+value_sup['total'].all.num_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].all.sum_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].approved.num_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].approved.sum_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].reject.num_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].reject.sum_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].wait.num_text+'</td>';
                                        html += '<td class="text-right">'+value_sup['total'].wait.sum_text+'</td>';
                                        html += '</tr>';
                                    }
                                });
                            });
                        });
                    });
                    $('.content .list-quotation table').html(html);
                    $('.content .list-quotation table').attr('last_month',last_month);
                }
            });
        }

        /*remove form product*/
        $('.form-add-quotation').on('click','.list-q_product .btn-delete-tr',function(){
            let tr_list_product = $(this).closest('.list-q_product');
            let i = 1;
            $(this).closest('tbody').find('.list-q_product').each(function(key,value){
                if ($(this).find('.number-order span').html() != i) {
                    $(this).find('.number-order span').html(i);
                    i++;
                }
            });
            $(this).closest('.list-q_product').remove();
        });

        /*get next number quotation*/
        function get_number_quotation(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/get_number_quotations') ?>',
                method: 'post',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let q_type = $('.form-add-quotation select[name=q_type]').val();
                        let q_num = data[1].toString();
                        if (q_num.length < 3) {
                            let add_zero = '';
                            for (var i = q_num.length; i < 3; i++) {
                                add_zero = add_zero+'0';
                            }
                            q_num = add_zero+q_num;
                        }
                        let date = new Date();
                        let year = parseInt(date.getFullYear()+543);
                        q_num = q_type+'.'+q_num+'/'+year;
                        $('.wrap-card-quotation .q_num').html('เลขที่ '+q_num);
                    }
                }
            });
        }

        /*when choose customer*/
        $('.form-add-quotation').on('change','select.list-customer',function(){
            let selec_value = $(this).find('option:selected').html();
            $('.form-add-quotation').find('input[name=q_to]').val('ผู้อำนวยการ '+selec_value);

        });

        /*select type quotation*/
        $('.form-add-quotation').on('change','select[name=q_type]',function(){
            let value = $(this).val();
            let q_num = $('.wrap-card-quotation .q_num').html();
            split_q_num = q_num.split('.');
            sub_q_num = split_q_num[0].split(' ');
            q_type = sub_q_num[1];
            q_num = q_num.replace(q_type,value);
            $('.wrap-card-quotation .q_num').html(q_num);
        });

        /*เปิด card form add quotation*/
        $('.btn-modal-add-quotation').click(function(){
            let check = $('.row-add-quotation .card .card-body input[name=type]').val();
                let value = $('.row-add-quotation .form-add-quotation input[name=q_date]').val();
                $('.row-add-quotation .card .card-header').removeClass('card-header-warning');
                $('.row-add-quotation .card .card-header').addClass('card-header-info');
                $('.row-add-quotation .card .card-header h4.card-title').html('สร้างใบเสนอราคา');
                $('.row-add-quotation .form-add-quotation input').each(function(key,value){
                    let input_name = $(this).attr('name');
                    let input_except = ['q_topic','q_to','q_to_detail','q_date'];
                    let check_name = true;
                    for (var i = 0; i < input_except.length; i++) {
                        if (input_except[i] != input_name) {
                            check_name = false;
                        }
                    }
                    if (check_name) {
                        $(this).val('');
                    }
                });
                $('.row-add-quotation .form-add-quotation select').each(function(key,value){
                    let select_name = $(this).attr('name');
                    if (select_name.indexOf('q_') > -1) {
                        if (select_name != 'q_type' && select_name != 'q_quanity_type') {
                            $(this).val('');
                        }
                    }
                });
                // $('.row-add-quotation .form-add-quotation select[name=q_type]').val(q_type);
                // $('.row-add-quotation .form-add-quotation input[name=q_date]').val(value);
                // $('.row-add-quotation .form-add-quotation input[name=q_topic]').val(q_topic);
                // $('.row-add-quotation .form-add-quotation input[name=q_to_detail]').val(q_to_detail);
                // $('.row-add-quotation .form-add-quotation select.q_quanity_type').val(q_quanity_type);
                // $('.row-add-quotation .form-add-quotation input[name=q_to').val(q_to);
                $('.row-add-quotation .form-add-quotation select[name*=q_]').trigger("chosen:updated");
                // $('.row-add-quotation .form-add-quotation input[name=add_quotation]').attr('name','update_quotation');
                $('.row-add-quotation .form-add-quotation').find('.bmd-form-group').removeClass('is-filled');
                $('.row-add-quotation .form-add-quotation').find('.bmd-form-group').removeClass('is-focused');
                $('.row-add-quotation .card .card-footer .btn-add-quotation').show();
                $('.row-add-quotation .card .card-footer .btn-edit-quotation').hide();

                $('.row-add-quotation .form-add-quotation input').each(function(key,value){
                    if ($(this).val() != '') {
                        $(this).closest('.form-group').addClass('is-filled');
                    }
                });
                $('.row-add-quotation .form-add-quotation .list-q_product').each(function(key,value){

                    if (key != 0) {
                        $(this).remove();
                    }else if(key == 0){
                        if ($(this).find('select').hasClass('q_quanity_type') == false) {
                            $(this).find('select').val('');
                        }
                        $(this).find('select').trigger("chosen:updated");
                        $(this).find('.manual-price').prop('checked',false);
                        $(this).find('.input-price').hide();
                        $(this).find('.select-price').show();
                    }
                });

            $('.row-add-quotation').show();
            $('html, body').animate({scrollTop:($(".row-add-quotation").offset().top)}, 500);
        });

        /*close form add*/
        $('.btn-cancel-quotation').click(function(){
            $('.row-add-quotation').hide();
        });

        /*manual price*/
        $('.form-add-quotation .table-q_product').on('click','.manual-price',function(){
            if ($(this).prop('checked') == true) {
                $(this).closest('.list-q_product').find('.select-price').hide();
                $(this).closest('.list-q_product').find('.input-price').show();
                $(this).closest('.list-q_product').find('.input-price input').attr('name','q_product_price[]');
                $(this).closest('.list-q_product').find('.select-price select').attr('name','');
            }else {
                $(this).closest('.list-q_product').find('.input-price').hide();
                $(this).closest('.list-q_product').find('.select-price').show();
                $(this).closest('.list-q_product').find('.input-price input').attr('name','');
                $(this).closest('.list-q_product').find('.select-price select').attr('name','q_product_price[]');
            }
        });

        function auto_price(data = []){
            $('.form-add-quotation').on('change','.table-q_product select.list-product',function(){
                let p_id = $(this).val();
                let data_price = [];
                $.each(data,function(key,value){
                    if (value.p_id == p_id) {
                        data_price[0] = value.p_price3;
                        data_price[1] = value.p_price2;
                        data_price[2] = value.p_price1;
                    }
                });
                let html = '';
                let remove_array = [];
                let key_remove = 0;
                for (var i = 0; i < data_price.length; i++) {
                    if (data_price[i] != '0') {
                        html += '<option value="'+data_price[i]+'">'+data_price[i]+'</option>';
                    }else {
                        remove_array[key_remove] = i;
                        key_remove++;
                    }
                }
                for (var i = 0; i < data_price.length; i++) {
                    if (i = remove_array[i]) {
                        data_price.splice(i, remove_array[i]);
                    }
                }
                if (data_price.length > 1) {
                    html = '<option value="">เลือกราคา..</option>'+html;
                }else {
                    $(this).closest('.list-q_product').find('select.list-price').closest('.form-group').find('.help-block').remove();
                }
                $(this).closest('.list-q_product').find('select.list-price').html(html)
            });
        }
        function list_brand(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_brand_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกแบรนด์..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.b_brand+'">'+value.b_brand+'</option>';
                        });
                        $('.form-add-quotation .list-brand').html(html);
                        $('.form-add-quotation .list-brand').chosen({allow_single_deselect: true,width: '100%'});
                    }
                }
            });
        }
        function list_service_name(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.id+','+value.first_name+' '+value.last_name+'">'+value.first_name+' '+value.last_name+' ('+value.division_th+')</option>';
                        });
                        $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                        $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%'});
                    }
                }
            });
        }
        function list_customer(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_customer_ajax') ?>',
                dataType: 'json',
                success: function (data){
                    if (data[0] == 'success') {
                        let html = '<option value="">เลือกลูกค้า..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.cus_id+'">'+value.cus_name+'</option>';
                        });
                        $('.form-add-quotation .list-customer').html(html);
                        $('.form-add-quotation .list-customer').chosen({allow_single_deselect: true,width: '100%'});
                    }
                }
            });
        }

        function list_product(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/list_product_ajax') ?>',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let html = '';
                        let product = [];
                        html += '<div class="form-group bmd-form-group">';
                        html += '<select class="form-control form-control-chosen list-product" name="q_product[]" data-placeholder="เลือกสินค้า..">';
                        html += '<option value="">เลือกสินค้า..</option>';
                        $.each(data[1],function(key,value){
                            html += '<option value="'+value.p_id+'">'+value.p_code+':'+value.p_detail+'</option>';
                        });
                        $('.form-add-quotation .table-q_product .wrap-list-product').html(html);
                        $('.form-add-quotation .table-q_product .wrap-list-product select.list-product').chosen();
                        auto_price(data[1]);
                    }
                }

            });
        }

        var check_call_function = true;
        function list_quotation(){
            $('.content .list-quotation tbody').html('<tr><td colspan="20" style="padding-bottom: 160px;"></td></tr>');
            loader($('.content .list-quotation tbody tr td'));
            $.ajax({
                url: '<?php echo $this->base_url('quotation/report') ?>',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    let html = '';
                    var select_search = '<option value="">ประเภท</option>';
                    if (data[0] == 'success') {
                        let btn = [];
                        let count_btn = 0;
                        let last_month = '';
                        $.each(data[1],function(key,value){
                            $.each(value,function(key_month,value_month){
                                html += '<thead class="text-info">';
                                html += '<tr>';
                                html += '<th colspan="10" class="text-center bg-light-info">'+month_th(key_month)+' '+(parseInt(key)+543)+'</th>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<th rowspan="2" style="min-width:80px">หัวหน้าเขต</th>';
                                html += '<th rowspan="2" style="min-width:80px">ช่างเขต</th>';
                                html += '<th colspan="2" class="bg-light-primary">ยอดเสนอราคา</th>';
                                html += '<th colspan="2" class="text-success bg-light-success">ยอดอนุมัติ</th>';
                                html += '<th colspan="2" class="text-danger bg-light-danger">ยกเลิกเสนอราคา</th>';
                                html += '<th colspan="2" class="text-warning bg-light-warning">รออนุมัติ</th>';
                                html += '</tr>';
                                html += '<tr class="text-dark">';
                                html += '<th class="bg-light">จำนวนใบเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-left: 5px;padding-right: 5px;">จำนวนใบเสนอราคา</th>';
                                html += '<th class="bg-light" style="padding-leftf: 5px;padding-right: 5px;">จำนวนเงินเสนอราคา</th>';
                                html += '</tr>';
                                html += '</thead>';
                                last_month = key+'-'+key_month;
                                $.each(value_month,function(key_sup,value_sup){
                                    let check_service = 0;
                                    let count_service = 0;
                                    for(var key_count in value_sup) if(value_sup.hasOwnProperty(key_count)) count_service++; //count for rowspan of head
                                    $.each(value_sup,function(key_service,value_service){
                                        if (key_service != 'total' && key_service != 'count') {
                                            html += '<tr>';
                                            if (check_service == 0) {
                                                html += '<td rowspan="'+(count_service - 1)+'" class="text-center">'+key_sup+'</td>';
                                            }
                                            html += '<td >'+key_service+'</td>';
                                            html += '<td class="text-right">'+value_service.all.num_text+'</td>';
                                            html += '<td class="text-right">'+value_service.all.sum_text+'</td>';
                                            html += '<td class="text-right">'+value_service.approved.num_text+'</td>';
                                            html += '<td class="text-right">'+value_service.approved.sum_text+'</td>';
                                            html += '<td class="text-right">'+value_service.reject.num_text+'</td>';
                                            html += '<td class="text-right">'+value_service.reject.sum_text+'</td>';
                                            html += '<td class="text-right" style="background-color:#fceada">'+value_service.wait.num_text+'</td>';
                                            html += '<td class="text-right" style="background-color:#eaf0de">'+value_service.wait.sum_text+'</td>';
                                            html += '</tr>';
                                            check_service++;
                                        }
                                        if (check_service == (count_service - 1)) {
                                            html += '<tr class="text-danger font-weight-bold" style="background-color:#f4433614">';
                                            html += '<td class="text-center" colspan="2">สรุปยอดรวม</td>';
                                            html += '<td class="text-right">'+value_sup['total'].all.num_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].all.sum_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].approved.num_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].approved.sum_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].reject.num_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].reject.sum_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].wait.num_text+'</td>';
                                            html += '<td class="text-right">'+value_sup['total'].wait.sum_text+'</td>';
                                            html += '</tr>';
                                        }
                                    });
                                });
                            });
                        });
                        let data_sum = {};
                        $.each(data[2].sum,function(key_sum,value_sum){
                            data_sum[key_sum] = value_sum;
                        });
                        let html_status = '';
                        $.each(data[2].status,function(key_status,value_status){
                            let q_status = key_status;
                            switch (q_status) {
                                case 'new':
                                    q_status = '<span class="text-info">สร้างใหม่</span>';
                                    break;
                                case 'edit':
                                    q_status = '<span class="text-warning">ต้องแก้ไข</span>';
                                    break;
                                case 'cancel':
                                    q_status = '<span class="text-danger">ยกเลิก</span>';
                                    break;
                                case 'approved':
                                    q_status = '<span class="text-success">หัวหน้าอนุมัติ</span>';
                                    break;
                                case 'cuscreated':
                                    q_status = '<span class="text-danger">สั่งพิมพ์แล้ว</span>';
                                    break;
                                case 'cusreject':
                                    q_status = '<span class="text-danger">ลูกค้ายกเลิก</span>';
                                    break;
                                case 'cusapproved':
                                    q_status = '<span class="text-success">ลูกค้าอนุมัติ</span>';
                                    break;
                                default:
                            }
                            html_status += '<tr status="'+key_status+'">';
                            html_status += '<td>'+q_status+'</td>';
                            html_status += '<td>'+value_status+'</td>';
                            html_status += '<td>'+data_sum[key_status]+'</td>';
                            html_status += '</tr>';
                        });
                        html_status += '<tr class="sum-all">';
                        html_status += '<td>รวมทั้งหมด</td>';
                        html_status += '<td colspan="2" class="text-center"><span class="text-info">'+data[2].sum_all+'</span> <span>&nbsp;&nbsp;&nbsp;บาท</span></td>';
                        html_status += '</tr>';
                        $('.content .list-status tbody').html(html_status);

                        $('.content .list-quotation table').html(html);
                        $('.content .list-quotation table').attr('last_month',last_month);
                    }else if(data[0] == 'empty'){
                        let colspan = $('.list-quotation .tb-quotation-list thead tr th').length;
                        html += '<tr><td class="text-center" colspan="'+colspan+'">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-quotation tbody').html(html);
                        html = '<tr><td class="text-center" colspan="2">ไม่มีรายการใบเสนอราคา</td></tr>';
                        $('.content .list-status tbody').html(html);
                        // $('.navbar select.search-cate').html(select_search);
                    }
                    if (check_call_function) {
                        search_sort(data[1]);
                        check_call_function = false;
                    }
                }
            });
        }

        /*option click*/
        var check_call_function_option = true;
        $('.tb-quotation-list').on('click','.btn-option',function(){
            var type = $(this).attr('option-type');
            // switch (type) {
            //     case 'edit':
            //         break;
            //     case 'check':
                    let id = $(this).closest('tr').attr('q_id');
                    $.ajax({
                        url: '<?php echo $this->base_url('employee/get_quotation') ?>',
                        method: 'post',
                        data: {q_id:id},
                        dataType: 'json',
                        success: function(data){
                            let html = '';
                            let btn = [];
                            let count_btn = 0;
                            if (data[0] == 'success') {
                                let value = data[1][0];
                                html += '<div class="row col-md-12 justify-content-start d-flex">';
                                html += '<button class="btn btn-status">'+'</button>';
                                html += '</div>';
                                html += '<div class="row col-md-12 justify-content-end d-flex">';
                                html += '<div class="q_num" style="width:fit-content">'+value.q_number+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 justify-content-end d-flex">';
                                html += '<div class="q_date" style="width:fit-content">'+value.q_date_th+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12">';
                                html += '<div class="col-md-12 q_topic" style="padding-left:0px"><b style="margin-right: 25px;">เรื่อง</b>'+value.q_topic+'</div>';
                                html += '<div class="col-md-12 q_to" style=""><b style="margin-right: 25px;">เรียน</b>'+value.q_to+'</div>';
                                html += '<div class="col-md-12 q_to_detail" style="text-indent: 2.5em;">'+value.q_to_detail+'</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12">';
                                html += '<table class="table q_product p-3">';
                                html += '<thead class="text-dark">';
                                html += '<tr>';
                                html += '<th>ลำดับ</th>';
                                html += '<th>จำนวน</th>';
                                html += '<th>รายการ</th>';
                                html += '<th>ราคา/หน่วย</th>';
                                html += '<th>ราคารวม</th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                $.each(value.product,function(key,p_value){
                                    html += '<tr>';
                                    html += '<td class="text-center">'+(key+1)+'</td>';
                                    html += '<td class="text-center">'+p_value.p_unit+' '+p_value.p_qty+'</td>';
                                    html += '<td>'+p_value.p_name+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price+'</td>';
                                    html += '<td class="text-right">'+p_value.p_price_sum+'</td>';
                                    html += '</tr>';
                                });
                                html += '<tr>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""><b>เลขครุภัณฑ์ '+value.q_stock_number+'</b></td>';
                                html += '<td colspan=""></td>';
                                html += '<td colspan=""></td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center">R/O#</td>';
                                html += '<td class="text-center">'+value.q_ro+'</td>';
                                html += '<td>แผนก : '+value.q_customer_department+'</td>';
                                html += '<td>ราคาสินค้า</td>';
                                html += '<td class="text-right">'+value.total_price+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">ผู้แทนฝ่ายบริการ</td>';
                                html += '<td>'+value.q_agent_service+'</td>';
                                html += '<td colspan="">ส่วนลด</td>';
                                html += '<td class="text-right">'+value.q_discount+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">กำหนดยืนราคา</td>';
                                html += '<td>'+value.q_set_price+'</td>';
                                html += '<td style="border-bottom: 4px double #000 !important;"><b>ราคารวมทั้งสิ้น</b></td>';
                                html += '<td  class="text-right" style="border-bottom: 4px double #000 !important;">'+value.sum_total+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">การส่งของ</td>';
                                html += '<td>'+value.q_set_delivery+'</td>';
                                html += '<td>ราคาสินค้า</td>';
                                html += '<td  class="text-right">'+value.price_whitout_vat+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td class="text-center" colspan="2">รับประกัน</td>';
                                html += '<td>'+value.q_warranty+'</td>';
                                html += '<td>ภาษีมูลค่าเพิ่ม '+value.q_vat+'%</td>';
                                html += '<td class="text-right">'+value.price_vat+'</td>';
                                html += '</tr>';
                                html += '<tr>';
                                html += '<td colspan="4" class="text-center">'+value.sum_total_th+'</td>';
                                html += '<td class="text-right">'+value.sum_total+'</td>';
                                html += '</tr>';
                                html += '</tbody>';
                                html += '</table>';
                                html += '<div class="row col-md-12 wrap-po" style="display:none">';
                                html += '<div class="col-md-10 row wrap-input">';
                                html += '<div class="col-md-6 wrap-input">';
                                html += '<b>เลขที่ PO</b>';
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input">';
                                html += '<b>วันที่รับ PO</b>';
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input q_po">';
                                html += value.q_po;
                                html += '</div>';
                                html += '<div class="col-md-6 wrap-input q_po_date">';
                                html += value.q_po_date_th;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 row wrap-input wrap-btn-po" style="display:none">';
                                html += '<button class="btn btn-warning btn-edit-po"><i class="material-icons">edit</i> แก้ไขเลขที่ PO</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-remark" style="display:none">';
                                html += '<div class="col-md-12 wrap-input">';
                                html += '<b>หมายเหตุการแจ้งแก้ไข</b>';
                                html += '</div>';
                                html += '<div class="col-md-12 wrap-input">';
                                html += value.q_remark;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-remark-customer" style="display:none">';
                                html += '<div class="col-md-12 wrap-input">';
                                html += '<b>หมายเหตุ</b>';
                                html += '</div>';
                                html += '<div class="col-md-12 wrap-input">';
                                html += value.q_remark_customer;
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-remark-customer" style="display:none">';
                                html += '<div class="col-md-10 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>หมายเหตุ</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<textarea class="form-control" name="q_remark_customer" rows="5"></textarea>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-remark-customer"><i class="material-icons">save</i> บันทึก</button>';
                                html += '<button class="btn btn-danger btn-canel-save-remark-customer"><i class="material-icons">close</i> ยกเลิก</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-po" style="display:none">';
                                html += '<div class="col-md-5 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>เลขที่ PO</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                if (value.q_po != '') {
                                    html += '<input type="text" class="form-control" name="q_po" value="'+value.q_po+'">';
                                }else {
                                    html += '<input type="text" class="form-control" name="q_po">';
                                }
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-5 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>วันที่รับ PO</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                if (value.q_po_date != '') {
                                    html += '<input type="datetime-local" class="form-control" name="q_po_date" value="'+value.q_po_date+'">';
                                }else {
                                    html += '<input type="datetime-local" class="form-control" name="q_po_date">';
                                }
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-po"><i class="material-icons">save</i> บันทึก</button>';
                                html += '<button class="btn btn-danger btn-canel-po"><i class="material-icons">close</i> ยกเลิก</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row col-md-12 wrap-form-remark" style="display:none">';
                                html += '<div class="col-md-10 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<label class="text-dark"><b>หมายเหตุการแจ้ง</b></label>';
                                html += '<div class="form-group bmd-form-group">';
                                // html += '<label class="bmd-label-floating">ตัวอย่างรายละเอียด : 5.00 GB/HDD 465.7 GB</label>';
                                html += '<textarea class="form-control" name="q_remark" rows="5"></textarea>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="col-md-2 wrap-input">';
                                html += '<div class="form-group">';
                                html += '<div class="form-group bmd-form-group">';
                                html += '<button class="btn btn-success btn-save-remark"><i class="material-icons">done_outline</i> ยืนยันการแจ้งแก้ไข</button>';
                                html += '<button class="btn btn-danger btn-canel-save-remark"><i class="material-icons">close</i> ยกเลิกการแจ้งแก้ไข</button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                let btn_status = '';
                                let btn_text = '';
                                let check_remark = false;
                                let check_remark_customer = false;
                                let check_po = false;
                                let check_btn_edit_po = false;
                                switch (value.q_status) {
                                    case 'new':
                                        btn_status = 'btn-info';
                                        btn_text = 'สร้างใหม่';
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                break;
                                            case 'service':
                                                // btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                break;
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'edit':
                                        btn_status = 'btn-warning';
                                        btn_text = 'ต้องแก้ไข';
                                        check_remark = true;
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                break;
                                            case 'service':
                                                // btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                break;
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'cancel':
                                        btn_status = 'btn-danger';
                                        btn_text = 'ยกเลิก';
                                        switch (data[2]) {
                                            case 'it':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    case 'approved':
                                        btn_status = 'btn-success';
                                        btn_text = 'หัวหน้าอนุมัติ';
                                        switch (value.q_status_customer) {
                                            case 'reject':
                                                btn_text += ',ลูกค้ายกเลิก';
                                                break;
                                            case 'approved':
                                                btn_text += ',ลูกค้าอนุมัติ';
                                                check_po = true;
                                                break;
                                            default:

                                        }
                                        switch (data[2]) {
                                            case 'admin':
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            case 'service':
                                                switch (value.q_status_customer) {
                                                    case 'created':
                                                        if (value.q_remark_customer != '') {
                                                            check_remark_customer = true;
                                                        }
                                                        btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุ</button>';
                                                        break;
                                                    case 'approved':
                                                        if (value.q_po != '') {
                                                            check_btn_edit_po = true;
                                                        }
                                                        break;
                                                    default:
                                                }
                                                if (value.q_po == '') {
                                                    btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                    btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                }
                                                break;
                                            case 'supervisor':
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                if (value.q_remark_customer != '') {
                                                    check_remark_customer = true;
                                                }
                                                switch (value.q_status_customer) {
                                                    case 'approved':
                                                        btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                        break;
                                                    default:

                                                }
                                                break;
                                            case 'it':
                                                if (value.q_remark_customer != '') {
                                                    check_remark_customer = true;
                                                }
                                                if (value.q_remark != '') {
                                                    check_remark = true;
                                                }
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="admin-edit"><i class="material-icons">edit</i> แจ้งแก้ไข</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="approve"><i class="material-icons">done_outline</i> อนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-danger btn-option" option-type="customer_reject"><i class="material-icons">cancel</i> ลูกค้ายกเลิก</button>';
                                                btn[count_btn++] = '<button class="btn btn-warning btn-option" option-type="remark_customer"><i class="material-icons">edit</i> แจ้งหมายเหตุ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="customer_approve"><i class="material-icons">done_outline</i> ลูกค้าอนุมัติ</button>';
                                                btn[count_btn++] = '<button class="btn btn-success btn-option" option-type="print" ><i class="material-icons">print</i> สั่งพิม</button>';
                                                break;
                                            default:
                                        }
                                        break;
                                    default:
                                }
                                $('.modal-preview-quotation .wrap-data-quotation').html(html);
                                $('.modal-preview-quotation .wrap-data-quotation').attr('q_id',value.q_id_encode);
                                $('.modal-preview-quotation .btn-status').addClass(btn_status).html('<h4>สถานะ : '+btn_text+'</h4>');
                                if (check_btn_edit_po) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-btn-po').show(500);
                                }
                                if (check_po) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-po').show(500);
                                }
                                if (check_remark) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-remark').show(500);
                                }
                                if (check_remark_customer) {
                                    $('.modal-preview-quotation').find('.modal-body .wrap-remark-customer').show(500);
                                }
                                let btn_html = '';
                                $.each(btn,function(key,value){
                                    btn_html += btn[key];
                                });
                                $('.modal-preview-quotation .modal-content .modal-footer').html(btn_html);
                                if (check_call_function_option) {
                                    option_click(value);
                                    check_call_function_option = false;
                                }
                            }
                        }
                    });
                    $('.modal-preview-quotation').modal('show');
                    // window.location.href = "<?php echo $this->base_url('page/quotation/print/') ?>"+id;
                    // break;
            //     case 'admin-edit':
            //
            //         break;
            //     case 'approved':
            //
            //         break;
            //     default:
            //
            // }
        });

        function option_click(data){
            $('.modal-preview-quotation').on('click','.btn-option',function(){
                let type = $(this).attr('option-type');
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide();
                if (type != 'admin-edit') {
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide();
                }
                $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide();

                switch (type) {
                    case 'edit':
                        $('.modal-preview-quotation').modal('hide');
                        $('.row-add-quotation .card .card-body input[name=q_id]').val(data.q_id);
                        $('.row-add-quotation .card .card-body input[name=type]').val('edit');
                        $('.row-add-quotation .card .card-header').removeClass('card-header-info');
                        $('.row-add-quotation .card .card-header').addClass('card-header-warning');
                        $('.row-add-quotation .card .card-header h4.card-title').html('แก้ไขใบเสนอราคา');
                        $('.row-add-quotation .card .card-footer .btn-add-quotation').hide();
                        $('.row-add-quotation .card .card-footer .btn-edit-quotation').remove();
                        $('.row-add-quotation .card .card-footer').append('<a class="btn btn-success btn-edit-quotation" href="javascript:void(0)"><h4><i class="material-icons mr-3">save</i>บันทึก</h4></a>');
                        $('.row-add-quotation').show();
                        $('html, body').animate({scrollTop:($(".row-add-quotation").offset().top - 150)}, 500);

                        $('.row-add-quotation .card .card-header .q_num').html(data.q_number);
                        $('.row-add-quotation .card .card-header .q_date').html(data.q_date_th);
                        $('.row-add-quotation .card .card-body select[name=q_type]').val(data.q_type);
                        $('.row-add-quotation .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                        $('.row-add-quotation .card .card-body select[name=q_customer_id]').val(data.q_customer_id);
                        $('.row-add-quotation .card .card-body select[name=q_brand]').val(data.q_brand);
                        $('.row-add-quotation .card .card-body input[name=q_model]').val(data.q_model);
                        $('.row-add-quotation .card .card-body input[name=q_sn]').val(data.q_sn);
                        $('.row-add-quotation .card .card-body input[name=q_topic]').val(data.q_topic);
                        $('.row-add-quotation .card .card-body input[name=q_to]').val(data.q_to);
                        $('.row-add-quotation .card .card-body input[name=q_to_detail]').val(data.q_to_detail);
                        $('.row-add-quotation .card .card-body input[name=q_stock_number]').val(data.q_stock_number);
                        $('.row-add-quotation .card .card-body input[name=q_discount]').val(data.q_discount);
                        $('.row-add-quotation .card .card-body input[name=q_ro_number]').val(data.q_ro);
                        $('.row-add-quotation .card .card-body input[name=q_customer_department]').val(data.q_customer_department);

                        let q_agent_service = data.q_agent_service;
                        q_agent_service = q_agent_service.split('โทร.');
                        $.ajax({
                            url: '<?php echo $this->base_url('employee/list_service_name_ajax') ?>',
                            dataType: 'json',
                            success: function (result){
                                if (result[0] == 'success') {
                                    let html = '<option value="">เลือกผู้แทนฝ่ายบริการ..</option>';
                                    $.each(result[1],function(key,service_value){
                                        if (data.q_service_id == service_value.id) {
                                            html += '<option selected value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                        }else {
                                            html += '<option value="'+service_value.id+','+service_value.first_name+' '+service_value.last_name+'">'+service_value.first_name+' '+service_value.last_name+' ('+service_value.division_th+')</option>';
                                        }
                                    });
                                    $('.form-add-quotation .wrap-list-service .list-service-name').html(html);
                                    $('.form-add-quotation .wrap-list-service .list-service-name').chosen({allow_single_deselect: true,width: '100%'});
                                }
                            }
                        });
                        $('.row-add-quotation .card .card-body select[name=q_service_name]').val(data.q_service_id+','+q_agent_service[0]);
                        $('.row-add-quotation .card .card-body input[name=q_service_phone]').val(q_agent_service[1]);
                        let set_price = data.q_set_price_data;
                        set_price = set_price.split(':');
                        $('.row-add-quotation .card .card-body .set-price-day').val(set_price[0]);
                        $('.row-add-quotation .card .card-body .set-price-detail').val(set_price[1]);
                        let set_dalivery = data.q_set_delivery_data;
                        set_dalivery = set_dalivery.split(':');
                        $('.row-add-quotation .card .card-body .set-dalivery-day').val(set_dalivery[0]);
                        $('.row-add-quotation .card .card-body .set-dalivery-detail').val(set_dalivery[1]);
                        let set_warranty = data.q_set_warranty_data;
                        set_warranty = set_warranty.split(':');
                        $('.row-add-quotation .card .card-body .set-warranty-day').val(set_warranty[0]);
                        $('.row-add-quotation .card .card-body .set-warranty-detail').val(set_warranty[1]);
                        let html = '';
                        let product = data.product;

                        // $('.row-add-quotation .card .card-body .table-q_product .list-q_product').remove();
                        $.each(data.product,function(key,value){
                            let clone_q_product = $('.row-add-quotation .card .card-body .table-q_product .list-q_product:last-child').clone()
                            $('.row-add-quotation .card .card-body .table-q_product tbody').append(clone_q_product);
                            let number_order = parseInt($('.row-add-quotation .card .card-body .table-q_product .list-q_product:last-child .number-order span').html((key+1)));
                            let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .number-order button').remove();
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .number-order').append(btn);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select.list-product').val(value.p_id);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').closest('.form-group').hide();
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.list-price').attr('name','');
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price').closest('.form-group').show();
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').attr('name','q_product_price[]');
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .input-price input').val(value.p_price_data);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.q_quanity').val(value.p_unit);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child select.q_quanity_type').val(value.p_qty);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child input.manual-price').prop('checked',true);
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child .wrap-list-product select').chosen();
                            $('.row-add-quotation .card .card-body .table-q_product').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
                        });
                        // $('.form-add-quotation .table-q_product tbody').html(html);
                        // list_product();
                        // $('.row-add-quotation .card .card-body .table-q_product .list-q_product .wrap-list-product .list-product').val(product[0].p_id);
                        $('.row-add-quotation .card .card-body select').trigger("chosen:updated");
                        $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child').remove();
                        $('.row-add-quotation .card .card-body .table-q_product .list-q_product:first-child .btn-delete-tr').remove();
                        $('.row-add-quotation .card .card-body select[name=q_service_name]').val(data.q_service_id);
                        $('.form-add-quotation .bmd-form-group').addClass('is-filled');

                        $('.btn-edit-quotation').click(function(){
                            var data = $(this).closest('.card').find('.form-add-quotation').serialize();
                            if (validate()) {
                                $.ajax({
                                    url: '<?php echo $this->base_url('employee/update_quotation') ?>',
                                    method: 'post',
                                    data: data,
                                    dataType: 'json',
                                    success: function(data){
                                        // console.log(data);
                                        if (data[0] == 'success') {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'บันทึกสำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $('.row-add-quotation').hide();
                                            list_quotation();
                                        }else if(data[0] == 'updated'){
                                            Swal.fire({
                                                type: 'error',
                                                title: 'ไม่สามารถแก้ไขใบเสนอราคานี้ได้',
                                                text: 'เนื่องจากมีการแก้ไขไปแล้วก่อนหน้า',
                                                confirmButtonText: 'ยืนยัน'
                                            });
                                            $('.row-add-quotation').hide();
                                            list_quotation();
                                        }
                                    }
                                });
                            }
                        });
                        break;
                    case 'approve':
                        let id = data.q_id;
                        Swal.fire({
                            title: 'คุณต้องการอนุมัติใบเสนอราคานี้หรือไม่?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#4caf50 ',
                            cancelButtonColor: '#f44336 ',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: '<?php echo $this->base_url('employee/update_quotation') ?>',
                                    method: 'post',
                                    data: {type:type,q_id:id},
                                    dataType: 'json',
                                    success: function(data){
                                        // console.log(data);
                                        if (data[0] == 'success') {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'อนุมัติสำเร็จ',
                                                showConfirmButton:false,
                                                timer: 1500
                                            });
                                            $('.modal-preview-quotation').find('.modal-footer').find('button').remove();
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').removeClass('btn-info');
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').addClass('btn-success');
                                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status h4').html('สถานะ : หัวหน้าอนุมัติ');
                                            list_quotation();
                                        }else {
                                            Swal.fire({
                                                type: 'warning',
                                                title: 'ไม่สามารถอนุมัติได้',
                                                showConfirmButton:false,
                                                timer: 1500
                                            });
                                        }
                                    }
                                });
                            }
                        });

                        break;
                    case 'customer_approve':
                        let q_id = data.q_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').attr('type','customer_approve');

                        break;
                    case 'customer_reject':
                        let q_id_1 = data.q_id;
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').attr('type','customer_reject');

                        break;
                    case 'print':
                        let q_id_encode = $('.modal-preview-quotation .wrap-data-quotation').attr('q_id');
                        Swal.fire({
                            title: 'คุณต้องการสั่งพิมพ์ใบเสนอราคานี้หรือไม่?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#4caf50 ',
                            cancelButtonColor: '#f44336 ',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                            if (result.value) {
                                Swal.fire({
                                    title: 'ท่านต้องการตรายางอัตโนมัติหรือไม่?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#4caf50 ',
                                    cancelButtonColor: '#f44336 ',
                                    confirmButtonText: 'ยืนยัน',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode;
                                    }else {
                                        window.location.href = '<?php echo $this->base_url("page/quotation/") ?>'+q_id_encode+'/no_brand';
                                    }
                                });
                            }
                        });
                        break;
                    case 'remark_customer':
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').show(500);
                        $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer label b').html('หมายเหตุ');
                        break;
                    default:

                }
            });
        }

        /*form modal check quotation*/
        $('.modal-preview-quotation')
        .on('click','.modal-footer .btn-option',function(){
            let type = $(this).attr('option-type');
            switch (type) {
                case 'admin-edit':
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').show(500);
                    $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark label b').html('หมายเหตุการแจ้งแก้ไข');
                    break;
                default:

            }
        }).on('click','.modal-body .btn-save-remark',function(){
            let value = $(this).closest('.wrap-form-remark').find('textarea[name=q_remark]').val();
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
            if (value != '') {
                $.ajax({
                    url: '<?php echo $this->base_url('employee/update_quotation') ?>',
                    method: 'post',
                    data: {q_remark:value,q_id:id,type:'admin_edit'},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if (data[0] == 'success') {
                            Swal.fire({
                                title: 'แจ้งแก้ไขสำเร็จแล้ว',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').removeClass('btn-info');
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status').addClass('btn-warning');
                            $('.modal-preview-quotation').find('.wrap-data-quotation .btn-status h4').html('สถานะ : ต้องแก้ไข');
                            $('.modal-preview-quotation').find('.modal-body .wrap-form-remark').hide(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark').show(500);
                            $('.modal-preview-quotation').find('.modal-body .wrap-remark .wrap-input:last-child').html(value);
                            list_quotation();
                        }
                    }

                });
            }else {
                Swal.fire({
                    title: 'กรุณาใส่หมายเหตุการแจ้งแก้ไข',
                    type: 'warning',
                    confirmButtonText: 'ตกลง'
                });
            }
        }).on('click','.modal-body .btn-canel-save-remark',function(){
            $(this).closest('.wrap-form-remark').find('textarea[name=q_remark]').val('');
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark').hide(500);
        }).on('click','.modal-body .btn-save-po',function(){
            let value = $(this).closest('.wrap-form-po').find('input[name=q_po]').val();
            let value_date = $(this).closest('.wrap-form-po').find('input[name=q_po_date]').val();
            let id = $(this).closest('.wrap-data-quotation').attr('q_id');
            let type_update =  $(this).closest('.wrap-form-po').attr('type');

            if (value == '' || value_date == '') {
                Swal.fire({
                    title: 'กรุณาใส่ข้อมูลให้ครบถ้วน',
                    type: 'warning',
                });
            }else {
                $(this).closest('.wrap-form-po').find('input[name=q_po]').val(value);
                Swal.fire({
                    title: 'คุณต้องการบันทึกใช่หรือไม่?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4caf50 ',
                    cancelButtonColor: '#f44336 ',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '<?php echo $this->base_url('employee/update_quotation') ?>',
                            method: 'post',
                            data: {q_po:value,q_po_date:value_date,q_id:id,type:'customer_approve',type_update:type_update},
                            dataType: 'json',
                            success: function(data){
                                if (data[0] == 'success') {
                                    Swal.fire({
                                        title: 'บันทึกสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('.modal-preview-quotation').find('.modal-body .wrap-po').show(500);
                                    $('.modal-preview-quotation').find('.wrap-form-po').find('input[name=q_po_date]').val(data[1]);
                                    $('.modal-preview-quotation').find('.modal-body .wrap-form-po').hide(500);
                                    list_quotation();
                                    $('.modal-preview-quotation').find('.modal-footer').remove();
                                }else {
                                    Swal.fire({
                                        title: 'ไม่สามารถบันทึกได้',
                                        text: 'เนื่องจาก'+data[0],
                                        type: 'warning',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $(this).closest('.wrap-form-po').find('input[name=q_po]').val('');
                                }
                            }

                        });
                    }
                });
            }
        }).on('click','.modal-body .btn-canel-po',function(){
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').hide(500);
            if ($(this).closest('.modal-dialog').find('.modal-body .q_po').html() != '') {
                $(this).closest('.modal-dialog').find('.modal-body .wrap-po').show(500);
            }else {
                $(this).closest('.wrap-form-po').find('input[name=q_po]').val('');
                $(this).closest('.wrap-form-po').find('input[name=q_po_date]').val('');
            }
        }).on('click','.modal-body .btn-edit-po',function(){
            $(this).closest('.modal-dialog').find('.modal-body .wrap-po').hide(500);
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-po').show(500);
        }).on('click','.modal-body .btn-canel-save-remark-customer',function(){
            $(this).closest('.wrap-form-remark-customer').find('textarea[name=q_remark]').val('');
            $(this).closest('.modal-dialog').find('.modal-body .wrap-form-remark-customer').hide(500);
        });

        $('.btn-add-quotation').click(function(){
            let key_array = 0;
            let check_key = '';
            var data = $(this).closest('.card').find('.form-add-quotation').serialize();
            if (validate()) {
                $.ajax({
                    url: '<?php echo $this->base_url('employee/add_quotation') ?>',
                    method: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(result){
                        if (result[0] == 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'สร้างใบเสนอราคา สำเร็จ',
                                timer: 1500
                            });
                            $('.row-add-quotation').hide();
                            list_quotation();
                        }else {
                            console.log('somethings went wrong > btn-add-quotation');
                        }
                    }
                });
            }
        });
        /*for check add quotation*/
        function add_quotation(data,datatype='json'){
            $.ajax({
                url: '<?php echo $this->base_url('employee/add_quotation') ?>',
                method: 'post',
                data: data,
                dataType: datatype,
                success: function(data){
                    if (data[0] == 'success') {
                        Swal.fire({
                            type: 'success',
                            title: 'สร้างใบเสนอราคา สำเร็จ',
                            timer: 1500
                        });
                        $('.row-add-quotation').hide();
                        list_quotation();
                    }else {
                        console.log(data);
                    }
                }
            })
        }
        /*valiedate form add quotation*/
        function validate(){
            $('.row-add-quotation *[name*=q_]').each(function(key,value){
                if ($(this).attr('name') != 'q_discount' && $(this).attr('name') != 'q_stock_number' && $(this).attr('name') != 'q_ro_number') {
                    if ($(this).val() == '') {
                        if ($(this).prop('tagName') == 'SELECT') {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                        }else {
                            $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณากรอกข้อมูล</li></span>');
                        }
                    }
                }
            });
            $('.row-add-quotation').on('change keyup','*[name*=q_]',function(){
                if ($(this).val() != '') {
                    $(this).closest('.form-group').find('.help-block').remove();
                }else {
                    $(this).closest('.form-group').append('<span class="help-block left-align"><li>กรุณาเลือกข้อมูล</li></span>');
                }
            });
            var error = true;
            if ($('.row-add-quotation .help-block').length > 0) {
                error = false;
                $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
            }


            // $('.row-add-quotation .help-block').each(function(key,value){
            //     console.log($(this));
            // });
            return error;
        }

        /*when click add prodcut*/
        $('.form-add-quotation').on('click','.wrap-btn-add-q_product .btn-add-q_product',function(){
            let clone_q_product = $(this).closest('.form-add-quotation').find('.list-q_product:last-child').clone()
            $(this).closest('.form-add-quotation').find('.list-q_product').closest('tbody').append(clone_q_product);
            let number_order = parseInt($(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html()) + 1;
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order span').html(number_order);
            let btn = '<button type="button" class="btn btn-danger d-block btn-delete-tr" style="float:unset;margin:auto">ลบ</button>';
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order button').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .number-order').append(btn);
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .wrap-list-product select').chosen();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child .help-block').remove();
            $(this).closest('.form-add-quotation').find('.list-q_product:last-child').find('.chosen-container:last-child').remove()
            material_input();
        });

        /*month thai*/
        function month_th(data,type=''){
            if (data != '' && typeof data !== 'undefined') {
                data = parseInt(data)+0;
                var months_th = [ '',"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", ];
                var months_th_mini = [ '',"ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.", ];
                switch (type) {
                    case 'mini':
                        return months_th_mini[data];
                        break;
                    default:
                        return months_th[data];
                }
            }else {
                alert('Give me some data.Please!!');
            }
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
        // ellipsizeTextBox(‘block-with-text);

        // functoin ระบบ sidebar และ พื้นฐานของ template
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

          } else {

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
      // (function() {
      //     isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;
      //
      //     if (isWindows) {
      //         // if we are on windows OS we activate the perfectScrollbar function
      //         $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
      //
      //         $('html').addClass('perfect-scrollbar-on');
      //     } else {
      //         $('html').addClass('perfect-scrollbar-off');
      //     }
      // })();



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
              console.log($layer);
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
