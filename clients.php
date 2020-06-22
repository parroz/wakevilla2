<?php
include "lib/wv.php";
session_start();
include_once('navbar.php');

$db = new wv();

$clients = $db->client();
?>
   
<div class="container">
	
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Resultado</h3></div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
					<thead>
					<tr id="resultsHeader">
						<td>ID</td>
					    <td>NN</td>
					    <td>Name</td>
					    <td>Surname</td>
					    <td>Email</td>
					    <td>Staff</td>					    
					    <td>Counter</td>					    
					</tr>
					</thead>
					<tbody id="results">
					<?php
					$i = 1;
					foreach ($clients as $client)
					{
					    
					    echo '<tr class="clickableRow" 
onclick="window.location.href=\'client.php?id=' . $client['id'] . 
'\'" data-href="client.php?id='. $client['id'] .'" id='. $client['id'] .'>';
					    echo ' <td>' . $client['id']. '</td>';
					    echo ' <td>' . $client['nickname']. '</td>';
					    echo ' <td>' . $client['firstname']. '</td>';
					    echo ' <td>' . $client['lastname']. '</td>';
					    echo ' <td>' . $client['email']. '</td>';
					    echo ' <td>' . $client['staff']. '</td>';
					    echo ' <td>' . $i++. '</td>';
					    echo '</tr>';
					}
					
					?>
					</tbody>
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
