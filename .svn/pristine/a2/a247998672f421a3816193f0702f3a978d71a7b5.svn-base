 <?php
include "lib/wv.php";
session_set_cookie_params(0);
session_start();
include_once('navbar.php');
$db = new wv();

$documentType = 'session';

if (!isset($_SESSION[$documentType]))
	$_SESSION[$documentType] = array();


?>
  <div class="container">
  
  
  

 <?php
 
	
	$filter = $_REQUEST['filter'];
				
	$boat = $_REQUEST['boat'] ? '1' : '0';
	$hours = $_REQUEST['hours'] ? '1' : '0';
	$weight = $_REQUEST['weight'] ? '1' : '0';
	$driver = $_REQUEST['driver'] ? '1' : '0';
	$instructor = $_REQUEST['instructor'] ? '1' : '0';


	if (empty($filter))
		$filter = 'all';
	
	$rows = $db->sessions($filter);

 echo '<div class="panel panel-default">
 	<!-- Default panel contents -->
	<div class="panel-heading">Filter</div>

	<!-- Select Basic -->
	<form class="form-horizontal" action="sessions.php" method="POST">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="selectbasic">Select Sessions</label>
	  <div class="col-md-4">
	    <select id="filter" name="filter" class="form-control" onchange="this.form.submit()">';

	if ($filter == 'all')
		echo '<option value="all" selected="selected">All</option>';
	else
		echo '<option value="all">All</option>';
	
	if ($filter == 'open')
		echo '<option value="open" selected="selected">Open</option>';
	else
		echo '<option value="open">Open</option>';
	
	if ($filter == 'payed')
		echo '<option value="payed" selected="selected">Payed</option>';
	else
		echo '<option value="payed">Payed</option>';

	if ($filter == 'unpayed')
	  echo '<option value="unpayed" selected="selected">Unpayed</option>';
	else
		echo '<option value="unpayed">Unpayed</option>';

	echo '</select>
  	</div>
	</div>	
	
	<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Display Options</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="boat">';
	if ($boat)
		echo '<input type="checkbox" name="boat" id="boat" value="1" onChange="this.form.submit()" checked="checked">';
	else
		echo '<input type="checkbox" name="boat" id="boat" value="1" onChange="this.form.submit()">';
	echo '
      Boat
    </label>
	</div>
  <div class="checkbox">
    <label for="hours">';
	if ($hours)
      echo '<input type="checkbox" name="hours" id="hours" value="1" onChange="this.form.submit()" checked="checked">';
	else
	  echo '<input type="checkbox" name="hours" id="hours" value="1" onChange="this.form.submit()">';

    echo 'Boat Hours
    </label>
	</div>
  <div class="checkbox">
    <label for="weight">';
	if ($weight)
      echo '<input type="checkbox" name="weight" id="weight" value="1" onChange="this.form.submit()" checked="checked">';
	else
	  echo '<input type="checkbox" name="weight" id="weight" value="1" onChange="this.form.submit()">';
echo 'Weight
    </label>
	</div>	
	  <div class="checkbox">
    <label for="driver">';
	if ($driver)
      echo '<input type="checkbox" name="driver" id="driver" value="1" onChange="this.form.submit()" checked="checked">';
	else
	  echo '<input type="checkbox" name="driver" id="driver" value="1" onChange="this.form.submit()">';
	echo 'Driver
    </label>
	</div>
	  <div class="checkbox">
    <label for="instructor">';
	if ($instructor)
      echo '<input type="checkbox" name="instructor" id="instructor" value="1" onChange="this.form.submit()" checked="checked">';
	else
      echo '<input type="checkbox" name="instructor" id="instructor" value="1" onChange="this.form.submit()">';
echo 'Instructor
    </label>
	</div>
	
  </div>
</div>

	</form>

</div>';





 echo '<div class="panel panel-default">
 	<!-- Default panel contents -->
	<div class="panel-heading">Sessions List</div>
	<!-- Table -->
	<table class="table table-condensed table-responsive">
		<tr>
			<th>Date</th>';
			if ($boat)
				echo '<th>Boat</th>';
			if ($hours)
				echo '<th>Boat Hrs</th>';		
			echo '<th>Rider</th>
			<th>Sport</th>';
			if ($weight)
				echo '<th>Weight</th>';
			if ($driver)
				echo '<th>Driver</th>';
			if ($instructor)
				echo '<th>Inst.</th>';
			echo '<th>Min</th>
			<th>Cost</th>';
			if ($filter == 'all')
				echo '<th>Payed</th>';
			echo '</tr>';
	foreach($rows as $row)
	{  
	 	 echo '<tr>	 
		 	<td><a href="sessionEdit.php?id='.$row['sid'].'">' . $row['timestamp'] . '</a></td>';
			if ($boat)
				echo '<td>' . $row['boat']  .'</td>';
			if ($hours)
				echo '<td>' . $row['boat_hours']  .'</td>';

			echo '<td>' . $row['firstname'] .' '. $row['lastname'] .'</td>
			<td>' . $row['sport'] .'</td>';

			if ($weight)
			{
				if ($row['weight'] == 'Y')
					echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
				else
					echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
			}
			
			if ($driver)
				echo '<td>' . $row['driver'] .'</td>';
			if ($instructor)
				echo '<td>' . $row['instructor'] .'</td>';
				
			echo '<td>' . $row['minutes'] .'</td>
			<td>' . $row['cost'] .'</td>';		

			if ($filter == 'all')
			{
				if ($row['is_payed'] == 'Y')
					echo '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
				else
					echo '<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
			}
			echo '</tr>';

	  } 
	echo '</table>
    </div>';  
	
  ?>
</div>
  </body>
</html>