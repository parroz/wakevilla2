<?php
 include "lib/wv.php";
 session_set_cookie_params(0);
 session_start();
 include_once('navbar.php');
 $db = new wv();
 
 $p = array(
     'id' => '',
     'name' => '',
     'shortname' => ''
 );
 
 if (!empty($_REQUEST['id']))
     $p = $db->sport($_REQUEST['id']);

?>
<div class="container">
	<form class="form-horizontal"  method="post" id="priceForm">
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
					<label class="col-md-4 control-label" for="shortname">Shortname</label>  
					<div class="col-md-4">
						<input id="shortname" name="shortname" type="text" value="<?php echo $p['shortname']; ?>" class="form-control input-md">
					</div>
				</div>

	<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="update">Action</label>
  <div class="col-md-8">
	<button class="btn btn-success" id="save">Save</button>
    <button id="delete" class="btn btn-danger">Delete</button>
  </div>
</div>

</div>
	</div>
	</form>
	</div>
	
	
<script>

$(document).ready(function () {
	function form_submit(delete_flag)
	{
		var disabled = $('#priceForm').find(':input:disabled').removeAttr('disabled');
		var postData = $('#priceForm').serializeArray();
		disabled.attr('disabled','disabled');
		postData.push({ name: "delete", value: delete_flag});
		
		$.ajax({
			url : 'lib/sportSave.php',
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//$("#id").val(data);
				alert("Sport saved with success");
				window.location = './sports.php';
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("Error saving Sport.");
			}
		});
		e.preventDefault();
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