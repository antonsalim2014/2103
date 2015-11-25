<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT Booking Facility System  </title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
		<link href="images/favicon.ico" rel="shortcut icon"/>

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
                    <div class="col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-9">
                        <h1 class="page-header">Our SIT Facilities</h1>
						<ul class = "media-list">
							<?php
								require_once('protected/config.php');
							// Connecting to database
								try {
									$conn = new PDO( "sqlsrv:Server= ". DBHOST ."; Database = " . DBNAME , DBUSER, DBPASS);
									$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
								}
								catch(Exception $e){
									die(var_dump($e));
								}

								// SQL command and get data
								$sql_select = "SELECT FacilityName, OperationHour, FacilityType, BuildingName, BuildingAbbr, ImageLocation FROM FACILITY_INFO ORDER BY FacilityType";
								$stmt = $conn->query($sql_select);
								$result = $stmt->fetchAll();
								if(count($result)>0)
								{
									foreach($result AS $eachResult)
									{
										echo '<li class = "media thumbnail">
											<a class = "pull-left" href = "#">
												<img width="256px" class = "media-object" src = "' . $eachResult['ImageLocation'] . '" alt = "Generic placeholder image">
											</a>
										  
											<div class = "media-body">
												<br/>
												<h2 class = "media-heading page-header">' . $eachResult['FacilityName'] . '</h2>
												
												<table class="table table-striped">
													<tbody class="searchable">
														<tr>
															<td align="right"><h4>Type :</h4></td>
															<td align="left"><h4>' . $eachResult['FacilityType'] . '</h4></td>
														</tr>
														<tr>
															<td align="right"><h4>Location :</h4></td>
															<td align="left"><h4>' . $eachResult['BuildingName'] . ', ' . $eachResult['BuildingAbbr'] . '</h4></td>
														</tr>
														<tr>
															<td align="right"><h4>Operation hours :</h4></td>
															<td align="left"><h4>' . $eachResult['OperationHour'] . '</h4></td>
														</tr>
													</tbody>
												</table>  
											</div>
										</li>';
									}
								}
							?>
						</ul>
					</div>
                </div>
            </div>
        </div>
    </body>
</html>