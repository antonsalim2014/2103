<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT booking Facility System  </title>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>



        <!-- Bootstrap stylesheet -->

        <link href="bootstrap-3.3.5-dist/css/clockpicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/clockpicker.js"></script>

        <link href="bootstrap-3.3.5-dist/css/datepicker.css" rel="stylesheet"/>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datepicker.js"></script>
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
        <div class="date">
            <input  type="text" class="form-control" placeholder="Click to show datepicker" id="example1">
        </div>
        <div class="input-group clockpicker">
            <input type="text" class="form-control" value="09:30">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </body>
</html>