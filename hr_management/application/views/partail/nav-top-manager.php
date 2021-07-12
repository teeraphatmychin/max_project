<style media="screen">
    .img-user{
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid;
    }
    .badge{
        position: absolute;
        right: 29px;
        top: 5px;
    }
    .badge-danger {
        color: #fff;
        background-color: #dc3545 !important;
    }
    .img-profile{
        width: 10%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a class="navbar-brand d-lg-none d-md-none" href="#pablo">Schedule Work</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item btn-rotate dropdown">
          <a class="nav-link dropdown-toggle navbar-brand" href="http://example.com" id="navbarDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo $this->public_url('file/images/employee/pexels-photo-925786.jpeg') ?>" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
            <p>
              <span class="d-md-block employee-name"><?php echo $_SESSION['manager']->name ?></span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenu">
            <a class="dropdown-item" href="<?php echo $this->base_url('employee/sign_out') ?>"><i class="nc-icon nc-settings-gear-65"></i> Edit profile</a>
            <a class="dropdown-item text-danger" href="<?php echo $this->base_url('manager/log_out') ?>"><i class="nc-icon nc-button-power"></i> Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
