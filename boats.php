<?php
include "lib/wv.php";
session_start();
include_once('navbar.php');
 
$db = new wv();
 
$rows = $db->boats();
 

?>
<div class="container">
	
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Boat List</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
						<tr>
							<tr><th>ID</th><th>Name</th><th>Brand</th><th>Model</th><th>Hours</th></tr>
						</tr>
<?php 
    foreach($rows as $row)
    {  
		echo '<tr class="clickableRow" onclick="window.location.href=\'boat.php?id=' . $row['id'] . 
'\'" data-href="boat.php?id='. $row['id'] .'" id='. $row['id'] .'>';
		 	echo '<td>' . $row['id'] . '</td>
			<td>' . $row['name']  .'</td>
			<td>' . $row['brand'] .'</td>
			<td>' . $row['model'] .'</td>
			<td>' . $row['hours']  .'</td>
			</tr>';
	  }
	   ?>
	</table>
	
</div>
			</div>
		</div>
	</div>

</div>
<script>

$(document).ready(function () {

	function trLink(event) {
		window.document.location = $(this).data("href");
	}
});
</script>
 
  </body>
</html>