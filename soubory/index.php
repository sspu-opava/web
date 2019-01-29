<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Soubory v PHP</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Soubory v PHP</h1>
		<div class="container">
		<?php 

			include "inc/datafiles.php";
			$html = readTXT("festival.html");
			echo $html;
			
			$csv = readCSV("film.csv");
			// echo $csv[4]['obsah'];

			$xml = readXML("film.xml");
			// echo $xml[5]['nazev'];
			// var_dump(json_encode($xml));

			$json = readJSON("film.json");
			// echo $json[5]['nazev'];
			echo dataTable($json,array('nazev'=>'Název filmu',
									   'rok'=>'Rok premiéry',
									   'format'=>'Formát',
									   null => 'Akce'), 'table table-bordered table-striped');
		 ?>
		 </div>
		 <div id="zaznam" class="container jumbotron">
		 	
		 </div>
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script>
			$(document).ready(function(){
   				$('#myTable').DataTable({
   				 	"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
   				 	"columnDefs": [ {
			            "targets": 3,
			            "data": null,
			            "defaultContent": "<button class='detail'>Detail</button>"
			        }]
   				});

				$(document.body).on( 'click', '.detail', function () {
  					console.log($(this).parent("tr"));
   					$.ajax({
   						type: "GET",
   						url: "ajax.php", 
   						data: {
      						id: $(this).parent("td").parent("tr").attr("id"),
    					},
    					success: function(data, status){
        					//alert("Data: " + data + "\nStatus: " + status);
        					$("#zaznam").html(data);
    					}
    				});
				} );


   				/*$("#myTable td").click(function(){
   					$.get("ajax.php", {
      					id: $(this).parent().attr("id"),
    					},
    					function(data, status){
        					//alert("Data: " + data + "\nStatus: " + status);
        					$("#zaznam").html(data);
    					}
    				);
				});*/
			});
		</script>
	</body>
</html>