<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-normal text-center">
      Humming Bird
    </a>
  </div>
  <div class="sidebar-wrapper">
      <ul class="nav">
          <li class="active ">
              <a href="<?php echo $this->base_url('manager/schedule') ?>">
                  <i class="nc-icon nc-calendar-60"></i>
                  <p>Schedule Work</p>
              </a>
          </li>
          <li>
              <a href="<?php echo $this->base_url('manager/training') ?>">
                  <i class="nc-icon nc-tv-2"></i>
                  <p>Training</p>
              </a>
          </li>
          <?php if ($_SESSION['manager']->status == 'HR'): ?>
          <li>
              <a href="<?php echo $this->base_url('manager/manage_employee') ?>">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Employee Management</p>
              </a>
          </li>
          <?php endif; ?>
          <!-- <li>
              <a href="<?php echo $this->base_url('manager/report') ?>">
                  <i class="nc-icon nc-app"></i>
                  <p>Report</p>
              </a>
          </li> -->

      </ul>
  </div>
</div>
<script src="<?php echo $this->public_url('libs/material/assets/js/core/jquery.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var url = "<?php echo $url = isset($_GET['url'])&&!empty($_GET['url'])? $_GET['url']:''; ?>";
        var sub_url = url.split('/');
        $('.sidebar .sidebar-wrapper .nav li').each(function(key,value){
            if ($(this).find('a').attr('href').indexOf(sub_url[1]) > -1) {
                $(this).addClass('active');
            }else {
                $(this).removeClass('active');
            }
        });
    });
</script>
