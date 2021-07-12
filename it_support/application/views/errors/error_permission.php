<!DOCTYPE html>
<html lang="en">
<head>
    <title>Error Permission</title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->public_url('file/images/system/icon_itnew.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>IT SUPPORT</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="<?php echo $this->public_url('libs/material/') ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">

</head>

<body class="">
  <!--   Core JS Files   -->
  <script src="<?php echo $this->public_url('js/jquery-3.3.1.js') ?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo $this->public_url('libs/material/') ?>assets/js/plugins/sweetalert2.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          Swal.fire({
              type: 'error',
              title: 'สิทธิ์การใช้งาน',
              text: 'คุณไม่มีสิทธิ์ใช้งานในส่วนนี้',
          }).then((result) => {
              if (result.value) {
                  // history.back();
                  window.location.href = '<?php echo $this->base_url('page/').$_SESSION['user']->menu_option[0]->option_path ?>';
              }
          });
      });
  </script>


</body>

</html>
