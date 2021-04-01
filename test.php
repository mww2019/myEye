<?php

include_once('./receipt/branchProduct.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test</title>


</head>
<body>
	<div class="control-group" >
		<table id="teamArea">
			<tr>
				<th>Description</th>
				<th>Quatity</th>
				<th>Unit Amt.</th>
				<th>Amount</th>
				<th></th>
			</tr>
			<tr>
				<td>
					<select name="a[]" id="a1" required>
						<option value="">---- Select One ----</option>
						<?php $i=0; foreach ($productFetchResult as $dta) { ?>
                            <option value="<?= $productFetchResult[$i]['product_code'] ?>"><?= ucwords($productFetchResult[$i]['product_cat']).' - '.$productFetchResult[$i]['product_code'].' ['.ucwords($productFetchResult[$i]['product_name']).']' ?></option>
                        <?php $i++; } ?>
					</select>
				</td>
				<td><input type="text" id="b1" name="b[]" ></td>
				<td><input type="text" id="c1" name="c[]" ></td>
				<td><input class="price" type="text" id="1" name="d[]"></td>
				<td><a id="addNewTeam" style="cursor: pointer;">Add another</a></td>
			</tr>
		</table>
	    <!-- <div id="teamArea"class="controls">
	      <input type="text" name="a[]">
	      <input type="text" name="b[]">
	      <input type="text" name="c[]">
	    </div> -->
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).on('click', '.price', function(){
		var id = this.id;
		var quant = $("#b"+id).val();
		var uPrice = $("#c"+id).val();
		var tPrice = quant*uPrice;
		document.getElementById(id).value = tPrice;
		// console.log(tPrice);
	});

	$(document).on('change', '#a'+rowCount, function(){
		console.log('hello');
	});
</script>
<script type="text/javascript">
	var rowCount = 1;
	$("#addNewTeam").click(function(){
		rowCount++;
		var elem1 = $("<select/>",{
	        type: "text",
	        name: "a[]",
	        id: "a"+rowCount
	    });
	    var elem2 = $("<input/>",{
	        type: "text",
	        name: "b[]",
	        id: "b"+rowCount
	    });
	    var elem3 = $("<input/>",{
	        type: "text",
	        name: "c[]",
	        id: "c"+rowCount
	    });
	    var elem4 = $("<input/>",{
	        type: "text",
	        name: "d[]",
	        id: rowCount,
	        class: "price"
	    });
	    
	    var removeLink = $("<span style='cursor: pointer;' />").html("X").click(function(){
	        // $(elem1).remove();
	        // $(elem2).remove();
	        // $(elem3).remove();
	        // $(elem4).remove();
	        // $(this).remove();
	        content.remove();
	    });

	    var content = $('<tr>').append(
	    					$('<td/>').append(elem1),
	    					$('<td/>').append(elem2),
	    					$('<td/>').append(elem3),
	    					$('<td/>').append(elem4),
	    					$('<td/>').append(removeLink)
	    					);	    			

	    $("#teamArea").append(content);

	    $.ajax({
	    	url: './receipt/branchProductAjax.php',
	    	data: "", 
	    	dataType: 'json',
            success: function(rows){
            	// var dataResult = JSON.parse(dataResult);
            	var select = document.getElementById('a'+rowCount);
            	var opt = document.createElement('option');
            	opt.value = '';
				opt.innerHTML = '---- Select One ----';
				select.appendChild(opt);
            	for (var i in rows) {
				    var row = rows[i];          
				    var pCat = row[2];
				    var pCode = row[3];
				    var pName = row[4];
				    
				    var opt = document.createElement('option');
				    opt.value = pCode;
				    opt.innerHTML = pCat.charAt(0).toUpperCase()+pCat.slice(1)+' - '+pCode+' ['+pName.charAt(0).toUpperCase()+pName.slice(1)+']';
				    select.appendChild(opt);
				}
            }
	    });


	    // $("#teamArea").append(elem1).append(elem2).append(elem3).append(elem4).append(removeLink);
	    // $("#teamArea").append('<tr><td>'+elem1+'</td>').append('<td>'+elem2+'</td>').append('<td>'+elem3+'</td>').append('<td>'+elem4+'</td>').append('<td>'+removeLink+'</td></tr>');
	});

	
</script>
</body>
</html>