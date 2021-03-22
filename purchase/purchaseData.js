function check(e, value) {
          //Check Charater
          var unicode = e.charCode ? e.charCode : e.keyCode;
          if (value.indexOf(".") != -1)
            if (unicode == 46) return false;
          if (unicode != 8)
            if ((unicode < 48 || unicode > 57) && unicode != 46) return false;
        }
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

$('#edit_pDte').datepicker();

        $(function () {
            var proCat = $('#pro_cat').val();
            $('#purTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./purchase/fetchPurData.php?cat="+proCat
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#purTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#purTable").css("display", "none");
                },
                "destroy": true
            });
        });

function toUpper(str) {
            return str
                .toLowerCase()
                .split(' ')
                .map(function(word) {
                    return word[0].toUpperCase() + word.substr(1);
                })
                .join(' ');
             }

        $(document).on('change', '#code', function(e) {
            var productCode = $("#code").val();
            var branch = $("#branch").val();
            var pName = $("#protab").val();
            $.ajax({
                    url: "./purchase/productName.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: productCode,
                        branch: branch,
                        pName: pName
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('f_name').value         = toUpper(dataResult['name']);
                        document.getElementById('pre_pur_price').value  = dataResult['p_price'];
                        document.getElementById('pre_sell_price').value = dataResult['s_price'];
                        document.getElementById('pre_tax').value        = dataResult['tax'];
                        document.getElementById('re_quantity').value    = dataResult['quantity'];
                    }
                });
        });

        $(document).on('change', '#branch', function(e) {
            var productCode = $("#code").val();
            var branch = $("#branch").val();
            var pName = $("#protab").val();
            $.ajax({
                    url: "./purchase/productName.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: productCode,
                        branch: branch,
                        pName: pName
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('f_name').value         = toUpper(dataResult['name']);
                        document.getElementById('pre_pur_price').value  = dataResult['p_price'];
                        document.getElementById('pre_sell_price').value = dataResult['s_price'];
                        document.getElementById('pre_tax').value        = dataResult['tax'];
                        document.getElementById('re_quantity').value    = dataResult['quantity'];
                    }
                });
        });

        $(document).on('click', '.upModelBtn', function(e) {
            $("#purID").val($(this).attr('data-vendor'));
            var purID = $("#purID").val();

            $.ajax({
                    url: "./purchase/purchaseValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: purID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_branch').value  = toUpper(dataResult['branch']);
                        document.getElementById('edit_code').value  = dataResult['pro_code'];
                        document.getElementById('edit_sName-selectized').value = toUpper(dataResult['sup_name']);
                        document.getElementById('edit_pDte').value = dataResult['pur_dte'];
                        document.getElementById('edit_f_name').value = toUpper(dataResult['pro_name']);
                        document.getElementById('edit_pur_price').value = dataResult['purchase_price'];
                        document.getElementById('edit_sell_price').value = dataResult['selling_price'];
                        document.getElementById('edit_quantity').value = dataResult['quantity'];
                        document.getElementById('edit_tax').value = dataResult['tax'];

                        document.getElementById('sENme').value = document.getElementById('edit_sName-selectized').value;
                        document.getElementById('edit_proCat').value = dataResult['pro_cat'];
                    }
                });
        });