<?php
include "lib/wv.php";
session_set_cookie_params(0);
session_start();
include_once('navbar.php');
$db = new wv();



if (empty($_REQUEST['id']))
	die('Card not found');

$id = $_REQUEST['id'];
$card = $db->card($id);

if (empty($card))
	die('Card not found');

$movements = $db->cardHistory($id);

if (empty($movements))
	die('Card not found');

?>

<div class="container">
	<form class="form-horizontal" action="lib/cardSave.php?ACTION=UPDATE" method="post" id="cardForm">
		<div class="panel panel-default">
			<div class="panel-heading">Card Details</div>
			<div class="panel-body">

		<div class="form-group">
			<label class="col-md-2 control-label" for="id">Card Id</label>
			<div class="col-md-2">
				<input class="form-control input-md" id="id" name="id" type="text" value = "<?php echo $card['id'];?>" disabled>
			</div>
			<label class="col-md-2 control-label" for="firstname">Card Holder</label>
			<div class="col-md-2">
				<input class="form-control input-md" id="firstname" name="firstname" type="text" value = "<?php echo $card['firstname'] .' ' . $card['lastname'];?>" disabled>
			</div>
		</div>
		
		
		<div class="form-group">	
			<label class="col-md-2 control-label" for="id">Card Type</label>
			<div class="col-md-2">
					<select id="type" name="type" class="form-control">
					<?php 
					$cardTypes = $db->cardTypes();
					foreach ($cardTypes as &$cardType)
					{
						if ($card['type'] == $cardType['id'])
							echo '<option value="'.$cardType['id'].'" SELECTED>'.$cardType['id'].'</option>';
						else
							echo '<option value="'.$cardType['id'].'">'.$cardType['id'].'</option>';			
					}
					?>
					</select>
				</div>
			<label class="col-md-2 control-label" for="balance">Current Balance</label>
			<div class="col-md-2">
				<input class="form-control input-md" id="balance" name="balance" type="text" value = "<?php echo $card['balance'];?>" disabled>
			</div>
		</div>

		<div class="form-group">	
			<label class="col-md-2 control-label" for="charge">Re-charge</label>
			<div class="col-md-2">
				<input class="form-control input-md" id="value" name="value" type="text" value = "0">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label" for="update">Action</label>
			<div class="col-md-2">
				<button class="btn btn-success" onclick="return saveCard()">Save</button>
			</div>
		</div>

			</div>
		</div>
	</form>


<div class="panel panel-default">

	<div class="panel-heading">Card Movements:</div>
	<div class="panel-body">
			<table class="table table-striped" id="clientBalance">
				<thead>
					<tr>
						<th class="col-lg-2">Timestamp</th>
						<th class="col-lg-1">Value</th>
						<th class="col-lg-2">Session</th>
						<th class="col-lg-1">Rider</th>
						<th class="col-lg-1">Minutes</th>
						<th class="col-lg-1">Sport</th>
						<th class="col-lg-1">PriceId</th>
					</tr>
				</thead>
			<tbody>
<?php
	$total_balance = 0;
	foreach ( $movements as &$m) 
	{
		echo '<tr>';
		echo '<td>' . $m['timestamp'] . '</td>';
		echo '<td>' . $m['value'] . '&#8364;</td>';
		echo '<td><a href="sessionEdit.php?id='.$m['sid'].'">' . $m['sid'] . '</a></td>';
		echo '<td><a href="clientEdit.php?id='.$m['rider_id'].'">' . $m['rider_firstname'] . '</a></td>';
		echo '<td>' . $m['minutes'] . '</td>';
		echo '<td>' . $m['sport_id'] . '</td>';
		echo '<td>' . $m['price_id'] . '</td>';		
		echo '</tr>';
		$total_balance += $m['value'];
	}
	?>
	</tbody>
	<tfoot>
	<?php
		echo '<tr>';
		echo '<td></td>';
		echo '<td>' .round($total_balance,2). ' &#8364;</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';
	?>
								</tfoot>
							</table>
			
	</div>
		
</div>


		
	

</div>


<script type="text/javascript">
$(document).ready(function() {

	$("#cardForm").submit(function(e) {

		var disabled = $('#cardForm').find(':input:disabled').removeAttr('disabled');
		var postData = $('#cardForm').serializeArray();
		disabled.attr('disabled','disabled');
				
		var formURL = $(this).attr("action");
		$.ajax({
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				alert("Cartao gravado com sucesso");
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("Erro ao gravar o client.");
			}
		});
		e.preventDefault();
	});
	
});
	
function saveCard() {
	$("#cardForm").submit();
	return false;
}
</script>

  </body>
</html>