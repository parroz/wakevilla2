<?php
include "lib/wv.php";
session_set_cookie_params(0);
session_start();
include_once('navbar.php');
$db = new wv();

$cards = $db->cards();
?>

<div class="container">
<div class="panel panel-default">

	<div class="panel-heading">Cards</div>
	<div class="panel-body">
			<table class="table table-striped" id="clientBalance">
				<thead>
					<tr>
						<th class="col-lg-1">Id</th>
						<th class="col-lg-3">Belongs to</th>
						<th class="col-lg-2">Type</th>
						<th class="col-lg-2">Balance</th>
					</tr>
				</thead>
			<tbody>
	<?php
	$total_balance = 0;
	foreach ( $cards as &$card) 
	{
		echo '<tr>';
		echo '<td><a href="cardEdit.php?id='.$card['id'].'">' . $card['id'] . '</a></td>';
		echo '<td>' . $card['firstname'] . ' ' . $card['lastname'] . '</td>';
		echo '<td>' . $card['type'] . '</td>';
		echo '<td>' . $card['balance'] . '&#8364;</td>';
		echo '</tr>';
		
		$total_balance += $card['balance'];
	}
	?>
	</tbody>
	<tfoot>
	<?php
		echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td>' .round($total_balance,2). ' &#8364;</td>';
		echo '</tr>';
	?>
								</tfoot>
							</table>
			
	</div>
		
</div>


		
	

</div>


<script type="text/javascript">

</script>

  </body>
</html>