<html>
    <head>
        <script type="text/javascript">
            // When the document is ready
			var checkingRequestInterval = setInterval(function() {
				var xmlhttp = new XMLHttpRequest();
				var url = 'booking_status_checking_process.php';
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						return;
					}
				}
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
			}, 5000);
        </script>
    </head>

    <body>
		<h1>Server is running!</h1>
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