<table style="background: #fff;" rules="all">
                                        <tbody>
                                        <tr>
                                        <td style="font-size: 14px;">Name</td>
                                        <td style="font-size: 14px;">Email</td>
                                        <td style="font-size: 14px;">Mobile</td>
                                        <td>
                                            <a onclick="addMoreRows()" style="font: normal 12px agency, arial; color: blue; text-decoration: underline; cursor: pointer;">
                                        Add More
                                        </a></td>
                                        </tr>
                                        <tr id="rowId">
                                        <td><input name="" size="17%" type="text" value="" /></td>
                                        <td><input name="" type="text" value="" /></td>
                                        <td><input name="" type="text" value="" /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                        <div id="addedRows"></div>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <script type="text/javascript">
        var rowCount = 1;
        function addMoreRows(frm) {
            rowCount ++;
            var recRow = '<p id="rowCount'+rowCount+'"><tr><td><input name=""  value="rowCount'+rowCount+'" type="text" size="17%" maxlength="120" /></td><td><input name="" type="text" maxlength="120" style="margin: 4px 5px 0 5px;"/></td><td><input name="" type="text" maxlength="120" style="margin: 4px 10px 0 0px;"/></td></tr> <a onclick="removeRow('+rowCount+');">Delete</a></p>';
            $('#addedRows').append(recRow);
        }
        function removeRow(removeNum) {
            console.log(removeNum);
            $('#rowCount'+removeNum).remove();
        }
    </script>