 <?php
include "lib/wv.php";
session_set_cookie_params(0);
session_start();
include_once('navbar.php');
$db = new wv();


if (isset($_REQUEST['id']) && !empty($_REQUEST['id']))
	$s = $db -> payment($_REQUEST['id']);
else
{
	$s = array(
			'sid' => '',
			'pid' => '',
			'sport_id' => '1',
			'boat_id' => '1',
			'boat_hours' => '',
			'is_payed' => 'N',
			'weight' => 'N',
			'driver_id' => '1',
			'instructor_id' => '1',
			'timestamp' => date('Y-m-d H:i'),
			'date' => date('Y-m-d'),
			'time' => date('H:i'),
			'comments' => '',
			'minutes' => '',
			'cost' => '0',
			'is_open' => 'N',
			'firstname' => '',
			'lastname' => '',
			'clientNotes' => '',
			'driver' => 'NE',
			'instructor' => 'NE',
			'sport' => 'wb',
			'boat' => 'Snob',
			'price_id' => '5',
			'price' => $price['name'],
			'ppm' => $price['ppm']
	);
}

error_log(json_encode($s));

?>
<div class="container">
<form class="form-horizontal" method="POST" action="#" id="session">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">

						<div class="form-group">
							<label for="clientSearch" class="col-lg-1 control-label">Procurar</label>
							<div class="col-lg-11">
								<input type="text" class="form-control" id="clientSearch" name="clientSearch"
								<?php 
								if (!empty($s['pid']))
									echo ' readonly';
								?>
								>
							</div>
						</div>

						<div class="form-group">
							<label for="client_id" class="col-lg-1 control-label">Id</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="clientId" name="clientId" value="<?php echo $s['pid'];?>" readonly>
							</div>
							<label for="name" class="col-lg-1 control-label">Name</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="clientName" name="clientName" value="<?php echo $s['firstname'] . ' ' . $s['lastname'];?>" readonly>								
							</div>
						</div>

						<div class="form-group">
							<label for="clientNotes" class="col-lg-1 control-label">Notes</label>
							<div class="col-lg-11">
								<input type="text" class="form-control" id="clientNotes" name="clientNotes" value="<?php echo $s['clientNotes'];?>" readonly>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Session</h3></div>
					<div class="panel-body">					

						<div class="form-group">
							<label for="sport" class="col-lg-1 control-label">Sport</label>
								<div class="col-lg-2">
									<select id="sport" name="sport" class="form-control">
									<?php
									$sports = $db->sports();
									foreach ($sports as &$sport)
									{
										if ($sport['id'] == $s['sport_id'])
											echo '<option value="'.$sport['id'].'" SELECTED>'.$sport['name'].'</option>';
										else
											echo '<option value="'.$sport['id'].'">'.$sport['name'].'</option>';
									}
									?>
									</select>														
								</div>
							</div>
							<div class="form-group">						
							<label for="boat" class="col-lg-1 control-label">Boat</label>
								<div class="col-lg-2">
									<select id="boat" name="boat" class="form-control">
									<?php
										$boats = $db->boats();
										foreach ($boats as &$boat)
										{
											if ($boat['id'] == $s['boat_id'])
												echo '<option data-weight="'.$boat['weight'].'" data-hours="'.$boat['boat_hours'].'" value="'.$boat['id'].'" SELECTED>'.$boat['name'].'</option>';
											else
												echo '<option data-weight="'.$boat['weight'].'" data-hours="'.$boat['boat_hours'].'" value="'.$boat['id'].'">'.$boat['name'].'</option>';
										}
									?>
									</select>
													</div>
													<label for="hours" class="col-lg-1 control-label">Hours</label>
													<div class="col-lg-2">
														<input type="text" class="form-control" id="hours" name="hours" value="<?php echo $s['boat_hours'];?>">								
													</div>
													<label for="weight" class="col-lg-1 control-label">Ballast</label>
													<div class="col-lg-2">
								<input type="checkbox" class="checkbox" id="weight" name="weight" value="1"/>
													</div>
												</div>
						
						<div class="form-group">
							<label for="driver" class="col-lg-1 control-label">Driver</label>
							<div class="col-lg-2">
								<select id="driver" name="driver" class="form-control">
									<?php
									foreach ($db->drivers() as &$driver)
									   echo '<option value="'.$driver['id'].'" ' . ($driver['id'] == $s['driver_id'] ? 'SELECTED' : '') . '>'.$driver['name'].'</option>';
									?>
								</select>
							</div>
							<label for="instructor" class="col-lg-1 control-label">Instructor</label>
							<div class="col-lg-2">
								<select id="instructor" name="instructor" class="form-control">
									<?php
										foreach ($db->instructors() as &$instructor)
										    echo '<option value="'.$instructor['id'].'" ' . ($instructor['id'] == $s['instructor_id'] ? 'SELECTED' : '') . '>'.$instructor['name'].'</option>';
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="date" class="col-lg-1 control-label">Date</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="date" name="date" value="<?php echo $s['date'];?>">
							</div>
							<label for="hour" class="col-lg-1 control-label">Hour</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="hour" name="hour" value="<?php echo $s['time'];?>">								
							</div>
						</div>
						<div class="form-group">
							<label for="minutes" class="col-lg-1 control-label">Duration (mins)</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="minutes" name="minutes" value="<?php echo $s['minutes'];?>">
							</div>
							<label for="price" class="col-lg-1 control-label">Price Class</label>
							<div class="col-lg-2">
								<select id="price" name="price" class="form-control">
									<?php
									$prices = $db->prices();
										foreach ($prices as &$price)
										{
											if ($price['id'] == $s['price_id'])
												echo '<option data-weight="'.$price['weight'].'" data-ppm="'.$price['ppm'].'" data-price="'.$price['price'].'" value="'.$price['name'].'" selected>'.$price['name'].'</option>';
											else
												echo '<option data-weight="'.$price['weight'].'" data-ppm="'.$price['ppm'].'" data-price="'.$price['price'].'" value="'.$price['name'].'">'.$price['name'].'</option>';
										}
									?>
								</select>														
							</div>
							<label for="price" class="col-lg-1 control-label">PPM</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="ppm" name="ppm" value="<?php echo $s['ppm'];?>">													
							</div>
							<label for="cost" class="col-lg-1 control-label">Price</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="cost" name="cost" value="<?php echo $s['cost'];?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-8">
								<button id="save" class="btn btn-success">Submit</button>
								<button id="delete" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>



</div>

<script>


$(document).ready(function () {

	var priceClass = 'N';
	var weight = 'N';

	var ppm = 0;
	var price = 0;
	var minutes = 0;
	var cost = 0;
	boatChange();
	priceChange();
	
	$("body").on('change', '#boat', boatChange);
	$("body").on('change', '#price', priceChange);

	$("#minutes").keypress(digitsOnly);
	$("#minutes").keyup(priceChange);

	$("#ppm").keypress(floatOnly);
	$("#ppm").keyup(ppmChange);
	$("#cost").keypress(floatOnly);
	$("#cost").keyup(costChange);

	function ppmChange() {
		console.log('a');
		minutes = $('#minutes').val() ? parseFloat($('#minutes').val()) : 0.0;
		ppm = $('#ppm').val() ? parseFloat($('#ppm').val()) : 0.0;
		$('#price').val('S');
		price = ppm*minutes;
		$('#cost').val(price.toFixed(2));
	}

	function costChange() {
		console.log('a');
		minutes = $('#minutes').val() ? parseFloat($('#minutes').val()) : 0.0;
		price = $('#cost').val() ? parseFloat($('#cost').val()) : 0.0;
		$('#price').val('S');
		if (minutes > 0)
			ppm = price/minutes
		else
			ppm = 0;
		$('#ppm').val(ppm.toFixed(2));
	}
	
	function priceChange() {
		console.log('a');
		weight = $('#price').find(':selected').attr('data-weight'); 
		minutes = $('#minutes').val() ? parseFloat($('#minutes').val()) : 0.0;
		if ($('#price').find(':selected').attr('data-price') > 0)
		{
			price = parseFloat($('#price').find(':selected').attr('data-price'));
			if (minutes > 0)
				ppm = price/minutes
			else
				ppm = 0;
				
			$('#ppm').val(ppm.toFixed(2));
			$('#cost').val(price.toFixed(2));
		}
		else
		{
			ppm = parseFloat($('#price').find(':selected').attr('data-ppm'));
			price = Math.ceil(ppm*minutes);
			$('#ppm').val(ppm.toFixed(2));
			$('#cost').val(price.toFixed(2));
		}
	}
	
	function boatChange() {
		if ($('#boat').find(':selected').attr('data-weight') > 0)
			$('#weight').prop('checked', true);
		else
			$('#weight').prop('checked', false);

		$('#hours').val($('#boat').find(':selected').attr('data-hours'));			
	}
	
	setupClientAutocomplete();
	
	function form_submit(delete_s)
	{	
		$('.help-block').remove();

		var disabled = $('#session').find(':input:disabled').removeAttr('disabled');
		var postData = $('#session').serializeArray();
		disabled.attr('disabled','disabled');
		postData.push({ name: "delete", value: delete_s});
		
		$.ajax({			
			type		: 'POST',
			url			: 'lib/sessionSave.php',
			data 		: postData,
			dataType	: 'json',
			encode		: true
		}).done(function(data) {
			console.log(data); 
			if (!data.success) {
				var obj = data.errors;
				for (var prop in obj) {
					$('#session').addClass('has-error');
					$('#session').append('<div class="help-block"><div class="alert alert-danger">' + obj[prop] + '</div></div>'); 				
				}
			} else {
				alert('Session Created');
			    document.location.reload();
			}
		})
		.fail(function(data) {
			console.log(data);
		});
	}

	$('#save').click(function sav(e) {
		e.preventDefault();
		
		$("#save").attr("disabled", "disabled");

		form_submit(0);
	});
	$('#delete').click(function del(e) {	
		e.preventDefault();		
		
		$("#delete").attr("disabled", "disabled");

		form_submit(1);
	});
	
	
	
});
	
	
	</script>
</body>
</html>