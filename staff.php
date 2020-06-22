<?php
include "lib/wv.php";
session_start();
include_once('navbar.php');
 
$db = new wv();
 
 
$drivers = $db->drivers();
$instructors = $db->instructors();
?>

  <div class="container">
	
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Drivers List</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
		<tr><th>ID</th><th>Nickname</th><th>Name</th><th>Minutes</th><th>Rating [&#37;]</th></tr>
		
<?php	
foreach($drivers as $row)
{  
		echo '<tr class="clickableRow" onclick="window.location.href=\'client.php?id=' . $row['id'] . 
'\'" data-href="client.php?id='. $row['id'] .'" id='. $row['id'] .'>';
		echo '<td>' . $row['id'] .'</td>';
			echo '<td>' . $row['nickname'] .'</td>
			<td>' . $row['firstname']  .' ' . $row['lastname'] .'</td>
			<td>' . $row['minutes'] .'</td>
        	<td>' . $row['rating'] .'</td>
			</tr>';
}
?>
</table>
</div>
			</div>
		</div>
	</div>


	
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Instructors List</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
		<tr><th>ID</th><th>Nickname</th><th>Name</th><th>Minutes</th><th>Rating [&#37;]</th></tr>

<?php		
foreach($instructors as $row)
{  
    echo '<tr class="clickableRow" onclick="window.location.href=\'client.php?id=' . $row['id'] .
    '\'" data-href="client.php?id='. $row['id'] .'" id='. $row['id'] .'>';
    echo '<td>' . $row['id'] .'</td>';    
    echo '<td>' . $row['nickname'] .'</td>
			<td>' . $row['firstname']  .' ' . $row['lastname'] .'</td>
			<td>' . $row['minutes'] .'</td>
        	<td>' . $row['rating'] .'</td>
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


