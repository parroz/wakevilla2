 <?php
 include "lib/wv.php";
 session_start();
 include_once('navbar.php');
 
 $db = new wv();
 
 $rows = $db->prices();
 

?>
<div class="container">
	
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Price List</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>PPM</th>
							<th>Price</th>
							<th>Weight</th>
							<th>Associated</th>
							<th>Description</th>
						</tr>
<?php 
    foreach($rows as $row)
    {  
		echo '<tr class="clickableRow" onclick="window.location.href=\'price.php?id=' . $row['id'] . 
'\'" data-href="price.php?id='. $row['id'] .'" id='. $row['id'] .'>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name']  .'</td>';
		echo '<td>' . $row['ppm'] .'</td>';
		echo '<td>' . $row['price'] .'</td>';
			if ($row['weight'] == 'Y')
				echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
			else
				echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
			if ($row['associated'] == 'Y')
				echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
			else
				echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
			echo '<td>' . $row['description']  .'</td>
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
