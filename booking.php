<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT booking Facility System  </title>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>

        <link href="bootstrap-3.3.5-dist/css/datepicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datepicker.js"></script>

        <link href="bootstrap-3.3.5-dist/css/clockpicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/clockpicker.js"></script>

        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#myDatePicker').datepicker({
                    format: "yyyy-mm-dd"
                });

                $('#myDatePicker').datepicker().on('changeDate', function (ev) {
                    availableTimingRequest()
                });
            });
        </script>

    </head>

    <body onload="loadTypeSelection()">
        <?php
        include "./phpInclude/header.inc.php";
        // azure connection variable
        require_once('protected/config.php');

        // Connecting to database
        try {
            $conn = new PDO("sqlsrv:Server= " . DBHOST . "; Database = " . DBNAME, DBUSER, DBPASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die(var_dump($e));
        }
        ?>

        <div class="page-container">

            <!-- top navbar -->
            <!--        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">88
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
                    <?php
                    // get the types of facility in school
                    $sql_select = "SELECT typeID, type FROM facilityType";
                    $stmt = $conn->query($sql_select);
                    $facilityList = $stmt->fetchAll();
                    if (count($facilityList) > 0) {
                        foreach ($facilityList as $row) {
                            //array_push($FType, array("TypeID" => $row['typeID'], "Type" =>$row['type']));
                        }
                        //print_r($FType);
                    }
                    ?>

                    <div class="col-xs-12 col-sm-9">
                        <h1 class="page-header">New Booking</h1>
                        <div class="container">
                            <div class="col-xs-4">
                                <form action="booking-process.php" method="POST">
                                    <label>Facility Type: </label>
                                    <select onchange="loadFacilitySelection(value)" id="facilityType" class="form-control">
                                        <option value="empty" disabled selected>Select a Type</option> 
                                    </select>
                                    <label>Facility: </label>
                                    <select id="facilityDropDown" class="form-control" name="bFacility">
                                        <option id="initalValue" value="empty" disabled selected>Select a Facility</option>
                                    </select>
                                    <label>Date: </label>
                                    <div class="date">
                                        <input type="text" class="form-control" placeholder="Select a Date"  name="bDate" id="myDatePicker">
                                    </div>
                                    <label>Time: </label>
                                    <select id="timingDropDown" class="form-control" name="bTime">
                                        <option id="initalTimeValue" value="empty" disabled selected>Select a Time Slot</option>
                                    </select>
                                    <br><br>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.col-xs-12 main -->
        </div><!--/.row-->
    </div><!--/.container-->
    <script>
        function availableTimingRequest() {
            var date = document.getElementById("myDatePicker").value;
            var fid = document.getElementById("facilityDropDown").value;
            var xmlhttp = new XMLHttpRequest();
            var url = 'timeRequestAPI.php?date=' + date + '&fid=' + fid;
            var myArr = [];
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var timingDropDown = document.getElementById("timingDropDown");
                    myArr = JSON.parse(xmlhttp.responseText);
                    if (myArr.length > 0) {
                        for (i = 0; i < myArr.length; i++) {
                            var option = document.createElement("option");
                            option.text = myArr[i].Time_Range;
                            option.value = myArr[i].Time_Range;
                            timingDropDown.add(option);
                        }
                    }
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function loadFacilitySelection(value) {
            var FDropdown = document.getElementById("facilityDropDown");
            // clear dropdown option first
            FDropdown.options.length = 0;
            for (i = 0; i < fInfo.length; i++) {
                if (fInfo[i].TypeID == value) {
                    var option = document.createElement("option");
                    option.text = fInfo[i].FacilityName;
                    option.value = fInfo[i].FacilityID;
                    FDropdown.add(option);
                }
            }
        }

<?php
$sql_select = "SELECT ft.TypeID, ft.Type, f.FacilityName, f.FacilityID FROM facility f, facilityType ft WHERE f.TypeID = ft.TypeID";
$stmt = $conn->query($sql_select);
$facility = $stmt->fetchAll();
$stringBuilder = '[';
if (count($facility) > 0) {
    foreach ($facility as $row) {
        $stringBuilder = $stringBuilder . '{"Type":"' . $row['Type'] . '", "TypeID":"' . $row['TypeID'] . '", "FacilityName":"' . $row['FacilityName'] . '", "FacilityID":"' . $row['FacilityID'] . '"},';
    }
}
$stringBuilder = trim($stringBuilder, ",");
$stringBuilder = $stringBuilder . ']';

// Pass the string into javascript variable
// will become json format
echo 'var fInfo = ' . $stringBuilder;
?>

        function loadTypeSelection() {
            var FtypeDropdown = document.getElementById("facilityType");
            // clear dropdown option first
            //FtypeDropdown.options.length = 0;
            for (i = 0; i < fType.length; i++) {
                var option = document.createElement("option");
                option.text = fType[i].Type;
                option.value = fType[i].TypeID;
                FtypeDropdown.add(option);
            }
        }

<?php
$sql_select = "SELECT typeID, type FROM facilityType";
$stmt = $conn->query($sql_select);
$facilityType = $stmt->fetchAll();
$stringBuilder1 = '';
$stringBuilder1 = '[';
//echo "console.log('$stringBuilder1');";
if (count($facilityType) > 0) {
    foreach ($facilityType as $row) {
        $stringBuilder1 = $stringBuilder1 . '{"Type":"' . $row['type'] . '", "TypeID":"' . $row['typeID'] . '"},';
    }
}
$stringBuilder1 = trim($stringBuilder1, ",");
$stringBuilder1 = $stringBuilder1 . ']';
//echo "console.log('$stringBuilder1');";
// Pass the string into javascript variable
// will become json format
echo 'var fType = ' . $stringBuilder1;
?>

    </script>
</body>
</html>























<!-- <div class="container">
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
                 <input type="text" class="form-control" value="Start Time" required >
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-time"></span>
                 </span>
             </div>
             <label>End Time: </label>
             <div class="input-group clockpicker">
                 <input type="text" class="form-control" value="End Time" required >
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-time"></span>
                 </span>
             </div>
             <br>
             <button type="submit" class="btn btn-default">Submit</button>
         </form>
     </div>
 </div> -->