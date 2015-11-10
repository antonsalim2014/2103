<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT booking Facility System  </title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>

        <link href="bootstrap-3.3.5-dist/css/datepicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datepicker.js"></script>

        <link href="bootstrap-3.3.5-dist/css/clockpicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/clockpicker.js"></script>

        <link href="bootstrap-3.3.5-dist/css/sidebar.css" rel="stylesheet"/>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

            $('#date1').datepicker({
            format: "dd/mm/yyyy"
            });
            
            $('#date2').datepicker({
            format: "dd/mm/yyyy"
            });
            
            $('.clockpicker').clockpicker();

            $('.no-data').show();

            });
        </script>

    </head>

    <body>
        <div class="page-container">

            <!-- top navbar -->
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
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

            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-9">
                        <h3>View Booking</h3>
                        <div class="navview">
                            <ul class="nav navbar-nav">         
                                <li>
                                    <label>Location: </label>
                                    <input  type="text" class="form-control" placeholder="">
                                </li>  
                                <li>
                                    <label>Facility Name: </label>
                                    <select class="form-control" required>
                                        <option value="one">Indoor</option>
                                        <option value="two">Outdoor</option>
                                    </select>
                                </li>    
                                <li >
                                    <label>Start Date: </label>
                                    <div class="date">
                                        <input  type="text" class="form-control" placeholder="Start Date"  id="date1">
                                    </div>
                                </li>      
                                <li >
                                    <label>End Date: </label>
                                    <div class="date">
                                        <input  type="text" class="form-control" placeholder="End Date"  id="date2">
                                    </div>
                                </li>      
                                <li >
                                    <label>Booking Status: </label>
                                    <select class="form-control" required>
                                        <option value="one">Approved</option>
                                        <option value="two">Rejected</option>
                                    </select>
                                </li>      
                            </ul>           
                        </div>
                    </div>


                    <div class="col-sm-9">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Facility Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Booking Status</th>
                                </tr>
                            </thead>
                            <tbody class="searchable">
                                <tr class="no-data">
                                    <td colspan="4">No data</td>
                                </tr>
                                <tr>
                                    <td>AP</td>
                                    <td>Soccer</td>
                                    <td>14/05/2015</td>
                                    <td>14/05/2015</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td>AP</td>
                                    <td>Basketball</td>
                                    <td>24/05/2015</td>
                                    <td>24/05/2015</td>
                                    <td>Rejected</td>
                                </tr>
                                <tr>
                                    <td>USC</td>
                                    <td>Badminton</td>
                                    <td>24/05/2015</td>
                                    <td>24/05/2015</td>
                                    <td>Rejected</td>
                                </tr>
                            </tbody>
                        </table>                       
                    </div>

                </div><!-- /.col-xs-12 main -->

            </div><!-- /.col-xs-12 main -->
        </div><!--/.row-->
    </div><!--/.container-->
</body>
</html>