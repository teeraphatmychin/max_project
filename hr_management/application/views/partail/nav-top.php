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
    @media (max-width:576px) {
        .m-sm-0 {
            margin: 0px !important;
        }
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
          <a class="nav-link dropdown-toggle num-notification" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="nc-icon nc-bell-55"></i>
            <p>
              <span class="d-lg-none d-md-none d-sm-block">Notifications</span>
            </p>

          </a>
          <div class="dropdown-menu dropdown-menu-right m-sm-0 text-truncate data-notifaication" aria-labelledby="navbarDropdownMenuLink" style="max-width: 300px;">

          </div>
        </li>
        <li class="nav-item btn-rotate dropdown">
          <a class="nav-link dropdown-toggle navbar-brand" href="http://example.com" id="navbarDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo $_SESSION['emp']->emp_img ?>" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
            <p>
              <span class="d-md-block employee-name"><?php echo $_SESSION['emp']->emp_name ?></span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenu">
            <a class="dropdown-item" href="<?php echo $this->base_url('employee/profile') ?>"><i class="nc-icon nc-single-02"></i> Your Profile</a>
            <a class="dropdown-item text-danger" href="<?php echo $this->base_url('employee/log_out') ?>"><i class="nc-icon nc-button-power"></i> Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript" src="<?php echo $this->base_url('public/js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        notification();
        function notification(){
            $.ajax({
                url: '<?php echo $this->base_url('employee/notification') ?>',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data[0] == 'success') {
                        let html = '';
                        let num = 0;
                        let i = 0;
                        $.each(data[1],function(key,value){
                            if (value.title != '') {
                                if (i < 4) {
                                    html += '<a class="dropdown-item border-bottom" href="<?php echo $this->base_url('employee/schedule_detail/') ?>'+value.id+'">';
                                    html += '<span class="d-md-block font-weight-bold text-truncate">'+value.title+'</span>';
                                    html += '<span class="d-block font-italic">'+value.posted+'</span>';
                                    html += '</a>';
                                }
                                i++;
                                let seen = value.seen;
                                if (value.seen.indexOf('<?php echo $_SESSION['emp']->emp_id ?>') < -1 || value.seen == '') {
                                    num += 1;
                                }
                            }
                        });
                        html += '<a class="dropdown-item border-bottom text-center text-info" href="<?php echo $this->base_url('employee/view_all_noti') ?>">View All</a>';
                        $('.data-notifaication').html(html);
                        $('.num-notification .badge.badge-danger').remove();
                        if (num > 0) {
                            $('.num-notification').append('<span class="badge badge-danger">'+num+'</span>');
                        }
                    }
                }
            });
        }

    });
</script>
