$(document).on('click', '.proCode', function(e) {
            $("#productCode").val($(this).attr('data-vendor'));
            var productCode = $("#productCode").val();

            $.ajax({
                    url: "./frame/framePriceValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        code: productCode
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult['code'] == null) {
                            document.getElementById('pricedetailtilte').innerHTML = 'Product <strong>>'+productCode+' </strong>Price Data Not Available';
                            document.getElementById('pruPrice').innerHTML = '';
                            document.getElementById('sePrice').innerHTML = '';
                            document.getElementById('taxx').innerHTML = '';
                            document.getElementById('toQuant').innerHTML = '';
                        } else {
                            var combinedData = 'Product <strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']>/strong> Current Price Details';
                            document.getElementById('pricedetailtilte').innerHTML = combinedData;
                            document.getElementById('pruPrice').innerHTML = dataResult['purchase_price'];
                            document.getElementById('sePrice').innerHTML = dataResult['selling_price'];
                            document.getElementById('taxx').innerHTML = dataResult['tax'];
                            document.getElementById('toQuant').innerHTML = dataResult['quantity'];
                        }
                    }
                });
        });

        $(document).on('click', '.proCodeBranch', function(e) {
            $("#productCodeBranch").val($(this).attr('data-vendor'));
            document.getElementById("priceBDetails").style.display = "none";
            document.getElementById("branchName").value = '';
        });

        $(document).on('change', '#branchName', function(e) {
            var branch = $("#branchName").val();
            var productCode = $("#productCodeBranch").val();

            $.ajax({
                    url: "./purchase/productPriceValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        code: productCode,
                        branch: branch
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById("priceBDetails").style.display = "block";
                        if(dataResult['code'] == null) {
                            document.getElementById('pricedetailtilteB').innerHTML = 'Product <strong>'+productCode+' </strong>Price Data Not Available';
                            document.getElementById('pruPriceB').innerHTML = '';
                            document.getElementById('sePriceB').innerHTML = '';
                            document.getElementById('taxxB').innerHTML = '';
                            document.getElementById('toQuantB').innerHTML = '';
                        } else {
                            var combinedData = 'Product <strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']</strong> Current Price Details';
                            document.getElementById('pricedetailtilteB').innerHTML = combinedData;
                            document.getElementById('pruPriceB').innerHTML = dataResult['purchase_price'];
                            document.getElementById('sePriceB').innerHTML = dataResult['selling_price'];
                            document.getElementById('taxxB').innerHTML = dataResult['tax'];
                            document.getElementById('toQuantB').innerHTML = dataResult['quantity'];
                        }
                    }
                });
        });