 <?php
 include "lib/wv.php";
 session_set_cookie_params(0);
 session_start();
 include_once('navbar.php');
 $db = new wv();
 
 $p = array(
     'id' => '',
     'name' => '',
     'ppm' => '',
     'price' => '',
     'weight' => '',
     'associated' => '',
     'description' => ''
 );
 
 if (!empty($_REQUEST['id']))
     $p = $db->price($_REQUEST['id']);

  
error_log(json_encode($p));
?>
<div class="container">
	<form class="form-horizontal" method="post" id="priceForm">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Price</div>
			<div class="panel-body">

				<div class="form-group">
          			<label class="col-md-4 control-label" for="name">Id</label>  
					<div class="col-md-4">
						<input id="id" name="id" type="text" value="<?php echo $p['id']; ?>" class="form-control input-md" disabled>
 					</div>
				</div>

				<div class="form-group">
          			<label class="col-md-4 control-label" for="name">Name</label>  
					<div class="col-md-4">
						<input id="name" name="name" type="text" value="<?php echo $p['name']; ?>" class="form-control input-md">
 					</div>
				</div>

	<!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ppm">PPM</label>  
      <div class="col-md-4">
        <input id="ppm" name="ppm" type="text" value="<?php echo $p['ppm']; ?>" class="form-control input-md">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="price">Price</label>
      <div class="col-md-4">
        <input id="price" name="price" type="text" value="<?php echo $p['price']; ?>"  class="form-control input-md">
      </div>
    </div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Weight</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
		<input type="checkbox" name="weight" id="weight" value="1" <?php echo ($p['weight'] == 'Y') ? 'checked="checked"':''; ?>>
</label>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Associated</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
		<input type="checkbox" name="associated" id="associated" value="1" <?php echo ($p['associated'] == 'Y') ? 'checked="checked"':''; ?>>
    </label>
	</div>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"><?php echo $p['description'];?></textarea>
  </div>
</div>

	<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="update">Action</label>
  <div class="col-md-8">
	<button class="btn btn-success" id="save">Gravar</button>
    <button class="btn btn-danger" id="delete">Delete</button>
  </div>
</div>

</div>
	</div>
	</form>
	</div>
	
	
<script>

$(document).ready(function () {	
	function form_submit(delete_price)
	{
		var disabled = $('#priceForm').find(':input:disabled').removeAttr('disabled');
		var postData = $('#priceForm').serializeArray();
		disabled.attr('disabled','disabled');
		postData.push({ name: "delete", value: delete_price});
		
		$.ajax({
			url : 'lib/priceSave.php',
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//$("#id").val(data);
				alert("Price saved with success");
				window.location = './prices.php';

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("Error saving Price.");
			}
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
