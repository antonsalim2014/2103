<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT Booking Facility System  </title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>

        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
        <link href="bootstrap-3.3.5-dist/css/sidebar.css" rel="stylesheet"/>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
            //$('.no-data').show();

            });
        </script>
    </head>

    <body>
		<?php
			include "./phpInclude/header.inc.php";
        ?>
            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-4">
                        <h3>View Facility</h3>
                        <div class="col-sm-9">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Facility Type</th>
                                        <th>Facility Name</th>
                                    </tr>
                                </thead>
                                <tbody class="searchable">
                                    <tr class="no-data">
                                        <td colspan="4">No data</td>
                                    </tr>
                                    <tr>
                                        <td>AP</td>
                                        <td>Soccer</td>
                                    </tr>
                                    <tr>
                                        <td>AP</td>
                                        <td>Basketball</td>
                                    </tr>
                                    <tr>
                                        <td>USC</td>
                                        <td>Badminton</td>
                                    </tr>
                                </tbody>
                            </table>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>