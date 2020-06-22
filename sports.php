 <?php
 include "lib/wv.php";
 session_start();
 include_once('navbar.php');
 
 $db = new wv();
 
 $rows = $db->sports();
 

?>
<div class="container">
	
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Sports List</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
						<tr>
							<tr><th>ID</th><th>Name</th><th>Shortname</th></tr>
						</tr>
<?php 
    foreach($rows as $row)
    {  
		echo '<tr class="clickableRow" onclick="window.location.href=\'sport.php?id=' . $row['id'] . 
'\'" data-href="sport.php?id='. $row['id'] .'" id='. $row['id'] .'>';
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['name']  .'</td>';
		echo '<td>' . $row['shortname'] .'</td>';
		echo '</tr>';
		
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