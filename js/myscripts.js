function digitsOnly(e)
{
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		return false;
	return true;
}

function upperText(e)
{
		this.value=this.value.toUpperCase();
}

function safeText(e)
{
	//this.value=this.value.toUpperCase();

//	console.log(e.which);
	
	if (e.which == 199) return true; // Ç
	if (e.which == 231) return true; // ç

	if (e.which == 0) return true; // null
	if (e.which == 8) return true; // tab
	if (e.which == 27) return true; // esc
	if (e.which == 127) return true; // del
	if (e.which == 0x20) return true; //space
	if (e.which == 0x21) return true; //!
	if (e.which == 0x28) return true; //(
	if (e.which == 0x29) return true; //)
	if (e.which == 0x2a) return true; //*
	if (e.which == 0x2b) return true; //+
	if (e.which == 0x2c) return true; //,
	if (e.which == 0x2d) return true; //-
	if (e.which == 0x2e) return true; //.
	if (e.which == 0x2f) return true; // /
	if (e.which == 0x30) return true; //0
	if (e.which == 0x31) return true; //1
	if (e.which == 0x32) return true; //2
	if (e.which == 0x33) return true; //3
	if (e.which == 0x34) return true; //4
	if (e.which == 0x35) return true; //5
	if (e.which == 0x36) return true; //6
	if (e.which == 0x37) return true; //7
	if (e.which == 0x38) return true; //8
	if (e.which == 0x39) return true; //9
	if (e.which == 0x3a) return true; //:
	if (e.which == 0x3b) return true; //;
	if (e.which == 0x3c) return true; //<
	if (e.which == 0x3d) return true; //=
	if (e.which == 0x3e) return true; //>
	if (e.which == 0x3f) return true; //?
	if (e.which == 0x40) return true; //@
	if (e.which == 0x41) return true; //A
	if (e.which == 0x42) return true; //B
	if (e.which == 0x43) return true; //C 
	if (e.which == 0x44) return true; //D 
	if (e.which == 0x45) return true; //E 
	if (e.which == 0x46) return true; //F 
	if (e.which == 0x47) return true; //G 
	if (e.which == 0x48) return true; //H 
	if (e.which == 0x49) return true; //I 
	if (e.which == 0x4A) return true; //J 
	if (e.which == 0x4B) return true; //K 
	if (e.which == 0x4C) return true; //L 
	if (e.which == 0x4D) return true; //M 
	if (e.which == 0x4E) return true; //N 
	if (e.which == 0x4F) return true; //O 
	if (e.which == 0x50) return true; //P 
	if (e.which == 0x51) return true; //Q 
	if (e.which == 0x52) return true; //R 
	if (e.which == 0x53) return true; //S 
	if (e.which == 0x54) return true; //T 
	if (e.which == 0x55) return true; //U   
	if (e.which == 0x55) return true; //U    
	if (e.which == 0x56) return true; //V    
	if (e.which == 0x57) return true; //W    
	if (e.which == 0x58) return true; //X    
	if (e.which == 0x59) return true; //Y    
	if (e.which == 0x5a) return true; //Z    
	if (e.which == 0x5c) return true; // \    			 				
	if (e.which == 0x61) return true; //	a    
	if (e.which == 0x62) return true; //	b    
	if (e.which == 0x63) return true; //	c    
	if (e.which == 0x64) return true; //	d    
	if (e.which == 0x65) return true; //	e    
	if (e.which == 0x66) return true; //	f    
	if (e.which == 0x67) return true; //	g    
	if (e.which == 0x68) return true; //	h    
	if (e.which == 0x69) return true; //	i    
	if (e.which == 0x6a) return true; //	j    
	if (e.which == 0x6b) return true; //	k    
	if (e.which == 0x6c) return true; //	l    
	if (e.which == 0x6d) return true; //	m    
	if (e.which == 0x6e) return true; //	n    
	if (e.which == 0x6f) return true; //	o    
	if (e.which == 0x70) return true; //	p    
	if (e.which == 0x71) return true; //	q    
	if (e.which == 0x72) return true; //	r    
	if (e.which == 0x73) return true; //	s    
	if (e.which == 0x74) return true; //	t    
	if (e.which == 0x75) return true; //	u    
	if (e.which == 0x76) return true; //	v    
	if (e.which == 0x77) return true; //	w    
	if (e.which == 0x78) return true; //	x    
	if (e.which == 0x79) return true; //	y    
	if (e.which == 0x7a) return true; //	z    
	if (e.which == 0xc380) return true; //	À      
	if (e.which == 0xc381) return true; //	Á      
	if (e.which == 0xc382) return true; //	Â
	if (e.which == 0xc383) return true; //	Ã      
	if (e.which == 0xc387) return true; //	Ç      
	if (e.which == 0xc388) return true; //	È      
	if (e.which == 0xc389) return true; //	É      
	if (e.which == 0xc38a) return true; //	Ê      
	if (e.which == 0xc38c) return true; //	Ì      
	if (e.which == 0xc38d) return true; //	Í      
	if (e.which == 0xc38e) return true; //	Î      
	if (e.which == 0xc392) return true; //	Ò      
	if (e.which == 0xc393) return true; //	Ó      
	if (e.which == 0xc394) return true; //	Ô      
	if (e.which == 0xc395) return true; //	Õ      
	if (e.which == 0xc399) return true; //	Ù      
	if (e.which == 0xc39a) return true; //	Ú      
	if (e.which == 0xc39b) return true; //	Û      
	if (e.which == 0xc3a0) return true; //	à      
	if (e.which == 0xc3a1) return true; //	á      
	if (e.which == 0xc3a2) return true; //	â      
	if (e.which == 0xc3a3) return true; //	ã      
	if (e.which == 0xc3a7) return true; //	ç      
	if (e.which == 0xc3a8) return true; //	è      
	if (e.which == 0xc3a9) return true; //	é      
	if (e.which == 0xc3aa) return true; //	ê      
	if (e.which == 0xc3ac) return true; //	ì      
	if (e.which == 0xc3ad) return true; //	í      
	if (e.which == 0xc3ae) return true; //	î      
	if (e.which == 0xc3b2) return true; //	ò      
	if (e.which == 0xc3b3) return true; //	ó      
	if (e.which == 0xc3b4) return true; //	ô      
	if (e.which == 0xc3b5) return true; //	õ      
	if (e.which == 0xc3b9) return true; //	ù      
	if (e.which == 0xc3ba) return true; //	ú      
	if (e.which == 0xc3bb) return true; //	û   

	return false;
}

function timeDigitsOnly(e)
{
	if (!digitsOnly(e)) return false;
	
	if (e.which == 8 ||  e.which == 0) return true;
	
	return ($(this).val().length < 3);
}

function floatOnly(e)
{
	if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
	{
		return false;
	}
	
	if (e.which == 46 && $(this).val().indexOf('.') != -1) {
		return false;
	}

	return true;
}


function trLink(event) {
	window.document.location = $(this).data("href");
}


function setupClientAutocompleteNav() {
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


	$('#clientSearchNav').bind('typeahead:selected', function(obj, datum, name) {
		window.location = './clientEdit.php?id=' + datum['id'];
	});


	$('#clientSearchNav').typeahead(null, {
		name: 'clients',
		display: 'name',
		source: clientFind,
		limit: 10,
		templates: {
			suggestion: Handlebars.compile('<div><strong>{{id}}</strong> – {{firstname}} {{lastname}} ({{comments}})</div>')
		  }
	});
}


function setupClientAutocomplete() {
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
	
//
//function setupClientSessionAutocomplete() {
//	var clientFind = new Bloodhound({
//		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
//		queryTokenizer: Bloodhound.tokenizers.whitespace,
//		remote: {
//			url: 'lib/clientFind.php',
//			wildcard: '%QUERY',
//			replace: function(url, uriEncocodedQuery) {
//				return url + "?q="+uriEncocodedQuery;
//			}
//		}
//	});
//
//	
//	$('#clientSearch').bind('typeahead:selected', function(obj, datum, name) {
//		$("#clientSessId").val(datum['id']);
//		$("#clientSessName").val(datum['firstname']+' '+datum['lastname']);
//
//		var postData;
//		postData.push({ name: "client_id", value: datum['id']});
//		postData.push({ name: "payed", value: false);
//
//		$.ajax({			
//			type		: 'POST',
//			url			: 'lib/sessionFind.php',
//			data 		: postData,
//			dataType	 : 'json',
//			encode		: true
//		}).done(function(data) {
//			console.log(data); 
//			if (!data.success) {
//				var obj = data.errors;
//				for (var prop in obj) {
//					$('#session').addClass('has-error');
//					$('#session').append('<div class="help-block"><div class="alert alert-danger">' + obj[prop] + '</div></div>'); 				
//				}
//			} else {
//				var table = $("#results");
//				table.find("tr").remove();	
//				
//				$.each (data, function (i) {
//					$('#results').append(
//						'<tr class="clickableRow" onclick="window.location.href=\'client.php?clientId=' + data[i].clientId + '\'" data-href="client.php?clientId='+ data[i].clientId +'" id='+data[i].clientId+'>'+
//						'<td>'+data[i].clientId+'</td>'+
//						'<td>'+data[i].prefixAcronym+'</td>'+
//						'<td>'+data[i].name + '</td>'+
//						'<td>'+data[i].mobile_phone1 + '</td>'+
//						'<td>'+data[i].tax_number + '</td>'+
//						'</tr>'
//					);
//					$('#' + data[i].clientId).on('click', trLink);
//				});
//			}
//		})
//		.fail(function(data) {
//			console.log(data);
//		});		
//		
//		
//	});
//
//
//	$('#clientSessSearch').typeahead(null, {
//		name: 'clients',
//		display: 'name',
//		source: clientFind,
//		limit: 100,
//		templates: {
//			suggestion: Handlebars.compile('<div><strong>{{id}}</strong> – {{firstname}} {{lastname}} ({{comments}})</div>')
//		  }
//	});
//}



function setupSupplierAutocomplete() {

	var findSupplier = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: 'lib/supplierFind.php',
			wildcard: '%QUERY',
			replace: function(url, uriEncocodedQuery) {
				return url + "?q="+uriEncocodedQuery;
			}
		}
	});


	$('#supplierSearch').bind('typeahead:selected', function(obj, datum, name) {
		$("#supplierId").val(datum['supplierId']);
		$("#supplierTaxNumber").val(datum['tax_number']);
		$("#supplierTaxNumberDiv").html(datum['tax_number']);
		$("#supplierName").val(datum['name']);
		$("#supplierAddress").val(datum['address']);
		$("#supplierPostalCode").val(datum['postal_code']);
		$("#supplierCity").val(datum['city']);
		$("#supplierCountry").val(datum['countryId']);
		$("#supplierAcronym").val(datum['supplierAcronym']);
		$("#productRef").val(datum['nextRef']);
	});


	$('#supplierSearch').typeahead(null, {
		name: 'fornecedores',
		display: 'supplierAcronym',
		source: findSupplier,
		limit: 100,
		templates: {
			suggestion: Handlebars.compile('<div><strong>{{supplierAcronym}}</strong> – {{name}}</div>')
		}
	});

}


function setupProductAutocomplete(inStock, storage, supplier) {	
	
	if (supplier === undefined)
	{
		supplier = 0;
	} 
	 
	var findProduct = new Bloodhound({
		datumTokenizer: function (datum) {
	        return Bloodhound.tokenizers.whitespace(datum.value);
	    },
//		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('description'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: 'lib/productFind.php',
			wildcard: '%QUERY',
			replace: function(url, uriEncocodedQuery) {
				return url + '?text='+uriEncocodedQuery+'&storage='+storage+'&flag='+inStock+'&supplier='+supplier;
			}
		}
	});


	$('#productSearch').bind('typeahead:selected', function(obj, datum, name) {
		$("#productRef").val(datum['ref']);
		$("#productExtRef").val(datum['external_ref']);
		$("#productDescription").val(datum['description']);
		$("#productCategory").val(datum['category_id']);
		$("#productOrigin").val(datum['origin']);
		$("#productFamily").val(datum['familyId']);
		$("#productVat").val(datum['iva_id']).change();
		$("#productFreeVat").val(datum['exemption_id']);
		$("#productSubfamily").val(datum['subfamilyId']);
		$("#productToque").val(datum['toq_type']);
		$("#productTag").val(datum['tag_type']);
		$("#productUnit").val(datum['unit_id']).change();
		$("#productExisting").val(datum['id']);
		$("#productUnitDesc").val(datum['unitDescription']);
		$("#productId").val(datum['id']);
		$("#productPvpVat").val(datum['pvpVat']);
		$("#productNat").val(datum['type']);
		$("#productMetal").val(datum['metalTypeId']);
		$("#productStone1").val(datum['stoneType1Id']);
		$("#productStone2").val(datum['stoneType2Id']);
		$("#productStone3").val(datum['stoneType3Id']);
		$("#productStone4").val(datum['stoneType4Id']);

		
		$("#productUnit").attr("disabled", true);
		$("#productNat").attr("disabled", true);
		//$("#productExtRef").attr("readonly", true);
		//$("#productDescription").attr("readonly", true);
		$("#productCategory").attr("disabled", true);
		//$("#productOrigin").attr("disabled", true);
		//$("#productFamily").attr("disabled", true);
		//$("#productSubfamily").attr("disabled", true);
		//$("#productToque").attr("readonly", true);
		//$("#productTag").attr("readonly", true);
		$('#productPvpSel option').remove();
		$('#productPvpSel').append('<option value="' + datum['pvp1'] + '" SELECTED>' + datum['pvp1'] + '</option>');
		$('#productPvpSel').append('<option value="' + datum['pvp2'] + '">' + datum['pvp2'] + '</option>');
		$('#productPvpSel').append('<option value="' + datum['pvp3'] + '">' + datum['pvp3'] + '</option>');
		$('#productPvpSel').append('<option value="' + datum['pvp4'] + '">' + datum['pvp4'] + '</option>');
		

         
	});


	$('#productSearch').typeahead(null, {
		name: 'products',
		display: 'description',
		source: findProduct,
		limit: 100,
		templates: {
		    //empty: [
		     // '<div class="empty-message">',
		      //  'unable to find any product that matches the current query',
		     // '</div>'
		    //].join('\n'),
		    suggestion: Handlebars.compile('<div><strong>{{ref}}</strong> – {{description}}</div>')
		  }
	
	});

}





function freeVatDecide()
{
	var vat = $("#productVat").val();

	if (vat == '1' || vat == '2')
		$("#productFreeVat").attr("disabled", false);
	else
	{
		$("#productFreeVat").val('M00');
		$("#productFreeVat").attr("disabled", true);
	}
}




