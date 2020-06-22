<?php
include "lib/wv.php";
session_start();
include_once('navbar.php');
$db = new wv();

?>
   
<div class="container">

<form class="form-horizontal" method="POST" action="#" id="client">
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Cliente</h3></div>
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
								<input type="text" class="form-control" id="clientId" name="clientId" readonly>
							</div>
							<label for="name" class="col-lg-1 control-label">Nome</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="clientName" name="clientName" readonly>								
							</div>
						</div>

						<div class="form-group">
							<label for="clientNotes" class="col-lg-1 control-label">Notas</label>
							<div class="col-lg-11">
								<input type="text" class="form-control" id="clientNotes" name="clientNotes" readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label for="pmethod" class="col-lg-1 control-label">Paying Method</label>
							<div class="col-lg-2">
								<select id="pmethod" name="pmethod" class="form-control">
									<option value="CASH" SELECTED>Cash</option>
									<option value="WT">Wire Transfer</option>
									<option value="MB">Multibank</option>
									<option value="CARD">CARD</option>
								</select>
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
					<div class="panel-heading"><h3 class="panel-title">Documentos</h3></div>
					<div class="panel-body">
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Data</th>	
								<th>Documento</th>
								<th>Total Bruto</th>
								<th>Valor por Pagar</th>
								<th>Valor a Pagar</th>
							</tr>
						</thead>
						<tbody id="results">
						</tbody>
						<tfoot>
							<tr>
								<td></td>	
								<td></td>
								<td></td>
								<td id='totalPVP'></td>
								<td id='totalPVPpay'></td>
							</tr>
						</tfoot>
					
					</table>
						 		
					</div>
				</div>
			</div>
		</div>
	
	<form class="form-horizontal" method="POST" action="#" id="sessionPay">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Resultado</h3></div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
					<thead>
					<tr id="resultsHeader">
						<th class="col-lg-1">Date</th>
						<th class="col-lg-1">Rider</th>
						<th class="col-lg-2">Name</th>
						<th class="col-lg-1">Driver</th>
						<th class="col-lg-1">Instructor</th>
						<th class="col-lg-1">Sport</th>
						<th class="col-lg-1">Boat</th>
						<th class="col-lg-1">Minutes</th>
						<th class="col-lg-1">Price</th>
						<th class="col-lg-1">Cost</th>
						<th class="col-lg-1">Select</th>
					</tr>
					</thead>
						<tbody id="results">
					</tbody>
					<tfoot>
					<tr>
						<td>TOTAL</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td id="total"></td>
						<td></td>
										</tr>
					</tfoot>
					</table>
				</div>

				<div class="form-group">
						<div class="col-lg-2"></div>
						<div class="col-lg-3">
						<button id="pay" name="pay" value="1" class="btn btn-success">Pay</button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	</form>
</div>

<script>
function get_sessions() {
	$("#results").find("tr").remove();	

	$('#totalPVP').html('');
	$('#totalPVPpay').html('');
	

	documents = [];
	
	var disabled = $('#client').find(':input:disabled').removeAttr('disabled');
	var postData = $('#client').serializeArray();
	disabled.attr('disabled','disabled');
	postData.push({ name: "payed", value: false});

	$('#client').removeClass('has-error');
	$('.help-block').remove();

	totalPVPpay = 0;
	
	$.ajax({
		type		: 'POST',
		url			: 'lib/sessionFinder.php',
		data		: postData,
		dataType	: 'json',
		encode		: true,
		success:function(data, textStatus, jqXHR) 
		{
			documents = data;
			console.log(data);
			$.each (data, function (i) {
				documents[i].toPayValue = data[i].payValue;
				$('#results').append(
					'<tr>'+
					'<td>'+ data[i].date +'</td>'+
					'<td><a target=_blank href=./documents/"' + data[i].document+ '.pdf">' + data[i].document + '</a></td>' +
					'<td>'+ data[i].totalPVP +'</td>'+
					'<td>'+ data[i].payValue +'</td>'+
					'<td><input idx="'+i+'" type="text" id="docVal-'+i+'" name="docVal['+i+']" value="'+ data[i].payValue +'"></td>'+
					'</tr>'
				);
				totalPVPpay +=  parseFloat(data[i].payValue);					
				$('#docVal-' + i).on('keypress', floatOnly);
				$('#docVal-' + i).on('keyup', computeTotal);
				
			});
			$('#totalPVP').html(totalPVPpay.toFixed(2));
			$('#totalPVPpay').html(totalPVPpay.toFixed(2));
			
		},
		error: function(jqXHR, textStatus, errorThrown) 
		{
			console.log(textStatus);
			alert("Erro ao procurar documentos.");
		}
	});
}


function setupClientAutocomplete2() {
	var clientFind = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: 'lib/clientFind.php',
			wildcard: '%QUERY',
			replace: function(url, uriEncocodedQuery) {
				return url + "?q="+uriEncocodedQuery;
			}
		}
	});


	$('#clientSearch').bind('typeahead:selected', function(obj, datum, name) {
		$("#clientId").val(datum['id']);
		$("#clientTaxNumber").val(datum['tax_number']);
		$("#clientName").val(datum['firstname']+' '+datum['lastname']);
		$("#clientAddress").val(datum['address']);
		$("#clientPostalCode").val(datum['postal_code']);
		$("#clientCity").val(datum['city']);
		$("#clientCountry").val(datum['countryId']);
		$("#clientNotes").val(datum['comments']);
	});


	$('#clientSearch').typeahead(null, {
		name: 'clients',
		display: 'name',
		source: clientFind,
		limit: 100,
		templates: {
			suggestion: Handlebars.compile('<div><strong>{{id}}</strong> – {{firstname}} {{lastname}} ({{comments}})</div>')
		  }
	});
}

$(document).ready(function () {
	setupClientAutocomplete2();


	

	$("#pmethod").change(cardDecide);
	function cardDecide()
	{		
		if ($("#pmethod").val() == 'CARD')
			$("#card").attr("disabled", false);
		else
		{
			$("#card").val('');
			$("#card").attr("disabled", true);
		}
	}
	
	$('#search').click(function(e){
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
						'<td>' + data[i].date + '</a></td>'+
						'<td>' + data[i].pid + '</td>'+
						'<td>' + data[i].firstname + ' ' + data[i].lastname + '</td>'+
						'<td>' + data[i].driver + '</td>'+					
						'<td>' + data[i].sport + '</td>'+
						'<td>' + data[i].instructor + '</td>' +
						'<td>' + data[i].boat + '</td>' +
						'<td>' + data[i].minutes + '</td>' +
						'<td>' + data[i].price + '</td>' +
						'<td>' + data[i].cost + '</a></td>' +
						'<td><input type = "checkbox" value="session['+ data[i].sid +']" id="session['+ data[i].sid +']"></td>' +						
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

	$('#pay').click(function(e){
		e.preventDefault();

		var disabled = $('#payForm').find(':input:disabled').removeAttr('disabled');
		var postData = $('#payForm').serializeArray();
		disabled.attr('disabled','disabled');

		$.ajax({			
			type		: 'POST',
			url			: 'lib/sessionPay.php',
			data		: postData,
			dataType	: 'json',
			encode		: true,
			success:function(data, textStatus, jqXHR) 
			{
				console.log(data);
				alert("Ok, Sessions were payed successfully");
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				console.log(textStatus);
				alert("Error, sessions were not found");
			}
		});	
		
	});

	
});
</script>
 
  </body>
</html>
