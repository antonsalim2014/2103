<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT booking Facility System  </title>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
		<link href="images/favicon.ico" rel="shortcut icon"/>

        <link href="bootstrap-3.3.5-dist/css/datepicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datepicker.js"></script>

        <link href="bootstrap-3.3.5-dist/css/clockpicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/clockpicker.js"></script>

        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });

                $('.clockpicker').clockpicker();

            });
        </script>

    </head>

    <body>
        <?php
        include './phpInclude/header.inc.php';
        ?>

        <div class="page-container">

            <!-- top navbar -->
            <!--        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <h3>SIT Booking Facility System</h3>
                            </div>
                        </div>
                    </div>
            -->
            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">

                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-9">
                        <h3>New Booking</h3>
                        <div class="container">
                            <div class="col-xs-4">
                                <form class="form-group">
                                    <label>Facility Type: </label>
                                    <select class="form-control" required>
                                        <option value="one">Indoor</option>
                                        <option value="two">Outdoor</option>
                                    </select>
                                    <label>Facility Name: </label>
                                    <select class="form-control" required >
                                        <option value="one">Basketball</option>
                                        <option value="two">Two</option>
                                    </select>
                                    <label>Facility Court: </label>
                                    <select class="form-control" required >
                                        <option value="one">1</option>
                                        <option value="two">2</option>
                                        <option value="three">3</option>
                                        <option value="four">4</option>
                                        <option value="five">5</option>
                                    </select>
                                    <label>Location: </label>
                                    <select class="form-control" required >
                                        <option value="one">AP</option>
                                        <option value="two">USC</option>
                                        <option value="three">USS</option>
                                    </select>
                                    <label>Purpose: </label>
                                    <input class="form-control" type="text" placeholder="" required>
                                    <label>Select Date: </label>
                                    <div class="date">
                                        <input  type="text" class="form-control" placeholder="Click to show datepicker"  id="example1">
                                    </div>
                                    <label>Start Time: </label>
                                    <div class="input-group clockpicker" >
                                        <input type="text" class="form-control" value="09:30" required >
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <label>End Time: </label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" value="09:30" required >
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                        <hr />
                    </div>

                </div><!-- /.col-xs-12 main -->
            </div><!--/.row-->
        </div><!--/.container-->
    </body>
</html>
