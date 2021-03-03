<!-- Jquery Core Js -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="./plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <!-- <script src="./plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
    <!-- Slimscroll Plugin Js -->
    <script src="./plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="./plugins/node-waves/waves.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="./plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="./plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="./js/admin.js"></script>
    <script src="./js/pages/tables/jquery-datatable.js"></script>
    <!-- <script src="./js/pages/forms/basic-form-elements.js"></script> -->
    <!-- Demo Js -->
    <script src="./js/demo.js"></script>

    <script type="text/javascript">
        $("#empType").change(function() {
            var val = $("#empType").val();
            if(val == 'admin'){
                $('#asgShop').val(null);
                $('#asgShop').attr("disabled", "disabled");
                $('#empType').attr("required", null);
            }else{
                $('#asgShop').attr("disabled", null);
                $('#empType').attr("required", "required");
            }
        });

        $("#empType_edit").change(function() {
            var val = $("#empType_edit").val();
            if(val == 'admin'){
                $('#asgShop_edit').val(null);
                $('#asgShop_edit').attr("disabled", "disabled");
                $('#empType_edit').attr("required", null);
            }else{
                $('#asgShop_edit').attr("disabled", null);
                $('#empType_edit').attr("required", "required");
            }
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#empTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./emp/fetchEmpData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#empTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delEmployee(id){
            swal({
              title: "Are you sure?",
              text: "want to delete employee details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>emp/delEmployee.php?id="+id;
              } else {
                swal("Employee details are not going to delete!");
              }
            });
        }

        // function editEmployee(id){
        //     window.location.href = "<?= $baseURL ?>addEmployee.php?upType=emp&id="+id;
        // }

        function toUpper(str) {
            return str
                .toLowerCase()
                .split(' ')
                .map(function(word) {
                    return word[0].toUpperCase() + word.substr(1);
                })
                .join(' ');
        }

        $(document).on('click', '.upModelBtn', function(e) {
            $("#empId").val($(this).attr('data-vendor'));
            var empID = $("#empId").val();

            $.ajax({
                    url: "./emp/empValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: empID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('eName_edit').value     = toUpper(dataResult['name']);
                        document.getElementById('email_edit').value     = dataResult['email'];
                        document.getElementById('phone_edit').value     = dataResult['phone'];
                        document.getElementById('asgShop_edit').value   = dataResult['asgShop'];
                        document.getElementById('empType_edit').value   = dataResult['empType'];
                        // $('#empType_edit option:selected').attr("selected",null);
                        // $('#empType_edit option[value="employee"]').attr("selected", "selected");
                        // $('#empType_edit').val(employee).attr("selected", "selected");
                        // $('#empType_edit').val(dataResult.empType);
                        if(dataResult['empType'] == 'admin'){
                            $('#asgShop_edit').attr("disabled", "disabled");
                        }
                        else{
                            $('#asgShop_edit').attr("disabled", null);
                        }
                        document.getElementById('address_edit').value   = toUpper(dataResult['address']);
                    }
                });
        });
    </script>

   