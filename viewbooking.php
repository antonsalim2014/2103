<?php
	require_once('protected/config.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT booking Facility System  </title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
		<link href="images/favicon.ico" rel="shortcut icon"/>

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
                    format: "yyyy-mm-dd"
                });

                $('#date2').datepicker({
                    format: "yyyy-mm-dd"
                });

                $('.clockpicker').clockpicker();

                $('.no-data').show();

            });
			
			// To populate the facility and types
			var facilities = [];
			<?php
				// Connecting to database
				try {
					$conn = new PDO( "sqlsrv:Server= ". DBHOST ."; Database = " . DBNAME , DBUSER, DBPASS);
					$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				}
				catch(Exception $e){
					die(var_dump($e));
				}

				// SQL command and get data
				$sql_select = "SELECT f.facilityid, f.facilityName, f.typeid, type FROM facility f, facilitytype ft WHERE f.TypeID = ft.TypeID";
				$stmt = $conn->query($sql_select);
				$result = $stmt->fetchAll();
				$ftype = array();
				$facilityTypes = array();
				$facilities = array();
				if(count($result) > 0){
					foreach($result as $eachresult) {
						if(!in_array($eachresult['typeid'], $ftype)){
							array_push($facilityTypes, ['typeid'=>$eachresult['typeid'], 'type'=>$eachresult['type']]);
							array_push($ftype, $eachresult['typeid']);
						}
						array_push($facilities, ['facilityid'=>$eachresult['facilityid'], 'facilityName'=>$eachresult['facilityName'], 'type'=>$eachresult['type'], 'typeid'=>$eachresult['typeid']]);
					}
					echo 'facilities = ' . json_encode($facilities) . ';';
				}
			?>
			
			function facilityTypeonChange()
			{
				var type = document.getElementById("facilityType").value;
				var flty = document.getElementById("facility");
				flty.options.length = 1; // to remove all elements

				for (x in facilities)
				{
					if (facilities[x].typeid == type)
					{
						var option = document.createElement("option");
						option.text = facilities[x].facilityName;
						option.value = facilities[x].facilityid;
						flty.add(option);
					}
				}
			}
        </script>
    </head>

    <body>

        <?php
        include "./phpInclude/header.inc.php";
        ?>
        <div class="page-container">
            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-9">
                        <h1 class="page-header">View Booking</h1>
						<form class="form-vertical" role="form" action="viewbooking.php" method="POST">
                        <div class="navview">
                            <ul class="nav navbar-nav">          
                                <li>
                                    <label>Facility Type: </label>
                                    <select class="form-control" name="facilityType" id="facilityType" onchange="facilityTypeonChange()" required>
                                        <option value="any">Any</option>
										<?php
											if(count($facilityTypes) > 0)
											{
												foreach($facilityTypes as $type)
												{
													echo '<option value=' . $type['typeid'] . '>' . $type['type'] . '</option>';
												}
											}
										?>
                                    </select>
                                </li>
								<li>
                                    <label>Facility Name: </label>
                                    <select class="form-control" name="facility" id="facility" required>
                                        <option value="any">Any</option>
                                    </select>
                                </li> 
                                <li>
                                    <label>Start Date: </label>
                                    <div class="date">
                                        <input  type="text" class="form-control" placeholder="Leave blank if any date" name="start_date" id="date1">
                                    </div>
                                </li>      
                                <li>
                                    <label>End Date: </label>
                                    <div class="date">
                                        <input type="text" class="form-control" placeholder="Leave blank if any date" name="end_date" id="date2">
                                    </div>
                                </li>      
                                <li>
                                    <label>Booking Status: </label>
                                    <select class="form-control" name="bookingStatus" id="bookingStatus" required>
                                        <option value="any">Any</option>
										<?php
											// SQL command and get data
											$sql_select = "SELECT statuscode, statusname FROM bookingStatus";
											$stmt = $conn->query($sql_select);
											$result = $stmt->fetchAll();
											if(count($result) > 0){
												foreach($result as $eachresult) {
													echo '<option value="'. $eachresult['statuscode'] . '">' . $eachresult['statusname'] . '</option>';
												}
											}
										?>
                                    </select>
                                </li>
								<input type="hidden" name="searchBooking" value="True"/>
								<li>
									</br>
									<div class="form-group">
											<button type="submit" id="submitBtn" class="btn btn-primary" value="Submit">Search</button>
									</div>	
								</li>
								<li class="divider"></li>								
                            </ul>  					
                        </div>
						</form>
                    </div>
                    <div class="col-sm-9">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Facility Name</th>
                                    <th>Facility Type</th>
                                    <th>Booking Date</th>
									<th>Booking Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="searchable">
							<?php
								$sql_select_condition = "";
								if(isset($_POST['searchBooking']))
								{
									
									if(isset($_POST['facility']) && isset($_POST['facilityType']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['bookingStatus']) )
									{
										
										if($_POST['facility'] != 'any')
											$sql_select_condition = $sql_select_condition . " AND bk.FacilityID = '" . $_POST['facility'] . "'";
										if($_POST['facilityType'] != 'any')
											$sql_select_condition = $sql_select_condition . " AND f.TypeID = '" . $_POST['facilityType'] . "'";
										if($_POST['start_date'] != '' && $_POST['end_date'] != '')
											$sql_select_condition = $sql_select_condition . " AND bk.BookingDate BETWEEN '" . $_POST['start_date'] . "' AND '" . $_POST['end_date'] . "'";
										if($_POST['bookingStatus'] != 'any')
											$sql_select_condition = $sql_select_condition . " AND bk.statusCode = '" . $_POST['bookingStatus'] . "'";	
									}
								}
								// SQL command and get data
								$sql_select = "SELECT b.BuildingAbbr, f.FacilityName, ft.Type, bk.BookingDate, bk.BookingTime, bs.StatusName
												FROM Booking bk
												INNER JOIN Facility f ON f.FacilityID = bk.FacilityID
												INNER JOIN facilityType ft ON ft.TypeID= f.TypeID
												INNER JOIN building b ON b.BuildingID = f.BuildingID
												INNER JOIN bookingStatus bs ON bs.StatusCode = bk.StatusCode
												WHERE bk.userID = '" . $_SESSION['userID'] . "'" .  $sql_select_condition . " ORDER BY bk.BookingDate DESC";
								$stmt = $conn->query($sql_select);
								$result = $stmt->fetchAll();
								if(count($result) > 0){
									foreach($result as $eachresult) {
										echo '<tr>
												<td>' . $eachresult['BuildingAbbr'] . '</td>
												<td>' . $eachresult['FacilityName'] . '</td>
												<td>' . $eachresult['Type'] . '</td>
												<td>' . $eachresult['BookingDate'] . '</td>
												<td>' . $eachresult['BookingTime'] . '</td>
												<td>' . $eachresult['StatusName'] . '</td>
											</tr>';
									}
								}
								else
									echo '<tr class="no-data">
										<td colspan="6">No data</td>
									</tr>';
							?>
                            </tbody>
                        </table>                       
                    </div>

                </div><!-- /.col-xs-12 main -->

            </div><!-- /.col-xs-12 main -->
        </div><!--/.row-->
    </div><!--/.container-->
</body>
</html>