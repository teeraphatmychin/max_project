<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page</title>

    <?php $this->view('partail/main_css') ?>

</head>

<body id="page-top">

    <?php $this->view('partail/nav-left-manager') ?>


    <div class="main-panel">
        <!-- Sidebar -->
        <?php $this->view('partail/nav-top-manager') ?>

        <div class="content">
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h4 class="card-title">Employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>No.</th>
                                    <th>employee id</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>option</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>PR011018</td>
                                        <td>Dakota Rice</td>
                                        <td>Public Relations</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>AC011018</td>
                                        <td>Minerva Hooper</td>
                                        <td>Accountting Financial</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>AC011018</td>
                                        <td>Sage Rodriguez</td>
                                        <td>Accountting Financial</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>MKTG011018</td>
                                        <td>Philip Chaney</td>
                                        <td>Marketing</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>AC011018</td>
                                        <td>Doris Greene</td>
                                        <td>Accountting Financial</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>AC011018</td>
                                        <td>Mason Porter</td>
                                        <td>Accountting Financial</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>MKTG011018</td>
                                        <td>Jon Porter</td>
                                        <td>Marketing</td>
                                        <td><button type="button" class="btn btn-primary m-0">Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view('partail/main_js') ?>
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

</body>

</html>
