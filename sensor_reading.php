 <?php
 include "lib/wv.php";
 session_start();
 include_once('navbar.php');
 
 $db = new wv();
 
 if (!empty($_REQUEST['id']))
 {
     $p = $db->sensor($_REQUEST['id']);
     $readings = $db->sensorReadings($_REQUEST['id']);
 }
 else
 {
     $p = array(
         'id' => '',
         'address' => '',
         'city' =>'',
         'postal_code' => '',
         'country' => '',
         'type' => '',
         'name' => '',
         'phone' =>''
     );
     
     $readings = array();
 }

?>
<div class="container">
	<div class="container">
	<form class="form-horizontal" method="post" id="clientForm">

		<div class="panel panel-default">

			<div class="panel-heading"><?php echo $p['name']; ?></div>
			<div class="panel-body">
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="id">ID</label>
				<div class="col-md-2">
					<input class="form-control input-md" id="id" name="id" type="text" value = "<?php echo $p['id'];?>" disabled>
				</div>
			</div>

		
			<div class="form-group">
				<label class="col-md-2 control-label" for="phone">Phone</label>
				<div class="col-md-3">
					<input name="phone" id="phone" type="text" value="<?php echo $p['phone'];?>" class="input-medium bfh-phone form-control" data-format="+ddd dd ddddddd">
				</div>
			</div>

		
                <!-- Address -->
				<div class="form-group">
					<label for="address" class="col-lg-2 control-label">Morada</label>
					<div class="col-lg-9">
						<input id="address" name="address" type="text" class="form-control input-md" value="<?php echo $p['address']; ?>">
					</div>
				</div>
				
				<!-- City, Postal_Code, Country -->
				<div class="form-group">
					<label for="city" class="col-lg-2 control-label">Cidade</label>
					<div class="col-lg-2">
						<input id="city" name="city" type="text" class="form-control input-md" value="<?php echo $p['city']; ?>">
					</div>			
				
					<label for="postal_code" class="col-lg-2 control-label">Código Postal</label>
					<div class="col-lg-2">
						<input id="postal_code" name="postal_code" type="text" class="form-control input-md" value="<?php echo $p['postal_code']; ?>">
					</div>
					
					<label class="col-md-1 control-label" for="country">País</label>
					<div class="col-md-2">					
						<select name="country" id="country" class="input-medium bfh-countries form-control" > 
						<?php 
						foreach ($db->countries() as &$country)
						    echo '<option value = "'.$country['id']. '" ' . ($p['country'] == $country['id'] ? 'SELECTED' : '') . '>' . $country['name']. '</option>';
                        ?>
						</select>
					</div>
				</div>
				
						
			<!-- Button (Double) -->
			<div class="form-group">
				<label class="col-md-2 control-label" for="update">Action</label>
				<div class="col-md-3">
					<button class="btn btn-success" onclick="return saveClient()">Gravar</button>
				</div>
			</div>
	</div>
		
</div>
	
	<div class="row">
		<div class="col-lg-16">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Sensor</h3></div>
				<div class="panel-body">
        			<table class="table table-striped table-hover">
						<tr>
							<th>DATE</th>
							<th>VALUE</th>
							<th>BATTERY</th>
						</tr>
<?php 
    foreach($readings as $row)
    {  
		echo '<tr>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['value']  .'</td>';
		echo '<td>';
		if ($row['batery'] >= 90)
		    echo '<i class="fa fa-battery-full" aria-hidden="true"></i>';
		elseif ($row['batery'] < 90 && $row['batery'] >= 60)
		  echo '<i class="fa fa-battery-three-quarters" aria-hidden="true"></i>';
		elseif ($row['batery'] < 60 && $row['batery'] > 40)
		  echo '<i class="fa fa-battery-half" aria-hidden="true"></i>';
		elseif ($row['batery'] < 40 && $row['batery'] >= 20)
		  echo '<i class="fa fa-battery-quarter" aria-hidden="true"></i>';
		  elseif ($row['batery'] < 20)
		  echo '<i class="fa fa-battery-empty" aria-hidden="true"></i>';
		
		'</td>';
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
