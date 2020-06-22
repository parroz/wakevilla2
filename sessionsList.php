<?php
include "lib/wv.php";
session_start();
include_once('navbar.php');
$db = new wv();

?>
   
<div class="container">
	<form class="form-horizontal" method="POST" action="#" id="sessionFilter">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Sessions List</h3></div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="clientSearch" class="col-lg-1 control-label">Procurar</label>
							<div class="col-lg-11">
								<input type="text" class="form-control" id="clientSearch" name="clientSearch">
							</div>
						</div>

						<div class="form-group">
							<label for="client_id" class="col-lg-1 control-label">Numero</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="clientId" name="clientId" value="" readonly>
							</div>
							<label for="name" class="col-lg-1 control-label">Nome</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="clientName" name="clientName" value="" readonly>								
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="sport" class="col-lg-1 control-label">Modalidade</label>
								<div class="col-lg-2">
						 <select id="filter" name="filter" class="form-control">
							<option value="all" selected="selected">All</option>	
							<option value="payed">Payed</option>
							<option value="unpayed">Unpayed</option>
						</select>
						</div>
						</div>
	
						
						<div class="form-group">
							<label for="sport" class="col-lg-1 control-label">Modalidade</label>
								<div class="col-lg-2">
									<select id="sport" name="sport" class="form-control">
									<?php
									$sports = $db->sports();
									foreach ($sports as &$sport)
									{
										if ($sport['id'] == '1')
											echo '<option value="'.$sport['id'].'" SELECTED>'.$sport['name'].'</option>';
										else
											echo '<option value="'.$sport['id'].'">'.$sport['name'].'</option>';
									}
									?>
									</select>														
								</div>
							</div>
							<div class="form-group">						
							<label for="boat" class="col-lg-1 control-label">Barco</label>
								<div class="col-lg-2">
									<select id="boat" name="boat" class="form-control">
									<?php
										$boats = $db->boats();
										foreach ($boats as &$boat)
										{
											if ($boat['id'] == '1')
												echo '<option data-weight="'.$boat['weight'].'" data-hours="'.$boat['boat_hours'].'" value="'.$boat['id'].'" SELECTED>'.$boat['name'].'</option>';
											else
												echo '<option data-weight="'.$boat['weight'].'" data-hours="'.$boat['boat_hours'].'" value="'.$boat['id'].'">'.$boat['name'].'</option>';
										}
									?>
									</select>
								</div>
							</div>
						
						<div class="form-group">
							<label for="driver" class="col-lg-1 control-label">Driver</label>
							<div class="col-lg-2">
								<select id="driver" name="driver" class="form-control">
									<option value="" SELECTED></option>
									<?php
									$drivers = $db->drivers();
									foreach ($drivers as &$driver)
									{
										echo '<option value="'.$driver['id'].'">'.$driver['name'].'</option>';
									}
									?>
								</select>
							</div>
							<label for="instructor" class="col-lg-1 control-label">Instrutor</label>
							<div class="col-lg-2">
								<select id="instructor" name="instructor" class="form-control">
									<option value="" SELECTED></option>
									<?php
									$instructors = $db->instructors();
									foreach ($instructors as &$instructor)
									{
										echo '<option value="'.$instructor['id'].'">'.$instructor['name'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="date" class="col-lg-1 control-label">Date 1</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="date" name="date" value="" placeholder="<?php echo date('Y-m-d');?>">
							</div>
							<label for="hour" class="col-lg-1 control-label">Date 2</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" id="hour" name="hour" value="" placeholder="<?php echo date('Y-m-d');?>">								
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="date" class="col-lg-1 control-label">What to Show</label>
							<div class="checkbox">
							    <label for="boat">
								<input type="checkbox" name="boat" id="boat" value="1"> Boat
	 							</label>
								</div>
  <div class="checkbox">
    <label for="hours">
	  <input type="checkbox" name="hours" id="hours" value="1"> Hours
    </label>
	</div>
  <div class="checkbox">
    <label for="weight">
      <input type="checkbox" name="weight" id="weight" value="1"> Weight
    </label>
	</div>	
	  <div class="checkbox">
    <label for="driver">
	  <input type="checkbox" name="driver" id="driver" value="1">Driver
    </label>
	</div>
	  <div class="checkbox">
    <label for="instructor">
      <input type="checkbox" name="instructor" id="instructor" value="1">Instructor
    </label>
	</div>				
						</div>
													
						<div class="form-group">
							<div class="col-lg-2"></div>
							<div class="col-lg-3">
								<button id="finish" name="finish" value="1" class="btn btn-success">Pesquisar</button>
							</div>
						</div>
						 		
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Resultado</h3></div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
					<thead>
					<tr id="resultsHeader">
					</tr>
					</thead>
					<tbody id="results">
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

<script>

$(document).ready(function () {

	$('#finish').click(function(e){
		e.preventDefault();
		
		var table = $("#results");
		table.find("tr").remove();	

		var disabled = $('#sessionFilter').find(':input:disabled').removeAttr('disabled');
		var postData = $('#sessionFilter').serializeArray();
		disabled.attr('disabled','disabled');
		
		$.ajax({			
			type		: 'POST',
			url			: 'lib/sessionFinder.php',
			data		: postData,
			dataType	: 'json',
			encode		: true,
			success:function(data, textStatus, jqXHR) 
			{
				console.log(data);
				$.each (data, function (i) {
					$('#results').append(
						'<tr>'+
						'<td>' + data[i].date + '</td>'+
						'<td><a href="productEdit.php?id='+data[i].id+'">' + data[i].id + '</a></td>'+
						'<td><a href="productEdit.php?id='+data[i].id+'">' + data[i].ref + '</a></td>'+
						'<td>' + data[i].external_ref + '</td>'+					
						'<td>' + data[i].description + '</td>' +
						'<td>' + data[i].supplierAcronym + '</td>' +
						'<td>' + data[i].quantity + '</td>' +
						'<td>' + data[i].abbrev + '</td>' +
						'<td><a target="_blank" href="lib/assayPdf.php?id=' + data[i].assay + '">' + data[i].assay + '</a></td>' +
						'<td>' + data[i].order + '</td>' +
						'</tr>'
					);
				});
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				console.log(textStatus);
				alert("Erro ao procurar produtos.");
			}
		});	
	});

//	function trLink(event) {
//		window.document.location = $(this).data("href");
//	}
	setupSupplierAutocomplete();
});
</script>
 
  </body>
</html>
