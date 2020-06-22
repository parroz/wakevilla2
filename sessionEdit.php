 <?php
	include "lib/wv.php";
	session_set_cookie_params ( 0 );
	session_start ();
	include_once ('navbar.php');
	$db = new wv ();
	
	$id = $_REQUEST ['id'];
	$row = $db->sessions ( '', $id );
	
	?>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Session Details</div>
		<!-- Table -->
		<table class="table table-condensed table-responsive">

			<tr>
				<td>ID</td>
				<td><?php echo $row['sid']; ?></td>
			</tr>
			<tr>
				<td>TimeStamp</td>
				<td><?php echo $row['timestamp']; ?></td>
			</tr>
			<tr>
				<td>Boat</td>
				<td><?php echo $row['boat']; ?></td>
			</tr>
			<tr>
				<td>Boat Hours</td>
				<td><?php echo $row['boat_hours']; ?></td>
			</tr>
			<tr>
				<td>Rider</td>
				<td><a href="clientEdit.php?id=<?php echo $row['pid'];?>"><?php echo $row['firstname'] .' '. $row['lastname'];?></a></td>
			</tr>
			<tr>
				<td>Sport</td>
				<td><?php echo $row['sport']; ?></td>
			</tr>
			<tr>
				<td>weight</td>
	<?php
	if ($row ['weight'] == 'Y')
		echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td></tr>';
	else
		echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td></tr>';
	?>	
		
			
			
			<tr>
				<td>Driver</td>
				<td><?php echo $row['driver']; ?></td>
			</tr>
			<tr>
				<td>Instructor</td>
				<td><?php echo $row['instructor']; ?></td>
			</tr>
			<tr>
				<td>Minutes</td>
				<td><?php echo $row['minutes']; ?></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><?php echo $row['price']; ?></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><?php echo $row['cost']; ?></td>
			</tr>
			<tr>
				<td>Payed</td>
		<?php
		if ($row ['is_payed'] == 'Y')
			echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td></tr>';
		else
			echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td></tr>';
		?>
		
			
			
			<tr>
				<td>Comments</td>
				<td><?php echo $row['comments']; ?></td>
			</tr>
			<tr>
				<td><a href="session.php?id=<?php echo $row['sid'];?>">[Edit]</a></td>
				<td></td>
			</tr>

		</table>
	</div>
</div>
</body>
</html>