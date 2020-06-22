 <?php
include "lib/wv.php";
session_set_cookie_params(0);
session_start();
include_once('navbar.php');
$db = new wv();
 
$name_header = 'New Client';
$p = array();
if (!empty($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $p = $db->person($id);

    // flags
    $valid_flag = 1;
    $isDriver = $p['driver'] == 'Y' ? true : false;
    $isInstructor = $p['instructor'] == 'Y' ? true : false;
    $isStaff = $isDriver || $isInstructor ? true : false;
    
    $name_header = $p['firstname'] . ' ' . $p['lastname'];
}
if (empty($p))
{
    $valid_flag = 0;
    $isDriver = 0;
    $isInstructor = 0;
    $isStaff = 0;
    
    $p = array(
        'id' => '',
        'firstname' => '',
        'lastname' => '',
        'nickname' => '',
        'dob' => '',
        'country' => 'PT',
        'phone' => '',
        'email' => '',
        'fbid' => '',
        'NIF' => '',
        'comments' => '',
        'gender' => 'M',
        'club' => 'N',
        'driver' => 'N',
        'instructor' => 'N',
        'irating' => '',
        'drating' => ''
    );
}

$unpayed_sessions = array();
$payed_sessions = array();
$driver_sessions = array();
$instructor_sessions = array();

if ($valid_flag)
{
    $unpayed_sessions = $db->sessions('unpayed', '', $id, '', ''); // payed sessions
    $payed_sessions = $db->sessions('payed', '', $id, '', ''); // payed sessions
}

if ($isDriver)
    $driver_sessions = $db->sessions('payed', '', '', $id, ''); // sessions as driver

if ($isInstructor)
    $instructor_sessions = $db->sessions('payed', '', '', '', $id); // sessions as instructor
	
	
error_log(json_encode($p));
?>
<div class="container">
	<form class="form-horizontal" method="post" id="clientForm">

		<div class="panel panel-default">

			<div class="panel-heading"><?php echo $name_header; ?></div>
			<div class="panel-body">
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="id">ID</label>
				<div class="col-md-2">
					<input class="form-control input-md" id="id" name="id" type="text" value = "<?php echo $p['id'];?>" disabled>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-2 control-label" for="firstname">First Name</label>
				<div class="col-md-3">
					<input id="firstname" name="firstname" type="text" value="<?php echo $p['firstname'];?>" class="form-control input-md">
				</div>
				<label class="col-md-2 control-label" for="lastname">Last Name</label>
				<div class="col-md-3">
					<input id="lastname" name="lastname" type="text" value="<?php echo $p['lastname'];?>"  class="form-control input-md">
				</div>
			</div>
				
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="phone">Phone</label>
				<div class="col-md-3">
					<input name="phone" id="phone" type="text" value="<?php echo $p['phone'];?>" class="input-medium bfh-phone form-control" data-format="+ddd dd ddddddd">
				</div>
				<label class="col-md-2 control-label" for="email">Email</label>
				<div class="col-md-3">
					<input id="email" name="email" type="email" value="<?php echo $p['email'];?>" class="form-control input-md">
				</div>
			</div>
									
			<!-- Multiple Radios (inline) -->
			<div class="form-group">
				<label for="gender" class="col-md-2 control-label">Gender</label>
				<div class="col-md-3">
					<select id="gender" name="gender" class="form-control">
						<option value="M"
							<?php if($p['gender'] == 'M') { echo " selected"; } ?>>M</option>
						<option value="F"
							<?php if($p['gender'] == 'F') { echo " selected"; } ?>>F</option>
						<option value="E"
							<?php if($p['gender'] == 'E') { echo " selected"; } ?>>E</option>
					</select>
				</div>
				<label class="col-md-2 control-label" for="dob">DOB</label>  
				<div class="col-md-3">
					<input id="dob" name="dob" type="date" value="<?php echo $p['dob'];?>" class="form-control input-md">
				</div>
			</div>
	
					
			<!-- Select Basic -->
			<div class="form-group">
				<label class="col-md-2 control-label" for="country">Country</label>
				<div class="col-md-3">					
					<select name="country" id="country" class="input-medium bfh-countries form-control" > 
					<?php 
					foreach ($db->countries() as &$country)
					       echo '<option value = "'.$country['id']. '" ' . ($p['country'] == $country['id'] ? 'SELECTED' : '') . '>' . $country['name']. '</option>';
                    ?>
                    </select>
				</div>
				<label class="col-md-2 control-label" for="nif">NIF</label>
				<div class="col-md-3">
					<input id="nif" name="nif" type="text" value="<?php echo $p['NIF'];?>" class="form-control input-md">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="shortname">Short Name</label>
				<div class="col-md-3">
					<input id="nickname" name="nickname" type="text" value="<?php echo $p['nickname'];?>" class="form-control input-md">
				</div>
				<label class="col-md-2 control-label" for="facebook">Facebook</label>
				<div class="col-md-3">
					<input id="fbid" name="fbid" type="text" value="<?php echo $p['fbid'];?>" class="form-control input-md">
				</div>
			</div>
		
			<div class="form-group">
				<label for="gender" class="col-md-2 control-label">Club Associated</label>
				<div class="col-md-3">
					<select id="club" name="club" class="form-control">
						<option value="M"
							<?php if($p['club'] == 'Y') { echo " selected"; } ?>>Y</option>
						<option value="F"
							<?php if($p['club'] == 'N') { echo " selected"; } ?>>N</option>
					</select>
				</div>
			</div>
			
			<!-- Textarea -->
			<div class="form-group">
				<label class="col-md-2 control-label" for="notes">Notes</label>
				<div class="col-md-8">
					<textarea class="form-control" id="comments" name="comments"><?php echo $p['comments'];?></textarea>
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

<div class="panel panel-default">

	<div class="panel-heading">Staff</div>
	<div class="panel-body">
			
			<div class="form-group">
				<label for="driver" class="col-lg-2 control-label">Driver</label>
				<div class="col-lg-2">
					<select id="driver" name="driver" class="form-control">
						<option value="Y"
							<?php if($p['driver'] == 'Y') { echo " selected"; } ?>>Y</option>
						<option value="N"
							<?php if($p['driver'] == 'N') { echo " selected"; } ?>>N</option>
					</select>
				</div>
				<label class="col-lg-2 control-label" for="firstname">Driver Rating &#91;&#37;&#93;</label>
				<div class="col-lg-2">
					<input id="drating" name="drating" type="text" value="<?php echo $p['drating'];?>" class="form-control input-md">
				</div>
			</div>
			
			<div class="form-group">
				<label for="instructor" class="col-lg-2 control-label">Instructor</label>
				<div class="col-lg-2">
					<select id="instructor" name="instructor" class="form-control">
						<option value="Y"
							<?php if($p['instructor'] == 'Y') { echo " selected"; } ?>>Y</option>
						<option value="N"
							<?php if($p['instructor'] == 'N') { echo " selected"; } ?>>N</option>
					</select>
				</div>
				<label class="col-lg-2 control-label" for="id">Instructor Rating &#91;&#37;&#93;</label>
				<div class="col-lg-2">
					<input class="form-control input-md" id="irating" name="irating" type="text" value = "<?php echo $p['irating'];?>">
				</div>
			</div>
					
			<div class="form-group">
				<label class="col-lg-2 control-label" for="update">Action</label>
				<div class="col-md-8">
					<button class="btn btn-success" onclick="return saveClient()">Gravar</button>
				</div>
			</div>
		</div>
		</div>

<?php 
// echo '<ul class="nav nav-tabs" role="tablist">';
// if ($valid_flag)
// {
    
// 	echo ' <li role="presentation" class="active"><a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">Payments</a></li>';
// 	echo ' <li role="presentation" class="active"><a href="#unpayed" aria-controls="unpayed" role="tab" data-toggle="tab">Unpayed Sessions</a></li>';
// 	echo '<li role="presentation"><a href="#payed" aria-controls="payed" role="tab" data-toggle="tab">Payed Sessions</a></li>';
	
// 	if ($isDriver)
// 	   echo '<li role="presentation"><a href="#driver_s" aria-controls="driver_s" role="tab" data-toggle="tab">Driver Sessions</a></li>';
// 	if ($isInstructor)
// 	   echo '<li role="presentation"><a href="#instructor_s" aria-controls="instructor_s" role="tab" data-toggle="tab">Instructor Sessions</a></li>';
   
// } echo '</ul>';
?>
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">Payments</a></li>
<li role="presentation"><a href="#unpayed" aria-controls="unpayed" role="tab" data-toggle="tab">Unpayed Sessions</a></li>
<li role="presentation"><a href="#payed" aria-controls="payed" role="tab" data-toggle="tab">Payed Sessions</a></li>
<li role="presentation"><a href="#driver_s" aria-controls="driver_s" role="tab" data-toggle="tab">Driver Sessions</a></li>
<li role="presentation"><a href="#instructor_s" aria-controls="instructor_s" role="tab" data-toggle="tab">Instructor Sessions</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="payments">
		<div class="row">
			<div class="col-lg-12">

				<div class="panel panel-default">
					<div class="panel-heading">Payments</div>
					<div class="panel-body">
						<table class="table table-striped" id="clientBalance">
							<thead>
								<tr>
            						<th class="col-lg-2">Date</th>
            						<th class="col-lg-1">Boat</th>
            						<th class="col-lg-1">Sport</th>
            						<th class="col-lg-1">Weight</th>
            						<th class="col-lg-1">Driver</th>
            						<th class="col-lg-1">Inst.</th>
            						<th class="col-lg-1">Min</th>
            						<th class="col-lg-1">Cost</th>
								</tr>
							</thead>
							<tbody>
<?php
$total_payed = 0;
$total_minutes = 0;
foreach ( $unpayed_sessions as &$session) 
{
	echo '<tr>';
	echo '<td><a href="sessionEdit.php?id='.$session['sid'].'">' . $session['timestamp'] . '</a></td>';
	echo '<td>' . $session['boat'] . '</a></td>';
	echo '<td>' . $session['boat_hours'] . '</td>';
	echo '<td>' . $session['weight'] . '</td>';
	echo '<td>' . $session['driver'] . '</td>';
	echo '<td>' . $session['instructor'] . '</td>';
	echo '<td>' . $session['minutes'] . '</td>';
	echo '<td>' . $session['cost'] . ' &#8364;</td>';
	echo '</tr>';
		
	$total_minutes += $session['minutes'];
	$total_payed += $session['cost'];
}
?>
							</tbody>
							<tfoot>
<?php
    echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>' .round($total_minutes,2).'</td>';
	echo '<td>' .round($total_payed,2). ' &#8364;</td>';
	echo '</tr>';
?>
							</tfoot>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>


	<div role="tabpanel" class="tab-pane" id="unpayed">
		<div class="row">
			<div class="col-lg-12">

				<div class="panel panel-default">
					<div class="panel-heading">Unpayed Sessions</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
            						<th class="col-lg-2">Date</th>
            						<th class="col-lg-1">Boat</th>
            						<th class="col-lg-1">Sport</th>
            						<th class="col-lg-1">Weight</th>
            						<th class="col-lg-1">Driver</th>
            						<th class="col-lg-1">Inst.</th>
            						<th class="col-lg-1">Min</th>
            						<th class="col-lg-1">Cost</th>
								</tr>
							</thead>
							<tbody>
<?php
$total_payed = 0;
$total_minutes = 0;
foreach ( $unpayed_sessions as &$session) 
{
	echo '<tr>';
	echo '<td><a href="sessionEdit.php?id='.$session['sid'].'">' . $session['timestamp'] . '</a></td>';
	echo '<td>' . $session['boat'] . '</a></td>';
	echo '<td>' . $session['boat_hours'] . '</td>';
	echo '<td>' . $session['weight'] . '</td>';
	echo '<td>' . $session['driver'] . '</td>';
	echo '<td>' . $session['instructor'] . '</td>';
	echo '<td>' . $session['minutes'] . '</td>';
	echo '<td>' . $session['cost'] . ' &#8364;</td>';
	echo '</tr>';
		
	$total_minutes += $session['minutes'];
	$total_payed += $session['cost'];
}
?>
							</tbody>
							<tfoot>
<?php
    echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td>' .round($total_minutes,2).'</td>';
	echo '<td>' .round($total_payed,2). ' &#8364;</td>';
	echo '</tr>';
?>
							</tfoot>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div role="tabpanel" class="tab-pane" id="payed">
		<div class="row">
			<div class="col-lg-12">

				<div class="panel panel-default">
					<div class="panel-heading">Payed Sessions</div>
					<div class="panel-body">
						<table class="table table-striped">
				<thead>
					<tr>
						<th class="col-lg-2">Date</th>
						<th class="col-lg-1">Boat</th>
						<th class="col-lg-1">Sport</th>
						<th class="col-lg-1">Weight</th>
						<th class="col-lg-1">Driver</th>
						<th class="col-lg-1">Inst.</th>
						<th class="col-lg-1">Min</th>
						<th class="col-lg-1">Cost</th>
					</tr>
				</thead>
			<tbody>
	<?php
	$total_payed = 0;
	$total_minutes = 0;
	foreach ( $payed_sessions as &$session) 
	{
		echo '<tr>';
		echo '<td><a href="sessionEdit.php?id='.$session['sid'].'">' . $session['timestamp'] . '</a></td>';
		echo '<td>' . $session['boat'] . '</a></td>';
		echo '<td>' . $session['boat_hours'] . '</td>';
		echo '<td>' . $session['weight'] . '</td>';
		echo '<td>' . $session['driver'] . '</td>';
		echo '<td>' . $session['instructor'] . '</td>';
		echo '<td>' . $session['minutes'] . '</td>';
		echo '<td>' . $session['cost'] . ' &#8364;</td>';
		echo '</tr>';
		
		$total_minutes += $session['minutes'];
		$total_payed += $session['cost'];
	}
	?>
	</tbody>
	<tfoot>
	<?php
		echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td>' .round($total_minutes,2).'</td>';
		echo '<td>' .round($total_payed,2). ' &#8364;</td>';
		echo '</tr>';
	?>
								</tfoot>
							</table>		
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
if ($isDriver)
{
	echo '<div role="tabpanel" class="tab-pane" id="driver_s">';
	echo ' <div class="row">';
	echo '	<div class="col-lg-12">';
 	echo '<div class="panel panel-default">
		<div class="panel-heading">Driver Sessions</div>
		<div class="panel-body">
		<table class="table table-striped">
		<thead>
		<tr>
		<th class="col-lg-2">Date</th>
		<th class="col-lg-1">Boat</th>
		<th class="col-lg-1">Sport</th>
		<th class="col-lg-1">Weight</th>
		<th class="col-lg-3">Rider</th>
		<th class="col-lg-1">Inst.</th>
		<th class="col-lg-1">Min</th>
		<th class="col-lg-1">Cost</th>
		</tr>
		</thead>
		<tbody>';
		
	$total_payed = 0;
	$total_minutes = 0;
	foreach ( $driver_sessions as &$session) 
	{
		echo '<tr>';
		echo '<td><a href="sessionEdit.php?id='.$session['sid'].'">' . $session['timestamp'] . '</a></td>';
		echo '<td>' . $session['boat'] . '</a></td>';
		echo '<td>' . $session['boat_hours'] . '</td>';
		echo '<td>' . $session['weight'] . '</td>';
		echo '<td>' . $session['firstname'] . ' ' . $session['lastname'] . '</td>';
		echo '<td>' . $session['instructor'] . '</td>';
		echo '<td>' . $session['minutes'] . '</td>';
		echo '<td>' . $session['cost'] . ' &#8364;</td>';
		echo '</tr>';
		
		$total_minutes += $session['minutes'];
		$total_payed += $session['cost'];
	}
		echo '</tbody><tfoot>';
		echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td>' .round($total_minutes,2).'</td>';
		echo '<td>' .round($total_payed,2). ' &#8364;</td>';
		echo '</tr>';
	
		echo '</tfoot>
							</table>	
		</div>
		</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	?>


	

	<div role="tabpanel" class="tab-pane" id="instructor_s">
	<div class="row">
			<div class="col-lg-12">
	<?php 
if (!empty($instructor_sessions))
	{
		echo '
	<div class="panel panel-default">
	<div class="panel-heading">Instructor Sessions</div>
		<div class="panel-body">
			<table class="table table-striped" id="clientBalance">
				<thead>
					<tr>
						<th class="col-lg-2">Date</th>
						<th class="col-lg-1">Boat</th>
						<th class="col-lg-1">Sport</th>
						<th class="col-lg-1">Weight</th>
						<th class="col-lg-1">Driver</th>
						<th class="col-lg-3">Rider</th>
						<th class="col-lg-1">Min</th>
						<th class="col-lg-1">Cost</th>
					</tr>
				</thead>
			<tbody>';
	$total_payed = 0;
	$total_minutes = 0;
	foreach ( $instructor_sessions as &$session) 
	{
		echo '<tr>';
		echo '<td><a href="sessionEdit.php?id='.$session['sid'].'">' . $session['timestamp'] . '</a></td>';
		echo '<td>' . $session['boat'] . '</a></td>';
		echo '<td>' . $session['boat_hours'] . '</td>';
		echo '<td>' . $session['weight'] . '</td>';
		echo '<td>' . $session['instructor'] . '</td>';
		echo '<td>' . $session['firstname'] . ' ' . $session['lastname'] . '</td>';
		echo '<td>' . $session['minutes'] . '</td>';
		echo '<td>' . $session['cost'] . ' &#8364;</td>';
		echo '</tr>';
		
		$total_minutes += $session['minutes'];
		$total_payed += $session['cost'];
	}
	echo '
	</tbody>
	<tfoot>';
		echo '<tr>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td>' .round($total_minutes,2).'</td>';
		echo '<td>' .round($total_payed,2). ' &#8364;</td>';
		echo '</tr>';
	echo '
								</tfoot>
							</table>	
		</div>
	</div>';
	}
	?>
			</div>
		</div>
	
</div>
</div>
				
	</form>

</div>


<script type="text/javascript">
$(document).ready(function() {

	$("#clientForm").submit(function(e) {

		var disabled = $('#clientForm').find(':input:disabled').removeAttr('disabled');
		var postData = $('#clientForm').serializeArray();
		disabled.attr('disabled','disabled');

		$.ajax({
			url : 'lib/clientSave.php',
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//$("#id").val(data);
				alert("Cliente saved with success");
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("Error saving client.");
			}
		});
		e.preventDefault();
	});
	
});
	
function saveClient() {
	$("#clientForm").submit();
	return false;
}


</script>

  </body>
</html>