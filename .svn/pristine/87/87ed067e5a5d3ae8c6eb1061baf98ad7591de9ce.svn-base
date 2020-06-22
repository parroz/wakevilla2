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

  $add = $_REQUEST['add'];
  $mod = $_REQUEST['mod'];
  $id = $_REQUEST['id'];
  
  
  if (!empty($mod))
  {
	  $row = $db->price($mod);
	  
  	echo '<div class="panel panel-default">
  <div class="panel-heading">Edit Price</div>
  <div class="panel-body">
    <form class="form-horizontal" action="prices.php" method="post">
	<input id="add" name="add" type="hidden" value="1">
	<input id="id" name="id" type="hidden" value="'.$mod.'">
	   <!-- Text input-->
    	<div class="form-group">
          <label class="col-md-4 control-label" for="name">Name</label>  
          <div class="col-md-4">
            <input id="name" name="name" type="text" value="'.$row['name'].'" placeholder="" class="form-control input-md" required="">
          </div>
        </div>

	<!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ppm">PPM</label>  
      <div class="col-md-4">
        <input id="ppm" name="ppm" type="text" value="'.$row['ppm'].'" placeholder="" class="form-control input-md">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="price">Price</label>
      <div class="col-md-4">
        <input id="price" name="price" type="text" value="'.$row['price'].'" placeholder="" class="form-control input-md">
      </div>
    </div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Weight</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">';
	if ($row['weight'] == 'Y')
		echo '<input type="checkbox" name="weight" id="weight" value="1" checked="checked">';
	else
		echo '<input type="checkbox" name="weight" id="weight" value="1">';
echo '    </label>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Associated</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">';
	if ($row['associated'] == 'Y')
		echo '<input type="checkbox" name="associated" id="associated" value="1" checked="checked">';
	else
		echo '<input type="checkbox" name="associated" id="associated" value="1">';
    echo '</label>
	</div>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description">'.$row['description'].'</textarea>
  </div>
</div>

	<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="update">Action</label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Update</button>
    <button id="delete" name="delete" class="btn btn-danger">Delete</button>
  </div>
</div>';
  }
else if (empty($mod) && !empty($add))
{
	$name = $_REQUEST['name'];
	$ppm = $_REQUEST['ppm'];
	$price = $_REQUEST['price'];
	$desc = $_REQUEST['description'];
	
	if (isset($_REQUEST['weight']))
		$weight = 'Y';
	else
		$weight = 'N';
		
	if (isset($_REQUEST['associated']))
		$associated = 'Y';
	else
		$associated = 'N';
		
		

	if (empty($id))
		$db->add_price($name, $ppm, $price, $weight, $associated,$desc);	
	elseif (isset($_REQUEST['delete']))
	{
		if (!$db->delete_price($id))
		{
			echo '<div class="alert alert-danger" role="alert">Impossible to delete this price because it has associated sessions!</div>';
		}
	}
	else
	{
		$db->update_price($id, $name, $ppm, $price, $weight, $associated, $desc);
	}
}
  
  if (empty($mod))
  {
	  $rows = $db->prices();
	  
	  echo '<div class="panel panel-default">
    	<!-- Default panel contents -->
        <div class="panel-heading">Price List</div>
        <!-- Table -->
        <table class="table">
		<tr><th>ID</th><th>Name</th><th>PPM</th><th>Price</th><th>Weight</th><th>Associated</th><th>Description</th></tr>';
		
	  foreach($rows as $row)
	  {  
	 	 echo '<tr>	 
		 	<td><a href="prices.php?mod='.$row['id'].'">' . $row['id'] . '</a></td>
			<td>' . $row['name']  .'</td>
			<td>' . $row['ppm'] .'</td>
			<td>' . $row['price'] .'</td>';
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
	   
	echo '</table>
    </div>';  
	
	echo '<div class="panel panel-default">
  <div class="panel-heading">Add Price</div>
  <div class="panel-body">
    <form class="form-horizontal" action="prices.php" method="post">
	<input id="add" name="add" type="hidden" value="1">
    
	 <!-- Text input-->
    	<div class="form-group">
          <label class="col-md-4 control-label" for="name">Name</label>  
          <div class="col-md-4">
            <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
          </div>
        </div>

	<!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ppm">PPM</label>  
      <div class="col-md-4">
        <input id="ppm" name="ppm" type="text" placeholder="" class="form-control input-md">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="price">Price</label>
      <div class="col-md-4">
        <input id="price" name="price" type="text" placeholder="" class="form-control input-md">
      </div>
    </div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Weight</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
      <input type="checkbox" name="weight" id="weight" value="1">
    </label>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Associated</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
      <input type="checkbox" name="associated" id="associated" value="1">
    </label>
	</div>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
</div>

    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-default">Add</button>
      </div>
    </div>
    </form>
  </div>
</div>';

	
	
  }
  
  
  ?>






</div>
	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>